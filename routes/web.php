<?php
# Backend Controllers

use App\Http\Controllers\Api\AboutUsApiController;
use App\Http\Controllers\Api\CardsApiController;
use App\Http\Controllers\Api\ClientsApiController;
use App\Http\Controllers\Api\OurSolutionApiController;
use App\Http\Controllers\Api\ServicesApiController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BackendAdminController;
use App\Http\Controllers\Backend\BackendNotificationsController;
use App\Http\Controllers\Backend\BackendHelperController;
use App\Http\Controllers\Backend\BackendTestController;
use App\Http\Controllers\Backend\BackendProfileController;
use App\Http\Controllers\Backend\BackendArticleController;
use App\Http\Controllers\Backend\BackendArticleCommentController;
use App\Http\Controllers\Backend\BackendSiteMapController;
use App\Http\Controllers\Backend\BackendSettingController;
use App\Http\Controllers\Backend\BackendContactController;
use App\Http\Controllers\Backend\BackendCategoryController;
use App\Http\Controllers\Backend\BackendRedirectionController;
use App\Http\Controllers\Backend\BackendUserController;
use App\Http\Controllers\Backend\BackendTrafficsController;
use App\Http\Controllers\Backend\BackendPageController;
use App\Http\Controllers\Backend\BackendMenuController;
use App\Http\Controllers\Backend\BackendMenuLinkController;
use App\Http\Controllers\Backend\BackendFileController;
use App\Http\Controllers\Backend\BackendFaqController;
use App\Http\Controllers\Backend\BackendContactReplyController;
use App\Http\Controllers\Backend\BackendAnnouncementController;
use App\Http\Controllers\Backend\BackendPermissionController;
use App\Http\Controllers\Backend\BackendUserPermissionController;
use App\Http\Controllers\Backend\BackendUserRoleController;
use App\Http\Controllers\Backend\BackendRoleController;
use App\Http\Controllers\Backend\BackendTagController;
use App\Http\Controllers\Backend\BackendPluginController;
use App\Http\Controllers\Backend\BackendUserwebsiteController;
use App\Http\Controllers\Backend\frontEndController\GetSearchedController;
use App\Http\Controllers\Backend\frontEndController\ApiController;
use App\Http\Controllers\back\ServicesController;
use App\Http\Controllers\back\AboutUsController;
use App\Http\Controllers\back\CardsController;
use App\Http\Controllers\back\ClientsController;
use App\Http\Controllers\back\ContactUsController;
use App\Http\Controllers\back\SliderController;
use App\Http\Controllers\back\OurSolutionController;
use App\Http\Controllers\Backend\BackendMessageController;
use App\Http\Controllers\Backend\frontEndController\indexController;
# Frontend Controllers
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontendProfileController;
use App\Http\Controllers\PageGeneratorController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/index3', function(){return view('front.index3');})->name('index3');



//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize:clear');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});



// post_type
Route::get('/makeemail', function () {

    Artisan::call('optimize');
    return 'cache cache has clear successfully !';
});

############################################# Form add Subcripe ######################################################

Route::post('/store/data', [BackendUserwebsiteController::class,'store'])->name('store.data');
Route::match(['get' , 'post'],'/edit/data/{id}', [BackendUserwebsiteController::class,'edit'])->name('edit.data');
Route::post('/update/data/{id}', [BackendUserwebsiteController::class,'update'])->name('update.data');
Route::post('/destroy/data/{id}', [BackendUserwebsiteController::class,'destroy'])->name('destroy.data');
// Route::post('/store', [BackendUserwebsiteController::class,'store'])->name('edit.data');


############################################# End Form add Subcripe ######################################################
Route::get('page/search/', [GetSearchedController::class,'search'])->name('search');
Route::get('search/', [GetSearchedController::class,'DoSearchDB'])->name('searchDB');
Route::get('details/{id}/{name}', [indexController::class,'show'])->name('showMore');
Route::get('valid/page.html/', [GetSearchedController::class,'searchValid'])->name('moveValidd');
Route::get('validd/', [GetSearchedController::class,'validating'])->name('vald');


Route::get('success/', function(){
  return view('Frontend.successfully');
});

