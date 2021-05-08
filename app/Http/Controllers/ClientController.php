<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarClass;
use App\Models\Location;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    //

    public function home()
    {
        return view('client.home',[
            'cars'=>Car::all()->random(6),
            'locations'=>Location::all()->sortDesc()
            ]);
    }

    public function cars(Request $request)
    {
        /*$test = Reservation::query()->whereRaw(
            '(pick_up_date < ? and return_date < ?) or (pick_up_date > ? and return_date > ?)',
            [$request->pickup_date,$request->pickup_date,$request->return_date,$request->return_date]
        )->get();
        dd($test);*/

        $cars = Car::query()
            ->when($request->price,function ($query) use($request){
                $p = explode(' - ',$request->price);
                $min = substr($p[0],3);
                $max = substr($p[1],3);
                $query->whereBetween('price', [$min, $max]);
            })
            ->when(($request->pickup_date && $request->return_date),function ($query) use ($request){

                $query->whereNotIn('id',  function ($query) use($request) {
                    $query->selectRaw('car_id')->from('reservations as r')->whereRaw(
                        '(r.pick_up_date <= ? and r.return_date >= ?)',
                        [$request->return_date,$request->pickup_date]
                    );
                });
            })
            ->when($request->passengers,function($query) use($request){
                if($request->passengers == '7') $query->where('seats_number','>=','7');
                else $query->where('seats_number',$request->passengers);
            })
            ->when($request->class,function($query) use($request){
                $query->where('class_id',$request->class);
            })->when($request->is_automatic,function ($query) use($request){
                $query->where('is_automatic',$request->is_automatic=='2');
            })//->toSql();
            ->paginate(6)->withQueryString();


      // dd($cars);


        return view('client.cars',[
            'cars'=>$cars,
            'locations'=>Location::all()->sortDesc(),
            'cars_classes'=>CarClass::all()
        ]);
    }

    public function gallery_view()
    {
        return view('client.gallery_view',[
            'cars'=>Car::query()->paginate(9),
            'locations'=>Location::all()->sortDesc(),
            'random_cars'=>Car::all()->random(6),
        ]);
    }

    public function about()
    {
        return view('client.about');
    }

    public function profile()
    {
        return view('client.profile');
    }

    public function contact()
    {
        return view('client.contact');
    }
}
