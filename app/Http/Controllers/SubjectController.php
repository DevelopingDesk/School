<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
class SubjectController extends Controller
{
   private	$extra=null;
    public function create(){
$all=Subject::all();

    	return view('Subject.create')->withextra($this->extra)->withsubject($all);
    }
    public function store(Request $request){
$class=new Subject();
$all=Subject::all();

$class->name=$request['name'];
$class->save();
return back()->withsubject($all);


    }


    public function viewAll(){
$all=Subject::all();

return view('Subject.viewsubject')->withsubject($all)->withextra($this->extra);

    }

public function delete($id){
$rec=Subject::where('id',$id)->first();
$rec->delete();
return back();

}
public function edit(Request $request){

$rec=Subject::where('id',$_POST['id'])->first();

$rec->name=$_POST['name'];
$rec->update();
return response($_POST['name']);

}


}
