<?php
Route::get('/', 'FrontController@index')->middleware('sitemap')->name('home');
Route::get('/map', 'FrontController@map')->name('map');
Route::get('/article/{slug}', 'FrontController@pageNews')->middleware('sitemap')->name('page.article');
Route::get('/property', 'FrontController@property')->middleware('sitemap')->name('page.property');
Route::get('/property/district/{romanji_name}', 'FrontController@pageNews')->middleware('sitemap')->name('page.property.district');
Route::get('/agents', 'FrontController@agents')->middleware('sitemap')->name('page.agents');
Route::get('/about', 'FrontController@about')->middleware('sitemap')->name('page.about');
Route::get('/contact', 'FrontController@contact')->middleware('sitemap')->name('page.contact');
Route::get('/sitemap.xml', 'FrontController@getSiteMap');
Route::get('/contract-flow', 'FrontController@contractFlow')->middleware('sitemap')->name('page.contract-flow');
Route::post('/contact', 'InfoSubmitController@registration')->name('contact.submit.info');

// comments
Route::resource('comments','CommentController');
// follows
Route::resource('follows','FollowedController');

// AUTHENTICATION
Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@authenticate')->name('login');
Route::post('/logout', 'LoginController@logout')->name('logout');
Route::get('/reset-password', 'ResetPasswordController@ressetForm')->name('resetpassword');
Route::post('/reset-password', 'ResetPasswordController@checkExist')->name('reset.password');

// SOCIAL LOGIN
Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

// 404
Route::get('/nopermission', function(){ return back(); })->name('nopermission');

// ONLY ADMIN
Route::group(['prefix'=>'admin','as'=>'admin.','middleware' => ['auth','roles'], 'roles' => ['admin']], function(){

    Route::resource('users','UsersController');

    Route::resource('settings','SettingController')->only(['index','store']);
    Route::get('settings/breakingnews','SettingController@breakingNews')->name('settings.breakingnews');
    Route::post('settings/breakingnews/store','SettingController@storeBreakingNews')->name('settings.breakingnews.store');

    Route::resource('advertisements','AdvertisementController')->only(['index','store']);

    Route::resource('menus','MenuController');
    Route::post('menuitems-json','MenuController@getMenuItems')->name('menuitems.json');
    Route::post('menuitemsdetails-json','MenuController@getMenuItemsDetails')->name('menuitemsdetails.json');
});

// BOTH EDITOR AND ADMIN
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['auth','roles'],'roles'=>['editor','admin']], function(){

    Route::resource('group-category','GroupCategoryController');
    Route::resource('category','CategoryController');
    Route::resource('news','NewsController');
    Route::resource('info-submit','InfoSubmitController');
    Route::resource('hero-images', 'HeroImagesController');
    Route::resource('gallery', 'GalleryController');
    Route::resource('map', 'MapController');
    Route::resource('status', 'StatusController');
    Route::resource('district', 'DistrictController');
    Route::resource('attribute', 'AttributesController');
    Route::resource('download_file', 'DownloadFileController');
    //Route::get('/attribute/getlist/{news_id}', 'AttributesController@getById')->name('attribute.show');
});

// USER, EDITOR AND ADMIN
Route::group(['middleware'=>['auth','roles'],'roles'=>['user','editor','admin']], function(){

    Route::get('/dashboard','FrontController@dashboard')->name('dashboard');

    Route::get('profile','ProfileController@profile')->name('profile');
    Route::post('profile','ProfileController@profileUpdate')->name('profile.update');
    Route::post('changepassword','ProfileController@changePassword')->name('profile.changepassword');
});
