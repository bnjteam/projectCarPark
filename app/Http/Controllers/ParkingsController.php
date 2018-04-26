<?php

namespace App\Http\Controllers;
use App\Log;
use App\Parking;
use App\User;
use App\Photolocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ParkingsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (\Gate::allows('index-userManager',Auth::user())){
        $park = Parking::all();
        return view('/park.index',['park'=> $park]);
      }else {
        return 'aaa';
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
      $parking->id_user = Auth::user()->id;
      $parking->address=$request->input('address');
      if ($request->fileToUpload2!=null){
      $path2 = $request->fileToUpload2->store('/public/photosparking');
      $parking->photo= '/storage/photosparking/'.basename($path2);
      }
      else{
        $parking->photo = '/storage/noimage.png';
      }
      $parking->save();


        //
        //
        //
        // $photolocation=new Photolocation;
        // $photolocation->id_parking=$parking->id;
        // $photolocation->canvas=$request->input('list');
        //
        // if ($request->fileToUpload!=null){
        //     $path = $request->fileToUpload->store('/public/photoslocation');
        // $photolocation->photo = '/storage/photoslocation/'.basename($path);
        //   }
        //
        // $photolocation->save();
        $log = new Log();
        if (Auth::check()){
           $log->id_user = Auth::user()->id;
        }

        else{
          $log->id_user = '2';
        }
        $users = User::all()->pluck('name','id');
        $log->description = $users[$log->id_user].' create parking';
        $log->location = $parking->location;
        $log->save();

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

         return view('/park.show',['photoslocations'=>$p,'parking'=>$parking]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function edit(Parking $parking)
    {

          $p=Photolocation::all()->where('id_parking','LIKE',$parking->id);
          return view('park.edit',['parking'=>$parking,'photoslocations'=>$p]);
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



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parking $parking)
    {

    }

    public function addcarpark(Parking $parking)
    {

        return view('/park.addcarpark',['parking'=>$parking]);

    }

    public function updatecarpark(Request $request, Parking $parking)
    {
            $photolocation=new Photolocation;
            $photolocation->id_parking=$parking->id;

            if ($request->input('list')!=null){
                  $photolocation->canvas=$request->input('list');
            }else{
                $photolocation->canvas='';
            }

            if ($request->fileToUpload!=null){
              $path = $request->fileToUpload->store('/public/photoslocation');
              $photolocation->photo = '/storage/photoslocation/'.basename($path);
              }

            $photolocation->save();

        return redirect('/parkings/'.$parking->id.'/edit');
    }


    public function destroyphoto(Photolocation $pho,Request $request)
      {
          $p = Photolocation::findOrFail($request->input('photo_id'));
          $p->delete();
          return redirect('/parkings/'.$request->input('park_id').'/edit');
      }
      public function updatephoto(Request $request, Parking $parking)
      {

        $parking->location=$request->input('location');
        $parking->address=$request->input('address');
        if ($request->fileToUpload2!=null){
          $path2 = $request->fileToUpload2->store('/public/photosparking');
          $parking->photo= '/storage/photosparking/'.basename($path2);
        }
        $parking->save();
        $p=Photolocation::all()->where('id_parking','LIKE',$parking->id);

        return view('park.editphotolocation',['parking'=>$parking,'photoslocations'=>$p]);

      }
      public function editphoto(Parking $parking)
      {
            $p=Photolocation::all()->where('id_parking','LIKE',$parking->id);
            return view('park.editphotolocation',['parking'=>$parking,'photoslocations'=>$p]);
      }

}
