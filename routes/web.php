<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\forgotPassword;
use App\Http\Controllers\Controller;
use App\Http\Controllers\home;
use App\Http\Controllers\users;
use App\Http\Controllers\files;
use App\Http\Controllers\customers;
use App\Http\Controllers\products;
use App\Http\Controllers\requests;
use App\Http\Controllers\activitylogs;
use App\Http\Controllers\business;
use App\Http\Controllers\profiles;
use App\Http\Controllers\panels;
use App\Http\Controllers\gps;
use App\Http\Controllers\mapping;
// use App\Http\Controllers\mapping;

use App\Http\Controllers\bl1200mapping;
use App\Http\Controllers\mappingquestions;
use App\Http\Controllers\mappingquestionsbt;
use App\Http\Controllers\questions;
use App\Http\Controllers\samplecontainers;
use App\Http\Controllers\facilities;
use App\Http\Controllers\medicaltest;
use App\Http\Controllers\lists;
use App\Http\Controllers\patients;
use App\Http\Controllers\messages;
use App\Http\Controllers\userrolesmapping;
use App\Http\Controllers\modules;
use App\Http\Controllers\mappingpanels;
use App\Http\Controllers\reflextestmapping;
use App\Http\Controllers\userdepartments;
use App\Http\Controllers\subuserdepartments;
use App\Http\Controllers\reports;
use App\Http\Controllers\btaddons;
use App\Http\Controllers\tickets;
use App\Http\Controllers\patientsaudit;
use App\Http\Controllers\patienthistorybt;
use App\Http\Controllers\BTBS;
use Illuminate\Http\Request;
use App\Http\Controllers\addresults;
use App\Http\Controllers\Transfusion;
use App\Http\Controllers\cautionController;
use App\Http\Controllers\unitspending;
use App\Http\Controllers\bloodsciencegps;
use App\Http\Controllers\clinicianlist;
use App\Http\Controllers\locward;
use App\Http\Controllers\listbiochemistry;
use App\Http\Controllers\bl1200code;
use App\Http\Middleware\Permissions;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\collectedreports;
use App\Http\Controllers\reports1;
use App\Http\Controllers\totals;
use App\Http\Controllers\demographicsdata;

use App\Http\Controllers\views;
// use App\Http\Controllers\Extwl;



$per=[];
$val=[];
$mod=[];

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

Route::get('getUserTheme', [users::class, 'getUserTheme'])->name('getUserTheme');

Auth::routes();

// Disable Registration 
Route::get('register', function() { return redirect('login'); });
Route::post('register', function() { return redirect('login'); });

Route::get('login', [users::class, 'login'])->name('login');

//forgot password
Route::get('forgotPassword', [forgotPassword::class, 'index'])->name('forgotPassword');
Route::post('forgotPassword', [forgotPassword::class, 'sendPassword']);

