<?php

namespace App\Http\Controllers;

use App\Parking;
use App\Photolocation;
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
        return view('/search');
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

      $parking=new Parking;
      $parking->location=$request->input('location');
      $parking->address=$request->input('address');
      $path2 = $request->fileToUpload2->store('/public/photosparking');
      $parking->photo= '/storage/photosparking/'.basename($path2);
      $parking->save();



      // $path = $request->fileToUpload->store('/public/photoslocation');
      //
      //   $photolocation=new Photolocation;
      //   $photolocation->id_parking=$parking->id;
      //   $photolocation->canvas=$request->input('list');
      //   $photolocation->photo = '/storage/photoslocation/'.basename($path);
      //
      //   $photolocation->save();
        return redirect('/parkings');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function show(Parking $parking)
    {
        $p= Photolocation::all()->where('id_parking','LIKE',$parking->id);

         return view('/park.show',['photoslocation'=>$p]);
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
          return view('park.edit');
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
      $path = $request->fileToUpload->store('/public/photoslocation');

        $photolocation=new Photolocation;
        $photolocation->id_parking=$parking->id;
        $photolocation->canvas=$request->input('list');
        $photolocation->photo = '/storage/photoslocation/'.basename($path);

        $photolocation->save();
        return redirect('/parkings');
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

    public function addcarpark(Parking $parking)
    {

        return view('/park.addcarpark',['parking'=>$parking]);

    }

}
