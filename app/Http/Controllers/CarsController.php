<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Engine;
class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
       
       //return view('cars.index', [
      //  'cars'=>$cars
      // ]);
      return view('cars.filter', [
        'cars'=>$cars

       ]);
    }
    public function getStates(Request $request)
    {
        $states = \DB::table('engines')
            ->where('model_id', $request->car_id)
            ->get();
        
        if (count($states) > 0) {
            return response()->json($states);
        }
    }
    public function filter()
    {
        $cars = Car::all();
       
       return view('cars.filter', [
        'cars'=>$cars
       ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
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
            'name'=>'required|unique:cars',
            'founded' => 'required|integer|min:1900|max:2023',
            'description' => 'required|min:5',
            'image' =>'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName=time() . '_' . $request->name . '.' .$request->image->extension();
        $request->image->move(public_path('cars_images'),$newImageName);

        $car= Car::create([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
            'image_path' => $newImageName
        ]);

        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $car = Car::find($id);
     

       return view('cars.show')->with('car',$car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
       
        $car= Car::find($id);

       
        return view('cars.edit')->with('car',$car);
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
        $request->validate([
            'name'=>'required',
            'founded' => 'required|integer|min:1900|max:2023',
            'description' => 'required|min:5'
        ]);
        $car= Car::where('id',$id)
        ->update([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description')
        ]);

        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car= Car::where('id',$id)
        ->delete();

        return redirect('/cars');
    }
}
