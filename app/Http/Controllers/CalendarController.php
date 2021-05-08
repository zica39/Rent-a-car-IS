<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\Car;
use App\Models\Country;
use App\Models\Location;
use App\Models\Reservation;
use App\Models\ReservationAccessory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = null;
        $car = null;

        if($request->user)$user = User::findOrFail($request->user);
        if($request->car)$car= Car::findOrFail($request->car);

        $reservations = Reservation::query()->when($request->user,function ($query) use ($request){
           $query->where('user_id',$request->user);
        })->when($request->car,function ($query) use ($request){
            $query->where('car_id',$request->car);
        })->when($request->pickup_date,function ($query) use ($request){
            $query->where('pick_up_date','>=',date('y-m-d',strtotime($request->pickup_date)));
        })->when($request->return_date,function ($query) use ($request){
            $query->where('return_date',"<=",date('y-m-d',strtotime($request->return_date)));
        })->get();

        return view('calendar',['reservations'=>$reservations,'car'=>$car,'user'=>$user,'content'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


      $user = User::findOrFail($request->user);
      $car= Car::findOrFail($request->car);
      $pickup_date = $request->pickup_date;
      $return_date = $request->return_date;
      $locations = Location::all();
      $content='create';
      $accessories = Accessory::all();
        return view('calendar',compact('user','car','pickup_date','return_date','content','locations','accessories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user' =>'required|integer',
            'car'=>'required|integer',
            'pickup_location' => 'required|integer',
            'return_location'=>'required|integer',
            'pickup_date'=>'required|date',
            'return_date'=>'required|date',
            'pickup_time'=>'required|date_format:H:i',
            'return_time'=>'required|date_format:H:i'
        ]);

        if(strtotime($request->pickup_date) < strtotime(date('y-m-d')) || strtotime($request->pickup_date) >= strtotime($request->return_date)){
            return redirect()->back()->withInput()->with('error','Invalid period');
        }

        $result = Reservation::query()
            ->where('car_id',$request->car)
            ->whereRaw(
                '(pick_up_date <= ? and return_date >= ?)',
                [date('y-m-d',strtotime($request->pickup_date)),date('y-m-d',strtotime($request->return_date))]
            );

       if($result->count()){
           return redirect()->back()->withInput()->with('error','Car already reserved for that period');
       }

        $start = strtotime($request->pickup_date);
        $end = strtotime($request->return_date);

        $days_between = ceil(abs($end - $start) / 86400);
        $total_price = Car::findOrFail($request->car)->price * $days_between;

        DB::beginTransaction();

        $id = Reservation::create([
            'user_id' => $request->user,
            'car_id' => $request->car,
            'pick_up_location'=>$request->pickup_location,
            'return_location'=>$request->return_location,
            'pick_up_date' => date('y-m-d',strtotime($request->pickup_date)),
            'return_date'=>  date('y-m-d',strtotime($request->return_date)),
            'total_price' => $total_price,
            'pick_up_time' => $request->pickup_time,
            'return_time' => $request->return_time
        ])->id;


        foreach ($request->accessories as $accessory) {
            if((intval($accessory))) {
                ReservationAccessory::create([
                    'reservation_id' => $id,
                    'accessory_id' => $accessory
                ]);
            }
        }

        DB::commit();
        session(['notification'=>true]);

        return redirect('/calendar?car='.$request->car.'&user='.$request->user);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->accessories()->delete();
        $reservation->delete();
        return redirect()->back();
    }
}
