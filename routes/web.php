<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AddCartController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BaseSalaryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ExpendController;
use App\Http\Controllers\ExpendOptionsController;
use App\Http\Controllers\FAQsController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\IncomeOptionsController;
use App\Http\Controllers\ItemAdjustmentController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemSubCategoryController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSubCategooryController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleOrderController;
use App\Http\Controllers\SlideshowController;
use App\Http\Controllers\StaffInfoController;
use App\Http\Controllers\SystemProfileController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkplaceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);
Route::get('/faq', [App\Http\Controllers\WelcomeController::class,'faq']);
Route::get('/about-us', [App\Http\Controllers\WelcomeController::class, 'aboutUs']);
Route::get('/contact-us', [App\Http\Controllers\WelcomeController::class, 'contactUs']);
Route::post('/contact-us', [App\Http\Controllers\ContactController::class, 'store']);
Route::get('/search', [App\Http\Controllers\WelcomeController::class, 'search']);
Route::get('/product-details/{id}', [App\Http\Controllers\WelcomeController::class, 'getProduct']);
Route::get('/product-categories/{id}', [App\Http\Controllers\WelcomeController::class, 'getProductByCategory']);
Route::get('/products-list', [App\Http\Controllers\WelcomeController::class, 'productList']);
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);


Route::group(['prefix' => 'admin'], function () {
    Auth::routes(['register' => false]);
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard-sale', [App\Http\Controllers\DashboardSaleController::class, 'index'])->name('dashboard-sale');

    // FAQ Content
    Route::resource('/faqs', FAQsController::class);
    Route::resource('/abouts', AboutController::class);
    Route::resource('/contacts', ContactController::class);
    Route::resource('/slideshow', SlideshowController::class);
    Route::get('/slideshows-toggle-status/{id}',[App\Http\Controllers\SlideshowController::class, 'toggleStatus']);

    Route::resource('/department', DepartmentController::class);
    Route::post('/update-department', [App\Http\Controllers\DepartmentController::class, 'updateDepartment']);

    Route::resource('/positions', PositionController::class);
    Route::post('/update-positions', [App\Http\Controllers\PositionController::class, 'updatePosition']);
    Route::get('/position-exportexcel', [App\Http\Controllers\PositionController::class, 'positionExport']);
    Route::resource('/workplace', WorkplaceController::class);
    Route::post('/update-workplace', [App\Http\Controllers\WorkplaceController::class, 'updateWorkplace']);
    Route::get('/workplace-exportexcel', [App\Http\Controllers\WorkplaceController::class, 'workplaceExportExcel']);

    Route::resource('/base-salary', BaseSalaryController::class);
    Route::post('/update-base-salary', [App\Http\Controllers\BaseSalaryController::class, 'updateBaseSalary']);
    Route::resource('/staff-info', StaffInfoController::class);
    Route::get('/staff-exportexcel', [App\Http\Controllers\StaffInfoController::class, 'staffExport']);

    Route::resource('/customers', CustomerController::class);
    Route::get('/get-customer/{id}',  [App\Http\Controllers\CustomerController::class, 'getCustomer']);
    Route::post('/new-customer', [App\Http\Controllers\CustomerController::class, 'newCustomer']);
    Route::get('/customers-exportexcel', [App\Http\Controllers\CustomerController::class, 'customerExport']);

    Route::get('attachments/download/{file}', [App\Http\Controllers\AttachmentController::class, 'download']);
    Route::resource('/times', TimeController::class);
    Route::post('/update-times', [App\Http\Controllers\TimeController::class, 'updateTime']);
    Route::get('/times-exportexcel', [App\Http\Controllers\TimeController::class, 'timeExport']);

    Route::resource('/income-options', IncomeOptionsController::class);
    Route::post('/update-income-options', [App\Http\Controllers\IncomeOptionsController::class, 'updateOptionsIncome']);
    Route::get('/income-options-exportexcel', [App\Http\Controllers\IncomeOptionsController::class, 'exportExcel']);

    Route::resource('/expend-options', ExpendOptionsController::class);
    Route::post('/update-expend-options', [App\Http\Controllers\ExpendOptionsController::class, 'updateExpendOptions']);
    Route::get('/expend-options-exportexcel', [App\Http\Controllers\ExpendOptionsController::class, 'exportExcel']);

    Route::resource('quotes', QuoteController::class);
    Route::post('quote-status', [App\Http\Controllers\QuoteController::class, 'quoteStatus']);
    Route::get('quotes-print/{id}', [App\Http\Controllers\QuoteController::class, 'print']);
    Route::get('quote-exportexcel',[App\Http\Controllers\QuoteController::class, 'exportExcel']);

    Route::resource('/attendances', AttendanceController::class);
    Route::get('list-staff', [App\Http\Controllers\AttendanceController::class, 'listStaff']);
    Route::get('/filter-attendances', [App\Http\Controllers\AttendanceController::class, 'filterAttendances']);
    Route::post('/update-attendance', [App\Http\Controllers\AttendanceController::class, 'updateAttendances']);
    Route::get('/attendances-exportexcel', [App\Http\Controllers\AttendanceController::class, 'exportExcel']);

    Route::resource('/payroll', PayrollController::class);
    Route::get('payroll/summary/{id}',[App\Http\Controllers\PayrollController::class, 'summary']);

    Route::resource('/revenue', IncomeController::class);
    Route::get('incomes-exportexcel', [App\Http\Controllers\IncomeController::class, 'exportExcel']);

    Route::resource('/expend', ExpendController::class);
    Route::get('expends-exportexcel', [App\Http\Controllers\ExpendController::class, 'exportExcel']);

    Route::resource('/product-category', ProductCategoryController::class);
    Route::get('/product-category-exportexcel', [App\Http\Controllers\ProductCategoryController::class, 'exportExcel']);
    Route::get('/import-product-category', [App\Http\Controllers\ProductCategoryController::class, 'importExcelForm']);
    Route::post('/import-product-category', [App\Http\Controllers\ProductCategoryController::class, 'importExcel']);
    Route::get('/download-file', [App\Http\Controllers\DownloadController::class, 'downloadFile']);
    Route::get('/delete-file', [App\Http\Controllers\DownloadController::class, 'deleteFile']);

    Route::resource('/product-sub-category', ProductSubCategooryController::class);

    Route::resource('/productes', ProductController::class);
    Route::delete('/productes/delete-photo/{id}', [App\Http\Controllers\ProductController::class, 'deletePhoto']);
    Route::get('/transf-productes-qty/{id}', [App\Http\Controllers\ProductController::class, 'getQty']);
    Route::post('/transf-productes-qty/{id}', [App\Http\Controllers\ProductController::class, 'transfProducteQty']);
    Route::get('/productes-exportexcel', [App\Http\Controllers\ProductController::class, 'exportExcel']);
    Route::get('/get-product/{id}', [App\Http\Controllers\ProductController::class, 'getProduct']);
    Route::get('/get-products', [App\Http\Controllers\ProductController::class, 'getAllProducts']);
    Route::get('/import-product', [App\Http\Controllers\ProductController::class, 'importExcelForm']);
    Route::post('/import-product', [App\Http\Controllers\ProductController::class, 'importExcel']);
    
    Route::resource('item-category', ItemCategoryController::class);
    Route::resource('item-sub-category', ItemSubCategoryController::class);
    Route::resource('itemes', ItemController::class);
    Route::resource('adjustment', ItemAdjustmentController::class);

    Route::resource('/sales', SaleController::class);
    Route::post('/sale-status', [App\Http\Controllers\SaleController::class, 'saleStatus']);
    Route::get('/sales-cart-list', [App\Http\Controllers\SaleController::class, 'cartList']);
    Route::get('/sales-cart-list/detail/{id}', [App\Http\Controllers\SaleController::class, 'cartListDetail']);
    Route::get('/sale-report', [App\Http\Controllers\SaleController::class, 'Report']);
    Route::get('/sale-report/{id}', [App\Http\Controllers\SaleController::class, 'reportDetail']);
    Route::resource('/add-cart', AddCartController::class);
    Route::get('/print-add-cart/{id}', [App\Http\Controllers\AddCartController::class, 'print']);

    Route::resource('users', UserController::class);
    Route::get('/users/reset-password/{id}', [App\Http\Controllers\UserController::class, 'resetPassword']);
    Route::post('/users/update-password', [App\Http\Controllers\UserController::class, 'updatePassword']);
    Route::get('users/toggle-blocked/{id}/{blocked}', [App\Http\Controllers\UserController::class, 'toggleBlocked']);
    Route::get('/users/profile/{id}', [App\Http\Controllers\UserController::class, 'profile']);
    Route::get(' users-exportexcel', [App\Http\Controllers\UserController::class, 'exportExcel']);
    Route::resource('roles', RolesController::class);
    Route::resource('system-profile', SystemProfileController::class);
    Route::resource('sales-order', SaleOrderController::class);
    Route::get('sales-order-download-file/{id}', [App\Http\Controllers\SaleOrderController::class, 'getDownload']);
    Route::get('/sales-order-exportexcel', [App\Http\Controllers\SaleOrderController::class, 'exportExcel']);
    Route::get('/sales-order/print/{id}', [App\Http\Controllers\SaleOrderController::class, 'print']);

    Route::resource('purchase-order', PurchaseOrderController::class);
    Route::get('purchase-order-exportexcel', [App\Http\Controllers\PurchaseOrderController::class, 'exportExcel']);

    #Display all notifications to Admin
    Route::get('/notification', [App\Http\Controllers\NotificationController::class,'showNotificaton']);
    #Notification mark as Read
    Route::get('/mark-as-read/{type}/{id}',[App\Http\Controllers\NotificationController::class, 'markNotification'])->name('markNotification');
    Route::get('/mark-as-read', [App\Http\Controllers\NotificationController::class,'markAsRead'])->name('mark-as-read');
});
