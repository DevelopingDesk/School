<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExamRecord;
use App\SessionDate;
use App\SchoolClass;

use Auth;
class PerformanceController extends Controller
{
    private $extra=null;
    private $result=null;
    public function index(Request $request){
$session=SessionDate::all();
$biodata=null;
$per=null;
return view('Student.studentperformance')->withextra($this->extra)->withsession($session)->withper($per)->withbio($biodata);

    }
    public function getResult(Request $request){

$user=Auth::User();
$sessionid=SessionDate::all();
$obtaind=ExamRecord::where('student_id','=',$user->id)
->where('session_id','=',$request->sessionid)->sum('marks');
$total=ExamRecord::where('student_id','=',$user->id)
->where('session_id','=',$request->sessionid)->sum('total');

$per=$obtaind/$total *100;
$biodata=ExamRecord::where('student_id','=',$user->id)
->where('session_id','=',$request->sessionid)->first();
return view('Student.studentperformance')->withper($per)->withextra($this->extra)->withsession($sessionid)->withbio($biodata);

    }

    public function year(){
$sessionid=SessionDate::all();
$classes=SchoolClass::all();
$result=null;
return view('Performance.generateresult')->withextra($this->extra)->withsession($sessionid)->withclass($classes)->withresult($result);
    }


    public function genResult(Request $request){
$sessionid=SessionDate::all();
$classes=SchoolClass::all();
$studentid=ExamRecord::distinct()->select('student_id')
->where('session_id','=',$request->sessionid)
->where('class_id','=',$request->classid)->get();
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

return view('Performance.generateresult')->withextra($this->extra)->withsession($sessionid)->withclass($classes)->withresult($this->result);

    }
}
