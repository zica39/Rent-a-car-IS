<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\CarClass;
use App\Models\Country;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless( auth()->user()->is_admin,403);
        return view('cars',['cars'=>Car::all()->sortDesc(),'content'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless( auth()->user()->is_admin,403);
        return view('cars',['classes'=>CarClass::all(),'content'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        abort_unless( auth()->user()->is_admin,403);

        $files = $request->file('photos');
        $photos = [];

        if($request->hasFile('photos'))
        {
            foreach ($files as $file) {
                $photos[]= $file->store('public/photos');
            }
        }
        $photos = str_replace('public/','storage/',implode(',',$photos));

        //dd($photos);

        Car::query()->create([
            'model'=>$request->model,
            'age'=>$request->age,
            'photos'=>$photos,
            'registration_number'=>$request->registration_number,
            'seats_number'=>$request->seats_number,
            'fuel_type'=>$request->fuel_type,
            'is_automatic'=>$request->is_automatic=='on'?true:false,
            'price' => $request->price,
            'class_id' => $request->class_id,
            'notes' => $request->notes
        ]);


        return  redirect('/car');
    }


    public function show(Car $car)
    {
        if(request()->headers->get('referer') == Route('car.index')){
            return view('cars',['car'=>$car,'content'=>'show']);
        }else {
            return view('client.car', [
                'car' => $car,
                'locations' => Location::all()->sortDesc(),
                'cars_classes' => CarClass::all(),
                'random_cars' => Car::all()->random(6)
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        abort_unless( auth()->user()->is_admin,403);
        return view('cars',['car'=>$car,'classes'=>CarClass::all(),'content'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarRequest $request, Car $car)
    {
        abort_unless( auth()->user()->is_admin,403);
        $car->update([
            'model'=>$request->model,
            'age'=>$request->age,
            'registration_number'=>$request->registration_number,
            'seats_number'=>$request->seats_number,
            'fuel_type'=>$request->fuel_type,
            'is_automatic'=>$request->is_automatic=='on'?true:false,
            'price' => $request->price,
            'class_id' => $request->class_id,
            'photos' => 'storage/photos/9.png',
            'notes' => $request->notes
        ]);

        return  redirect('/car');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        abort_unless( auth()->user()->is_admin,403);
        foreach($car->reservations as $reservation){
            $reservation->accessories()->delete();
        }

        $car->reservations()->delete();

        $car->removePhotos();
        $car->delete();

        return redirect('/car');;
    }
}
