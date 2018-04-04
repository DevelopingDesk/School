<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
class SectionController extends Controller
{
    private	$extra=null;
    public function create(){
$all=Section::all();

    	return view('Section.create')->withextra($this->extra)->withsection($all);
    }
    public function store(Request $request){
$section=new Section();
$all=Section::all();

$section->name=$request['name'];
$section->save();
return back()->withsection($all);


    }


    public function viewAll(){
$all=Section::all();

return view('Section.viewsection')->withsection($all)->withextra($this->extra);

    }

public function delete($id){
$rec=Section::where('id',$id)->first();
$rec->delete();
return back();

}
public function edit(){

$rec=Section::where('id',$_POST['id'])->first();

$rec->name=$_POST['name'];
$rec->update();
return response($_POST['name']);

}
}
