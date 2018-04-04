<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SchoolClass;
class ClassController extends Controller 
{
private	$extra=null;
    public function create(){
$all=SchoolClass::all();

    	return view('Class.create')->withextra($this->extra)->withschool($all);
    }
    public function store(Request $request){
$class=new SchoolClass();
$all=SchoolClass::all();

$class->name=$request['name'];
$class->save();
return back()->withschool($all);


    }


    public function viewAll(){
$all=SchoolClass::all();

return view('Class.viewclass')->withschool($all)->withextra($this->extra);

    }

public function delete($id){
$rec=SchoolClass::where('id',$id)->first();
$rec->delete();
return back();

}
public function edit(Request $request){

$rec=SchoolClass::where('id',$_POST['id'])->first();

$rec->name=$_POST['name'];
$rec->update();
return response($_POST['name']);

}


}
