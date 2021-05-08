<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\Car;
use App\Models\Location;
use App\Models\Reservation;
use App\Models\ReservationAccessory;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {

        return view('client.reservations.index',[
            'reservations'=>Reservation::query()->where('user_id',auth()->id())->orderBy('created_at', 'desc')->paginate(5)
        ]);
    }


    public function create(Request  $request)
    {
        $car = Car::findOrFail($request->car);

        return view('client.reservations.create',[
            'car'=>$car,
            'locations'=>Location::all()->sort(),
            'accessories'=>Accessory::all()->sort()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accessories = explode(',',$request->accessories);
        //dd($request);

        $request->validate([
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

        //DB::beginTransaction();

        $id = Reservation::create([
           'user_id' => auth()->id(),
            'car_id' => $request->car,
            'pick_up_location'=>$request->pickup_location,
            'return_location'=>$request->return_location,
            'pick_up_date' => $request->pickup_date,
            'return_date'=> $request->return_date,
            'total_price' => $total_price,
            'pick_up_time' => $request->pickup_time,
            'return_time' => $request->return_time
        ])->id;


        foreach ($accessories as $accessory) {
            if((intval($accessory))) {
                ReservationAccessory::create([
                    'reservation_id' => $id,
                    'accessory_id' => $accessory
                ]);
            }
        }


        session(['notification'=>true]);

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        abort_unless( auth()->id() == $reservation->user->id,403);
        return view('client.reservations.show',['reservation'=>$reservation]);
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
        //
    }
}
