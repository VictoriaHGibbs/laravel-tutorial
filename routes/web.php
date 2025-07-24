<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//   $person = [
//     'name'=> 'Victoria',
//     'email'=> 'victoria@example.com',
//   ];
//   dump($person);
//   return view('welcome');
// });

// Route::get(uri: '/about', action: function () {
//     return view('about');
// });

// Route::view(uri: '/about', view: 'about');

// Route::get('/product/{id}', function (string $id) {
//   return "Product ID=$id";
// });

// Route::get(uri: '{lang}/product/{id}/review/{reviewID}', action: function (string $lang, string $id, string $reviewID) {
// });

// Optional parameter has the ? in it. Needs to have a default value assigned. 
// Route::get(uri:'/product/{category?}', action: function(string $category = 'none') {
//   return "Product for category=$category";
// });

// Route Parameter validation
Route::get('/product/{id}', function (string $id) {
  return "Works! $id";
})->whereNumber('id');

// can mix and match these or include a different one for each parameter. 
// whereNumber() only digits
// whereAlpha() letters only
// whereAlphaNumeric() digits and letters only
// whereIn('parameter', ['possibleValue1', 'possibleValue2', 'possibleValue3']


// Custom Regex for validation
Route::get(uri:'/user/{username}', action: function(string $username) {
// ...
})->where(name:'username', expression:'[a-z]+'); //requires only lowercase

Route::get(uri:'{lang}/product/{id}', action: function(string $lang, string $id) {
  // ...
})->where(['lang' => '[a-z]{2}', 'id' => '\d{4,}']);

Route::get(uri:'search/{search}', action: function(string $search){
  return $search;
})->where('search', '.+');


//Named Routes - associating a name to a route makes updating URLs super easy since you will only need to do it in one place instead of multiple. 
Route::get('/', function () {
  // $aboutPageUrl = '/about';
  $aboutPageUrl = route(name:'about');
  dd($aboutPageUrl);
  return view('welcome');
});

Route::view(uri: '/about', view: 'about')->name(name:'about'); // editing the uri here will update the url anywhere the named route is used. 


//Named Routes with parameters. 1:06:04

