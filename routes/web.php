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
Route::pattern('id', '[0-9]+');


Route::get('/','Front@index')->name('home');

Route::get('/register','Front@register')->name('register');
Route::post('/register','Accounts@register')->name('register_send');

Route::post('/login','Accounts@login')->name('login');
Route::get('/logout','Accounts@logout')->name('logout');

Route::get('/article/{id}', ['uses' => 'ArticleController@showArticle']);

Route::post('/articlePage', 'Front@getArticlePages');
Route::post('/getArticle', 'Front@getArticle');

Route::get('/autor', 'Front@autor')->name('autor');
//Logged in
Route::group(['middleware' => 'logged_in'], function() {
    Route::post('/survey','Survey@submit')->name('survey.submit');
    Route::post('/purchaseMembership','MembershipController@purchase')->name('purchaseMembership');
    Route::post('/workout','MembershipController@workout')->name('workout');
});


//Admin panel
Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin','Admin_panel@index')->name('admin');

    Route::get('/admin/manage_users','Admin_panel@manage_users_index')->name('admin.manage_users');
    Route::post('/admin/deleteuser', 'Admin_panel@deleteUser');
    Route::post('/admin/edituser', 'Admin_panel@editUser');

    Route::get('/admin/memberships','Admin_panel@memberships_index')->name('admin.memberships');
    Route::post('/admin/deletemembership', 'Admin_panel@deleteMembership');
    Route::post('/admin/editmembership', 'Admin_panel@editMembership');
    Route::post('/admin/insertmembership', 'Admin_panel@insertMembership')->name('insertMembership');
    Route::get('/admin/surveys','Admin_panel@surveys_index')->name('admin.surveys');

    Route::post('/admin/surveys/createSurvey','Survey@createSurvey')->name('create.survey');

    Route::get('/admin/surveys/view/{id}', ['uses' => 'Survey@survey_results'] );
    Route::get('/admin/surveys/delete/{id}', ['uses' => 'Survey@survey_delete'] );

    Route::get('/admin/articles','Admin_panel@articles_index')->name('admin.articles');
    Route::post('/admin/submitArticle', 'Admin_panel@submitArticle')->name('submitArticle');
    Route::post('/admin/deleteArticle', 'Admin_panel@deleteArticle');
    Route::post('/admin/editArticle', 'Admin_panel@editArticle');

    Route::get('/admin/showcase', 'Admin_panel@showcase_index')->name('admin.showcase');
    Route::post('/admin/deleteShowcase', 'Admin_panel@showcase_delete');
    Route::post('/admin/insertShowcase', 'Admin_panel@showcase_insert');
    Route::post('/admin/updateShowcase', 'Admin_panel@showcase_update');
});
