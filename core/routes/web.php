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

/* Home */
Route::get('/', 'HomeController@frontIndex')->name('index');

Route::get('/page/{menu_id}', 'HomeController@page')->name('page');

Auth::routes();

Route::group(['middleware'=>'auth'],function() {
	
    Route::group(['middleware'=>'check-permission:user'], function() {
		return view('check-permission');
	});
});
Route::prefix('admin')->group(function () {

    Route::group(['middleware'=>'auth'],function() {

                //Admin Panel Route
                Route::group(['middleware'=>'check-permission:admin|superadmin'], function() {
                    Route::get('/update-shop-info', 'AdminController@updateShopInfo');
                    Route::post('/save-update-shop-info', 'AdminController@saveUpdateShopInfo');
                    Route::get('/service-list', 'ServiceController@index');
                    Route::get('/add-service', 'ServiceController@addService');
                    Route::post('add-save-service', 'ServiceController@saveAddService');
                    Route::post('/all-payments-ajax', 'PaymentController@getPaymentsAjax')->name('all-payments-ajax');
                    Route::get('/update-service/{service_id}', 'ServiceController@updateService');
                    Route::post('/update-save-service', 'ServiceController@saveUpdateService');
                    Route::get('/activation-service/{service_id}', 'ServiceController@activationService');
                    Route::post('/change-role', 'AdminController@setUserRole')->name('set-user-role');

                    /*Interface Route*/

                    Route::get('/home', 'AdminController@index')->name('home');

                    //Menu
                    Route::get('/menu', 'MenuController@index')->name('menu.index');
                    Route::get('/menu/create', 'MenuController@create')->name('menu.create');
                    Route::post('/menu', 'MenuController@store')->name('menu.store');
                    Route::get('/menu/{menu}/edit', 'MenuController@edit')->name('menu.edit');
                    Route::put('/menu/{menu}', 'MenuController@update')->name('menu.update');
                    Route::get('/menu/{menu}/delete', 'MenuController@destroy')->name('menu.destroy');

                    //Logo
                    Route::get('/logo', 'LogoController@show')->name('logo');
                    Route::post('/update-logo', 'LogoController@updateLogo')->name('update-logo');

                    //Slider
                    Route::get('/slider', 'SliderController@index')->name('slider');
                    Route::get('/slider/create', 'SliderController@create')->name('slider.create');
                    Route::post('/slider', 'SliderController@store')->name('slider.store');
                    Route::get('/slider/{slider}/edit', 'SliderController@edit')->name('slider.edit');
                    Route::put('/slider/{slider}', 'SliderController@update')->name('slider.update');
                    Route::get('/slider/{slider}/delete', 'SliderController@destroy')->name('slider.destroy');

                    //Footer
                    Route::get('/footer', 'FooterController@show')->name('footer');
                    Route::put('/footer/{footer}', 'FooterController@update')->name('footer.update');

                    //Social
                    Route::get('/social', 'SocialController@index')->name('social');
                    Route::get('/social/create', 'SocialController@create')->name('social.create');
                    Route::post('/social', 'SocialController@store')->name('social.store');
                    Route::get('/social/{social}/edit', 'SocialController@edit')->name('social.edit');
                    Route::put('/social/{social}', 'SocialController@update')->name('social.update');
                    Route::get('/social/{social}/delete', 'SocialController@destroy')->name('social.destroy');

                    //Contact
                    Route::get('/contac', 'ContacController@show')->name('contac');
                    Route::put('/contac/{contac}', 'ContacController@update')->name('contac.update');

                    //Statistics
                    Route::get('/statistics', 'StatisticController@show')->name('statistics');
                    Route::put('/statistics/{statistics}', 'StatisticController@update')->name('statistics.update');

                    //About
                    Route::get('/about', 'AboutController@show')->name('about');
                    Route::put('/about/{about}', 'AboutController@update')->name('about.update');

                    //About Price
                    Route::get('/about-price', 'AboutPriceController@show')->name('about-price');
                    Route::put('/about-price/{aboutPrice}', 'AboutPriceController@update')->name('about-price.update');

                    //About Team
                    Route::get('/team', 'TeamController@show')->name('team');
                    Route::put('/team/{team}', 'TeamController@update')->name('team.update');

                    //About Member
                    Route::get('/member', 'MemberController@show')->name('member');
                    Route::post('/member/', 'MemberController@store')->name('member.store');
                    Route::get('/member-update/{member_id}', 'MemberController@memberUpdate')->name('member-update');
                    Route::post('/member-update-save', 'MemberController@saveUpdate')->name('member-update-save');
                    Route::get('/member/{member}/delete', 'MemberController@destroy')->name('member.destroy');

                    //Service
                    Route::get('/service', 'ServiceFrontController@show')->name('service');
                    Route::put('/service/{service}', 'ServiceFrontController@update')->name('service.update');
                    Route::post('/sericon', 'SericonController@store')->name('icon.store');
                    Route::put('/sericon/{sericon}', 'SericonController@update')->name('icon.update');
                    Route::get('/sericon/{sericon}/delete', 'SericonController@destroy')->name('icon.destroy');

                });
    });

    Route::group(['middleware'=>'auth'],function() {

            Route::group(['middleware'=>'check-permission:salesman|admin|superadmin'], function() {
                
                Route::get('/home', 'AdminController@index');
                Route::get('/add-order', 'OrderController@addOrder');
                Route::post('/save-order', 'OrderController@saveOrder');
                Route::get('/add-order-exists-customer/{order_id}', 'OrderController@addOrderExCustomer');
                Route::post('/save-order-exists-customer', 'OrderController@saveOrderExCustomer');
                Route::post('/save-order', 'OrderController@saveOrder');
                Route::get('get-orders-list-jason/{cat_id}', 'OrderController@getOrderajax');
                Route::get('add-order-exists-customer/get-orders-list-jason/{cat_id}', 'OrderController@getOrderajax');
                Route::get('update-Order/get-orders-list-jason/{cat_id}', 'OrderController@getOrderajax');
                Route::get('/update-Order/{order_id}', 'OrderController@updateOrderById');
                Route::post('/save-update-order', 'OrderController@saveUpdateOrderById');
                Route::get('/invoice-print/{order_id}', 'ReportController@index');
                Route::get('/get-payment-list', 'PaymentController@getPayments');
                Route::post('/set-payment', 'PaymentController@postPayment')->name('set-payment');
                Route::get('/all-user', 'AdminController@getUsers')->name('all-user');

        });
    });

    Route::group(['middleware'=>'auth'],function() {
        
        Route::group(['middleware'=>'check-permission:salesman|admin|tailor|superadmin'], function() {

            Route::get('/', 'AdminController@index');
            Route::get('/home', 'AdminController@index');
            Route::get('/password-reset', 'AdminController@resetPassword');
            Route::post('/save-password-reset', 'AdminController@saveResetPassword');
            Route::get('/services-delivery/{order_id}', 'OrderController@deliveryOrderById');
            Route::get('/save-order-delivery/{order_id}', 'OrderController@saveDeliveryOrderById');
            Route::get('/get-orders-list', 'OrderController@getOrders');
           
        });
    });

});

