<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Schoolclass;
use App\Role;
use App\User;
use App\SessionDate;
use App\AssignClass;
use App\CourseRegister;
use App\Subject;
use Auth;
use Hash;

class StudentController extends Controller
{
	private $extra=null;

public function getLogin(Request $request){

return view('Login.login');

}
public function login(Request $request){

 
 $user = User::where('email',$request->email,'password',$request->password)->first();
 dd($user);





        }
    

public function Permot(Request $request){
$section=Section::all();
$schoolclass=Schoolclass::all();
$session=SessionDate::all();
$user=null;
return view('Student.promote')->withextra($this->extra)->withsection($section)->withsession($session)->withschoolclass($schoolclass)->withstudent($user);

}

public function searchPromote(Request $request){
$section=Section::all();
$schoolclass=Schoolclass::all();
$session=SessionDate::all();
$students=User::where('class_id','=',$request['classid'])
->where('section_id','=',$request['sectionid'])
->where('session_id','=',$request['sessionid'])->get();

return view('Student.promote')->withsection($section)->withsession($session)->withschoolclass($schoolclass)->withstudent($students)->withextra($this->extra);

}
public function PromoteToNext(Request $request){
foreach($request->studentid as $key=>$v){

$data=array(
        
        
'student_id'=>$v,
'class_id'=>$request['toclassid'],
'session_id'=>$request['tosessionid'],
'section_id'=>$request['tosectionid'],


    );



$user=User::where('id','=',$v)
->where('class_id','=',$request->classid [$key])
->where('section_id','=',$request->sectionid [$key])
->where('session_id','=',$request->sessionid [$key])
->first();



//dd($user);
//dd($request->topromote);
//dd($request->status [$key]);
if($request->status [$key] =="Fail"){

$datafail=array(
        
        
'student_id'=>$v,
'class_id'=>$request->classid [$key],
'session_id'=>$request['tosessionid'],
'section_id'=>$request->sectionid [$key],


    );

    if(count($user)!=0){
  
    $user->session_id=$request->tosessionid;
$user->update();
}
$checkpromotion=AssignClass::where('student_id','=',$v)
->where('class_id','=',$request->toclassid)
->where('section_id','=',$request->tosectionid)
->where('session_id','=',$request->tosectionid)->first();
//dd($checkpromotion);
if(count($checkpromotion) ==0 ){
AssignClass::insert($datafail);
}
}
else{



if(count($user)!=0){
    $user->class_id=$request->toclassid;
    $user->section_id=$request->tosectionid;
    $user->session_id=$request->tosessionid;
$user->update();
}
$checkpromotion=AssignClass::where('student_id','=',$v)
->where('class_id','=',$request->toclassid)
->where('section_id','=',$request->tosectionid)
->where('session_id','=',$request->tosectionid)->first();
//dd($checkpromotion);
if(count($checkpromotion) ==0 ){
AssignClass::insert($data);
}

}


}


return back();
}

    public function create(){

$role=Role::all();
$section=Section::all();
$schoolclass=Schoolclass::all();
$session=SessionDate::all();
    	return view('Student.create')->withextra($this->extra)->withschoolclass($schoolclass)->withsection($section)->withrole($role)->withsession($session);
    }


    public function store(Request $data){
$user=new User();
         
            $user->name = $data['studentname'];
          
            $user->father_name = $data['fathername'];
             $user->father_cnic = $data['fathercnice'];
          
            $user->student_cnic = $data['studentcnice'];
            $user->religen=$data['religon'];
             $user->email=$data['email'];
        $user->user_type=$data['acounttype'];
            $user->session_id=$data['sessionid'];
            $user->password = bcrypt($data['password']);
            //dd($data['password']);
            $user->class_id=$data['classid'];
            $user->section_id=$data['sectionid'];

            $user->save();

            $enrolclass=new AssignClass();
            $enrolclass->student_id=$user->id;
            $enrolclass->class_id=$data['classid'];
            $enrolclass->session_id=$data['sessionid'];
            $enrolclass->section_id=$data['sectionid'];
            $enrolclass->save();

             
            $role = Role::where('id',$data['acounttype'])->first();
            $user->attachRole($role->id);
        
      
          
      
        return back();


    }

public function  perticularStudent(Request $request){

$role=Role::all();
$section=Section::all();
$schoolclass=Schoolclass::all();
$sessionid=SessionDate::all();
$student=User::where('user_type','=',3)
->where('section_id',$request->sectionid)
->where('session_id',$request->sessionid)
->where('class_id',$request->classid)

->get();
//dd($student);

        return view('Student.viewstudent')->withextra($this->extra)->withschoolclass($schoolclass)->withsection($section)->withrole($role)->withstudent($student)->withsession($sessionid);

}

public function assignCourse($id){

$user=User::where('id',$id)->first();
$teacher=User::where('user_type',2)->get();
$allcourse=CourseRegister::where('student_id','=',$id)
->where('class_id','=',$user->class_id)

->where('session_id','=',$user->session_id)
->get();
$subject=Subject::all();

return view('Student.assigncourse')->withstudentid($id)->withallcourse($allcourse)->withextra($this->extra)->withclassid($user->class_id)->withsessionid($user->session_id)->withteacher($teacher)->withsubject($subject);
}

public function postAssignCourse(Request $request){

$course= new CourseRegister();
$course->student_id=$request->studentid;
$course->subject_id=$request->subjectid;
$course->class_id=$request->classid;
$course->session_id=$request->sessionid;
$course->teacher_id=$request->teacherid;
//is ko delete kr dena
//$course->name='';
$course->save();
return back();


}

public function deleteAssignCourse($id){
$check=CourseRegister::where('id','=',$id)->first();
$check->delete();
return back();



}






    public function viewAll(){

$role=Role::all();
$section=Section::all();
$schoolclass=Schoolclass::all();
$sessionid=SessionDate::all();
$student=User::where('user_type',3)->get();

//dd($student->section->name);

    	return view('Student.viewstudent')->withextra($this->extra)->withschoolclass($schoolclass)->withsection($section)->withrole($role)->withstudent($student)->withsession($sessionid);

    }

public function getEdit($id){
$student=User::where('id',$id)->first();
$section=Section::all();
$schoolclass=Schoolclass::all();
$role=Role::all();

    return view('Student.edit')->withid($id)->withstudent($student)->withschoolclass($schoolclass)->withsection($section)->withrole($role)->withextra($this->extra);
}

    public function edit( Request $data){


       $user=User::where('id',$data['id'])->first();
         
            $user->name = $data['studentname'];
          
            $user->father_name = $data['fathername'];
             $user->father_cnic = $data['fathercnice'];
          
            $user->student_cnic = $data['studentcnice'];
            $user->religen=$data['religon'];
             $user->email=$data['email'];
            
            $user->password =bcrypt($data['password']);
            $user->class_id=$data['classid'];
            $user->section_id=$data['sectionid'];

            $user->update();
  $role = Role::where('id',$data['acounttype'])->first();
            $user->detachRole(1);
            $user->attachRole($role->id);
       
             
            
        
      
          
      
        return back();
 
    }
    public function delete($id){

$user=User::where('id',$id)->first();
$user->delete();
return back();

    }
}
