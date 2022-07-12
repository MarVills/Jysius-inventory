<?php

use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\IngredientsController;
use App\Http\Controllers\API\IngredientsApiController;
use App\Models\Ingredient;
use App\Models\Product;


Route::group([], function () {
    require_once(__DIR__ . '/additional/additional.php');
    require_once(__DIR__ . '/language/language.php');
    require_once(__DIR__ . '/auth/auth.php');
});
Route::group(['middleware' => ['auth']], function () {

    require_once(__DIR__ . '/dashboard/dashboard.php');
    require_once(__DIR__ . '/navigation/navigation.php');
    require_once(__DIR__ . '/contact/contact.php');
    require_once(__DIR__ . '/ingredient/ingredient.php');
    require_once(__DIR__ . '/product/product.php');
    require_once(__DIR__ . '/sales_purchase/sales_purchase.php');
    require_once(__DIR__ . '/report/reportRoutes.php');
    require_once(__DIR__ . '/setting/setting.php');
    require_once(__DIR__ . '/todo/todo.php');

    //logout
    Route::get('/logout', [LoginController::class, 'logout']);

    //Clear language cache
    Route::get('/clear-language-cache', function () {
     Artisan::call('cache:clear');
    });
});

//Storage link
Route::get('storage-link', function () {
   Artisan::call('storage:link');
});

//Route::view('/contact', 'contactForm')->name('contactName');
// Route::get('ingredients', [IngredientsApiController::class, 'index']);
// Route::post('ingredients', [IngredientsController::class, 'ingredientPage']);

// Route::get('ingredients', function () {
//     ini_set('memory_limit', '1024M');
//     // return Product::with('variants')->get();
//     return dd('welcome to dashboard!');
// });

// Route::post('ingredients', function () {
//     return dd('welcome to dashboard!');
// });