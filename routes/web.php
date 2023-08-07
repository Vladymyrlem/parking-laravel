<?php

    use App\Http\Controllers\ReviewsController;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\InformationController;
    use App\Http\Controllers\AboutusController;

//    use App\Http\Controllers\PriceControler;
    use App\Http\Controllers\PricesController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\ReservationController;
    use App\Http\Controllers\KontaktsController;
    use App\Http\Controllers\SectionTitleController;
    use App\Http\Controllers\ServicesController;
    use App\Http\Controllers\NewsletterController;
    use App\Http\Controllers\ContentController;
    use App\Http\Controllers\ParkingController;

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

    Auth::routes();

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware('auth')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::post('admin', [AdminController::class, 'index'])->name('admin.store');
        Route::view('about', 'about')->name('about');
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::view('activity', 'pages.activity')->name('activity');
        Route::get('prices', [PricesController::class, 'index']);
        Route::get('/admin/prices/{price_id?}', [PricesController::class, 'showPrices']);
        Route::post('/admin/prices', [PricesController::class, 'storePrices']);
        Route::put('/admin/prices/{price_id?}', [PricesController::class, 'updatePrices']);
        Route::delete('/admin/prices/{price_id}', [PricesController::class, 'destroyPrices']);
        Route::post('/admin/reservations', [AdminController::class, 'reservations']);
        Route::post('/save-reservations', [ReservationController::class, 'saveReservations'])->name('save-reservations');

        Route::post('/send-order', [ParkingController::class, 'orderParking']);
        Route::get('/get-order', [ParkingController::class, 'orderParking']);
        Route::post('/submit-order', [ParkingController::class, 'storeParking']);
        Route::post('/submit-order/{order_id}', [ParkingController::class, 'showParking']);
        Route::delete('/submit-order/{order_id}', [ParkingController::class, 'destroy']);
        /*Header block*/
        Route::get('/headblock', 'AdminController@index');

// Populate Data in Edit Modal Form
        Route::get('/admin/headblock/{headblock_id?}', [AdminController::class, 'showHeaderBlock']);

//create New headblock
        Route::post('/admin/headblock', [AdminController::class, 'storeHeaderBlock']);
        Route::post('/admin/upload', 'InformationController@uploadFile')->name('uploadFile');

// update Existing headblock
        Route::put('/admin/headblock/{headblock_id}', [AdminController::class, 'updateHeaderBlock']);


// delete headblock
        Route::delete('/admin/headblock/{headblock_id}', [AdminController::class, 'destroyHeaderBlock']);

        /*About Us Block*/
        Route::get('admin/aboutus', [AboutusController::class, 'index']);
        Route::get('/admin/aboutus/{aboutus_id}', [AboutusController::class, 'showAboutAsBlock']);
        Route::post('/admin/aboutus', [AboutusController::class, 'storeAboutAsBlock'])->name('admin.aboutus');
        Route::put('/admin/aboutus/{aboutus_id}', [AboutusController::class, 'updateAboutAsBlock']);
        /*Info block*/
        Route::get('admin/infos', [InformationController::class, 'index']);
        Route::get('/admin/infos/{info_id}', [InformationController::class, 'showInformation']);
        Route::post('/admin/infos', [InformationController::class, 'storeInformation'])->name('admin.infos');
        Route::put('/admin/infos/{info_id}', [InformationController::class, 'updateInformation']);
        Route::delete('/admin/infos/{info_id}', [InformationController::class, 'destroyInformation']);

        /*Services block*/
        Route::get('admin/services', [AdminController::class, 'index']);
        Route::get('/admin/services/{service_id}', [ServicesController::class, 'show']);
        Route::post('/admin/services', [ServicesController::class, 'store'])->name('admin.create.service');
        Route::get('/admin/services/edit/{service_id}', [ServicesController::class, 'edit'])->name('admin.edit.services');
        Route::put('/admin/services/update/{service_id}', [ServicesController::class, 'update'])->name('admin.update.services');
        Route::delete('/admin/services/delete/{service_id}', [ServicesController::class, 'destroy']);
        /*Reviews*/
        Route::get('admin/reviews', [AdminController::class, 'index']);
// Populate Data in Edit Modal Form
        Route::get('/admin/reviews/{review_id?}', [ReviewsController::class, 'showReview']);
//create New review
        Route::post('/admin/reviews', [ReviewsController::class, 'storeReview']);
// update Review
        Route::put('/admin/reviews/{review_id}', [ReviewsController::class, 'updateReview']);
// delete Review
        Route::delete('/admin/reviews/{review_id}', [ReviewsController::class, 'destroyReview']);
        /*Contacts Data*/
        Route::get('admin/contacts', [AdminController::class, 'index']);
// Populate Data in Edit Modal Form
        Route::get('/admin/contacts/{contact_id}', [KontaktsController::class, 'showContact']);
//create New review
        Route::post('/admin/contacts', [KontaktsController::class, 'storeContact']);
// update Contacts
        Route::put('/admin/contacts/{contact_id}', [KontaktsController::class, 'updateContact']);
        /*Text Content*/
        Route::get('admin/contents', [AdminController::class, 'index']);
// Populate Data in Edit Modal Form
        Route::get('/admin/contents/{content_id}', [ContentController::class, 'showContent']);
//create New Text Content
        Route::post('/admin/contents', [ContentController::class, 'storeContent']);

        Route::delete('/admin/contents/{content_id}', [ContentController::class, 'destroyContent']);

// update Contents
        Route::put('/admin/contents/{content_id}', [ContentController::class, 'updateContent']);

        /*Section Title*/
        Route::get('admin/sectiontitle', [AdminController::class, 'index']);
// Populate Data in Edit Modal Form
        Route::get('/admin/sectiontitle/{sectiontitle_id}', [SectionTitleController::class, 'showSectionTitle']);
//create New Sectiontitle
        Route::post('/admin/sectiontitle', [SectionTitleController::class, 'storeSectionTitle']);
// update Sectiontitle
        Route::put('/admin/sectiontitle/{sectiontitle_id}', [SectionTitleController::class, 'updateSectionTitle']);
// delete Sectiontitle
        Route::delete('/admin/sectiontitle/{sectiontitle_id}', [SectionTitleController::class, 'destroySectionTitle']);
        /*Resrvation get data*/
        Route::get('/admin/reservation-dates', [AdminController::class, 'getReservationDates']);
        Route::post('/admin', [AdminController::class, 'storeContent'])->name('admin.content');
        Route::post('/admin/upload/images', [AdminController::class, 'uploadImage'])->name('upload.post.image');
        Route::post('/subscribe', [AdminController::class, 'subscribe'])->name('subscribe');
        /*Newsletter*/
        Route::get('admin/newsletter', [AdminController::class, 'index']);
// Populate Data in Edit Modal Form
        Route::get('/admin/newsletter/{newsletter_id}', [NewsletterController::class, 'showNewsletter']);
//create New review
        Route::post('/admin/newsletter', [NewsletterController::class, 'storeNewsletter']);
// update Contacts
        Route::put('/admin/newsletter/{newsletter_id}', [NewsletterController::class, 'updateNewsletter']);
    });
