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

//___HOME_ROUTE___________________________________S
Route::get('/', 'HomeController@index');


//___ADMIN_ROUTE__________________________________S
Route::get('/dashboard', 'SuperAdminController@index');
Route::get('/login','AdminController@login');

//___Authentication_ROUTE__________________________S
Route::post('/admin-login','AdminController@login_dashboard');
Route::get('/logout', 'SuperAdminController@logout');

//Category....
Route::get('/add-new-category', 'CategoryController@add_new_category');
Route::get('/all-categories', 'CategoryController@all_categories');
Route::post('/save-category', 'CategoryController@save_category');
Route::get('/inactive-category/{id}', 'CategoryController@inactive_category');
Route::get('/active-category/{id}', 'CategoryController@active_category');
Route::get('/edit-category/{id}', 'CategoryController@edit_category');
Route::post('/update-category/{id}', 'CategoryController@update_category');
Route::get('/delete-category/{id}', 'CategoryController@delete_category');

//Brand....
Route::get('/add-new-brand', 'BrandController@add_new_brand');
Route::get('/all-brands', 'BrandController@all_brands');
Route::post('/save-brand', 'BrandController@save_brand');
Route::get('/inactive-brand/{id}', 'BrandController@inactive_brand');
Route::get('/active-brand/{id}', 'BrandController@active_brand');
Route::get('/edit-brand/{id}', 'BrandController@edit_brand');
Route::post('/update-brand/{id}', 'BrandController@update_brand');
Route::get('/delete-brand/{id}', 'BrandController@delete_brand');

//Products.....
Route::get('/add-new-product', 'ProductController@new_product');
Route::get('/all-products', 'ProductController@all_products');
Route::post('/save-product', 'ProductController@save_product');
Route::get('/inactive-product/{id}', 'ProductController@inactive_product');
Route::get('/active-product/{id}', 'ProductController@active_product');
Route::get('/edit-product/{id}', 'ProductController@edit_product');
Route::post('/update-product/{id}', 'ProductController@save_product');
Route::get('/delete-product/{id}', 'ProductController@delete_product');


//Slider.......
Route::get('/all-sliders', 'SliderController@index');
Route::get('/add-new-slider', 'SliderController@create');
Route::post('/save-slider', 'SliderController@store')->name('saveSlider');
Route::get('/edit-slider/{id}', 'SliderController@edit');
Route::post('/update-slider/{id}', 'SliderController@update')->name('updateSlider');
Route::get('/inactive-slider/{id}', 'SliderController@inactive_slider');
Route::get('/active-slider/{id}', 'SliderController@active_slider');

//Pages.........
Route::get('/product-by-category/{id}', 'PublicPagesController@product_by_category')->name('productByCat');
Route::get('/product-by-brand/{id}', 'PublicPagesController@product_by_brand')->name('productByBrand');
Route::get('/view-product/{id}', 'PublicPagesController@view_product_detailes')->name('viewProduct');


//Cart.........
Route::get('/view-cart', 'CartController@view_cart')->name('viewCart');
Route::post('/add-to-cart', 'CartController@add_to_cart')->name('addToCart');
Route::get('/cart-view', 'CartController@show_cart')->name('showCart');
Route::get('/remove-cart-item/{id}', 'CartController@remove_cart_item')->name('RemoveItem');
Route::post('/update-cart-item', 'CartController@update_cart_item')->name('UpdateItem');


//CheckOut.......
Route::get('/customer-login', 'CheckoutController@cust_login')->name('custLogin');
Route::get('/customer-logout', 'CheckoutController@cust_logout')->name('custLogout');
Route::get('/checkout', 'CheckoutController@view_checkout')->name('checkout');
Route::post('/create-customer', 'CheckoutController@create_customer')->name('clreateCustomer');
Route::post('/customer-login-auth', 'CheckoutController@login_auth')->name('customerAuth');

//Shipping.....
Route::post('/save-shipping-data', 'CheckoutController@save_shipping_data')->name('saveShipping');
//payment_method
Route::get('/payment-method', 'CheckoutController@payment_method')->name('paymentMethod');
Route::post('/place-order', 'CheckoutController@place_order')->name('orderPlace');