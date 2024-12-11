<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\blukmail;
use App\Mail\test;
use App\Jobs\BluckMailJob;
use Carbon\Carbon;
use App\Imports\emailimport;
use Maatwebsite\Excel\Facades\Excel;
use Session;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
class BluckMailControleer extends Controller
{


  public function upload(Request $request){
    $filename=$request->file('file')->getClientOriginalName();

    $imgpath = request()->file('file')->storeAs('uploads',$filename, 'public');
        return json_encode(['location' => config('app.url'). "storage/$imgpath"]);

  }
public function store(Request $request){


  $subject=$request->subject;
  $via=$request->via;

 echo $content=$request->message;

   echo $subject;
   echo $via;

   //return view('welcomee',['content'=>$content]);
     $path = $request->file('file')->getRealPath();
    $data = array_map('str_getcsv', file($path));
     $emaill=array();
    $length = count($data);
    for ($i = 0; $i < $length; $i++) {
        array_push($emaill,$data[$i][2]);
    }
    $items = collect($emaill);

   $email= $items->chunk(2);

     $emailJob = (new BluckMailJob($email,$content,$subject,$via))->delay(Carbon::now()->addSeconds(4));
   dispatch($emailJob,$content);
   $email= $items->chunk(2);
   print_r($email[1]);














  //Excel::import(new UsersImport, $request->file('file')->store('temp'));
       // return back();


}
}
