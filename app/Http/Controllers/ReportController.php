<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExamRecord;
use App\SessionDate;
use App\User;
use App\SchoolClass;
use Auth;
class ReportController extends Controller
{
    
        private $extra=null;
    private $result=null;
    public function index(Request $request){
$sessionid=SessionDate::all();
$classes=SchoolClass::all();
$result=null;
return view('Report.results')->withextra($this->extra)->withsession($sessionid)->withclass($classes)->withresult($result);


}
public function postResult(Request $request){

$user=User::where('student_cnic','=',$request->studentcnic)->first();

$sessionid=SessionDate::all();
$classes=SchoolClass::all();
if($user !=null){

$studentid=ExamRecord::distinct()->select('student_id')
->where('session_id','=',$request->sessionid)
->where('class_id','=',$request->classid)
->Where('student_id','=',$user->id)
->get();
}
if($user ==null){

	$studentid=ExamRecord::distinct()->select('student_id')
->where('session_id','=',$request->sessionid)
->where('class_id','=',$request->classid)

->get();
}
//dd($studentid);

foreach($studentid as $stid){
$studentname=ExamRecord::
where('session_id','=',$request->sessionid)
->where('class_id','=',$request->classid)
->where('student_id','=',$stid->student_id)

->first();
$obtained=ExamRecord::
where('session_id','=',$request->sessionid)
->where('class_id','=',$request->classid)
->where('student_id','=',$stid->student_id)
->sum('marks');
$total=ExamRecord::
where('session_id','=',$request->sessionid)
->where('class_id','=',$request->classid)
->where('student_id','=',$stid->student_id)
->sum('total');
$per=$obtained/$total*100;
$this->result[]= array("per"=>$per, "name"=>$studentname->userDetail->name,
	"father"=>$studentname->userDetail->father_name,

 "class"=>$studentname->schoolClass->name);
}

return view('Report.results')->withextra($this->extra)->withsession($sessionid)->withclass($classes)->withresult($this->result);
        
       
   



}

}
