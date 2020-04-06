<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Auth::routes([
//   'register' => false,
//   'verify' => false,
//   'reset' => false
// ]);
// Auth::routes();

// Route::get('login', 'AuthController@index')

// Route::get('/', 'HomeController@index');
Route::get('/', function () {
  return redirect('/education');
});

Route::get('/education', 'EducationController@index')->name('home');
Route::get('/educationDetail', 'EducationController@detail');
Route::get('/getAllEducationData', 'EducationController@getAllData');
Route::post('/changeEducationStatus', 'EducationController@setChangeApproveStatus');

Route::get('/tutor', 'TutorController@index');
Route::get('/tutorDetail', 'TutorController@detail');
Route::get('/getAllTutorData', 'TutorController@getAllData');
Route::post('/changeTutorStatus', 'TutorController@setChangeApproveStatus');

Route::get('/student', 'StudentController@index');
Route::get('/studentDetail', 'StudentController@detail');
Route::get('/getAllStudentData', 'StudentController@getAllData');
Route::post('/changeStudentStatus', 'StudentController@setChangeApproveStatus');

Route::get('/grade', 'GradeController@index');                          //Grade
Route::get('/getGrade', 'GradeController@getAllData');
Route::post('/addGrade', 'GradeController@add');
Route::post('/deleteGrade', 'GradeController@delete');

Route::post('/getSubject', 'SubjectController@getAllData');             //Subject
Route::post('/addSubject', 'SubjectController@add');
Route::post('/deleteSubject', 'SubjectController@delete');

Route::get('/activity', 'ActivityController@index');                    //Extra Activity
Route::get('/getActivityTitle', 'ActivityController@getAllTitleData');
Route::post('/addActivityTitle', 'ActivityController@addTitle');
Route::post('/deleteActivityTitle', 'ActivityController@deleteTitle');
Route::post('/getActivityContent', 'ActivityController@getAllContentData');
Route::post('/addActivityContent', 'ActivityController@addContent');
Route::post('/deleteActivityContent', 'ActivityController@deleteContent');

Route::get('/location', 'LocationController@index');                    //Service area & Location
Route::get('/getLocation', 'LocationController@getAllData');
Route::post('/addLocation', 'LocationController@add');
Route::post('/deleteLocation', 'LocationController@delete');

Route::get('/personal', 'QualificationController@index');                    //Personal qualification & Personal certification
Route::get('/getQualification', 'QualificationController@getAllData');
Route::post('/addQualification', 'QualificationController@add');
Route::post('/deleteQualification', 'QualificationController@delete');

Route::get('/getCertification', 'CertificationController@getAllData');            //Exerience
Route::post('/addCertification', 'CertificationController@add');
Route::post('/deleteCertification', 'CertificationController@delete');

Route::get('/payment', 'PaymentController@index');
Route::get('/getAllPaymentData', 'PaymentController@getAllData');
