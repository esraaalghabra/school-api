<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Auth::routes();
Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('admin.auth.login');
    });
Route::get('/log', function () {
        return view('admin.auth.login');
    });
Route::get('reg', function () {
        return view('admin.auth.register');
    });
});

Route::group(['middleware' => ['auth','localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    'prefix' => LaravelLocalization::setLocale()], function () {

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::group(['namespace' => 'Admin'], function () {
        Route::resource('Grades', 'GradeController');

        Route::resource('Classrooms', 'ClassroomController');
        Route::post('delete_all', 'ClassroomController@deleteAll')->name('delete_all');
        Route::post('filter-classrooms', 'ClassroomController@filterClassrooms')->name('filter.classrooms');

        Route::resource('Sections', 'SectionController');
        Route::get('/classes/{gradeID}', 'SectionController@getClassrooms');

        Route::resource('teachers', 'TeacherController');

        Route::group(['namespace' => 'Student'], function () {
            Route::resource('Students', 'StudentController');
            Route::resource('Attendance', 'AttendanceController');
            Route::resource('subjects', 'SubjectController');
            Route::resource('Quizzes', 'QuizzeController');
            Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
            Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
        });

        Route::resource('questions', 'QuestionController');



        Route::resource('online_classes', 'OnlineClasseController');
            Route::resource('Graduated', 'GraduatedController');
            Route::resource('Promotion', 'PromotionController');
            Route::resource('Fees_Invoices', 'FeesInvoicesController');
            Route::resource('Fees', 'FeeController');
            Route::resource('receipt_students', 'ReceiptStudentsController');
            Route::resource('ProcessingFee', 'ProcessingFeeController');
            Route::resource('Payment_students', 'PaymentController');
            Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
            Route::get('Download_attachment/{studentsname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
            Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');




    });


    Route::view('parents', 'admin.parents')->name('parents.index');


    Route::get('test', function () {
        return view('test_pg');
    });

});

