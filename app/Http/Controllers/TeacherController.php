<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\Schoolclass;
use App\Role;
use App\User;
class TeacherController extends Controller
{
   private $extra=null;
    public function create(){
$role=Role::all();
$section=Section::all();
$schoolclass=Schoolclass::all();

    	return view('Teacher.create')->withextra($this->extra)->withschoolclass($schoolclass)->withsection($section)->withrole($role);
    }
    public function store(Request $data){
$user=new User();
         
            $user->name = $data['studentname'];
          
            $user->father_name = $data['fathername'];
             $user->father_cnic = $data['fathercnice'];
          
            $user->student_cnic = $data['teachercnice'];
            $user->religen=$data['religon'];
             $user->email=$data['email'];
            
            $user->password =bcrypt($data['password']);
        $user->user_type=$data['acounttype'];

            $user->save();

             
            $role = Role::where('id',$data['acounttype'])->first();
            $user->attachRole($role->id);
        
      
          
      
        return back();


    }
    public function viewAll(){

$role=Role::all();
$section=Section::all();
$schoolclass=Schoolclass::all();

$student=User::where('user_type',2)->get();

//dd($student->section->name);

    	return view('Teacher.viewteacher')->withextra($this->extra)->withschoolclass($schoolclass)->withsection($section)->withrole($role)->withstudent($student);

    }

public function getEdit($id){
$student=User::where('id',$id)->first();
$section=Section::all();
$schoolclass=Schoolclass::all();
$role=Role::all();

    return view('Teacher.edit')->withid($id)->withstudent($student)->withschoolclass($schoolclass)->withsection($section)->withrole($role)->withextra($this->extra);
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
       
    

            $user->update();
  
       
             
            
        
      
          
      
        return back();
 
    }
    public function delete($id){

$user=User::where('id',$id)->first();
$user->delete();
return back();

    }
}
