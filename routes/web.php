<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\Admincontroller;
use App\Http\Controllers\Admin\profile;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\notificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\photoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// ////////////////////test mail///////////////
// Route::get('/send-test-email', function () {
//     try {
//         $details = [
//             'title' => 'Test Email from Laravel',
//             'body' => 'This is a test email sent using Mailtrap SMTP.'
//         ];

//      Mail::raw($details['body'], function ($message) use ($details) {
//         $message->from('your-email@example.com', 'Your Name');
//         $message->to('mohamed.abbass356@gmail.com');
//         $message->subject($details['title']);
//     });

//     return 'Email sent successfully!';
// } catch (\Exception $e) {
//     return 'Error: ' . $e->getMessage();
// }
// });

Route::get("/category", [CategoryController::class, 'index'])->name('category');

// //////////////product////////////////

Route::get("/product", [ProductController::class, 'index'])->name('product');
Route::get("/products/{id}", [ProductController::class, 'show'])->name('products');
Route::get("/singleproduct/{id}", [ProductController::class, 'show3'])->name('singleproduct');
// ////////////////////news//////////////////
Route::get("/ViewNews", [NewsController::class, 'index1'])->name('ViewNews');
// ///////////////////////cart//////////////////////////////// //
Route::middleware('auth')->middleware('blocked')->group(function () {
    Route::get("/MyCart", [CartController::class, 'index'])->name('MyCart');
    Route::post("/AddCart", [CartController::class, 'store'])->name('AddCart');
    Route::post("/updateCart/{id}", [CartController::class, 'update'])->name('updateCart');
    Route::get("/MyCart", [CartController::class, 'index'])->name('MyCart');
    Route::get("/deletitem/{id}", [CartController::class, 'destroy'])->name('deletitem');
    Route::get("/buyitem/{id}", [CartController::class, 'changes'])->name('buyitem');
    Route::get("/confirmeitem/{id}", [CartController::class, 'Confirme'])->name('confirmeitem');
});




// ///////////////////////////////////////////////////////////////////////////////
// Route::get("/product/{id}", [ProductController::class, 'show'])->name('product');
// Route::get('product/{catid?}', function ($catid = null) {
//     if ($catid == null) {
//         $products = DB::table('products')->get();
//         return view('product', ['products' => $products,'catid'=>$catid]);
//     } else {
//         $products = DB::table('products')->where('categoryID', $catid)->get();
//         return view('product', ['products' => $products,'catid'=>$catid]);
//     }
// });











