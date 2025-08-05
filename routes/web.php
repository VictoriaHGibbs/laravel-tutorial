<?php

// use App\Http\Controllers\ShowCarController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ProductController;
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
// Route::get('/product/{id}', function (string $id) {
//   return "Works! $id";
// })->whereNumber('id');

// can mix and match these or include a different one for each parameter. 
// whereNumber() only digits
// whereAlpha() letters only
// whereAlphaNumeric() digits and letters only
// whereIn('parameter', ['possibleValue1', 'possibleValue2', 'possibleValue3']


// Custom Regex for validation
// Route::get(uri:'/user/{username}', action: function(string $username) {
// // ...
// })->where(name:'username', expression:'[a-z]+'); //requires only lowercase

// Route::get(uri:'{lang}/product/{id}', action: function(string $lang, string $id) {
//   // ...
// })->where(['lang' => '[a-z]{2}', 'id' => '\d{4,}']);

// Route::get(uri:'search/{search}', action: function(string $search){
//   return $search;
// })->where('search', '.+');


//Named Routes - associating a name to a route makes updating URLs super easy since you will only need to do it in one place instead of multiple. 
// Route::get('/', function () {

//   $productUrl = route('product.view',['lang' => 'en', 'id'=> 1]);
//   dd($productUrl);

//   return view('welcome');
// });

// Route::view(uri: '/about-us', view: 'about')->name(name:'about'); // editing the uri here will update the url anywhere the named route is used. 


//Named Routes with parameters. Uses stuff above in the Named routes section as well
// Route::get(uri:'p/{lang}/product/{id}', action: function(string $lang, string $id) {
//   // ...
// })->name(name:'product.view');

// Route::get(uri:'/user/profile', action:function(){})->name(name: 'profile');

// Route::get(uri:'/current-user', action:function(){
//   // To ways to set up a redirect.
//   return redirect()->route(route: 'profile');

//   // return to_route(route: 'profile');
// });

// Route Groups 1:08:36

// Route::get('/', function () {
//   return view('welcome');
// });

// Route::view(uri: '/about', view: 'about')->name(name:'about');

// Route::prefix('admin')->group(function () {
//   Route::get('/users', function(){
//     return '/admin/users';
//   });
// });

// Route::name('admin.')->group(function () {
//   Route::get('/users', function(){
//     return '/users'; //But the route name is "admin.users"
//   })->name('users');
// });


// Fallback Routes , used when there would normally be a 404 error. Can set up and use another view that will be shown anytime there would be a 404. 

Route::fallback(function () {
  return 'Fallback';
});

// View registered routes with Artisan in terminal
// php artisan route:list  // gets all regardless of who made them
// php artisan route:list --except-vendor   // to get any you have made
// php artisan route:list -v  // gives details about the routes

// Route Caching in terminal
// php artisan route:cache  // Creates a cached version of the laravel routes. Will speed up and improve overall performance of the site. 
// php artisan route:clear // Clears out any saved cache
// ---------------------------------------------------------------------------------

Route::get('/', function () {
  return view('welcome');
});

Route::view(uri: '/about', view: 'about')->name(name:'about');

// Route::get(uri: '/car', action: [CarController::class, 'index']);


// Group Routes by Controller

// Route::controller(CarController::class)->group(function(){
//   Route::get(uri: '/car', action: 'index'); // This is the route above and we just removed the controller and left the method name. 
//   Route::get(uri: '/my-cars', action: 'myCars');
// });

// Single Action Controllers

// Route::get('/car', ShowCarController::class);

// Route::get('/car/invokable', CarController::class);
// Route::get('/car', [CarController::class, 'index']);

// Resource Controllers
// Auto creates the routes for all the methods in the class. can see list with "php artisan route:list"

// Route::resource(name:'/products', controller:ProductController::class)
//     // ->except(['destroy']); // include an array of methods you want to exclude.
//     ->only(['index', 'show']); // use only keyword to tell it specifically which to include.

// Route::ApiResource(name:'/products', controller:ProductController::class);
// edit and create do not use the API so they are not in the list. 

// Route::resource(name:'/products', controller:ProductController::class);

// Route::apiResource(name:'cars', controller:CarController::class);

Route::apiResources([
  'cars' => CarController::class,
  'products' => ProductController::class,
]);