// Route::get('/', [FrontController::class,'index'])->name('home');
Route::get('/index2', function(){return view('front.index2');})->name('index2');



Route::prefix('dashboard')->middleware(['auth','ActiveAccount','verified'])->name('user.')->group(function () {
    Route::get('/', [FrontendProfileController::class,'dashboard'])->name('dashboard');
    Route::get('/support', [FrontendProfileController::class,'support'])->name('support');
    Route::get('/support/create-ticket', [FrontendProfileController::class,'create_ticket'])->name('create-ticket');
    Route::post('/support/create-ticket', [FrontendProfileController::class,'store_ticket'])->name('store-ticket');
    Route::get('/support/{ticket}', [FrontendProfileController::class,'ticket'])->name('ticket');
    Route::post('/support/{ticket}/reply', [FrontendProfileController::class,'reply_ticket'])->name('reply-ticket');
    Route::get('/notifications', [FrontendProfileController::class,'notifications'])->name('notifications');
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/settings',[FrontendProfileController::class,'profile_edit'])->name('edit');
        Route::put('/update',[FrontendProfileController::class,'profile_update'])->name('update');
        Route::put('/update-password',[FrontendProfileController::class,'profile_update_password'])->name('update-password');
        Route::put('/update-email',[FrontendProfileController::class,'profile_update_email'])->name('update-email');
    });
});
    Route::get('updateStatusForAllUsers',[BackendUserwebsiteController::class,'updateStatusForAllUsers'])->name('updateStatusForAllUsers');
Route::get('usersWebsite/functionshowDetailsUserWebsite/{id}',[BackendUserwebsiteController::class,'functionshowDetailsUserWebsite'])->name('functionshowDetailsUserWebsite');

#Route::get('/test',[BackendTestController::class,'test']);

