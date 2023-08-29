<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Assessment;
use App\Http\Controllers\GoogleSheet;


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


Route::get('/admin',[Admin::class,'login']);
Route::post('/loginsubmit',[Admin::class,'loginsubmit']);
Route::group(["middleware"=>"admincontrol"],function(){
  Route::get('/dashboard',[Admin::class,'dashboard']);
  Route::get('/groups',[Admin::class,'groups']);
  Route::post('/addGroup',[Admin::class,'addGroup']);
  Route::post('/editGroup',[Admin::class,'editGroup']);
  Route::post('/deleteGroup',[Admin::class,'deleteGroup']);

  Route::get('/subgroups',[Admin::class,'subgroups']);
  Route::post('/addSubGroup',[Admin::class,'addSubGroup']);
  Route::post('/editSubGroup',[Admin::class,'editSubGroup']);
  Route::post('/deleteSubGroup',[Admin::class,'deleteSubGroup']);
  Route::post('/changeGroup',[Admin::class,'changeGroup']);

  Route::get('/invites',[Admin::class,'invites']);
  Route::post('/addInvite',[Admin::class,'addInvite']);

  Route::get('/questions',[Admin::class,'questions']);
  Route::post('/addQuestion',[Admin::class,'addQuestion']);
  Route::post('/editQuestion',[Admin::class,'editQuestion']);
  Route::post('/deleteQuestion',[Admin::class,'deleteQuestion']);
  Route::post('/changeMainGroupQuestion',[Admin::class,'changeMainGroupQuestion']);
  Route::post('/changeSubGroupQuestion',[Admin::class,'changeSubGroupQuestion']);

  Route::get('/surveyresult',[Admin::class,'surveyresult']);
  Route::get('/results',[Admin::class,'results']);
  Route::post('/changestatus',[Admin::class,'changestatus']);
  Route::get('/logout',[Admin::class,'logout']);
});

Route::get('/import',[GoogleSheet::class,'import']);
Route::get('/assessment',[Assessment::class,'assessment']);
Route::get('/login',[Assessment::class,'login']);
Route::post('/sendPassword',[Assessment::class,'sendPassword']);
Route::post('/clientResult',[Assessment::class,'viewResultSubmit']);
Route::post('/clientsubmit',[Assessment::class,'clientsubmit']);
Route::post('/showQuestions',[Assessment::class,'getQuestions']);
Route::post('/submitQuestionAnswers',[Assessment::class,'submitQuestionAnswers']);

Route::get('/comparison',[Assessment::class,'comparison']);
Route::group(["middleware"=>"assessmentcontrol"],function(){

Route::get('/viewResult',[Assessment::class,'viewResult']);
Route::get('/usersmanagement',[Assessment::class,'usersmanagement']);
Route::post('/addinvitebyuser',[Assessment::class,'addinvitebyuser']);
Route::get('/test',[Assessment::class,'test']);
Route::get('/fillsurveys',[Assessment::class,'fillsurveys']);
Route::post('/submitsurvey',[Assessment::class,'submitsurvey']);
Route::post('/s',[Assessment::class,'s']);
Route::post('/search',[Assessment::class,'searchByTerms']);

Route::get('/viewResultAdmin',[Admin::class,'viewResultAdmin']);
Route::get('/userchangepassword',[Assessment::class,'userchangepassword']);
Route::post('/userchangepassword2',[Assessment::class,'userchangepassword2']);
Route::post('/inviteagain',[Assessment::class,'inviteagain']);
Route::get('/logout_user',[Assessment::class,'logout_user']);

});
