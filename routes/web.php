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
Route::group(['middleware' => ['install']], function () {

	Route::get('/','HomeController@index')->name('home');
	Route::post('/contact','HomeController@contact')->name('contact-form');
   Route::post('/subscribe','HomeController@subscribe')->name('subscribe');


Auth::routes();
Route::get('register','HomeController@show_register')->name('register');
Route::post('register','HomeController@registration')->name('register');
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'admin', 'middleware' => ['auth']], function () {
	//ui:::::::::::::::::::
		 Route::get('/profile', 'UiController@index')->name('profile');
		 Route::post('/profile', 'UiController@postprofile')->name('postprofile');
		 Route::post('/password', 'UiController@password_change')->name('password');

		 Route::any('setting','SettingController@index')->name('setting');
		 Route::get('backup','SettingController@getBackup')->name('backup');
		 Route::get('language','LanguageController@index')->name('language');
		 Route::match(['get', 'post'], 'create', 'LanguageController@create')->name('language.create');

		 Route::get('language/edit/{id?}', 'LanguageController@edit')->name('language.edit');
		 Route::patch('language/update/{id}', 'LanguageController@update')->name('language.update');
		 Route::delete('/language/delete/{id}', 'LanguageController@delete')->name('language.delete');

	 		/*::::::::::::::user role Permission:::::::::*/
	 Route::group(['as' => 'user.', 'prefix' => 'user'], function () {
			Route::get('/role', 'RoleController@index')->name('role');
			Route::get('/role/datatable', 'RoleController@datatable')->name('role.datatable');
			Route::any('/role/create', 'RoleController@create')->name('role.create');
			Route::get('/role/edit/{id}', 'RoleController@edit')->name('role.edit');
			Route::post('/role/edit', 'RoleController@update')->name('role.update');
			Route::delete('/role/delete/{id}', 'RoleController@distroy')->name('role.delete');
			//user:::::::::::::::::::::::::::::::::
			Route::get('/', 'UserController@index')->name('index');
			Route::get('/datatable', 'UserController@datatable')->name('datatable');
			Route::any('/create', 'UserController@create')->name('create');
			Route::put('/change/{value}/{id}', 'UserController@status')->name('change');
			Route::get('/edit/{id}', 'UserController@edit')->name('edit');
			Route::put('/edit', 'UserController@update')->name('update');
			Route::delete('/delete/{id}', 'UserController@destroy')->name('delete');
		});
	  Route::resource('category', 'CategoryController');

   Route::group(['as' => 'picklist.', 'prefix' => 'picklist'], function () {
	   Route::resource('batch', 'BatchController');
	   Route::resource('session', 'SessionController');
	});

   Route::resource('slider','SliderController');
   Route::resource('gallery','GalleryController');
   Route::resource('team','TeamController');

   Route::any('about','UiController@about')->name('about');
   Route::get('alumni/schedule','AlumniController@schedule')->name('alumni.schedule');
   Route::get('alumni/schedule/value','AlumniController@schedule_value')->name('alumni.schedule.value');
   Route::post('alumni/schedule/value','AlumniController@post')->name('alumni.schedule.post');
   Route::get('alumni/schedule/edit/{id}','AlumniController@schedule_edit')->name('alumni.schedule.edit');
   Route::put('alumni/change/{value}/{id}', 'AlumniController@status')->name('alumni.change');
   Route::resource('alumni','AlumniController');
   
   Route::get('student','ExtraController@index')->name('student');
   Route::get('student/list','ExtraController@list')->name('register-list');
   Route::get('student/detalis/{id}','ExtraController@list_details')->name('register-list-deatils');
   Route::get('student/check-details/{id}','ExtraController@check_details')->name('register-check-deatils');
   Route::get('student/check-roll','ExtraController@check_roll')->name('register-check-roll');
   //::::::::::::::::::::::::::::::::::::::::::
   Route::get('messege','ExtraController@messege')->name('messege');
   Route::get('messege/create','ExtraController@messege_create')->name('messege.create');
   Route::post('messege/create','ExtraController@messege_send')->name('messege.create');
   Route::get('messege/member','ExtraController@member_list')->name('ajax-member-list');
   Route::get('messege/member/{id}/{slug}','ExtraController@messege_view')->name('messege.view');
   //::::::::::::::::::::::::::::::::::::::::::
   Route::get('mail','EmailController@index')->name('mail.index');
   Route::get('mail/create','EmailController@mail_create')->name('mail.create');
   Route::post('mail/create','EmailController@mail_post')->name('mail.create');
   //:::::::::::::::::::::::::::::::::::::::::::
   Route::get('invitation','EmailController@invitation')->name('invitation');
   Route::get('invitation/create','EmailController@invite_mail')->name('invitation.create');
   Route::post('invitation/create','EmailController@invitation_send')->name('invitation.create');
   //:::::::::::::::::::::::::::::::::::::
   Route::get('depertment/info','DepertmentController@info')->name('depertment.info');
   Route::resource('depertment','DepertmentController');

   //::::::::::::::::::::::::::::::::::::
   Route::get('/contact','ExtraController@contact')->name('contact');


Route::get('/home', 'DashboardController@index')->name('home');
   //member::::::::::::::::::::::::::::::::
   Route::get('member/profile','MemberController@profile')->name('member.profile');
   Route::post('member/profile','MemberController@profile_post')->name('member.profile');
   Route::get('programm/schedule','MemberController@schedule')->name('programm.schedule');
   Route::post('member/messege','MemberController@messege')->name('member.messege.store');
	});

});


Route::get('/installs', 'Install\InstallController@index');
Route::get('install/database', 'Install\InstallController@database');
Route::post('install/process_install', 'Install\InstallController@process_install');
Route::get('install/create_user', 'Install\InstallController@create_user');
Route::post('install/store_user', 'Install\InstallController@store_user');
Route::get('install/system_settings', 'Install\InstallController@system_settings');
Route::post('install/finish', 'Install\InstallController@final_touch');	