Route::prefix('admin')->middleware(['auth','ActiveAccount'])->name('admin.')->group(function () {


    Route::get('/',[BackendAdminController::class,'index'])->name('index');
    Route::middleware('auth')->group(function () {


        // Route::get('usersWebsite/functionshowDetailsUserWebsite/{id}',[BackendUserwebsiteController::class,'functionshowDetailsUserWebsite'])->name('functionshowDetailsUserWebsite');
        Route::resource('announcements',BackendAnnouncementController::class);
        Route::resource('files',BackendFileController::class);
        Route::post('contacts/resolve',[BackendContactController::class,'resolve'])->name('contacts.resolve');
        Route::resource('contacts',BackendContactController::class);
        Route::resource('menus',BackendMenuController::class);
        Route::get('users/{user}/access',[BackendUserController::class,'access'])->name('users.access');
        Route::resource('users',BackendUserController::class);
        Route::resource('messages',BackendMessageController::class);
        Route::resource('roles',BackendRoleController::class);
        Route::get('user-roles/{user}',[BackendUserRoleController::class,'index'])->name('users.roles.index');
        Route::put('user-roles/{user}',[BackendUserRoleController::class,'update'])->name('users.roles.update');
        Route::resource('articles',BackendArticleController::class);
        Route::post('article-comments/change_status',[BackendArticleCommentController::class,'change_status'])->name('article-comments.change_status');
        Route::resource('article-comments',BackendArticleCommentController::class);
        Route::resource('pages',BackendPageController::class);
        Route::resource('usersWebsite',BackendUserwebsiteController::class);
        Route::resource('tags',BackendTagController::class);
        Route::resource('contact-replies',BackendContactReplyController::class);
        Route::post('faqs/order',[BackendFaqController::class,'order'])->name('faqs.order');
        Route::resource('faqs',BackendFaqController::class);
        Route::post('menu-links/get-type',[BackendMenuLinkController::class,'getType'])->name('menu-links.get-type');
        Route::post('menu-links/order',[BackendMenuLinkController::class,'order'])->name('menu-links.order');
        Route::resource('menu-links',BackendMenuLinkController::class);
        Route::resource('categories',BackendCategoryController::class);
        Route::resource('redirections',BackendRedirectionController::class);
        Route::get('traffics',[BackendTrafficsController::class,'index'])->name('traffics.index');
        Route::get('traffics/logs',[BackendTrafficsController::class,'logs'])->name('traffics.logs');
        Route::get('error-reports',[BackendTrafficsController::class,'error_reports'])->name('traffics.error-reports');
        Route::get('error-reports/{report}',[BackendTrafficsController::class,'error_report'])->name('traffics.error-report');

        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/',[BackendSettingController::class,'index'])->name('index');
            Route::put('/update',[BackendSettingController::class,'update'])->name('update');
        });
        Route::prefix('Pages-maker')->name('Pages-maker.')->group(function (){

            Route::get('/',[PageGeneratorController::class,'index'])->name('index');
            Route::get('/create',[PageGeneratorController::class,'create'])->name('create');
            Route::post('/createPage',[PageGeneratorController::class,'createPage'])->name('createPage');
            Route::get('/{table}',[PageGeneratorController::class,'show'])->name('show');
        });

    });

    Route::prefix('upload')->name('upload.')->group(function(){
        Route::post('/image',[BackendHelperController::class,'upload_image'])->name('image');
        Route::post('/file',[BackendHelperController::class,'upload_file'])->name('file');
        Route::post('/remove-file',[BackendHelperController::class,'remove_files'])->name('remove-file');
    });

    Route::prefix('plugins')->name('plugins.')->group(function(){
        Route::get('/',[BackendPluginController::class,'index'])->name('index');
        Route::get('/create',[BackendPluginController::class,'create'])->name('create');
        Route::post('/create',[BackendPluginController::class,'store'])->name('store');
        Route::post('/{plugin}/activate',[BackendPluginController::class,'activate'])->name('activate');
        Route::post('/{plugin}/deactivate',[BackendPluginController::class,'deactivate'])->name('deactivate');
        Route::post('/{plugin}/delete',[BackendPluginController::class,'delete'])->name('delete');
    });

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/',[BackendProfileController::class,'index'])->name('index');
        Route::get('/edit',[BackendProfileController::class,'edit'])->name('edit');
        Route::put('/update',[BackendProfileController::class,'update'])->name('update');
        Route::put('/update-password',[BackendProfileController::class,'update_password'])->name('update-password');
        Route::put('/update-email',[BackendProfileController::class,'update_email'])->name('update-email');
    });

    Route::prefix('notifications')->name('notifications.')->group(function () {
        Route::get('/',[BackendNotificationsController::class,'index'])->name('index');
        Route::get('/ajax',[BackendNotificationsController::class,'ajax'])->name('ajax');
        Route::post('/see',[BackendNotificationsController::class,'see'])->name('see');
        Route::get('/create',[BackendNotificationsController::class,'create'])->name('create');
        Route::post('/create',[BackendNotificationsController::class,'store'])->name('store');
    });

// --------------------- about us -----------------------------
    Route::get('about/', [AboutUsController::class, 'index'])->name('aboutus.index');
    Route::get('about/create/', [AboutUsController::class, 'create'])->name('aboutus.create');
    Route::post('about/store/', [AboutUsController::class, 'store'])->name('aboutus.store');
    Route::get('about/edit/{id}', [AboutUsController::class, 'edit'])->name('aboutus.edit');
    Route::post('about/update/{id}', [AboutUsController::class, 'update'])->name('aboutus.update');
    Route::delete('about/destroy/{id}', [AboutUsController::class, 'destroy'])->name('aboutus.destroy');
