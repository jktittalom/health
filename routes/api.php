<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::apiResource('users', 'UsersApiController');

    // Facility
    Route::apiResource('facilities', 'FacilityApiController');

    // Speciality
    Route::apiResource('specialities', 'SpecialityApiController');

    // User Details
    Route::post('user-details/media', 'UserDetailsApiController@storeMedia')->name('user-details.storeMedia');
    Route::apiResource('user-details', 'UserDetailsApiController');

    // Jobs
    Route::post('jobs/media', 'JobsApiController@storeMedia')->name('jobs.storeMedia');
    Route::apiResource('jobs', 'JobsApiController');

    // Profile
    Route::apiResource('profiles', 'ProfileApiController');

    // Experience
    Route::apiResource('experiences', 'ExperienceApiController');

    // Tracker
    Route::apiResource('trackers', 'TrackerApiController');

    // Notification Setting
    Route::apiResource('notification-settings', 'NotificationSettingApiController');

    // Job Applied
    Route::apiResource('job-applieds', 'JobAppliedApiController');

    // Provider Type
    Route::apiResource('provider-types', 'ProviderTypeApiController');

    // Package
    Route::apiResource('packages', 'PackageApiController');

    // Subscription
    Route::apiResource('subscriptions', 'SubscriptionApiController');
});
