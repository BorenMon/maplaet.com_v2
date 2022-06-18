<?php

use App\Models\User;
use App\Models\Artwork;
use App\Models\AdminPage;
use App\Models\SavedImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', function() {
    Artisan::call('storage:link');
    return redirect()->route('login');
});
Route::get('/register', function() {
    abort(403);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    // Super Admin
    Route::group([
        'prefix' => 'superadmin',
        'middleware' => 'is_superadmin',
        'as' => 'superadmin.',
    ], function(){
        Route::get('/dashboard', 'SuperAdmin\SuperAdminGeneralController@dashboard')->name('dashboard');
        Route::get('/profile', 'SuperAdmin\SuperAdminGeneralController@profile')->name('profile');

        // Admin Page
        Route::resource('admin-page', 'SuperAdmin\AdminPageController')->except(['update']);
        Route::post('admin-page/{admin_page}', 'SuperAdmin\AdminPageController@update')->name('admin-page.update');
        Route::post('admin_page/search', function(Request $request){
            $admin_pages = AdminPage::where('name', 'LIKE', "%$request->search_term%")->paginate(7);
            return view('user-area.superadmin.admin-page.index', compact('admin_pages'))->with('search_term', $request->search_term);
        })->name('admin-page.search');

        // Brand Page
        Route::resource('brand-page', 'SuperAdmin\BrandPageController')->except(['update', 'index']);
        Route::post('brand-page/{brand_page}', 'SuperAdmin\BrandPageController@update')->name('brand-page.update');

        // Artwork Category
        Route::resource('artwork-category', 'SuperAdmin\ArtworkCategoryController')->except(['show', 'index']);

        // Artwork
        Route::resource('artwork', 'SuperAdmin\ArtworkController')->except(['update', 'index', 'show']);
        Route::post('artwork/{artwork}', 'SuperAdmin\ArtworkController@update')->name('artwork.update');

        // User
        Route::resource('user', 'SuperAdmin\UserController')->except(['index', 'show']);
    });

    // Normal User
    Route::group([
        'middleware' => 'is_normal_user',
    ], function(){
        Route::get('/home', 'NormalUser\NormalUserGeneralController@home')->name('home');
        Route::get('/profile', 'NormalUser\NormalUserGeneralController@profile')->name('profile');

        // User
        Route::resource('/user', 'NormalUser\UserController')->except(['show']);

        // Artwork
        Route::get('/artwork-preview/{id}', function($id){
            $artwork = Artwork::find($id);
            $artworkCategory = $artwork->artworkCategory;
            $brandPage = $artworkCategory->brandPage;
            $adminPage = $brandPage->admin_page;
            $savedImages = SavedImage::where('user_id', '=', Auth::id())->where('artwork_id', '=', $artwork->id)->get();
            
            Gate::authorize('preview_artwork', $artwork);

            return view("user-area.normal-user.artwork.$adminPage->folder_name.$brandPage->folder_name.$artworkCategory->folder_name.$artwork->number", compact('brandPage', 'artworkCategory', 'artwork', 'savedImages'));
        })->name('artwork-preview');

        // Save Artwork's Images
        Route::prefix('/saved-image')->name('saved-image.')->group(function() {
            Route::post('/store', 'NormalUser\SavedImageController@store')->name('store');
            Route::get('/destroy/{saved_image}', 'NormalUser\SavedImageController@destroy')->name('destroy');
        });
    });
});

Route::post('/user/update-telegram-id', function(Request $request){
    User::find(Auth::id())->update([
        'telegram_id' => $request->telegram_id
    ]);

    return redirect()->back();
})->name('user.update.telegram_id');