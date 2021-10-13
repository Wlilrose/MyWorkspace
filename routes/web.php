<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Database Server
    Route::delete('database-servers/destroy', 'DatabaseServerController@massDestroy')->name('database-servers.massDestroy');
    Route::post('database-servers/parse-csv-import', 'DatabaseServerController@parseCsvImport')->name('database-servers.parseCsvImport');
    Route::post('database-servers/process-csv-import', 'DatabaseServerController@processCsvImport')->name('database-servers.processCsvImport');
    Route::resource('database-servers', 'DatabaseServerController');

    // Web Server
    Route::delete('web-servers/destroy', 'WebServerController@massDestroy')->name('web-servers.massDestroy');
    Route::post('web-servers/parse-csv-import', 'WebServerController@parseCsvImport')->name('web-servers.parseCsvImport');
    Route::post('web-servers/process-csv-import', 'WebServerController@processCsvImport')->name('web-servers.processCsvImport');
    Route::resource('web-servers', 'WebServerController');

    // Office
    Route::delete('offices/destroy', 'OfficeController@massDestroy')->name('offices.massDestroy');
    Route::post('offices/parse-csv-import', 'OfficeController@parseCsvImport')->name('offices.parseCsvImport');
    Route::post('offices/process-csv-import', 'OfficeController@processCsvImport')->name('offices.processCsvImport');
    Route::resource('offices', 'OfficeController');

    // Technology Used
    Route::delete('technology-useds/destroy', 'TechnologyUsedController@massDestroy')->name('technology-useds.massDestroy');
    Route::resource('technology-useds', 'TechnologyUsedController');

    // Websites
    Route::delete('websites/destroy', 'WebsitesController@massDestroy')->name('websites.massDestroy');
    Route::resource('websites', 'WebsitesController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
