<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class VehicleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::orderBy('id','DESC')->get();
        return view('admin.vehicle.index',compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required',
            'model' => 'required',
            'image' => 'required',
            'base_price' => 'required',
            'number_plate' => 'required',
            'price_per_kilometer' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('admin/assets/images/users/'), $filename);
            $image = 'public/admin/assets/images/users/' . $filename;
        } else {
            $image = 'public/admin/assets/images/users/1675332882.jpg';
        }

        $vehicle = Vehicle::Create([
            'name' => $request->name,
            'model' => $request->model,
            'image' => $image,
            'number_plate' => $request->number_plate,
            'base_price' => $request->base_price,
            'price_per_kilometer' => $request->price_per_kilometer
        ]);

        return redirect()->route('vehicle.index')->with(['status'=> true ,'message' => 'Vehicle add successfuly']);
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
        $vehicle = Vehicle::find($id);
        return view('admin.vehicle.edit',compact('vehicle'));
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
            'name' => 'required',
            'model' => 'required',
            'number_plate' => 'required',
            'base_price' => 'required',
            'price_per_kilometer' => 'required',
        ]);

        $event = Vehicle::find($id);
        if ($request->hasFile('image')) {
            $destination = 'public/admin/assets/img/users/' . $event->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/admin/assets/images/users', $filename);
            $image = 'public/admin/assets/images/users/' . $filename;
            $event->image = $image;
        }

        $event->update([
            'name' => $request->name,
            'model' => $request->model,
            'number_plate' => $request->number_plate,
            'base_price' => $request->base_price,
            'price_per_kilometer' => $request->price_per_kilometer,
        ]);

        return redirect()->route('vehicle.index')->with(['status' => true, 'message' => 'Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehicle::destroy($id);
        return redirect()->back()->with(['status' => true, 'message' => 'Deleted successfully']);
    }}