// --------------------- servcies -----------------------------


     // ----------------------- Our Cards --------------------------
     Route::get('cards/', [CardsController::class, 'index'])->name('cards.index');
     Route::get('cards/create/', [CardsController::class, 'create'])->name('cards.create');
     Route::post('cards/store/', [CardsController::class, 'store'])->name('cards.store');
     Route::get('cards/edit/{id}', [CardsController::class, 'edit'])->name('cards.edit');
     Route::post('cards/update/{id}', [CardsController::class, 'update'])->name('cards.update');
     Route::delete('cards/destroy/{id}', [CardsController::class, 'destroy'])->name('cards.destroy');
    // ----------------------- Slider --------------------------
    Route::get('contact_us/', [ContactUsController::class, 'index'])->name('contact_us.index');
    Route::get('contact_us/create/', [ContactUsController::class, 'create'])->name('contact_us.create');
    Route::post('contact_us/store/', [ContactUsController::class, 'store'])->name('contact_us.store');
    Route::get('contact_us/edit/{id}', [ContactUsController::class, 'edit'])->name('contact_us.edit');
    Route::post('contact_us/update/{id}', [ContactUsController::class, 'update'])->name('contact_us.update');
    Route::delete('contact_us/destroy/{id}', [ContactUsController::class, 'destroy'])->name('contact_us.destroy');
    // ----------------------- Our Solution --------------------------
    Route::get('our_solution/', [OurSolutionController::class, 'index'])->name('our_solution.index');
    Route::get('our_solution/create/', [OurSolutionController::class, 'create'])->name('our_solution.create');
    Route::post('our_solution/store/', [OurSolutionController::class, 'store'])->name('our_solution.store');
    Route::get('our_solution/edit/{id}', [OurSolutionController::class, 'edit'])->name('our_solution.edit');
    Route::post('our_solution/update/{id}', [OurSolutionController::class, 'update'])->name('our_solution.update');
    Route::delete('our_solution/destroy/{id}', [OurSolutionController::class, 'destroy'])->name('our_solution.destroy');


});

Route::get('/login/google/redirect', [LoginController::class,'redirect_google']);
Route::get('/login/google/callback', [LoginController::class,'callback_google']);
Route::get('/login/facebook/redirect', [LoginController::class,'redirect_facebook']);
Route::get('/login/facebook/callback', [LoginController::class,'callback_facebook']);


Route::get('blocked',[BackendHelperController::class,'blocked_user'])->name('blocked');
Route::get('robots.txt',[BackendHelperController::class,'robots']);
Route::get('manifest.json',[BackendHelperController::class,'manifest'])->name('manifest');
Route::get('sitemap.xml',[BackendSiteMapController::class,'sitemap']);
Route::get('sitemaps/links',[BackendSiteMapController::class,'custom_links']);
Route::get('sitemaps/{name}/{page}/sitemap.xml',[BackendSiteMapController::class,'viewer']);


Route::view('contact','front.pages.contact')->name('contact');
Route::get('page/{page}',[FrontController::class,'page'])->name('page.show');
Route::get('tag/{tag}',[FrontController::class,'tag'])->name('tag.show');
Route::get('category/{category}',[FrontController::class,'category'])->name('category.show');
Route::get('article/{article}',[FrontController::class,'article'])->name('article.show');
Route::get('blog',[FrontController::class,'blog'])->name('blog');
Route::post('contact',[FrontController::class,'contact_post'])->name('contact-post');
Route::post('comment',[FrontController::class,'comment_post'])->name('comment-post');

############################################# front end API ######################################################

Route::get('/', [indexController::class, 'index'])->name('home');

// Route::middleware('api.security')->group(function () {

// });





############################################# front end ######################################################
// Route::get('/', [indexController::class,'index'])->name('home');
Route::get('/successfully', [indexController::class,'successfully'])->name('successfully');
Route::get('/تسجيل_عضوية', [indexController::class,'form_record'])->name('form_record');
Route::get('/changePage/{slug}', [indexController::class,'cahngePage'])->name('cahngePage');
Route::get('/goArticel/{slug}', [indexController::class,'goArticel'])->name('goArticel');
Route::get('/التواصل', [indexController::class,'contuct'])->name('contuct');




############################################# End front end ######################################################


############################################# Exel Export ######################################################
Route::get('/exelexport/create', [App\Http\Controllers\controlPanal\ExelexportController::class, 'create'])->name('exelexport.create.web');
Route::get('/exelexport/index', [App\Http\Controllers\controlPanal\ExelexportController::class, 'index'])->name('exelexport.index.web');
Route::get('/exelexport/store', [App\Http\Controllers\controlPanal\ExelexportController::class, 'store'])->name('exelexport.store.web');
############################################# Exel Export end ##################################################

