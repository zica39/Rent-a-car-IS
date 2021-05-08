<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\CarClass;
use App\Models\Country;
use App\Models\Location;
use Illuminate\Http\Request;

class CodebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = null;
        switch ($request->name){
            case 'country':
                $data=Country::all();
                break;
            case 'accessory':
                $data=Accessory::all();
                break;
            case 'class':
                $data=CarClass::all();
                break;
            case 'location':
                $data=Location::all();
                break;
            default:
                abort(404);

        }
        return view('codebook',['name'=>$request->name,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required|string']);

        switch ($request->_name){
            case 'country':
                Country::create(['name'=>$request->name]);
                break;
            case 'accessory':
                Accessory::create(['name'=>$request->name]);
                break;
            case 'class':
                CarClass::create(['name'=>$request->name]);
                break;
            case 'location':
                Location::create(['name'=>$request->name]);
                break;
            default:
                abort(404);

        }

        return redirect()->back()->with('status', ucfirst($request->_name).'created successful!');
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
    public function update(Request $request)
    {
        //dd($request[$request->_name]);
        $request->validate([$request->_name=>'required|string','id'=>'required|integer']);
        switch ($request->_name){
            case 'country':
                Country::findOrFail($request->id)->update(['name'=>$request[$request->_name]]);
                break;
            case 'accessory':
                Accessory::findOrFail($request->id)->update(['name'=>$request[$request->_name]]);
                break;
            case 'class':
                CarClass::findOrFail($request->id)->update(['name'=>$request[$request->_name]]);
                break;
            case 'location':
                Location::findOrFail($request->id)->update(['name'=>$request[$request->_name]]);
                break;
            default:
                abort(404);

        }

        return redirect()->back()->with('status', ucfirst($request->_name).' updated successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate(['id'=>'required|integer']);

        try
        {
            switch ($request->_name){
                case 'country':
                    Country::findOrFail($request->id)->delete();
                    break;
                case 'accessory':
                    Accessory::findOrFail($request->id)->delete();
                    break;
                case 'class':
                    CarClass::findOrFail($request->id)->delete();
                    break;
                case 'location':
                    Location::findOrFail($request->id)->delete();
                    break;
                default:
                    abort(404);

            }

        }
        catch(Exception $ex)
        {
            return redirect()->back()->with('error', ucfirst($request->_name).' not deleted!');
        }
        return redirect()->back()->with('status',ucfirst($request->_name).' deleted successful!');
    }
}
