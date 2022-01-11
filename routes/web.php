<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminpanel;
use App\Http\Controllers\front;
// front Routes
Route::get('/',[Front::class,'main']);
Route::get('/contact',[Front::class,'contact']);
Route::get('/category-products/{cid}',[Front::class,'catproducts']);
//login
Route::get('/login',[Front::class,'login']);
Route::post('/postcontact',[Front::class,'postcontact']);

Route::get('/admin',[adminpanel::class,'login']);
Route::post('/postlogin',[adminpanel::class,'postlogin']);
Route::get('/admin/dashboard',[adminpanel::class,'dashboard']);
Route::get('/admin/logout',[adminpanel::class,'logout']);
Route::get('/admin/changepassword',[adminpanel::class,'changepass']);
Route::get('/admin/category',[adminpanel::class,'category']);
Route::get('/admin/products',[adminpanel::class,'products']);
Route::post('/admin/postchangepass',[adminpanel::class,'postchangepass']);
Route::get('/admin/addcategory',[adminpanel::class,'addcategory']);
Route::post('/admin/postaddcategory',[adminpanel::class,'postaddcategory']);
Route::get('/admin/delcat/{id}',[adminpanel::class,'delcat']);
Route::get('/admin/editcat/{id}',[adminpanel::class,'editcat']);
Route::post('/admin/editpostcategory',[adminpanel::class,'editpostcategory']);
Route::get('/admin/addproducts',[adminpanel::class,'addproducts']);
Route::post('/admin/postaddproducts',[adminpanel::class,'postaddproducts']);
Route::get('/admin/editproduct/{id}',[adminpanel::class,'editproduct']);
Route::post('/admin/editpostproduct',[adminpanel::class,'editpostproduct']);
Route::get('/admin/delproduct/{id}',[adminpanel::class,'delproduct']);
