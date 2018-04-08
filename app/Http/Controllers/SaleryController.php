<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Salery;
class SaleryController extends Controller
{
    
  private  $extra=null;

public function index(){
	$salery=null;
$teachers=User::where('user_type','=',2)->get();
return view('Salery.create')->withextra($this->extra)->withteacher($teachers)->withsalerylist($salery);

}
public function postSalery(Request $request){
$sl=new Salery();
$teachers=User::where('user_type','=',2)->get();
$sl->date=$request->datepicker;
$sl->user_id=$request->teacherid;
$sl->salery=$request->salery;
$sl->save();
$saleryview=Salery::Latest('created_at')->get();

return view('Salery.create')->withextra($this->extra)->withteacher($teachers)->withsalerylist($saleryview);



}
public function viewSalery(Request $request){

$saleryview=Salery::Latest('created_at')->get();

return view('Salery.viewsalery')->withextra($this->extra)->withsalerylist($saleryview);

}

public function updateSalery(){


	$rec=Salery::where('id',$_POST['id'])->first();

$rec->salery=$_POST['name'];
$rec->update();
return response($_POST['name']);

}
public function delete($id){

$check=Salery::where('id',$id)->first();
if($check){
$check->delete();
return back();

}

}
}
