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

    // Facility
    Route::delete('facilities/destroy', 'FacilityController@massDestroy')->name('facilities.massDestroy');
    Route::resource('facilities', 'FacilityController');

    // Speciality
    Route::delete('specialities/destroy', 'SpecialityController@massDestroy')->name('specialities.massDestroy');
    Route::resource('specialities', 'SpecialityController');

    // Setting
    Route::delete('settings/destroy', 'SettingController@massDestroy')->name('settings.massDestroy');
    Route::resource('settings', 'SettingController');

    // User Details
    Route::delete('user-details/destroy', 'UserDetailsController@massDestroy')->name('user-details.massDestroy');
    Route::post('user-details/media', 'UserDetailsController@storeMedia')->name('user-details.storeMedia');
    Route::post('user-details/ckmedia', 'UserDetailsController@storeCKEditorImages')->name('user-details.storeCKEditorImages');
    Route::resource('user-details', 'UserDetailsController');

    // Jobs
    Route::delete('jobs/destroy', 'JobsController@massDestroy')->name('jobs.massDestroy');
    Route::post('jobs/media', 'JobsController@storeMedia')->name('jobs.storeMedia');
    Route::post('jobs/ckmedia', 'JobsController@storeCKEditorImages')->name('jobs.storeCKEditorImages');
    Route::resource('jobs', 'JobsController');

    // Profile
    Route::delete('profiles/destroy', 'ProfileController@massDestroy')->name('profiles.massDestroy');
    Route::resource('profiles', 'ProfileController');

    // Experience
    Route::delete('experiences/destroy', 'ExperienceController@massDestroy')->name('experiences.massDestroy');
    Route::resource('experiences', 'ExperienceController');

    // Tracker
    Route::delete('trackers/destroy', 'TrackerController@massDestroy')->name('trackers.massDestroy');
    Route::resource('trackers', 'TrackerController');

    // Notification Setting
    Route::delete('notification-settings/destroy', 'NotificationSettingController@massDestroy')->name('notification-settings.massDestroy');
    Route::resource('notification-settings', 'NotificationSettingController');

    // Job Applied
    Route::delete('job-applieds/destroy', 'JobAppliedController@massDestroy')->name('job-applieds.massDestroy');
    Route::resource('job-applieds', 'JobAppliedController');

    // Provider Type
    Route::delete('provider-types/destroy', 'ProviderTypeController@massDestroy')->name('provider-types.massDestroy');
    Route::resource('provider-types', 'ProviderTypeController');

    // Package
    Route::delete('packages/destroy', 'PackageController@massDestroy')->name('packages.massDestroy');
    Route::resource('packages', 'PackageController');

    // Subscription
    Route::delete('subscriptions/destroy', 'SubscriptionController@massDestroy')->name('subscriptions.massDestroy');
    Route::resource('subscriptions', 'SubscriptionController');
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
