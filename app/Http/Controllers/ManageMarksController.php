<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SessionDate;
use App\Exams;
use App\ExamRecord;
use App\SchoolClass;

use Auth;

use App\CourseRegister;
class ManageMarksController extends Controller
{
	private $extra=null;
    public function getSession(){
$all=SessionDate::Latest('created_at')->get();
return view('ManageMarks.selectsession')->withsession($all)->withextra($this->extra);

    }

    public function getEnroledClasses(Request $request){
$sessionid=$request->sessionid;
$user=Auth::User();
$getclasses=CourseRegister::distinct()->select('class_id')->where('teacher_id','=',$user->id)
->where('session_id',$sessionid)->get();
return view('ManageMarks.enroledclasses')->withclasses($getclasses)->withsessionid($sessionid)->withextra($this->extra);



    }
public function allSubjects($id,$sessionid){

$user=Auth::User();
$getsubjects=CourseRegister::distinct()->select('subject_id')->where('teacher_id','=',$user->id)
->where('session_id',$sessionid)
->where('class_id','=',$id)
->get();

return view('ManageMarks.enroledsubjects')->withallsubjects($getsubjects)->withsessionid($sessionid)->withclassid($id)->withextra($this->extra);

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
return view('ManageMarks.allstudents')->withallstudents($allstudents)->withextra($this->extra)->withexams($exams)->withsubjectid($subid)->withclass($allclass)->withsession($session);
;
    }
 public function storeMarks(Request $request){

$user=Auth::User();
$teacherid=$user->id;
$defaultmarks=NULL;
foreach($request->studentid as $key=>$v){
if($request->obtainedmarks [$key] =="")
{

	$defaultmarks=NULL;
}
else
{
	$defaultmarks=$request->obtainedmarks [$key];
}

$data=array(
		'marks'=>$defaultmarks,
		'total'=>$request->total,
		'class_id'=>$request->classid [$key],
'student_id'=>$request->studentid [$key],
'teacher_id'=>$teacherid,
'session_id'=>$request->sessionid [$key],
'exam_id'=>$request->examid,
'subject_id'=>$request->subjectid,
'date'=>$request->date
);

$check=ExamRecord::where('teacher_id','=',$teacherid)
->where('class_id','=',$request->classid [$key])
->where('session_id','=',$request->sessionid [$key])
->where('date','=',$request->date)
->where('subject_id','=',$request->subjectid)
->whereNull('marks')
->first();
//dd($check);
if(count($check)==0){
	ExamRecord::insert($data);

}
else{

$check->update(['marks'=>$defaultmarks,'date'=>$request->date ]);

}

}
return back();

    }

    public function remaingMarks(Request $request){
    	$user=Auth::User();
    	$exams=Exams::all();
$allclass=SchoolClass::all();
$session=SessionDate::Latest('created_at')->get();
$teacherid=$user->id;
$allstudents=ExamRecord::where('teacher_id','=',$teacherid)
->where('class_id','=',$request->classid)
->where('session_id','=',$request->sessionid)
->where('date','=',$request->date)
->where('subject_id','=',$request->subjectid)
->where('marks','=',NULL)
->get();
//dd($allstudents);
return view('ManageMarks.allstudents')->withallstudents($allstudents)->withextra($this->extra)->withexams($exams)->withsubjectid($request->subjectid)->withclass($allclass)->withsession($session);



    }
     public function uploadedMarks(Request $request){
        $user=Auth::User();
        $exams=Exams::all();
$allclass=SchoolClass::all();
$session=SessionDate::all();
$teacherid=$user->id;
$allstudents=ExamRecord::where('teacher_id','=',$teacherid)
->where('class_id','=',$request->classid)
->where('session_id','=',$request->sessionid)
->where('date','=',$request->date)
->where('subject_id','=',$request->subjectid)
->where('marks','!=',NULL)
->get();
//dd($allstudents);
return view('ManageMarks.allstudents')->withallstudents($allstudents)->withextra($this->extra)->withexams($exams)->withsubjectid($request->subjectid)->withclass($allclass)->withsession($session);



    }

//for student marks view

public function sessionViewMarks(){
$session=SessionDate::Latest('created_at')->get();

return view('StudentMarksView.session')->withextra($this->extra)->withsession($session);

}
public function viewClasses(Request $request){

$user=Auth::User();
$classes=ExamRecord::where('session_id','=',$request->sessionid)
->where('student_id',$user->id)->distinct()->select('class_id')->get();
return view('StudentMarksView.classes')->withclasses($classes)->withsessionid($request->sessionid)->withextra($this->extra);

}
public function viewTerms($classid,$sessionid){

$user=Auth::User();
$classes=ExamRecord::where('class_id','=',$classid)
->where('student_id',$user->id)
->where('session_id','=',$sessionid)
->distinct()->select('exam_id')->get();
return view('StudentMarksView.term')->withterms($classes)->withextra($this->extra)->withclassid($classid)->withsessionid($sessionid);

}

public function viewSubjectMarks($termid,$classid,$sessionid){
$user=Auth::User();

$classes=ExamRecord::where('class_id','=',$classid)
->where('student_id',$user->id)
->where('exam_id','=',$termid)
->where('session_id','=',$sessionid)->get();
return view('StudentMarksView.allmarks')->withmarks($classes)->withextra($this->extra);




}


}
