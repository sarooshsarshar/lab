<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


// Route::prefix('auth')->group(function () {
//     Route::get('login', 'LoginController@loginshow');
//     Route::post('authenticate', 'LoginController@authenticate')->name('auth.authenticate');
// });

Route::get('/', 'HomeController@index')->name('home');
Route::get('/test-list', 'TestDetailsController@test_list')->name('test.list');
Route::get('/test-patient-list', 'TestDetailsController@patient_report')->name('test.patient.list');
Route::post('/test-patient-list', 'TestDetailsController@patient_report')->name('test.patient.list');
Route::get('/test-book', 'TestDetailsController@test_book')->name('test.patient.book');
Route::post('/test-book-save', 'TestDetailsController@test_book_save')->name('test.patient.book.save');
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'DashboardController')->name('dashboard');
    Route::get('dashboard', 'DashboardController')->name('dashboard');
    // Profile
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::post('update-profile', 'ProfileController@update')->name('profile.edit');
    // Unit
    Route::get('unit', 'UnitController@index')->name('unit.index');
    Route::get('unit-delete/{unit}', 'UnitController@delete')->name('unit.delete');
    Route::get('add-unit', 'UnitController@create')->name('unit.create');
    Route::post('store-unit', 'UnitController@store')->name('unit.store');
    Route::post('store-update/{unit_id}', 'UnitController@edit')->name('unit.update');
    // Group
    Route::get('group', 'GroupController@index')->name('group.index');
    Route::get('add-group', 'GroupController@create')->name('group.create');
    Route::get('group-delete/{group}', 'GroupController@delete')->name('group.delete');
    Route::post('store-group', 'GroupController@store')->name('group.store');
    Route::post('group-update/{group_id}', 'GroupController@edit')->name('group.update');

    // Test
    Route::get('test', 'TestController@index')->name('test.index');
    Route::get('add-test', 'TestController@create')->name('test.create');
    Route::post('store-test', 'TestController@store')->name('test.store');
    Route::post('test-update/{test_id}', 'TestController@edit')->name('test.update');

    // Test Report
    Route::get('test-report', 'TestReportController@index')->name('testreport.index');
    Route::get('test-report-add', 'TestReportController@addreport')->name('testreport.add');
    Route::get('print-report/{patient_id}', 'TestReportController@printReport')->name('testreport.print');
    Route::get('test-list-ajax/{group_id}', 'TestReportController@testlist')->name('testreport.testlistajax');
    Route::post('test-report-save', 'TestReportController@testsave')->name('testreport.save');
    Route::post('test-report', 'TestReportController@index')->name('testreport.search');

    Route::get('booking-list', 'PatientBooking@booking_list')->name('booking.list');
    Route::get('booking-approved', 'PatientBooking@booking_approved')->name('booking.approved');
    Route::get('booking-approve/{booking}', 'PatientBooking@approve_booking')->name('booking.approve');
    Route::get('booking-reject/{booking}', 'PatientBooking@reject_booking')->name('booking.reject');
    Route::get('booking-complete/{booking}', 'PatientBooking@complete_booking')->name('booking.complete');

});
Auth::routes(['register' => false]);
// Route::post('login-post', 'LoginController@authenticate')->name('auth.authenticate');
