<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SessionDate;
use App\Exams;
use App\ExamRecord;
use App\SchoolClass;

use Auth;

use App\CourseRegister;
use App\StudentAttendence;
class ManageAttendenceController extends Controller
{
    private $extra=null;
    public function getSession(){
$all=SessionDate::Latest('created_at')->get();
return view('ManageAttendence.selectsession')->withsession($all)->withextra($this->extra);

    }

  public function getEnroledClasses(Request $request){
$sessionid=$request->sessionid;
$user=Auth::User();
$getclasses=CourseRegister::distinct()->select('class_id')->where('teacher_id','=',$user->id)
->where('session_id',$sessionid)->get();
return view('ManageAttendence.enrolledclasses')->withclasses($getclasses)->withsessionid($sessionid)->withextra($this->extra);



    }
    public function allSubjects($id,$sessionid){

$user=Auth::User();
$getsubjects=CourseRegister::distinct()->select('subject_id')->where('teacher_id','=',$user->id)
->where('session_id',$sessionid)
->where('class_id','=',$id)
->get();

return view('ManageAttendence.enrolledsubjects')->withallsubjects($getsubjects)->withsessionid($sessionid)->withclassid($id)->withextra($this->extra);

}
  public function allStudents($subid,$sessionid,$classid){
$user=Auth::User();
$exams=Exams::all();
$allclass=SchoolClass::all();
$session=SessionDate::Latest('created_at')->get();
$allstudents=CourseRegister::distinct()
->where('class_id','=',$classid)
->where('session_id','=',$sessionid)
->where('subject_id','=',$subid)
->where('teacher_id','=',$user->id)->get();
//dd($allstudents);
return view('ManageAttendence.allstudents')->withallstudents($allstudents)->withextra($this->extra)->withexams($exams)->withsubjectid($subid)->withclass($allclass)->withsession($session);
;
    }

    public function storeAttendence(Request $request){

$user=Auth::User();
$teacherid=$user->id;

foreach($request->studentid as $key=>$v){

//dd($request->status [$key]);    
$data=array(
'student_id'=>$request->studentid [$key],
'subject_id'=>$request->subjectid,
'teacher_id'=>$teacherid,
'class_id'=>$request->classid [$key],
'status'=>$request->status [$key],
'date'=>$request->date,

'session_id'=>$request->sessionid [$key]

);

$check=StudentAttendence::where('teacher_id','=',$teacherid)
->where('class_id','=',$request->classid [$key])
->where('session_id','=',$request->sessionid [$key])
->where('date','=',$request->date)
->where('student_id','=',$request->studentid [$key])
->where('subject_id','=',$request->subjectid)
->first();
//dd($check);
if(count($check)==0){
    StudentAttendence::insert($data);

}
else{

$check->update(['status'=>$request->status [$key],'date'=>$request->date ]);

}

}
return back();

    }
    public function uploadedAttendence(Request $request){

    $user=Auth::User();
        $exams=Exams::all();
$allclass=SchoolClass::all();
$session=SessionDate::all();
$teacherid=$user->id;

$allstudents=StudentAttendence::where('teacher_id','=',$teacherid)
->where('class_id','=',$request->classid)
->where('session_id','=',$request->sessionid)
->where('date','=',$request->date)
->where('subject_id','=',$request->subjectid)
->where('status','=',$request->status)
->get();
//dd($allstudents);
return view('ManageAttendence.updatestudent')->withallstudents($allstudents)->withextra($this->extra)->withexams($exams)->withsubjectid($request->subjectid)->withclass($allclass)->withsession($session);

    }
    public function select(){
$class=SchoolClass::get();
$session=SessionDate::get();
$proxy=null;
return view('StudentAttendanceView.select')->withextra($this->extra)->withclass($class)->withsession($session)->withproxy($proxy);

    }
public function selectPost(Request $request){
       $exams=Exams::all();
$allclass=SchoolClass::all();
$session=SessionDate::all();
    $user=Auth::User();
$getall=StudentAttendence::where('student_id','=',$user->id)
->where('class_id','=',$request->classid)
->where('session_id','=',$request->sessionid)
->where('date','=',$request->date)->get();
return view('StudentAttendanceView.select')->withproxy($getall)->withclass($allclass)->withsession($session)->withextra($this->extra);



}
    

}
