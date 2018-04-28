<?php

namespace App\Http\Controllers;
use App\Log;
use App\Parking;
use App\Map;
use App\User;
use App\Package_user;
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
      if (\Gate::allows('index-userManagers',Auth::user())){
        $park = Parking::all();
        $names = User::all()->pluck('name','id');
        return view('/park.index',['park'=> $park,'names'=>$names]);
      }else if(\Gate::allows('index-parking',Auth::user())){
        $park = Parking::all()->where('id_user','LIKE',Auth::user()->id);
        $names = User::all()->pluck('name','id');
        return view('/park.index',['park'=> $park,'names'=>$names]);
      }else{
          return view('/denieViews.denie');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check() && (Auth::user()->level=="parking_owner" || Auth::user()->level=="admin")){
            return view('/park.create');
        }
        else{
          return redirect('/login');
        }
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
      $pack = Package_user::all()->where('id','like',Auth::user()->id)->first();
      $pack->numbers = $pack->numbers+1;
      $pack->save();

        $log = new Log();
        if (Auth::check()){
           $log->id_user = Auth::user()->id;
        }

        else{
          $log->id_user = '2';
        }
        $users = User::all()->pluck('name','id');
        $log->description = "user ".$log->id_user.' create parking';
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
          $map  = Map::all();
         return view('/park.show',['photoslocations'=>$p,'parking'=>$parking,'maps'=>$map]);
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
              $parking->location=$request->input('location');
              $parking->address=$request->input('address');
              if ($request->fileToUpload2!=null){
                $path2 = $request->fileToUpload2->store('/public/photosparking');
                $parking->photo= '/storage/photosparking/'.basename($path2);
              }
              $parking->save();
              $log = new Log();
                 $log->id_user = Auth::user()->id;
              $users = User::all()->pluck('name','id');
              $log->description = "user ".$log->id_user.' edit parking';
              $log->location = $parking->location;
              $log->save();
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
      $pack = Package_user::all()->where('id','like',Auth::user()->id)->first();
      $pack->numbers = $pack->numbers-1;
      $pack->save();
      $parking->delete();
      $parking->save();

      $log = new Log();
         $log->id_user = Auth::user()->id;
      $users = User::all()->pluck('name','id');
      $log->description = "user ".$log->id_user.' delete parking';
      $log->location = $parking->location;
      $log->save();


    return redirect('/parkings');
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
              $photolocation->floor=$request->input('floor');
              $photolocation->save();


              $s= $request->input('list');
              $str = explode("|", $s);

              for ($i=0; $i <count($str); $i++) {

                  $arstr = explode(",", $str[$i]);

                  if($arstr[0]=='font'){
                      $a=explode(" ",$arstr[1]);


                        for ($j=(int)$a[0]; $j <=(int)$a[2] ; $j++) {
                            $map=new Map;

                            $map->number=$j.substr($a[0],strlen($a[0])-1);
                            $map->id_photo=$photolocation->id;
                            $map->status='empty';
                            $map->save();

                        }

                  }

              }

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

      public function updatemap(Request $request,Map $map)
      {
        dd($request);
            $p=Photolocation::all()->where('id_parking','LIKE',$parking->id);
            return view('park.editphotolocation',['parking'=>$parking,'photoslocations'=>$p]);
      }

}
