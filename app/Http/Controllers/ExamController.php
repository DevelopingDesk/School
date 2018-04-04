<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exams;

class ExamController extends Controller
{
     private	$extra=null;
    public function create(){
$all=Exams::all();

    	return view('Exams.create')->withextra($this->extra)->withexams($all);
    }
    public function store(Request $request){
$section=new Exams();
$all=Exams::all();

$section->name=$request['name'];
$section->save();
return back()->withexams($all);


    }


    public function viewAll(){
$all=Exams::all();

return view('Exams.viewexams')->withexams($all)->withextra($this->extra);

    }

public function delete($id){
$rec=Exams::where('id',$id)->first();
$rec->delete();
return back();

}
public function edit(){

$rec=Exams::where('id',$_POST['id'])->first();

$rec->name=$_POST['name'];
$rec->update();
return response($_POST['name']);

}
}
