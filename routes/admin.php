<?php

Route::group(['prefix'=>'admin' , 'namespace' => 'AdminControllersFolder'] , function(){

    
    // Login Route ..
    Route::get('/login' , 'AdminAuthController@login')->name('admin.login');
    Route::post('/doLogin' , 'AdminAuthController@doLogin')->name('admin.doLogin');
    Route::get('/forgot/password' , 'AdminAuthController@forgot_password')->name('admin.forgot_password');
    Route::post('/forgot/password' , 'AdminAuthController@forgot_password_post')->name('admin.forgot_password_post');

    Route::get('/reset/password/{token}' , 'AdminAuthController@reset_password');
    Route::post('/reset/password/{token}' , 'AdminAuthController@reset_password_final');
    

    Route::group(['middleware' => 'admin:admin'] , function(){

        // Dashboard Route
        Route::get('/' , 'AdminAuthController@index')->name('admin.dashboard');

        // Logout Route
        Route::any('/logout' , 'AdminAuthController@logout')->name('admin.logout');

        // App Settings ...
        Route::get('/settings' , 'SettingController@index')->name('admin.settings');
        Route::post('/settings/update' , 'SettingController@update')->name('admin.settings.update');
        Route::get('/settings/stopComments' , 'SettingController@stopComments')->name('admin.stop_comments');
        Route::get('/settings/stopRegister' , 'SettingController@stopRegister')->name('admin.stop_register');
        Route::get('/settings/stopWebsite' , 'SettingController@stopWebsite')->name('admin.stop_website');

        // Admin Routes ........................
        #region
        // Admin Routes ..
        Route::get('/admins' , 'AdminController@index')->name('admins.index');
        Route::get('/admins/profile' , 'AdminController@profile')->name('admins.profile');
        Route::post('/admins/create' , 'AdminController@store')->name('admins.create');
        Route::get('/admins/get/all' , 'AdminController@getAll')->name('admins.all');
        Route::get('/admins/delete' , 'AdminController@destroy')->name('admins.delete');
        Route::get('/admins/edit' , 'AdminController@edit')->name('admins.edit');
        Route::post('/admins/update' , 'AdminController@update')->name('admins.update');
        Route::post('/admins/profile/update' , 'AdminController@profileUpdate')->name('admins.profile.update');
        #endregion


        // Category Routes ....................
        #region
        Route::get('/categories' , 'CategoryController@index')->name('categories.index');
        Route::post('/categories/create' , 'CategoryController@store')->name('categories.create');
        Route::get('/categories/get/all' , 'CategoryController@getAll')->name('categories.all');
        Route::get('/categories/delete' , 'CategoryController@destroy')->name('categories.delete');
        Route::get('/categories/edit' , 'CategoryController@edit')->name('categories.edit');
        Route::post('/categories/update' , 'CategoryController@update')->name('categories.update');
        #endregion


        // Floors Routes ......................
        #region
        Route::get('/floors' , 'FloorController@index')->name('floors.index');
        Route::post('/floors/create' , 'FloorController@store')->name('floors.create');
        Route::get('/floors/get/all' , 'FloorController@getAll')->name('floors.all');
        Route::get('/floors/delete' , 'FloorController@destroy')->name('floors.delete');
        Route::get('/floors/edit' , 'FloorController@edit')->name('floors.edit');
        Route::post('/floors/update' , 'FloorController@update')->name('floors.update');
        #endregion


        // Classes Routes .......................
        #region
        Route::get('/classes' , 'ClasseController@index')->name('classes.index');
        Route::post('/classes/create' , 'ClasseController@store')->name('classes.create');
        Route::get('/classes/get/all' , 'ClasseController@getAll')->name('classes.all');
        Route::get('/classes/delete' , 'ClasseController@destroy')->name('classes.delete');
        Route::get('/classes/edit' , 'ClasseController@edit')->name('classes.edit');
        Route::post('/classes/update' , 'ClasseController@update')->name('classes.update');
        // Get All Floors ..
        Route::get('/classes/all/floors' , 'ClasseController@getAllFloors')->name('classes.all.floors');
        // Get Selected Floor ..
        Route::get('/classes/selected/floors' , 'ClasseController@getSelectedFloor')->name('classes.selected.floors');
        #endregion


        // Courses Routes ..........................
        #region
        Route::get('/courses' , 'CourseController@index')->name('courses.index');
        Route::post('/courses/create' , 'CourseController@store')->name('courses.create');
        Route::get('/courses/get/all' , 'CourseController@getAll')->name('courses.all');
        Route::get('/courses/delete' , 'CourseController@destroy')->name('courses.delete');
        Route::get('/courses/edit' , 'CourseController@edit')->name('courses.edit');
        Route::get('/courses/show' , 'CourseController@show')->name('courses.show');
        Route::post('/courses/update' , 'CourseController@update')->name('courses.update');
        // Get All Categories ..
        Route::get('/courses/all/categories' , 'CourseController@getAllCategories')->name('courses.all.categories');
        // Get All Categories ..
        Route::get('/courses/all/classes' , 'CourseController@getAllClasses')->name('courses.all.classes');
        // Get Selected Category ...
        Route::get('/courses/selected/categories' , 'CourseController@getSelectedCategory')->name('courses.selected.category');
        // Get Selected Class ...
        Route::get('/courses/selected/classes' , 'CourseController@getSelectedClasses')->name('courses.selected.class');
        // Get Course Category Name ...
        Route::get('/courses/category/name' , 'CourseController@getClassCategoryName')->name('courses.category.name');
        // Get Course Class Name ...
        Route::get('/courses/class/name' , 'CourseController@getCourseClassName')->name('courses.class.name');
        #endregion

        // Students Routes ..........
        #region
        // Students Routes .......................
        Route::get('/students' , 'StudentController@index')->name('students.index');
        Route::post('/students/create' , 'StudentController@store')->name('students.create');
        Route::get('/students/show' , 'StudentController@show')->name('students.show');
        Route::get('/students/get/all' , 'StudentController@getAll')->name('students.all');
        Route::get('/students/delete' , 'StudentController@destroy')->name('students.delete');
        Route::get('/students/edit' , 'StudentController@edit')->name('students.edit');
        Route::post('/students/update' , 'StudentController@update')->name('students.update');
        // Get Selected Gender ..
        Route::get('/students/selected/gender' , 'StudentController@getSelectedGender')->name('students.selected.gender');
        #endregion
    

        // Comments Routes .......................
        #region
        Route::get('/comments' , 'CommentController@index')->name('comments.index');
        Route::post('/comments/create' , 'CommentController@store')->name('comments.create');
        Route::get('/comments/show' , 'CommentController@show')->name('comments.show');
        Route::get('/comments/get/all' , 'CommentController@getAll')->name('comments.all');
        Route::get('/comments/delete' , 'CommentController@destroy')->name('comments.delete');
        Route::get('/comments/edit' , 'CommentController@edit')->name('comments.edit');
        Route::post('/comments/update' , 'CommentController@update')->name('comments.update');
        Route::post('/comments/update' , 'CommentController@update')->name('comments.update');
        Route::get('/comments/active' , 'CommentController@active')->name('comments.active');
        #endregion
        

        // Instructors Routes .......................
        #region
        Route::get('/instructors' , 'InstructorController@index')->name('instructors.index');
        Route::post('/instructors/create' , 'InstructorController@store')->name('instructors.create');
        Route::get('/instructors/show' , 'InstructorController@show')->name('instructors.show');
        Route::get('/instructors/get/all' , 'InstructorController@getAll')->name('instructors.all');
        Route::get('/instructors/delete' , 'InstructorController@destroy')->name('instructors.delete');
        Route::get('/instructors/edit' , 'InstructorController@edit')->name('instructors.edit');
        Route::post('/instructors/update' , 'InstructorController@update')->name('instructors.update');
        Route::post('/instructors/update' , 'InstructorController@update')->name('instructors.update');
        Route::get('/instructors/active' , 'InstructorController@active')->name('instructors.active');
        // Get Selected Gender 
        Route::get('/instructors/selected/gender' , 'InstructorController@getSelectedGender')->name('instructors.selected.gender');
        #endregion
    

        // Instructors Routes .......................
        #region
        Route::get('/messages' , 'MessageController@index')->name('messages.index');
        Route::post('/messages/create' , 'MessageController@store')->name('messages.create');
        Route::get('/messages/show/{id}' , 'MessageController@show')->name('messages.show');
        Route::get('/messages/get/all' , 'MessageController@getAll')->name('messages.all');
        Route::get('/messages/delete/{id}' , 'MessageController@destroy')->name('messages.delete');
        Route::get('/messages/edit' , 'MessageController@edit')->name('messages.edit');
        Route::post('/messages/update' , 'MessageController@update')->name('messages.update');
        Route::post('/messages/update' , 'MessageController@update')->name('messages.update');
        Route::get('/messages/active' , 'MessageController@active')->name('messages.active');
        #endregion



        // Reservation Routes .......................
        #region
        Route::get('/reservations' , 'ReservationController@index')->name('reservations.index');
        Route::post('/reservations/create' , 'ReservationController@store')->name('reservations.create');
        Route::get('/reservations/show/{id}' , 'ReservationController@show')->name('reservations.show');
        Route::get('/reservations/get/all' , 'ReservationController@getAll')->name('reservations.all');
        Route::get('/reservations/delete/{id}' , 'ReservationController@destroy')->name('reservations.delete');
        Route::get('/reservations/edit' , 'ReservationController@edit')->name('reservations.edit');
        Route::post('/reservations/update' , 'ReservationController@update')->name('reservations.update');
        Route::post('/reservations/update' , 'ReservationController@update')->name('reservations.update');
        Route::get('/reservations/active/{id}' , 'ReservationController@active')->name('reservations.active');
        #endregion
    
    
    
    });


});