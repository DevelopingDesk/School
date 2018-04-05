<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExamRecord;
use App\SessionDate;

use Auth;
class PerformanceController extends Controller
{
    private $extra=null;
    public function index(Request $request){
$session=SessionDate::all();
$per=null;
return view('Student.studentperformance')->withextra($this->extra)->withsession($session)->withper($per);

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
}
