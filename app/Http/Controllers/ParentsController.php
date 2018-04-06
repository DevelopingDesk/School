<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\SessionDate;
use App\SchoolClass;
use App\ExamRecord;
use App\Exams;

use App\Role;
use App\User;
use Auth;
class ParentsController extends Controller
{
      private $extra=null;
    public function create(){
$role=Role::all();
$section=Section::all();
$schoolclass=Schoolclass::all();

    	return view('Parents.create')->withextra($this->extra)->withschoolclass($schoolclass)->withsection($section)->withrole($role);
    }
      public function store(Request $data){
$user=new User();
         
            $user->name = $data['parentname'];
          
           
             $user->father_cnic = $data['fathercnice'];
          
        
            $user->religen=$data['religon'];
             $user->email=$data['email'];
            
            $user->password =bcrypt($data['password']);
        $user->user_type=$data['acounttype'];
$classid=Schoolclass::first();
$session=SessionDate::first();
$user->class_id=$classid->id;
$user->session_id=$session->id;
            $user->save();

             
            $role = Role::where('id',$data['acounttype'])->first();
            $user->attachRole($role->id);
        
      
          
      
        return back();


    }
       public function viewAll(){

$role=Role::all();
$section=Section::all();
$schoolclass=Schoolclass::all();

$student=User::where('user_type',4)->get();

//dd($student->section->name);

    	return view('Parents.viewparent')->withextra($this->extra)->withschoolclass($schoolclass)->withsection($section)->withrole($role)->withstudent($student);

    }
    public function getEdit($id){
$student=User::where('id',$id)->first();
$section=Section::all();
$schoolclass=Schoolclass::all();
$role=Role::all();

    return view('Parents.edit')->withid($id)->withstudent($student)->withschoolclass($schoolclass)->withsection($section)->withrole($role)->withextra($this->extra);
}
 public function edit( Request $data){


       $user=User::where('id',$data['id'])->first();
         
          
            $user->name = $data['fathername'];
             $user->father_cnic = $data['fathercnice'];
          
           
            $user->religen=$data['religon'];
             $user->email=$data['email'];
            
            $user->password =bcrypt($data['password']);
       
    

            $user->update();
  
      
      
        return back();
 
    }
     public function delete($id){

$user=User::where('id',$id)->first();
$user->delete();
return back();

    }

public function getMarks(Request $request)
{
$user=Auth::User();
$childs=User::where('father_cnic','=',$user->father_cnic)
->where('user_type','=',3)
->get();
$classes=SchoolClass::all();
$exam=Exams::all();
$marks=null;
return view('Parents.viewmarks')->withextra($this->extra)->withchilds($childs)->withclasses($classes)->withexam($exam)->withmarks($marks);

}
public function postMarks(Request $request){
	$user=Auth::User();
$childs=User::where('father_cnic','=',$user->father_cnic)
->where('user_type','=',3)
->get();
$classes=SchoolClass::all();
$exam=Exams::all();
//dd($request->examid);
$marks=ExamRecord::where('student_id','=',$request->childid)
->where('class_id','=',$request->classid)
->where('exam_id','=',$request->examid)->get();
//dd($marks);
return view('Parents.viewmarks')->withextra($this->extra)->withchilds($childs)->withclasses($classes)->withexam($exam)->withmarks($marks);

}

}
