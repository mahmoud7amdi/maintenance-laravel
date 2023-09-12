<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllUserController ;
use App\Http\Controllers\AdminController ;
use App\Http\Middleware\RedirectIfAuthenticated ;
use App\Http\Controllers\Backend\CategoryController ;
use App\Http\Controllers\Backend\SubCategoryController ;
use App\Http\Controllers\Backend\ShippingAreaController ;
use App\Http\Controllers\Backend\CouponController ;
use App\Http\Controllers\Backend\RoleController ;
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





//translation

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...


        //Home Page

    Route::get('/', function () {
        return view('frontend.index');
    });





//Admin Dashboard

    Route::middleware(['auth','role:admin'])->group(function (){
        Route::get('admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
        Route::get('admin/logout',[AdminController::class,'AdminLogout'])->name('admin.logout');
        Route::get('admin/change/password',[AdminController::class,'AdminChangePassword'])->name('admin.change.password');
        Route::post('admin/update/password',[AdminController::class,'AdminUpdatePassword'])->name('update.password');
        Route::get('admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');
        Route::post('admin/profile/update',[AdminController::class,'AdminUProfileUpdate'])->name('admin.profile.update');
    });
    Route::get('admin/login', [AdminController::class,'AdminLogin'])->middleware(RedirectIfAuthenticated::class);


//All Admin Controller





     Route::middleware(['auth','role:admin'])->group(function (){

         //category Controller

         Route::controller(CategoryController::class)->group(function (){
             Route::get('all/category','AllCategory')->name('all.category');
             Route::get('add/category','AddCategory')->name('add.category');
             Route::post('store/category','StoreCategory')->name('store.category');
             Route::get('edit/category/{id}','EditCategory')->name('edit.category');
             Route::post('update/category','UpdateCategory')->name('update.category');
             Route::get('delete/category/{id}','DeleteCategory')->name('delete.category');
         });



       //subcategory Controller
         Route::controller(SubCategoryController::class)->group(function (){
             Route::get('all/subcategory','AllSubCategory')->name('all.subcategory');
             Route::get('add/subcategory','AddSubCategory')->name('add.subcategory');
             Route::post('store/subcategory','StoreSubCategory')->name('store.subcategory');
             Route::get('edit/subcategory/{id}','EditSubCategory')->name('edit.subcategory');
             Route::post('update/subcategory','UpdateSubCategory')->name('update.subcategory');
             Route::get('delete/subcategory/{id}','DeleteSubCategory')->name('delete.subcategory');
             Route::get('subcategory/ajax/{category_id}','GetSubcategory');



         });



           //  Shipping Division routes


         Route::controller(ShippingAreaController::class)->group(function (){
             Route::get('all/division','AllDivision')->name('all.division');
             Route::get('add/division','AddDivision')->name('add.division');
             Route::post('store/division','StoreDivision')->name('store.division');
             Route::get('edit/division/{id}','EditDivision')->name('edit.division');
             Route::post('update/division','UpdateDivision')->name('update.division');
             Route::get('delete/division/{id}','DeleteDivision')->name('delete.division');




         });



         //  Shipping District routes

         Route::controller(ShippingAreaController::class)->group(function (){
             Route::get('all/district','AllDistrict')->name('all.district');
             Route::get('add/district','AddDistrict')->name('add.district');
             Route::post('store/district','StoreDistrict')->name('store.district');
             Route::get('edit/district/{id}','EditeDistrict')->name('edit.district');
             Route::post('update/district','UpdateDistrict')->name('update.district');
             Route::get('delete/district/{id}','DeleteDistrict')->name('delete.district');




         });




         //  Shipping State routes


         Route::controller(ShippingAreaController::class)->group(function (){
             Route::get('all/state','AllState')->name('all.state');
             Route::get('add/state','AddState')->name('add.state');
             Route::post('store/state','StoreState')->name('store.state');
             Route::get('edit/state/{id}','EditeState')->name('edit.state');
             Route::post('update/state','UpdateState')->name('update.state');
             Route::get('delete/state/{id}','DeleteState')->name('delete.state');
             Route::get('district/ajax/{division_id}','GetDistrict');




         });




         // All Coupon routes
         Route::controller(CouponController::class)->group(function (){
             Route::get('all/coupon','AllCoupon')->name('all.coupon');
             Route::get('add/coupon','AddCoupon')->name('add.coupon');
             Route::post('store/coupon','StoreCoupon')->name('store.coupon');
             Route::get('edit/coupon/{id}','EditCoupon')->name('edit.coupon');
             Route::post('update/coupon','UpdateCoupon')->name('update.coupon');
             Route::get('delete/coupon/{id}','DeleteCoupon')->name('delete.coupon');




         });




         //All Role & Permission

         Route::controller(RoleController::class)->group(function (){
             Route::get('all/permission','AllPermission')->name('all.permission');
             Route::get('add/permission','AddPermission')->name('add.permission');
             Route::post('store/permission','StorePermission')->name('store.permission');
             Route::get('edit/permission/{id}','EditPermission')->name('edit.permission');
             Route::post('update/permission','UpdatePermission')->name('update.permission');
             Route::get('delete/permission/{id}','DeletePermission')->name('delete.permission');



         });




         //All Role & Permision
         Route::controller(RoleController::class)->group(function (){
             Route::get('all/roles','AllRoles')->name('all.roles');
             Route::get('add/roles','AddRoles')->name('add.roles');
             Route::post('store/Roles','StoreRoles')->name('store.roles');
             Route::get('edit/roles/{id}','EditRoles')->name('edit.roles');
             Route::post('update/roles','UpdateRoles')->name('update.roles');
             Route::get('delete/roles/{id}','DeleteRoles')->name('delete.roles');



             Route::get('add/roles/permission','AddRolesPermission')->name('add.roles.permission');
             Route::post('role/permission/store','RolePermissionStore')->name('role.permission.store');
             Route::get('all/roles/permission','AllRolesPermission')->name('all.roles.permission');
             Route::get('admin/edit/roles/{id}','AdminRolesEdit')->name('admin.edit.roles');
             Route::post('admin/update/roles/{id}','AdminUpdateRoles')->name('admin.roles.update');
             Route::get('admin/delete/roles/{id}','AdminDeleteRoles')->name('admin.delete.roles');



         });




         Route::controller(AdminController::class)->group(function (){
             Route::get('all/admin','AllAdmin')->name('all.admin');
             Route::get('add/admin','AddAdmin')->name('add.admin');
             Route::post('admin/user/store','AdminUserStore')->name('admin.user.store');
             Route::get('edit/admin/role/{id}','EditAdminRole')->name('edit.admin.role');
             Route::post('admin/user/update/{id}','AdminUserUpdate')->name('admin.user.update');
             Route::get('delete/admin/role/{id}','DeleteAdminRoles')->name('admin.delete.role');



         });








     });





//user Dashboard

    Route::controller(AllUserController::class)->group(function () {

        Route::get('user/change/password','UserChangePassword')->name('user.change.password');
        Route::post('user/update/password','UserUpdatePassword')->name('user.update.password');
        Route::get('user/account/page','UserAccountPage')->name('user.account.page');
        Route::post('user/profile/update','UserProfileUpdate')->name('user.profile.update');
    });

    Route::middleware('auth')->group(function (){
        Route::get('dashboard',[AllUserController::class,'UserDashboard'])->name('dashboard');
        Route::get('user/logout',[AllUserController::class,'userLogout'])->name('user.logout');
    });






    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

});

require __DIR__.'/auth.php';
