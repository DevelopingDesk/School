<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SessionDate;
class SessionController extends Controller
{
	private $extra=null;
   
    public function create(){

$session=SessionDate::all();

return view('Session.create')->withextra($this->extra)->withsession($session);



    }
      public function store(Request $request){
$class=new SessionDate();
$all=SessionDate::all();

$class->name=$request['name'];
$class->save();
return back()->withsession($all);


    }
     public function viewAll(){
$all=SessionDate::all();

return view('Session.viewsession')->withsession($all)->withextra($this->extra);

    }
    public function delete($id){
$rec=SessionDate::where('id',$id)->first();
$rec->delete();
return back();

}
public function edit(Request $request){

$rec=SessionDate::where('id',$_POST['id'])->first();

$rec->name=$_POST['name'];
$rec->update();
return response($_POST['name']);

}
}