Route::get('/headercode/create', [App\Http\Controllers\controlPanal\HeadercodeController::class, 'create'])->name('headercode.create.web');
Route::get('/headercode/delete/{id}', [App\Http\Controllers\controlPanal\HeadercodeController::class, 'delete'])->name('headercode.delete.web');
Route::get('/headercode/edit/{id}', [App\Http\Controllers\controlPanal\HeadercodeController::class, 'edit'])->name('headercode.edit.web');
Route::get('/headercode/index', [App\Http\Controllers\controlPanal\HeadercodeController::class, 'index'])->name('headercode.index.web');
Route::post('/headercode/store', [App\Http\Controllers\controlPanal\HeadercodeController::class, 'store'])->name('headercode.store.web');
Route::post('/headercode/update/{id}', [App\Http\Controllers\controlPanal\HeadercodeController::class, 'update'])->name('headercode.update.web');


Route::get('/messages/delete/{id}', [App\Http\Controllers\controlPanal\MessagesController::class, 'delete'])->name('messages.delete.web');
Route::get('/messages/index', [App\Http\Controllers\controlPanal\MessagesController::class, 'index'])->name('messages.index.web');


Route::get('/service/create', [App\Http\Controllers\controlPanal\ServiceController::class, 'create'])->name('service.create.web');
Route::get('/service/delete/{id}', [App\Http\Controllers\controlPanal\ServiceController::class, 'delete'])->name('service.delete.web');
Route::get('/service/edit/{id}', [App\Http\Controllers\controlPanal\ServiceController::class, 'edit'])->name('service.edit.web');
Route::get('/service/index', [App\Http\Controllers\controlPanal\ServiceController::class, 'index'])->name('service.index.web');
Route::post('/service/store', [App\Http\Controllers\controlPanal\ServiceController::class, 'store'])->name('service.store.web');
Route::post('/service/update/{id}', [App\Http\Controllers\controlPanal\ServiceController::class, 'update'])->name('service.update.web');
Route::get('/rating/create', [App\Http\Controllers\controlPanal\RatingController::class, 'create'])->name('rating.create.web');
Route::get('/rating/delete/{id}', [App\Http\Controllers\controlPanal\RatingController::class, 'delete'])->name('rating.delete.web');
Route::get('/rating/edit/{id}', [App\Http\Controllers\controlPanal\RatingController::class, 'edit'])->name('rating.edit.web');
Route::get('/rating/index', [App\Http\Controllers\controlPanal\RatingController::class, 'index'])->name('rating.index.web');
Route::post('/rating/store', [App\Http\Controllers\controlPanal\RatingController::class, 'store'])->name('rating.store.web');
Route::post('/rating/update/{id}', [App\Http\Controllers\controlPanal\RatingController::class, 'update'])->name('rating.update.web');
Route::get('/partner/create', [App\Http\Controllers\controlPanal\PartnerController::class, 'create'])->name('partner.create.web');
Route::get('/partner/delete/{id}', [App\Http\Controllers\controlPanal\PartnerController::class, 'delete'])->name('partner.delete.web');
Route::get('/partner/edit/{id}', [App\Http\Controllers\controlPanal\PartnerController::class, 'edit'])->name('partner.edit.web');
Route::get('/partner/index', [App\Http\Controllers\controlPanal\PartnerController::class, 'index'])->name('partner.index.web');
Route::post('/partner/store', [App\Http\Controllers\controlPanal\PartnerController::class, 'store'])->name('partner.store.web');
Route::post('/partner/update/{id}', [App\Http\Controllers\controlPanal\PartnerController::class, 'update'])->name('partner.update.web');

Route::get('/mainpage/create', [App\Http\Controllers\controlPanal\MainpageController::class, 'create'])->name('mainpage.create.web');
Route::get('/mainpage/delete/{id}', [App\Http\Controllers\controlPanal\MainpageController::class, 'delete'])->name('mainpage.delete.web');
Route::get('/mainpage/edit/{id}', [App\Http\Controllers\controlPanal\MainpageController::class, 'edit'])->name('mainpage.edit.web');
Route::get('/mainpage/index', [App\Http\Controllers\controlPanal\MainpageController::class, 'index'])->name('mainpage.index.web');
Route::post('/mainpage/store', [App\Http\Controllers\controlPanal\MainpageController::class, 'store'])->name('mainpage.store.web');
Route::post('/mainpage/update/{id}', [App\Http\Controllers\controlPanal\MainpageController::class, 'update'])->name('mainpage.update.web');