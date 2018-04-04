<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SchoolClass;
use App\User;
use App\SessionDate;
use App\Fee;
use App\Section;
use App\AssignClass;
use DB;
use Carbon\Carbon;
class FeeController extends Controller
{
private $extra=null;
private $defaultdate=null;
private $defaultfee=null;
    public function index(){
 $schol=SchoolClass::all();


$session=SessionDate::all();
$sectionid=Section::all();
    	return view('Fee.allclasses')->withschoolclass($schol)
    	->withallclasses($schol)->withsession($session)->withsection($sectionid);
    }

    public function bunkFee(Request $request){


$classes=SchoolClass::all();
$session=SessionDate::all();
$sectionid=Section::all();
$check=Fee::where('date','>=',Carbon::now()->subDays($request->days)->toDateTimeString())->where('fee','=',0)


->where('class_id','=',$request->classid)
->where('session_id','=',$request->sessionid)


->get();

//dd($check);
//$ch=Fee::where('student_id',2)->first();
//dd($check->section->name);

return view('Fee.bunkfee')->withstudent($check)->withextra($this->extra)->withsection($sectionid)->withsession($session)->withallclasses($classes
);


    }
    public function create(Request $request){



$schol=SchoolClass::all();
 //$classes=SchoolClass::all();

$session=SessionDate::all();
$sectionid=Section::all();
//from classs assination
//$user=User::where('class_id',$id)->get();

$user=AssignClass::where('class_id','=',$request->classid)->where('session_id','=',$request->sessionid)->get();

return view('Fee.allstudent')->withstudent($user)->withextra($this->extra)->withallclasses($schol)->withsession($session)->withsection($sectionid);

    }
    public function store(Request $request){

foreach($request->studentid as $key=>$v){

	
if($request->fee [$key]==null){

$this->defaultfee=0;

}
else{
	$this->defaultfee=$request->fee [$key];
}
if($request->datepicker [$key]==null){
$today = Carbon::today()->toDateTimeString(); 
//dd($today);
$this->defaultdate=$today;

}
else{
	$this->defaultdate=$request->datepicker [$key];
}

	//dd($request->datepicker [$key]);
	$data=array(
		'fee'=>$this->defaultfee,
		'date'=>$this->defaultdate,
		
'student_id'=>$v,
'section_id'=>$request->sectionid [$key],
'session_id'=>$request->sessionid [$key],
'class_id'=>$request->classid [$key]

);
$notexist=DB::table('fees')
                    ->where('student_id', '=', $request->studentid [$key])
                    ->Where('date','>=',Carbon::now()->subDays(30)->toDateTimeString())
                    ->where('class_id','=',$request->classid [$key])
                    ->where('session_id','=',$request->sessionid [$key])
                    ->get();

      $enrolfeenull=Fee::where('date','>=',Carbon::now()->subDays(30)->toDateTimeString())->where('fee','=',0)
      ->where('student_id','=',$request->studentid [$key])
      ->where('class_id','=',$request->classid [$key])
      ->where('session_id','=',$request->sessionid [$key])

      ->first();
      //dd($enrolfeenull);
//dd($enrolfeenull);
if(count($enrolfeenull)!=0){

	$enrolfeenull->update(['fee'=>$this->defaultfee,'date'=>$this->defaultdate]);
}
if(count($notexist) ==0){
	
Fee::insert($data);
}



}
return back();

    }

public function getSession($id){

$session=SessionDate::all();
return view('Fee.selectsession')->withextra($this->extra)->withclassid($id)->withsession($session);


}
}
