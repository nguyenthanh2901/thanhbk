<?php


Auth::routes();

Route::group(['namespace'=>'Auth'],function ()
{
    Route::get('Dang-Ky','RegisterController@getRegister')->name('get.register');
    Route::post('Dang-Ky','RegisterController@postRegister')->name('post.register');

    Route::get('Dang-Nhap','LoginController@getLogin')->name('get.login');
    Route::post('Dang-Nhap','LoginController@postLogin')->name('post.login');

    Route::get('Dang-Xuat','LoginController@getLogout')->name('get.logout.user');

    Route::get('/quen-mat-khau','ForgotPasswordController@getFormResetPassword')->name('get.reset.password');
    Route::post('/quen-mat-khau','ForgotPasswordController@sendCodeResetPassword');
    
    Route::get('/password/reset','ForgotPasswordController@resetPassword')->name('get.link.reset.password');
    Route::post('/password/reset','ForgotPasswordController@saveResetPassword');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('danh-muc/{slug}-{id}','CategoryController@getListProduct')->name('get.list.product');
Route::get('san-pham/{slug}-{id}','ProductDetailController@productDetail')->name('get.detail.product');
Route::get('san-pham','CategoryController@getListProduct')->name('get.product.list');

Route::get('bai-viet','ArticleController@getListArticle')->name('get.list.article');
Route::get('bai-viet/{slug}-{id}','ArticleController@getDetailArticle')->name('get.detail.article');

Route::prefix('shopping')->group(function () {
    Route::get('/add/{id}','ShoppingCartController@addProduct')->name('add.shopping.cart');
    Route::get('/delete/{id}','ShoppingCartController@deleteProductItem')->name('delete.shopping.cart');
    Route::get('/danh-sach','ShoppingCartController@getListShoppingCart')->name('get.list.shopping.cart');
    Route::get('/update/{id}','ShoppingCartController@updateShoppingCart')->name('ajax.get.shopping.update');
});
Route::group(['prefix' => 'ajax','middleware' => 'CheckLoginUser'],function(){
    Route::post('/danh-gia/{id}','RatingController@saveRating')->name('post.rating.product');
});

Route::get('lien-he','ContactController@getContact')->name('get.contact');
Route::post('lien-he','ContactController@saveContact');

Route::group(['prefix' => 'gio-hang','middleware' ],function(){
    Route::get('/thanh-toan','ShoppingCartController@getFormPay')->name('get.form.pay');
    Route::post('/thanh-toan','ShoppingCartController@saveInfoShoppingCart');
   
});
Route::group(['prefix' => 'ajax'],function(){
    Route::post('/view-product','HomeController@renderProductView')->name('post.product.view');
});

Route::group(['prefix' => 'user','middleware' => 'CheckLoginUser'],function(){
    Route::get('/','UserController@index')->name('user.dashboard');
    
    Route::get('/info','UserController@updateInfo')->name('user.update.info');
    Route::post('/info','UserController@saveUpdateInfo');
     Route::get('/view/transaction','UserController@viewTransaction')->name('user.get.view.transaction');
    Route::get('/password','UserController@updatePassword')->name('user.update.password');
    Route::post('/password','UserController@saveUpdatePassword');
    Route::get('/san-pham-ban-chay','UserController@getProductPay')->name('user.list.product');
    Route::get('/view/{id}','UserController@viewOrder')->name('user.get.view.order');
});

 Route::post('/check-coupon','ShoppingCartController@checkCoupon');