Route::get('ScanSamples', [tickets::class, 'ScanSamples'])->name('ScanSamples');
// Authenticated Users Only
Route::group(['middleware' => 'auth'], function () {


Route::get('DateJS/{value?}', [Controller::class, 'DateJS'])->name('DateJS');


Route::get('Ticket/{id?}', [tickets::class, 'Ticket'])->name('Ticket');
Route::get('TicketView/{id?}', [tickets::class, 'TicketView'])->name('TicketView');
Route::post('Ticket', [tickets::class, 'save'])->name('Ticket');
Route::post('updateTicket',[tickets::class, 'update'])->name('updateTicket');
Route::get('view/{id}', [tickets::class, 'view']);
Route::get('deleteTicket/{id?}', [tickets::class, 'deleteTicket'])->name('deleteTicket');
Route::get('Tickets', [tickets::class, 'tickets'])->name('Tickets');
Route::post('uploadFiles', [tickets::class, 'uploadFiles'])->name('uploadFiles');
Route::post('updateTicketInfo', [tickets::class, 'updateTicketInfo'])->name('updateTicketInfo');
Route::post('CloseTicket', [tickets::class, 'CloseTicket'])->name('CloseTicket');
Route::post('sendTicketToOCM', [tickets::class, 'sendTicketToOCM'])->name('sendTicketToOCM');



// Route::get('Caution', [BTBS::class, 'cautiontestIndex'])->name('Caution');

// Route::view('Caution', [BTBS::class, 'cautiontestIndex'])->name('Caution');


// Route::get('Unitspending', [BTBS::class, 'unitspending'])->name('Unitspending');
Route::get('SuggestUnits', [BTBS::class, 'netacquireIndex'])->name('SuggestUnits');

Route::get('Netacquire2', [BTBS::class, 'netacquire2Index'])->name('Netacquire2');
Route::get('Microbiology/{id?}', [BTBS::class, 'microbiologyIndex'])->name('Microbiology');


Route::get('AHG', [BTBS::class, 'ahg'])->name('AHG');
Route::get('IssueBatch', [BTBS::class, 'IssueBatch'])->name('IssueBatch');
Route::get('Forward', [BTBS::class, 'forward'])->name('Forward');
Route::get('PHistory', [BTBS::class, 'phistory'])->name('PHistory');
Route::get('Stock', [BTBS::class, 'stock'])->name('Stock');
Route::get('Unlock', [BTBS::class, 'unlock'])->name('Unlock');
Route::get('Sorder', [BTBS::class, 'sorder'])->name('Sorder');
Route::get('SemenAnalysis', [BTBS::class, 'semenanalysis'])->name('SemenAnalysis');

//request
Route::get('deptrequest', [tickets::class, 'deptrequest'])->name('deptr');

Route::get('Antibody', [BTBS::class, 'antibody'])->name('Antibody');
Route::get('Crossmatches', [BTBS::class, 'crossmatches'])->name('Crossmatches');
Route::get('Crossmatchreport', [BTBS::class, 'crossmatchreport'])->name('Crossmatchreport');
Route::get('Antidprophylaxis', [BTBS::class, 'prophylaxis'])->name('Antidprophylaxis');
Route::get('Patientdetails', [BTBS::class, 'patientdetails'])->name('Patientdetails');
Route::get('Patientsearch', [BTBS::class, 'patientsearch'])->name('Patientsearch');

Route::get('Dashboardnet', [BTBS::class, 'dashboard'])->name('Dashboardnet');



Route::get('TestOrder',function(){
	return view('BTBS.testorder');
})->name('TestOrder');

Route::get('comments',function(){
	return view('BTBS.comments');
})->name('comments');

Route::get('definepanel',function(){
return view ('BTBS.definepanel');
})->name('definepanel');


// Home Page 
Route::get('', [home::class, 'index'])->name('/');
Route::get('home', [home::class, 'index'])->name('home');
Route::get('dashboardInfo', [home::class, 'dashboardInfo'])->name('dashboardInfo');
Route::get('getDepartmentStates', [home::class, 'getDepartmentStates'])->name('getDepartmentStates');

// Profile Page 
// function getData($module,$permission){
//     $data = Session::get('data');
//     $per=$data['per'];
//     $val=$data['val'];
//     $mod=$data['mod'];
//     // $user = new users();

//     $key = array_keys($mod,$module);
//     for($i=0;$i<count($key);$i++)
//     {
//         if($mod[$key[$i]]==$module && $per[$key[$i]]==$permission && $val[$key[$i]]=="Yes")
//         {
//             return 1;
//         } 
//         else{
//             return 0;
//         }
//     }
// }


        // Route::get('MyProfile', function () {
        //     $name = Route::currentRouteName();
        //     if(getData($name,"View")==1)
        //     {
        //         $user =new users();
        //         return $user->profile();

        //     }
        //     else{
        //         return redirect('');
        //     }

        // })->name('MyProfile');

        Route::get('MyProfile', [users::class, 'profile'])->name('MyProfile');
        Route::get('Facilities', [facilities::class, 'index'])->name('Facilities');
        Route::post('Facilities', [facilities::class, 'index'])->name('Facilities');


        Route::middleware([Permissions::class])->group(function () {
    
  
         
        
        });
   
Route::post('updateMyProfile', [users::class, 'updateMyProfile'])->name('updateMyProfile');
Route::post('updateUserPassword', [users::class, 'updateUserPassword'])->name('updateUserPassword');


// Business Page 
	
Route::get('Business', [business::class, 'business'])->name('Business');
Route::post('updateBusinessInfo', [business::class, 'updateBusinessInfo'])->name('updateBusinessInfo');
Route::post('updateBusinessAddress', [business::class, 'updateBusinessAddress'])->name('updateBusinessAddress');
Route::post('updateInvoiceSetting', [business::class, 'updateInvoiceSetting'])->name('updateInvoiceSetting');

Route::post('updateThemeInfo', [home::class, 'updateThemeInfo'])->name('updateThemeInfo');

// Get States
Route::post('getStates', function (Request $request) {
    $getStates = DB::table('states')->select('name','id')->where('country_id',$request->id)->get();
	return \Response::json($getStates);
})->name('getStates');


// Profiles Page not
Route::get('Profiles', [profiles::class, 'index'])->name('Profiles');
Route::post('Profiles', [profiles::class, 'index'])->name('Profiles');
Route::get('Profiles/{ListType}', [lists::class, 'List'])->name('ProfileQuestionAnswers');
Route::get('Profile', [profiles::class, 'Profile'])->name('Profile');
Route::post('addProfile', [profiles::class, 'add'])->name('addProfile');
Route::post('deleteProfile', [profiles::class, 'delete'])->name('deleteProfile');
Route::post('updateProfile', [profiles::class, 'update'])->name('updateProfile');
Route::post('addProfileTOQuickList', [profiles::class, 'addProfileTOQuickList'])->name('addProfileTOQuickList');
Route::post('RemoveProfileFromQuickList', [profiles::class, 'RemoveProfileFromQuickList'])->name('RemoveProfileFromQuickList');


// Panles Page
Route::get('Panels', [panels::class, 'index'])->name('Panels');
Route::post('Panels', [panels::class, 'index'])->name('Panels');
Route::get('Panel', [panels::class, 'Panel'])->name('Panel');
Route::post('addPanel', [panels::class, 'add'])->name('addPanel');
Route::post('deletePanel', [panels::class, 'delete'])->name('deletePanel');
Route::post('updatePanel', [panels::class, 'update'])->name('updatePanel');
Route::get('PanelRowShift', [panels::class, 'PanelRowShift'])->name('PanelRowShift');


// GPs Page
Route::get('GPs', [gps::class, 'index'])->name('GPs');
Route::post('GPs', [gps::class, 'index'])->name('GPs');
Route::get('GP', [gps::class, 'GP'])->name('GP');
Route::post('addGP', [gps::class, 'add'])->name('addGP');
Route::post('deleteGP', [gps::class, 'delete'])->name('deleteGP');
Route::post('updateGP', [gps::class, 'update'])->name('updateGP');
Route::get('GPRowShift', [gps::class, 'GPRowShift'])->name('GPRowShift');

// Tests Page
Route::get('MTests', [medicaltest::class, 'index'])->name('MTests');
Route::post('MTests', [medicaltest::class, 'index'])->name('MTests');
Route::get('Test', [medicaltest::class, 'Test'])->name('Test');
Route::post('addTest', [medicaltest::class, 'add'])->name('addTest');
Route::post('deleteTest', [medicaltest::class, 'delete'])->name('deleteTest');
Route::post('updateTest', [medicaltest::class, 'update'])->name('updateTest');
Route::post('updatetests', [medicaltest::class, 'updatetests'])->name('updatetests');
Route::post('inserttests', [medicaltest::class, 'inserttests'])->name('inserttests');
Route::post('deletetests', [medicaltest::class, 'deletetests'])->name('deletetests');


// Mapping Page
Route::get('Mapping', [mapping::class, 'index'])->name('Mapping');
Route::post('Mapping', [mapping::class, 'index'])->name('Mapping');
Route::get('Mapping0', [mapping::class, 'index0'])->name('Mapping0');
Route::post('Mapping0', [mapping::class, 'index0'])->name('Mapping0');
Route::get('Map', [mapping::class, 'Map'])->name('Map');
Route::post('addMapping', [mapping::class, 'add'])->name('addMapping');
Route::post('deleteMapping', [mapping::class, 'delete'])->name('deleteMapping');
Route::post('updateMapping', [mapping::class, 'update'])->name('updateMapping');

// Reflex Test Mapping Page
Route::get('ReflexTesting', [reflextestmapping::class, 'index'])->name('ReflexTesting');
Route::post('ReflexTesting', [reflextestmapping::class, 'index'])->name('ReflexTesting');
Route::get('ReflexTesting0', [reflextestmapping::class, 'index0'])->name('ReflexTesting0');
Route::post('ReflexTesting0', [reflextestmapping::class, 'index0'])->name('ReflexTesting0');
Route::get('ReflexTest', [reflextestmapping::class, 'ReflexTest'])->name('ReflexTest');
Route::post('addReflexTesting', [reflextestmapping::class, 'add'])->name('addReflexTesting');
Route::post('deleteReflexTesting', [reflextestmapping::class, 'delete'])->name('deleteReflexTesting');

// Mapping Panels Page
Route::get('MappingPanels', [mappingpanels::class, 'index'])->name('MappingPanels');
Route::post('MappingPanels', [mappingpanels::class, 'index'])->name('MappingPanels');
Route::get('MappingPanels0', [mappingpanels::class, 'index0'])->name('MappingPanels0');
Route::post('MappingPanels0', [mappingpanels::class, 'index0'])->name('MappingPanels0');
Route::get('MappingPanel', [mappingpanels::class, 'Map'])->name('MappingPanel');
Route::post('addMappingPanel', [mappingpanels::class, 'add'])->name('addMappingPanel');
Route::post('deleteMappingPanel', [mappingpanels::class, 'delete'])->name('deleteMappingPanel');



// Mapping Question Page
Route::get('MappingQuestions', [mappingquestions::class, 'index'])->name('MappingQuestions');
Route::post('MappingQuestions', [mappingquestions::class, 'index'])->name('MappingQuestions');
Route::get('MappingQuestions0', [mappingquestions::class, 'index0'])->name('MappingQuestions0');
Route::post('MappingQuestions0', [mappingquestions::class, 'index0'])->name('MappingQuestions0');
Route::get('MapQuestion', [mappingquestions::class, 'MapQuestion'])->name('MapQuestion');
Route::post('addMappingQuestion', [mappingquestions::class, 'add'])->name('addMappingQuestion');
Route::post('deleteMappingQuestion', [mappingquestions::class, 'delete'])->name('deleteMappingQuestion');
Route::post('updateMappingQuestion', [mappingquestions::class, 'update'])->name('updateMappingQuestion');


// Mapping BT Question Page
Route::get('MappingQuestionsBT', [mappingquestionsbt::class, 'index'])->name('MappingQuestionsBT');
Route::post('MappingQuestionsBT', [mappingquestionsbt::class, 'index'])->name('MappingQuestionsBT');
Route::get('MappingQuestionsBT0', [mappingquestionsbt::class, 'index0'])->name('MappingQuestionsBT0');
Route::post('MappingQuestionsBT0', [mappingquestionsbt::class, 'index0'])->name('MappingQuestionsBT0');
Route::get('MapQuestionBT', [mappingquestionsbt::class, 'MapQuestion'])->name('MapQuestionBT');
Route::post('addMappingQuestionBT', [mappingquestionsbt::class, 'add'])->name('addMappingQuestionBT');
Route::post('deleteMappingQuestionBT', [mappingquestionsbt::class, 'delete'])->name('deleteMappingQuestionBT');
Route::post('updateMappingQuestionBT', [mappingquestionsbt::class, 'update'])->name('updateMappingQuestionBT');



// Questions Page
Route::get('Questions', [questions::class, 'index'])->name('Questions');
Route::post('Questions', [questions::class, 'index'])->name('Questions');
Route::get('Question', [questions::class, 'Question'])->name('Question');
Route::post('addQuestion', [questions::class, 'add'])->name('addQuestion');
Route::post('deleteQuestion', [questions::class, 'delete'])->name('deleteQuestion');
Route::post('updateQuestion', [questions::class, 'update'])->name('updateQuestion');


// Module Page
Route::get('Modules', [modules::class, 'index'])->name('Modules');
Route::post('Modules', [modules::class, 'index'])->name('Modules');
Route::get('Module', [modules::class, 'Module'])->name('Module');
Route::post('addModule', [modules::class, 'add'])->name('addModule');
Route::post('deleteModule', [modules::class, 'delete'])->name('deleteModule');
Route::post('updateModule', [modules::class, 'update'])->name('updateModule');


// User Roles Mapping Page
Route::get('UserRolesMapping', [userrolesmapping::class, 'index'])->name('UserRolesMapping');
Route::post('UserRolesMapping', [userrolesmapping::class, 'index'])->name('UserRolesMapping');
Route::get('Map', [userrolesmapping::class, 'Map'])->name('Map');
Route::post('savePermissions', [userrolesmapping::class, 'savePermissions'])->name('savePermissions');



// SampleContainers Page
Route::get('SampleContainers', [samplecontainers::class, 'index'])->name('SampleContainers');
Route::post('SampleContainers', [samplecontainers::class, 'index'])->name('SampleContainers');
Route::get('SampleContainer', [samplecontainers::class, 'SampleContainer'])->name('SampleContainer');
Route::post('addSampleContainer', [samplecontainers::class, 'add'])->name('addSampleContainer');
Route::post('deleteSampleContainer', [samplecontainers::class, 'delete'])->name('deleteSampleContainer');
Route::post('updateSampleContainer', [samplecontainers::class, 'update'])->name('updateSampleContainer');


// Facilities Page not done

Route::get('Facility', [facilities::class, 'Facility'])->name('Facility');
Route::post('addFacility', [facilities::class, 'add'])->name('addFacility');
Route::post('deleteFacility', [facilities::class, 'delete'])->name('deleteFacility');
Route::post('updateFacility', [facilities::class, 'update'])->name('updateFacility');


// Lists Page
Route::get('List/{ListType}', [lists::class, 'List']);
Route::post('List', [lists::class, 'List'])->name('List');
Route::get('ListInfo', [lists::class, 'ListInfo'])->name('ListInfo');
Route::post('addList', [lists::class, 'add'])->name('addList');
Route::post('deleteList', [lists::class, 'delete'])->name('deleteList');
Route::post('updateList', [lists::class, 'update'])->name('updateList');
Route::get('ListRowShift', [lists::class, 'ListRowShift'])->name('ListRowShift');


// Patients Page not done
Route::get('Patients/{List}', [patients::class, 'index'])->name('Patients');
Route::post('Patients', [patients::class, 'index'])->name('Patients');
Route::post('PatientSaveFile', [patients::class, 'PatientSaveFile'])->name('PatientSaveFile');
Route::get('PatientHistory/{id?}/{type?}/{tab?}', [patients::class, 'PatientHistory'])->name('PatientHistory');
Route::get('getPatientHistory', [patients::class, 'getPatientHistory'])->name('getPatientHistory');
Route::get('checkPatient', [patients::class, 'checkPatient'])->name('checkPatient');
Route::get('checkMicroPatient1/{id?}', [patients::class, 'checkMicroPatient1'])->name('checkMicroPatient1');
Route::get('checkMicroPatient/{id?}', [patients::class, 'checkMicroPatient'])->name('checkMicroPatient');



Route::get('GetResult', [patients::class, 'GetResult'])->name('GetResult');
Route::get('getChartResults', [patients::class, 'getChartResults'])->name('getChartResults');

Route::get('PatientHistoryBT/{id?}', [patienthistorybt::class, 'index'])->name('PatientHistoryBT');



// Patients Page
Route::get('Messages', [messages::class, 'index'])->name('Messages');
Route::post('Messages', [messages::class, 'index'])->name('Messages');


// Users Page
Route::get('Users', [users::class, 'index'])->name('Users');
Route::post('Users', [users::class, 'index'])->name('Users');
Route::get('User', [users::class, 'User'])->name('User');
Route::get('User/{id}', [users::class, 'User']);
Route::post('addUser', [users::class, 'add'])->name('addUser');
Route::post('deleteUser', [users::class, 'delete'])->name('deleteUser');
Route::post('updateUser', [users::class, 'update'])->name('updateUser');
Route::get('Users/{ListType}', [lists::class, 'List'])->name('Roles');
Route::get('UploadUsers', [users::class, 'UploadUsers'])->name('UploadUsers');
Route::post('UploadUsersDataFile', [users::class, 'UploadUsersDataFile'])->name('UploadUsersDataFile');
// not done
Route::get('syncUsersData', [users::class, 'syncUsersData'])->name('syncUsersData');


// User Deparments Page
Route::get('UserDepartments', [userdepartments::class, 'index'])->name('UserDepartments');
Route::post('UserDepartments', [userdepartments::class, 'index'])->name('UserDepartments');
Route::get('Department', [userdepartments::class, 'Department'])->name('Department');
Route::post('addDepartment', [userdepartments::class, 'add'])->name('addDepartment');
Route::post('deleteDepartment', [userdepartments::class, 'delete'])->name('deleteDepartment');
Route::post('updateDepartment', [userdepartments::class, 'update'])->name('updateDepartment');

// User Sub Deparments Page not done
Route::get('SubUserDepartments', [subuserdepartments::class, 'index'])->name('SubUserDepartments');
Route::post('SubUserDepartments', [subuserdepartments::class, 'index'])->name('SubUserDepartments');
Route::get('SubDepartment', [subuserdepartments::class, 'SubDepartment'])->name('SubDepartment');
Route::post('addSubDepartment', [subuserdepartments::class, 'add'])->name('addSubDepartment');
Route::post('deleteSubDepartment', [subuserdepartments::class, 'delete'])->name('deleteSubDepartment');
Route::post('updateSubDepartment', [subuserdepartments::class, 'update'])->name('updateSubDepartment');




// Files Page
Route::get('Files', [files::class, 'index'])->name('Files');
Route::post('Files', [files::class, 'index'])->name('Files');
Route::get('File', [files::class, 'File'])->name('File');
Route::get('File/{id}', [files::class, 'File']);
Route::post('addFile', [files::class, 'add'])->name('addFile');
Route::post('updateFile', [files::class, 'update'])->name('updateFile');
Route::post('addFileInfo', [files::class, 'addFileInfo'])->name('addFileInfo');
Route::post('updateFileInfo', [files::class, 'updateFileInfo'])->name('updateFileInfo');
Route::post('deleteFile', [files::class, 'delete'])->name('deleteFile');
Route::post('updateFile', [files::class, 'update'])->name('updateFile');
Route::post('changeStatus', [files::class, 'changeStatus'])->name('changeStatus');
Route::get('Documents/{ListType}', [lists::class, 'List'])->name('Documents');



// Requests Page not done all
// Route::get('Requests/{state?}/{patient?}/{ward?}/{type?}/{unsigned?}', [requests::class, 'index'])->name('Requests');
Route::get('/Requests/{state?}/{patient?}/{ward?}/{rtype?}/{unsigned?}',
    ['as'=>'Requests',
    'uses'=>'requests@index']);
Route::post('Requests', [requests::class, 'index'])->name('Requests');
Route::get('Request', [requests::class, 'Request'])->name('NewRequest');
Route::get('BTRequest', [requests::class, 'Request'])->name('BTRequest');
Route::get('BatchRequesting', [requests::class, 'BatchRequesting'])->name('BatchRequesting');
Route::post('getClinicList', [requests::class, 'getClinicList'])->name('getClinicList');
Route::post('GetPatientList', [requests::class, 'GetPatientList'])->name('GetPatientList');
Route::post('GetPatientInfo', [requests::class, 'GetPatientInfo'])->name('GetPatientInfo');
Route::get('GetProfileThreshHold', [requests::class, 'GetProfileThreshHold'])->name('GetProfileThreshHold');
Route::get('RequestInfo', [requests::class, 'RequestInfo'])->name('RequestInfo');
Route::get('RequestView/{uid}', [requests::class, 'RequestView']);
Route::get('Request/{rid?}/{eid?}', [requests::class, 'Request'])->name('Request');
Route::get('BTRequest/{rid?}/{eid?}', [requests::class, 'Request'])->name('BTRequest');
Route::get('AddSample/{rid?}/{eid?}', [requests::class, 'AddSample'])->name('AddSample');
Route::get('PrintSampleBarCodes/{rid?}/{eid?}/{sid?}', [requests::class, 'PrintSampleBarCodes'])->name('PrintSampleBarCodes');
Route::get('requestEpisode/{rid?}/{eid?}', [requests::class, 'requestEpisode'])->name('requestEpisode');
Route::get('requestPatient/{pid}', [requests::class, 'requestPatient'])->name('requestPatient');
Route::get('requestPatientBT/{pid?}', [requests::class, 'requestPatientBT'])->name('requestPatient');
Route::get('PatientConfirmation', [requests::class, 'PatientConfirmation'])->name('PatientConfirmation');
Route::post('getCustomersList', [requests::class, 'getCustomersList'])->name('getCustomersList');
Route::post('getCustomerAccounts', [requests::class, 'getCustomerAccounts'])->name('getCustomerAccounts');
Route::post('getProductsList', [requests::class, 'getProductsList'])->name('getProductsList');
Route::post('getProductInfo', [requests::class, 'getProductInfo'])->name('getProductInfo');
Route::post('saveRequest', [requests::class, 'saveRequest'])->name('saveRequest');
Route::post('updateRequest', [requests::class, 'updateRequest'])->name('updateRequest');
Route::post('addOnRequest', [requests::class, 'addOnRequest'])->name('addOnRequest');
Route::get('deleteRequest', [requests::class, 'deleteRequest'])->name('deleteRequest');
Route::get('PrintExternalLab', [requests::class, 'PrintExternalLab'])->name('PrintExternalLab');
Route::get('RequestDownload/{uid}', [requests::class, 'RequestDownload'])->name('RequestDownload');
Route::get('PrintRequestExternalLab/{rid?}/{eid?}', [requests::class, 'PrintRequestExternalLab'])->name('PrintRequestExternalLab');
Route::get('PatientList', [requests::class, 'PatientList'])->name('PatientList');
Route::get('PatientList2', [requests::class, 'PatientList2'])->name('PatientList2');
Route::post('saveRequestSamples', [requests::class, 'saveRequestSamples'])->name('saveRequestSamples');
Route::get('GetProfileQuestions', [requests::class, 'GetProfileQuestions'])->name('GetProfileQuestions');
Route::get('SaveProfileQuestions', [requests::class, 'SaveProfileQuestions'])->name('SaveProfileQuestions');
Route::get('ClearProfileQuestions', [requests::class, 'ClearProfileQuestions'])->name('ClearProfileQuestions');
Route::get('checkSampleStatus', [requests::class, 'checkSampleStatus'])->name('checkSampleStatus');
Route::get('saveSampleStatus', [requests::class, 'saveSampleStatus'])->name('saveSampleStatus');
Route::get('discardSamplesInfo', [requests::class, 'discardSamplesInfo'])->name('discardSamplesInfo');
Route::post('getQuestions', [requests::class, 'getQuestions'])->name('getQuestions');
Route::post('refreshQuestions', [requests::class, 'refreshQuestions'])->name('refreshQuestions');
Route::post('saveQuestions', [requests::class, 'saveQuestions'])->name('saveQuestions');
Route::post('saveRequests', [requests::class, 'saveRequests'])->name('saveRequests');
Route::post('saveRequestSamplesNotes', [requests::class, 'saveRequestSamplesNotes'])->name('saveRequestSamplesNotes');
Route::get('getProfiles', [requests::class, 'getProfiles'])->name('getProfiles');
Route::post('AddOnExistingProfile', [requests::class, 'AddOnExistingProfile'])->name('AddOnExistingProfile');
Route::get('CheckAddOnAvailability', [requests::class, 'CheckAddOnAvailability'])->name('CheckAddOnAvailability');
Route::get('downloadReuqest/{rid?}/{eid?}', [requests::class, 'downloadReuqest'])->name('downloadReuqest');
Route::get('viewRequest/{rid?}/{eid?}', [requests::class, 'viewRequest'])->name('viewRequest');
Route::get('viewBTRequest/{rid?}/{eid?}/{RP?}', [requests::class, 'viewRequest'])->name('viewBTRequest');
Route::post('submitProducts', [requests::class, 'submitProducts'])->name('submitProducts');
Route::get('checkPendingSamples', [requests::class, 'checkPendingSamples'])->name('checkPendingSamples');
Route::post('createRequestFromPendingSamples', [requests::class, 'createRequestFromPendingSamples'])->name('createRequestFromPendingSamples');
Route::post('getPendingSampleIDs', [requests::class, 'getPendingSampleIDs'])->name('getPendingSampleIDs');
Route::post('checkBloodGroupInfo', [requests::class, 'checkBloodGroupInfo'])->name('checkBloodGroupInfo');
Route::get('getBTQuestions', [requests::class, 'getBTQuestions'])->name('getBTQuestions');


Route::get('signAll', [requests::class, 'signAll'])->name('signAll');
Route::get('assignUser', [requests::class, 'assignUser'])->name('assignUser');
Route::get('showMessages', [requests::class, 'showMessages'])->name('showMessages');
Route::get('markAsRead', [requests::class, 'markAsRead'])->name('markAsRead');
Route::get('showFinalReport', [requests::class, 'showFinalReport'])->name('showFinalReport');
Route::post('authorizeUser', [requests::class, 'authorizeUser'])->name('authorizeUser');
Route::post('viewRequestLog', [requests::class, 'viewRequestLog'])->name('viewRequestLog');
Route::get('discardSamplesID', [requests::class, 'discardSamplesID'])->name('discardSamplesID');



// Activity Logs
Route::get('activitylogs', [activitylogs::class, 'index'])->name('activitylogs');
Route::post('activitylogs', [activitylogs::class, 'index'])->name('activitylogs');
Route::post('Deleteactivitylog', [activitylogs::class, 'delete'])->name('Deleteactivitylog');

// Reports & Results
Route::get('ReportsList', [reports::class, 'index'])->name('ReportsList');
Route::post('ReportsList', [reports::class, 'index'])->name('ReportsList');
Route::get('ReportInfo', [reports::class, 'ReportInfo'])->name('ReportInfo');
Route::get('Reports/{name}', [reports::class, 'ReportsList'])->name('Reports');
Route::get('sampleInfo', [reports::class, 'sampleInfo'])->name('sampleInfo');
Route::get('GenerateReport', [reports::class, 'GenerateReport'])->name('GenerateReport');
Route::get('GenerateReport/{uid}', [reports::class, 'GenerateReport']);
Route::post('addReport', [reports::class, 'add'])->name('addReport');
Route::post('deleteReport', [reports::class, 'delete'])->name('deleteReport');
Route::post('updateReport', [reports::class, 'update'])->name('updateReport');
Route::get('getModuleList', [reports::class, 'getModuleList'])->name('getModuleList');
Route::get('getDates', [reports::class, 'getDates'])->name('getDates');
Route::post('getReport', [reports::class, 'getReport'])->name('getReport');
Route::post('getReportResult', [reports::class, 'getReportResult'])->name('getReportResult');
  
// ---------------------------

// Patients Audit
Route::get('PatientAudit', [patientsaudit::class, 'index'])->name('PatientAudit');
Route::post('PatientAudit', [patientsaudit::class, 'index'])->name('PatientAudit');



// Products Page not done
Route::get('BTAddons', [btaddons::class, 'index'])->name('BTAddons');
Route::post('BTAddons', [btaddons::class, 'index'])->name('BTAddons');
Route::get('BTAddon', [btaddons::class, 'btaddon'])->name('BTAddon');
Route::get('BTAddon/{uid}', [btaddons::class, 'BTAddon']);
Route::post('addBTProduct', [btaddons::class, 'add'])->name('addBTProduct');
Route::post('deleteBTProduct', [btaddons::class, 'delete'])->name('deleteBTProduct');
Route::post('updateBTProduct', [btaddons::class, 'update'])->name('updateBTProduct');



// Customers Page not done
Route::post('Customers', [customers::class, 'index'])->name('Customers');
Route::get('Customer', [customers::class, 'Customer'])->name('Customer');
Route::get('Customer/{uid}', [customers::class, 'Customer']);
Route::post('addCustomer', [customers::class, 'add'])->name('addCustomer');
Route::post('deleteCustomer', [customers::class, 'delete'])->name('deleteCustomer');
Route::post('updateCustomer', [customers::class, 'update'])->name('updateCustomer');

// Customer Balances Page not done
Route::get('CustomerBalances', [customers::class, 'indexCustomerBalances'])->name('CustomerBalances');
Route::post('CustomerBalances', [customers::class, 'indexCustomerBalances'])->name('CustomerBalances');

// Customer Statement Page not done
Route::get('CustomerStatement', [customers::class, 'indexCustomerStatement'])->name('CustomerStatement');
Route::post('getCustomerStatement', [customers::class, 'getCustomerStatement'])->name('getCustomerStatement');
Route::get('downloadCustomerStatement/{datefrom}/{dateto}/{customer}/{customer_account}', [customers::class, 'downloadCustomerStatement'])->name('downloadCustomerStatement');

// Products Page not done
Route::get('Products', [products::class, 'index'])->name('Products');
Route::post('Products', [products::class, 'index'])->name('Products');
Route::get('Product', [products::class, 'Product'])->name('Product');
Route::get('Product/{uid}', [products::class, 'Product']);
Route::post('addProduct', [products::class, 'add'])->name('addProduct');
Route::post('deleteProduct', [products::class, 'delete'])->name('deleteProduct');
Route::post('updateProduct', [products::class, 'update'])->name('updateProduct');


// Tests mapping with NA not done
Route::post('syncTestCodesWithNA', [medicaltest::class, 'syncCodes'])->name('syncTestCodesWithNA');

// Route::get('Results/{tab?}/{sampleid?}', [tickets::class, 'biochemistry'])->name('Results');

// Route::post('Biochemistrynew', [tickets::class, 'addmodal'])->name('Biochemistrynew');
// Route::post('Biochemistrynew2', [tickets::class, 'getid'])->name('Biochemistrynew2');

// Not Required
Route::get('ScanSample', [tickets::class, 'ScanSample'])->name('ScanSample');
Route::post('ScanSample', [tickets::class, 'ScanSample'])->name('ScanSample');
Route::post('OrderSample', [tickets::class, 'ScanAddons'])->name('OrderSample');

Route::get('Scan/{id?}', [tickets::class, 'Scan'])->name('Scan');
Route::post('Scan', [tickets::class, 'Scan'])->name('Scan');
// Route::get('Sc', [tickets::class, 'Sc'])->name('Sc');
Route::post('Sc', [tickets::class, 'Sc'])->name('Sc');

Route::post('Scanpost', [tickets::class, 'Scanpost'])->name('Scanpost');
Route::get('ocmnet', [tickets::class, 'ocmnet'])->name('ocmnet');


// View
Route::get('Results/{tab?}/{sampleid?}', [addresults::class, 'sidsend2'])->name('Results');

Route::get('MRNResults/{tab?}/{sampleid?}', [addresults::class, 'mrnresults'])->name('MRNResults');

Route::post('MRNRequest', [addresults::class, 'mrnrequest'])->name('MRNRequest');

Route::post('Results/{tab?}/{sampleid?}', [addresults::class, 'sidsend2'])->name('Results');
Route::get('getDemodata', [addresults::class, 'getDemodata'])->name('getDemodata');

Route::get('CheckSample/{sampleid?}', [addresults::class, 'CheckSample'])->name('CheckSample');


// Save
Route::post('Saveresults', [addresults::class, 'saveresult'])->name('Saveresults');
// Update
Route::post('Updateresults', [addresults::class, 'updateresults'])->name('Updateresults');

Route::post('biop', [addresults::class, 'biop'])->name('biop');
Route::post('extp', [addresults::class, 'extp'])->name('extp');
Route::post('biops', [addresults::class, 'biops'])->name('biops');

Route::post('wardoption', [addresults::class, 'wardopt'])->name('wardoption');
Route::post('clinoption', [addresults::class, 'clinoption'])->name('clinoption');
Route::post('gpoption', [addresults::class, 'gpoption'])->name('gpoption');
Route::post('practiceoption', [addresults::class, 'practiceoption'])->name('practiceoption');
Route::post('copyoption', [addresults::class, 'gpoption'])->name('copyoption');
Route::post('siteoption', [addresults::class, 'siteoption'])->name('siteoption');

Route::post('Biochemistrynew', [addresults::class, 'addmodal'])->name('Biochemistrynew');
Route::get('Biochemistrynew2', [addresults::class, 'modalData'])->name('Biochemistrynew2');



Route::post('addphone', [addresults::class, 'addphone'])->name('addphone');
 ///transfusion routs
 Route::post('validatedata', [addresults::class, 'validatedata'])->name('validatedata');
 Route::post('savespecimendata', [addresults::class, 'savespecimendata'])->name('savespecimendata');



Route::get('Transfusionlab/{id?}', [Transfusion::class, 'transfusionlabdata'])->name('Transfusionlab');
Route::post('Transfusionlab/{id?}', [Transfusion::class, 'postTransfusion'])->name('postTransfusion');

Route::get('Option1/{id?}', [BTBS::class, 'Option1']);
Route::get('Option2/{id?}', [BTBS::class, 'Option2']);
Route::get('Option3/{id?}', [BTBS::class, 'Option3']);
Route::get('Option4/{id?}', [BTBS::class, 'Option4']);

Route::get('Caution', [cautionController::class, 'cautionScan'])->name('Caution');
Route::post('Caution', [cautionController::class, 'passSample'])->name('Caution');
Route::post('CautionReq', [cautionController::class, 'passSampleRequested'])->name('CautionReq');
Route::post('Enterresults', [addresults::class, 'enterresults'])->name('Enterresults');
Route::get('Electronicissue', [BTBS::class, 'electronicissue'])->name('Electronicissue');
Route::post('NetacquirePacket', [BTBS::class, 'netacquirepacket'])->name('NetacquirePacket');

// New Interface of Default List of Netaquire
Route::get('BloodGasTabel', [BTBS::class, 'bloodgastabel'])->name('BloodGasTabel');
Route::get('BloodGas', [BTBS::class, 'bloodgas'])->name('BloodGas');
Route::post('BloodGas', [BTBS::class, 'bloodgassave'])->name('BloodGas');


Route::get('BioChemistryQc/{id?}', [addresults::class, 'biochemqc'])->name('BioChemistryQc');
Route::post('BioChemistryQc/{id?}', [addresults::class, 'qcsave'])->name('BioChemistryQc');
Route::get('BioChemistryQcdel', [addresults::class, 'BioChemistryQcdel'])->name('BioChemistryQcdel');

Route::get('BioDefPanels', [BTBS::class, 'biodefpanels'])->name('BioDefPanels');
Route::get('BioDefCodes', [BTBS::class, 'biodefcodes'])->name('BioDefCodes');
Route::get('CmtMicrobiology/{listtype?}/{id?}', [BTBS::class, 'cmtmicrobiology'])->name('CmtMicrobiology/{listtype?}/{id?}');
Route::post('CmtMicrobiology/{listtype?}/{id?}', [BTBS::class, 'cmtmicrobiologysave'])->name('CmtMicrobiology/{listtype?}/{id?}');
Route::post('CmtMicrobiologyUpdate', [BTBS::class, 'CmtMicrobiologyUpdate'])->name('CmtMicrobiologyUpdate');
Route::get('CmtMicrobiologyDel/{id?}', [BTBS::class, 'CmtMicrobiologydel'])->name('CmtMicrobiologyDel/{id?}');

Route::get('CmtBiochemistry/{listtype?}/{id?}', [BTBS::class, 'cmtmicrobiology'])->name('CmtBiochemistry/{listtype?}/{id?}');
Route::get('CmtHaematology/{listtype?}/{id?}', [BTBS::class, 'cmtmicrobiology'])->name('CmtHaematology/{listtype?}/{id?}');
Route::get('CmtCoagulation/{listtype?}/{id?}', [BTBS::class, 'cmtmicrobiology'])->name('CmtCoagulation/{listtype?}/{id?}');
Route::get('CmtDemographics/{listtype?}/{id?}', [BTBS::class, 'cmtmicrobiology'])->name('CmtDemographics/{listtype?}/{id?}');
Route::get('CmtSemen/{listtype?}/{id?}', [BTBS::class, 'cmtmicrobiology'])->name('CmtSemen/{listtype?}/{id?}');
Route::get('CmtClinical/{listtype?}/{id?}', [BTBS::class, 'cmtmicrobiology'])->name('CmtClinical/{listtype?}/{id?}');

Route::get('LocHostpital/{id?}', [BTBS::class, 'lochostpital'])->name('LocHostpital/{id?}');
Route::post('LocHostpital/{id?}', [BTBS::class, 'lochostpitalsave'])->name('LocHostpital/{id?}');
Route::post('LocHostpitalupd/{id?}', [BTBS::class, 'lochostpitalupd'])->name('LocHostpitalupd/{id?}');
Route::get('LocHostpitaldel/{id?}', [BTBS::class, 'LocHostpitaldel'])->name('LocHostpitaldel/{id?}');


Route::get('CoagulationTmp', [BTBS::class, 'coagulationtmp'])->name('CoagulationTmp');
Route::post('CoagulationTmpid', [BTBS::class, 'CoagulationTmpid'])->name('CoagulationTmpid');
Route::post('CoagulationTmpsave', [BTBS::class, 'CoagulationTmpsave'])->name('CoagulationTmpsave');

Route::get('BiochemTmp', [BTBS::class, 'biochemtmp'])->name('BiochemTmp');
Route::post('BiochemTmpid', [BTBS::class, 'BiochemTmpid'])->name('BiochemTmpid');
Route::post('BiochemTmpsave', [BTBS::class, 'BiochemTmpsave'])->name('BiochemTmpsave');

// not done
Route::get('specimensources/{id?}', [BTBS::class, 'specimensources'])->name('specimensources/{id?}');
Route::post('specimensources', [BTBS::class, 'savespecimen'])->name('specimensources');
Route::get('Delspecimen/{id?}', [BTBS::class, 'Delspecimen'])->name('Delspecimen/{id?}');

// till here
Route::get('PanelBarCodes', [BTBS::class, 'panelBarcodes'])->name('PanelBarCodes');
Route::get('Checkroute', [BTBS::class, 'checkroute'])->name('Checkroute');
Route::get('Lists/{listtype?}/{id?}', [BTBS::class, 'orgaism2'])->name('Lists/{listtype?}/{id?}');
Route::get('MIdentifyStainsDel/{id?}', [BTBS::class, 'orgaismdel'])->name('MIdentifyStainsDel/{id?}');
Route::post('MIdentifyStains', [BTBS::class, 'orgaism2save'])->name('MIdentifyStains');
Route::post('MIdentifyStainsUpdate/{id?}', [BTBS::class, 'orgaism2update'])->name('MIdentifyStainsUpdate/{id?}');
Route::get('MIdentifyWet/{listtype?}/{id?}', [BTBS::class, 'orgaism2'])->name('MIdentifyWet/{listtype?}/{id?}');
Route::get('MIdentifyQantity/{listtype?}/{id?}', [BTBS::class, 'orgaism2'])->name('MIdentifyQantity/{listtype?}/{id?}');
Route::get('MUrineCrystal/{listtype?}/{id?}', [BTBS::class, 'orgaism2'])->name('MUrineCrystal/{listtype?}/{id?}');
Route::get('MUrineCasts/{listtype?}/{id?}', [BTBS::class, 'orgaism2'])->name('MUrineCasts/{listtype?}/{id?}');
Route::get('MUrineMiscell/{listtype?}/{id?}', [BTBS::class, 'orgaism2'])->name('MUrineMiscell/{listtype?}/{id?}');
Route::get('XLD', [BTBS::class, 'xlddca'])->name('XLD');
Route::get('Smac', [BTBS::class, 'smac'])->name('Smac');
Route::get('Preston', [BTBS::class, 'preston'])->name('Preston');
Route::get('MicroMicrobiology', [BTBS::class, 'microbiology'])->name('MicroMicrobiology');
Route::get('ExtTableList', [BTBS::class, 'exttablelist'])->name('ExtTableList');
Route::get('ExtPanels', [BTBS::class, 'extpenels'])->name('ExtPanels');

Route::get('AutoGenerate/{id?}', [cautionController::class, 'autogenerate'])->name('AutoGenerate/{id?}');
Route::get('AutoGenerateDel/{id?}', [cautionController::class, 'autogenedel'])->name('AutoGenerateDel/{id?}');
Route::post('AutoGenerate/{id?}', [BTBS::class, 'saveauto'])->name('AutoGenerate/{id?}');
// Route::get('ShowTable', [BTBS::class, 'showtable'])->name('ShowTable');
Route::get('AutoCoagulation/{id?}', [BTBS::class, 'cougulation'])->name('AutoCoagulation/{id?}');
Route::post('AutoCoagulation/{id?}', [BTBS::class, 'cougulationsave'])->name('AutoCoagulation/{id?}');
Route::get('PhoneAlert/{id?}', [BTBS::class, 'decipline'])->name('PhoneAlert/{id?}');
Route::post('PhoneAlert/{id?}', [BTBS::class, 'alertsave'])->name('PhoneAlert/{id?}');





Route::get('NetaquireSounds', [BTBS::class, 'netsounds'])->name('NetaquireSounds');

Route::get('Phonelevel/{id?}', [BTBS::class, 'Phoneparam'])->name('Phonelevel/{id?}');
Route::get('OrgName', [BTBS::class, 'orgname'])->name('OrgName');
Route::post('OrgName', [BTBS::class, 'orgnamesave'])->name('OrgName');

Route::get('ListofError/{id?}', [BTBS::class, 'errorlist'])->name('ListofError/{id?}');
Route::post('ListofError', [BTBS::class, 'errorsave'])->name('ListofError');
Route::get('DelError/{id?}', [BTBS::class, 'delerror'])->name('DelError/{id?}');
// -------------------------------------------------------------------------------------------------------------------------
Route::get('ListOfErrorsMiscllsamp/{id?}', [BTBS::class, 'miscllSamp'])->name('ListOfErrorsMiscllsamp/{id?}');
Route::post('MisSamsave', [BTBS::class, 'msampsave'])->name('MisSamsave');
Route::post('MisSamDel', [BTBS::class, 'msampdel'])->name('MisSamDel');

Route::get('LoerrMiscllSpecimenSources', [BTBS::class, 'SpicemenSources'])->name('LoerrMiscllSpecimenSources');

Route::get('MiscllResisMark/{id?}', [BTBS::class, 'MisResisMark'])->name('MiscllResisMark/{id?}');
Route::post('MiscllResisMark', [BTBS::class, 'MisResisSave'])->name('MiscllResisMark');
Route::get('MiscllResisMarkDel', [BTBS::class, 'MisResisDel'])->name('MiscllResisMarkDel');
// ----------------------------------------------------------------------------------------------------------------------------
Route::get('Printers/{id?}', [BTBS::class, 'printers'])->name('Printers/{id?}');
Route::post('Printers', [BTBS::class, 'printersave'])->name('Printers');
Route::get('DelPrinters/{id?}', [BTBS::class, 'delprinters'])->name('DelPrinters/{id?}');


//Units sepnding
Route::get('Unitspending', [unitspending::class, 'index'])->name('Unitspending');
Route::post('Unitspending', [unitspending::class, 'updateEvent'])->name('Unitspending');
Route::post('Unitspending2', [unitspending::class, 'updatePending'])->name('Unitspending2');

// Route::get('Unitspending/{id?}/{isbt?}', [unitspending::class, 'index'])->name('Unitspending');
// Route::post('Unitspending/{id?}/{isbt?}', [unitspending::class, 'updateEvent'])->name('Unitspending');
//
// Route::get('LocGPEntry', [bloodsciencegps::class, 'index'])->name('LocGPEntry');
// Route::post('LocGPEntry', [bloodsciencegps::class, 'index'])->name('LocGPEntry');
Route::get('LocGPEntry/{id?}', [bloodsciencegps::class, 'index'])->name('LocGPEntry/{id?}');
Route::post('LocGPEntry/{id?}', [bloodsciencegps::class, 'index'])->name('LocGPEntry/{id?}');
// Route::post('LocGPEntryInfo/{id?}', [bloodsciencegps::class, 'index'])->name('LocGPEntry/{id?}');

Route::post('LocGPEntryInfo/{id?}', [bloodsciencegps::class, 'setdata'])->name('LocGPEntryInfo/{id?}');
Route::get('DelGPEntry/{id?}', [bloodsciencegps::class, 'delgpentry'])->name('DelGPEntry/{id?}');


Route::get('Clinicians/{id?}', [clinicianlist::class, 'clinicianlist'])->name('Clinicians');
Route::post('CliniciansUpdate/{id?}', [clinicianlist::class, 'indexClinician'])->name('CliniciansUpdate');
Route::get('delete/{id?}', [clinicianlist::class, 'deleteClinician'])->name('delete');

Route::get('LocWardList/{id?}', [cautionController::class, 'locwardlist'])->name('LocWardList');
Route::post('LocWardList/{id?}', [cautionController::class, 'indexWard'])->name('LocWardList');
Route::get('LocWardListdel', [cautionController::class, 'LocWardListdel'])->name('LocWardListdel');

Route::get('biocode', [addresults::class, 'BioCode'])->name('biocode');

//Usman Interface route

Route::get('PrintSequence', [cautionController::class, 'testsequence'])->name('PrintSequence');
Route::get('ReRundays', [cautionController::class, 'rerundays'])->name('ReRundays');
Route::get('SetHIL', [cautionController::class, 'sethil'])->name('SetHIL');
Route::get('Splits', [cautionController::class, 'splits'])->name('Splits');
Route::get('UnitsPresicion', [cautionController::class, 'unitspresicion'])->name('UnitsPresicion');
Route::get('Autovalidation', [cautionController::class, 'autovalidation'])->name('Autovalidation');
Route::get('NewResults', [cautionController::class, 'newresults'])->name('NewResults');


Route::get('fasting', [addresults::class, 'fasting'])->name('fasting');

Route::get('addnewanalyte', [listbiochemistry::class, 'addnewanalyte'])->name('addnewanalyte');
Route::get('plausibleranges', [listbiochemistry::class, 'plausibleranges'])->name('plausibleranges');
Route::get('activereq', [listbiochemistry::class, 'activereq'])->name('activereq');
Route::get('normalranges', [listbiochemistry::class, 'normalranges'])->name('normalranges');
Route::get('barcodes', [listbiochemistry::class, 'barcodes'])->name('barcodes');


Route::get('cougulationtest', [products::class, 'cougulationtest'])->name('cougulationtest');
Route::get('cougulationpanels', [products::class, 'cougulationpanels'])->name('cougulationpanels');
Route::get('cougulationdefination', [products::class, 'cougulationdefination'])->name('cougulationdefination');



Route::get('assignpanel', [addresults::class, 'assignpanel'])->name('assignpanel');


Route::get('autovalid', [addresults::class, 'autovalid'])->name('autovalid');

Route::get('inuse', [addresults::class, 'inuse'])->name('inuse'); 
Route::get('deltachecking', [addresults::class, 'deltachecking'])->name('deltachecking');

Route::get('coagtestcode', [addresults::class, 'coagtestcode'])->name('coagtestcode');
Route::get('HaemcodeMapping', [addresults::class, 'haemcodemap'])->name('HaemcodeMapping');
Route::get('BioCodeMapping', [addresults::class, 'biocodemap'])->name('BioCodeMapping');

Route::get('bl1200', [bl1200code::class, 'index'])->name('bl1200');
Route::post('bl1200', [bl1200code::class, 'index'])->name('bl1200');
Route::get('getbl1200', [bl1200code::class, 'getbl1200'])->name('getbl1200');
Route::post('addbl1200', [bl1200code::class, 'add'])->name('addbl1200');
Route::post('deletebl1200', [bl1200code::class, 'delete'])->name('deletebl1200');
Route::post('updatebl1200', [bl1200code::class, 'update'])->name('updatebl1200');

Route::get('LocClinicianList/{id?}', [clinicianlist::class, 'clinicianlist'])->name('LocClinicianList');
Route::post('LocClinicianList/{id?}', [clinicianlist::class, 'indexClinician'])->name('LocClinicianList');
//BL1200 Mapping
Route::get('bl1200Mapping', [bl1200mapping::class, 'index'])->name('bl1200Mapping');
Route::post('bl1200Mapping', [bl1200mapping::class, 'index'])->name('bl1200Mapping');
Route::get('bl1200Mapping0', [bl1200mapping::class, 'index0'])->name('bl1200Mapping0');
Route::post('bl1200Mapping0', [bl1200mapping::class, 'index0'])->name('bl1200Mapping0');
Route::get('bl1200Map', [bl1200mapping::class, 'Map'])->name('bl1200Map');
Route::post('addbl1200Mapping', [bl1200mapping::class, 'add'])->name('addbl1200Mapping');
Route::post('deletebl1200Mapping', [bl1200mapping::class, 'delete'])->name('deletebl1200Mapping');
Route::post('updatebl1200Mapping', [bl1200mapping::class, 'update'])->name('updatebl1200Mapping');

Route::get('saveQuery', [activitylogs::class, 'saveQuery'])->name('saveQuery');
Route::post('saveQuery', [activitylogs::class, 'postSaveQuery'])->name('saveQuery');
Route::post('runQuery', [activitylogs::class, 'postRunQuery'])->name('runQuery');

// LIMS

Route::get('dailyreport', [reports1::class, 'dailyreportindex'])->name('dailyreport');
Route::get('dailyreportdata', [reports1::class, 'dailyreportdata'])->name('dailyreportdata');
Route::get('creatinineclearance', [reports1::class, 'creatinineindex'])->name('creatinineclearance');
Route::get('creatinineclearancedata', [reports1::class, 'creatinineclearancedata'])->name('creatinineclearancedata');
Route::get('creatinineclearancedatabutton', [reports1::class, 'creatinineclearancedatabutton'])->name('creatinineclearancedatabutton');
Route::get('creatinineclearancedatabutton2', [reports1::class, 'creatinineclearancedatabutton2'])->name('creatinineclearancedatabutton2');
Route::get('outstanding', [reports1::class, 'outstandingindex'])->name('outstanding');

Route::get('collectedreports', [reports1::class, 'collectedreports'])->name('collectedreports');
Route::get('collectedreportsdata', [reports1::class, 'collectedreportsdata'])->name('collectedreportsdata');

Route::get('urineprotien', [collectedreports::class, 'index2'])->name('urineprotien');
Route::get('urineprotienData', [totals::class, 'urprdata'])->name('urineprotienData');
Route::get('urineprotienSampleID', [totals::class, 'urprsid'])->name('urineprotienSampleID');

Route::get('24hoururine', [reports1::class, 'index'])->name('24hoururine');
Route::get('24hoururineSearch', [reports1::class, 'Search'])->name('24hoururineSearch');
Route::get('testcount', [collectedreports::class, 'index3'])->name('testcount');

Route::get('HaemTotals', [totals::class, 'HaemTotals'])->name('HaemTotals');
Route::get('HaemTotalsData', [totals::class, 'HaemTotalsData'])->name('HaemTotalsData');
Route::get('demo', [totals::class, 'demo'])->name('demo');
Route::get('demodata', [totals::class, 'demodata'])->name('demodata');


Route::get('BioTotals', [totals::class, 'BioTotals'])->name('BioTotals');
Route::get('BioTotalsData', [totals::class, 'GetBioTotals'])->name('BioTotalsData');
Route::get('CoagTotals', [totals::class, 'CoagTotals'])->name('CoagTotals');
Route::get('ExtTotals', [totals::class, 'ExtTotals'])->name('ExtTotals');
Route::get('phonelog', [totals::class, 'phone'])->name('phonelog');
Route::get('getphone', [totals::class, 'getphone'])->name('getphone');
Route::get('ExtTotalsData', [reports1::class, 'ExtTotalsData'])->name('ExtTotalsData');

Route::get('FaxLogs', [totals::class, 'FaxLogs'])->name('FaxLogs');
Route::get('demographicsdata', [demographicsdata::class, 'index'])->name('demographicsdata');
Route::post('getdemographicsdata', [demographicsdata::class, 'demographics'])->name('getdemographicsdata');

// templets routes
Route::get('Extworklist', [collectedreports::class, 'Extworklist'])->name('Extworklist');
Route::get('ExtwokLst', [collectedreports::class, 'ExtWokLst'])->name('ExtwokLst');

Route::get('viewrunning', [views::class, 'viewrunning'])->name('viewrunning');
Route::get('viewrunningdata', [views::class, 'viewrunningdata'])->name('viewrunningdata');
Route::get('viewrunning2', [views::class, 'viewrunning2'])->name('viewrunning2');
Route::get('viewrunning2data', [views::class, 'viewrunning2data'])->name('viewrunning2data');
Route::get('viewrunning3', [views::class, 'viewrunning3'])->name('viewrunning3');
Route::get('Statistics', [reports::class, 'Statistics'])->name('Statistics');
Route::get('StatisticsData', [reports::class, 'getdata'])->name('StatisticsData');

Route::get('selectparameter', [reports1::class, 'selectparameter'])->name('selectparameter');
Route::get('microbiology', [views::class, 'microbiology'])->name('microbiology');
Route::get('microbiologyData', [views::class, 'microbioData'])->name('microbiologyData');

Route::get('glucosetolerance', [reports1::class, 'glucosetolerance'])->name('glucosetolerance');
Route::post('glucosetolerancedata', [reports1::class, 'glucosetolerancedata'])->name('glucosetolerancedata');
Route::post('glucosetolerancedatabutton', [reports1::class, 'glucosetolerancedatabutton'])->name('glucosetolerancedatabutton');
Route::post('glucosetolerancedatabutton1', [reports1::class, 'glucosetolerancedatabutton1'])->name('glucosetolerancedatabutton1');
Route::post('glucosetolerancedatabutton2', [reports1::class, 'glucosetolerancedatabutton2'])->name('glucosetolerancedatabutton2');
Route::get('printresults', [reports1::class, 'printresults'])->name('printresults');

Route::get('validqc', [reports1::class, 'validqc'])->name('validqc');
Route::get('haemcontrols', [reports1::class, 'haemcontrols'])->name('haemcontrols');
Route::get('haemcontData', [reports1::class, 'haemData'])->name('haemcontData');
Route::get('highmeanlow', [reports1::class, 'highmeanlow'])->name('highmeanlow');

Route::get('getfax', [totals::class, 'getfax'])->name('getfax');

Route::get('index6', [reports1::class, 'index7'])->name('index6');
Route::get('getBioEndoTotals', [totals::class, 'getBioEndoTotals'])->name('getBioEndoTotals');
Route::get('index7', [reports1::class, 'index8'])->name('index7');
Route::get('index7data', [reports::class, 'index7data'])->name('index7data');
Route::get('index8', [reports1::class, 'index9'])->name('index8');
Route::get('index9', [reports1::class, 'index10'])->name('index9');
Route::get('codetextDATA/{id?}/{id2?}', [reports1::class, 'codetextDATA'])->name('codetextDATA/{id?}/{id2?}');
Route::get('codetextDATAdisplay', [reports1::class, 'codetextDATAdisplay'])->name('codetextDATAdisplays');


Route::get('abnormals', [reports1::class, 'abnormals'])->name('abnormals');
Route::post('abnormalresults', [reports1::class, 'GetAbnormals'])->name('abnormalresults');
Route::get('getabnormalflags', [reports1::class, 'getabnormalflags'])->name('getabnormalflags');


Route::get('GtTest', [patients::class, 'GtTest'])->name('GtTest');

Route::get('GlucoseTol', [patients::class, 'glucoseTol'])->name('GlucoseTol');

Route::post('GlucoseTolData', [patients::class, 'GlucoseTolData'])->name('GlucoseTolData');
Route::post('GlucoseTolDataButton', [patients::class, 'GlucoseTolDataButton'])->name('GlucoseTolDataButton');
Route::post('GlucoseTolDataButton2', [patients::class, 'GlucoseTolDataButton2'])->name('GlucoseTolDataButton2');
Route::get('organ',[totals::class, 'organ']);
});

