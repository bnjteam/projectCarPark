<?php

namespace App\Http\Controllers;

use App\Parking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParkingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/park.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // $parking=new Parking;
      // $parking->location='ballllasd';
      // $parking->address='328/13 asdasdasdadsssdsdasdasd';
      // $parking->save();
        // dd($request->test);
        // dd($request);
        $path = $request->fileToUpload->store('/public/photos');
        return redirect('/parkings');


      // $canvas = Image::canvas($width, $height);
      //
      //
      // $image = Image::make(storage_path("app/public/" . $path))->resize($width, $height,
      //     function ($constraint) {
      //         $constraint->aspectRatio();
      // });
      //
      // $canvas->insert($image, 'center');
      //
      // // pass the full path. Canvas overwrites initial image with a logo
      // $canvas->save(storage_path("app/public/" . $path . ".png"));
      // //
      // return redirect('parkings/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function show(Parking $parking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function edit(Parking $parking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parking $parking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parking $parking)
    {
        //
    }
}