// ///////////////////////////////////////// ADMIN //////////////////////////////////////////
Route::prefix('admin84')->group(function () {
    Route::get('/', [Admincontroller::class, 'showLoginForm'])->name('admin_showLoginForm');
    Route::post('/login', [Admincontroller::class, 'login'])->name('admin_login');
    Route::get('/logout', [Admincontroller::class, 'logout'])->name('admin_logout');

    Route::get('/forget-password', [Admincontroller::class, 'forget_password'])->name('admin_forget_password');

    Route::post('/forget-password-submit', [Admincontroller::class, 'forget_password_submit'])->name('admin_forget_password_submit');

    Route::get('/rest-password/{remember_token}/{email}', [Admincontroller::class, 'rest_password'])->name('admin_rest_password');
    Route::post('/rest-password-submit', [Admincontroller::class, 'rest_password_submit'])->name('admin_rest_password_submit');
});



Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [Admincontroller::class, 'dashboard'])->name('admin_dashboard');
    Route::get('/profile', [profile::class, 'index'])->name('admin_profile');
    Route::get('/adminsList', [profile::class, 'index2'])->name('admins');
    Route::get("/creatAdmin", [profile::class, 'create'])->name('CreateAdmin');
    Route::post("/createAd", [profile::class, 'store'])->name('creatAd');
    Route::get("/EditAdmin/{id}", [profile::class, 'edit'])->name('EditAdmin');
    Route::post("/UpdateAdmin/{id}", [profile::class, 'update'])->name('UpdateAdmin');
    Route::get("/DeletAdmin/{id}", [profile::class, 'destroy'])->name('DeletAdmin');
    // ////////////////////////categories///////////////////////////

    Route::get("/viewCatA", [CategoryController::class, 'indexA'])->name('viewCatA');
    Route::get("/Addcat", [CategoryController::class, 'create'])->name('CreateC');
    Route::post("/AddCatA", [CategoryController::class, 'store'])->name('creatCat');
    Route::get("/EditCat/{id}", [CategoryController::class, 'edit'])->name('EditCat');
    Route::post("/UpdateC/{id}", [CategoryController::class, 'update'])->name('UpdateCat');
    Route::get("/deletCat/{id}", [CategoryController::class, 'destroy'])->name('DeletCat');

    // ////////////////////////// products ////////////////////////////////

    Route::get("/viewproA", [ProductController::class, 'indexA'])->name('ProductA');
    Route::get("/viewcatPro/{id}", [ProductController::class, 'show1'])->name('cat_product_admin');
    Route::get("/viewPro/{id}", [ProductController::class, 'show2'])->name('product_admin');
    Route::get("/Addp", [ProductController::class, 'create'])->name('CreateP');
    Route::post("/AddPro", [ProductController::class, 'store'])->name('creatPro');
    Route::get("/EditPro/{id}", [ProductController::class, 'edit'])->name('EditPro');
    Route::post("/UpdatePro/{id}", [ProductController::class, 'update'])->name('UpdatePro');
    Route::get("/DeletPro/{id}", [ProductController::class, 'destroy'])->name('DeletPro');
    Route::get("/product_image/{id}", [photoController::class, 'create'])->name('product_image');
    Route::post("/AddPro_image/{id}", [photoController::class, 'store'])->name('AddPro_image');
    Route::get("/Editphotos/{id}", [photoController::class, 'edit'])->name('Editphotos');
    Route::post("/UpdatePhoto/{id}", [photoController::class, 'update'])->name('UpdatePhoto');

    //////////////////////////////////////Orders////////////////////////////////

    Route::get("/viewOrders", [OrderController::class, 'index'])->name('viewOrders');
    Route::get("/order/{id}", [OrderController::class, 'show'])->name('order');
    Route::get("/accept/{id}", [OrderController::class, 'accept'])->name('accept');
    Route::get("/complete/{id}", [OrderController::class, 'complete'])->name('complete');
    Route::get("/notify", [OrderController::class, 'notify'])->name('notify');
    // /////////////////news////////////////////////////
    Route::get("/viewNewsA", [NewsController::class, 'index'])->name('viewNewsA');
    Route::get("/ViewNew/{id}", [NewsController::class, 'show'])->name('ViewNew');
    Route::get("/VAddNews", [NewsController::class, 'create'])->name('VAddNews');
    Route::post("/CreateNews", [NewsController::class, 'store'])->name('CreateNews');
    Route::get("/EditView/{id}", [NewsController::class, 'edit'])->name('EditView');
    Route::post("/UpdateNews/{id}", [NewsController::class, 'update'])->name('UpdateNews');
    Route::get("/deletNew/{id}", [NewsController::class, 'destroy'])->name('deletNew');
    ///////////////////// about//////////////////////////
    Route::get("/viewAboutA", [AboutController::class, 'index'])->name('viewAboutA');
    Route::get("/viewAbout", [AboutController::class, 'index1'])->name('viewAbout');
    Route::get("/EditAbout/{id}", [AboutController::class, 'edit'])->name('EditAbout');
    Route::post("/UpdateAbout/{id}", [AboutController::class, 'update'])->name('UpdateAbout');
    // //////////////////users////////////////////////////////////////
    Route::get("/usersA", [UserController::class, 'index'])->name('usersA');
    Route::get("/blockUsers/{id}", [UserController::class, 'block'])->name('blockUsers');
    Route::get("/unblockUsers/{id}", [UserController::class, 'unblock'])->name('unblockUsers');
});



// ///////////////////Authanticate///////////////////////


Route::get('/home', function () {
    $news = DB::table('news')->get();
    $categories =  DB::table('categories')->get();

    return view('dashboard', ['categories' => $categories, 'news' => $news]);
})->name('home');

Route::middleware('auth')->middleware('blocked')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::fallback(function () {
    abort(404);
});
