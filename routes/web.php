<?php

use App\Http\Controllers\Example\FirstController;
use App\Http\Controllers\Example\SecondController;
use App\Http\Controllers\LearnController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    // dd(app());
    return view('welcome');
    // cache()->put('hello','world');
    // dd(cache()->get('hello'));
    // Cache::put('hello','world');
    // dd(cache()->get('hello'));
});
Route::get('/validate', function () {
    return view('validate');
});

// Route::get("/about", function (Request $request) {
//     // dd(app());
//     $token = $request->session()->token();
//     $token = csrf_token();
//     dd($token);
//     return view('about');
//     // return redirect('/contact');

// })->name('about.us');

// Route::view('/about','about');

Route::get('/about', [FirstController::class, 'index'])->name('about.us');
Route::get('/laravel', [FirstController::class, 'laravel'])->name('laravel');
Route::get('/testone', [SecondController::class, 'test']);
Route::get('/testSession', function (Request $request) {
    // session(['name' => 'sujon']);
    // $request->session()->put('age', 24);
    $logfile = file(storage_path() . '/logs/contact.log');
    $collection = [];
    foreach ($logfile as $line_number => $line) {
        $collection[] = array('line' => $line_number, 'content' => htmlspecialchars($line));
    }
    dd($collection);
});
Route::get('/all', function (Request $request) {
    // session(['name' => 'sujon']);
    return $request->session()->all();
    $request->session()->flush();
});

//__invokable route__//
Route::get('/testinvo', LearnController::class);

Route::get('/contact', function () {
    // dd(app());
    // return view('contact');
    abort(401);

})->name('contact.us');

Route::get('/country', [FirstController::class, 'country'])->name('country')->middleware('country');

// Route::resource('photos', PhotoController::class);

// Route::get('/country', function () {
//     // dd(app());
//     return view('country');

// })->middleware('country'); // karnal registered name

// Route::get('/contact/{roll}', function ($roll) {
//     // dd(app());
//     return "My roll is {$roll}";

// });

Route::get('/test', function () {
    // return "Test";
    app()->make("first_service_helper");
});

Route::post('/student/store', [FirstController::class, 'Studentstore'])->name('student.store');
Route::post('/store/contact', [FirstController::class, 'store'])->name('store.contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
