<?php


Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();


//from here class

Route::get('createclass','ClassController@create')->name('class.create');
Route::get('posticlass','ClassController@store')->name('class.store');
Route::post('editclass','ClassController@edit')->name('edit.schoolclass');
Route::get('deleteclass/{id}','ClassController@delete')->name('delete.schoolclass');
Route::get('allschoolcalss/data','ClassController@viewAll')->name('class.view');
//subject


Route::get('createsubject','SubjectController@create')->name('subject.create');
Route::get('postisubject','SubjectController@store')->name('subject.store');
Route::post('editsubject','SubjectController@edit')->name('edit.subject');
Route::get('deletesubject/{id}','SubjectController@delete')->name('delete.subject');
Route::get('allsubject/data','SubjectController@viewAll')->name('subject.view');
//session

Route::get('createsession','SessionController@create')->name('session.create');
Route::get('postisession','SessionController@store')->name('session.store');
Route::post('editsession','SessionController@edit')->name('edit.session');
Route::get('deletesession/{id}','SessionController@delete')->name('delete.session');
Route::get('allschoolsession/data','SessionController@viewAll')->name('session.view');

//section 

Route::get('createsection','SectionController@create')->name('section.create');
Route::get('posticlasssection','SectionController@store')->name('section.store');
Route::post('edit/section/class','SectionController@edit')->name('edit.sectionclass');
Route::get('deleteclass/section/{id}','SectionController@delete')->name('delete.section');
Route::get('allschoolcalss/section/data','SectionController@viewAll')->name('section.view');

//exams
Route::get('createexam','ExamController@create')->name('exam.create');
Route::get('postiexam','ExamController@store')->name('exam.store');
Route::post('edit/exam/class','ExamController@edit')->name('edit.exam');
Route::get('deleteexam/exam/{id}','ExamController@delete')->name('delete.exam');
Route::get('allschoolexam/exam/data','ExamController@viewAll')->name('exam.view');

//students

Route::get('enrol/student','StudentController@create')->name('add.student');
Route::post('post/student','StudentController@store')->name('store.student');
Route::get('all/enrol/student','StudentController@viewAll')->name('view.student');
Route::get('edit/enrol/student/{id}','StudentController@getEdit')->name('get.edit.student');
Route::post('post/edit/enrol/student','StudentController@edit')->name('edit.student');
Route::get('delete/enrol/student/{id}','StudentController@delete')->name('delete.student');
//promote
Route::get('promote/enrol/student','StudentController@Permot')->name('promote.student');
Route::get('promote/enrol/student/search','StudentController@searchPromote')->name('search.promote.student');
Route::post('promote/all//student/nextclass','StudentController@PromoteToNext')->name('promote.nextclass');


//teacher

Route::get('enrol/teacher','TeacherController@create')->name('add.teacher');
Route::post('post/teacher','TeacherController@store')->name('store.teacher');
Route::get('all/enrol/teacher','TeacherController@viewAll')->name('view.teacher');
Route::get('edit/enrol/teacher/{id}','TeacherController@getEdit')->name('get.edit.teacher');
Route::post('post/edit/enrol/teacher','TeacherController@edit')->name('edit.teacher');
Route::get('delete/enrol/teacher/{id}','TeacherController@delete')->name('delete.teacher');

//fee 
Route::get('all/classes/get/fee','FeeController@index')->name('view.classes');

Route::get('view/all/fee/sessions/{id}','FeeController@getSession')->name('view.class.session');

Route::get('fee/student/fee/get','FeeController@create')->name('add.fee');


Route::post('store/student/fee/get','FeeController@store')->name('store.fee');
Route::get('bunk/student/get/fee/','FeeController@bunkFee')->name('bank.fee');
//assign courses to students

Route::get('getperticlular/students','StudentController@perticularStudent')->name('course.student');
Route::get('assign/getperticlular/students/{id}','StudentController@AssignCourse')->name('assign.course');
Route::post('assign/postcourse/students','StudentController@postAssignCourse')->name('post.assign.course');
Route::get('assign/delete/students/course/{id}','StudentController@deleteAssignCourse')->name('delete.assign.course');

//Manage marks
Route::get('manage/marks','ManageMarksController@getSession')->name('get.session');
Route::post('post/manage/marks','ManageMarksController@getEnroledClasses')->name('get.enroled.classes');
Route::get('all/subjects/manage/marks/{id}/{sessionid}','ManageMarksController@allSubjects')->name('all.teacher.subjects');
Route::get('allstudents/manage/marks/{subid}/{sessionid}/{id}','ManageMarksController@allStudents')->name('all.students');
Route::post('allstudents/store/manage/marks','ManageMarksController@storeMarks')->name('store.marks');
Route::get('remaing/allstudents/get/students','ManageMarksController@remaingMarks')->name('remaing.marks');
Route::get('uploaded/allstudents/get/students','ManageMarksController@uploadedMarks')->name('uploaded.marks.students');

//student marks view
Route::get('view/student/classes/selectsession','ManageMarksController@sessionViewMarks')->name('session.view.marks');

Route::post('view/student/classes/marks','ManageMarksController@viewClasses')->name('view.classes.marks');
Route::get('get/terms/view/student/classes/{id}/{sessionid}','ManageMarksController@viewTerms')->name('view.terms.marks');

Route::get('get/subject/marks/view/student/classes/{termid}/{classid}/{sessionid}','ManageMarksController@viewSubjectMarks')->name('view.subject.marks');

//manage attendence


Route::get('manage/attendence','ManageAttendenceController@getSession')->name('get.session.attendence');
Route::post('post/manage/attendence','ManageAttendenceController@getEnroledClasses')->name('get.enroled.classes.attendence');
Route::get('all/subjects/manage/attendence/{id}/{sessionid}','ManageAttendenceController@allSubjects')->name('all.teacher.subjects.attendence');
Route::get('allstudents/manage/attendence/{subid}/{sessionid}/{id}','ManageAttendenceController@allStudents')->name('all.students.attendence');
Route::post('allstudents/store/attendence','ManageAttendenceController@storeAttendence')->name('store.attendence');

Route::get('uploaded/allstudents/get/students/attendence','ManageAttendenceController@uploadedAttendence')->name('uploaded.attendence.students');

//student view attendance

Route::get('select/attendance/requires','ManageAttendenceController@select')->name('select.attendance');
Route::post('post/select/attendance/requires','ManageAttendenceController@selectPost')->name('select.attendance.post');





