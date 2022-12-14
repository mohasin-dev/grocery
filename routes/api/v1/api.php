<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CartController;
use App\Http\Controllers\Api\V1\TestController;
use App\Http\Controllers\Api\V1\TypeController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\BrandController;
use App\Http\Controllers\Api\V1\LoginController;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\PromoController;
use App\Http\Controllers\Api\V1\StoreController;
use App\Http\Controllers\Api\V1\BannerController;
use App\Http\Controllers\Api\V1\BuyNowController;
use App\Http\Controllers\Api\V1\AddressController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\CheckoutController;
use App\Http\Controllers\Api\V1\RegisterController;
use App\Http\Controllers\Api\V1\NutritionController;
use App\Http\Controllers\Api\V1\OrderRatingController;
use App\Http\Controllers\Api\V1\SocialLoginController;
use App\Http\Controllers\Api\V1\SavedProductController;
use App\Http\Controllers\Api\V1\PaymentMethodController;
use App\Http\Controllers\Api\V1\PaypalPaymentController;
use App\Http\Controllers\Api\V1\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
|
| if you want to add api v2, add a v2 folder with api.php
| and update app/Providers/RouteServiceProvider.php with new code block
|
*/

Route::get('test', [TestController::class, 'test']);

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::get('/login/{provider}', [SocialLoginController::class, 'redirectToProvider']);
Route::get('/callback/{provider}', [SocialLoginController::class, 'handleProviderCallback']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('test-auth', [TestController::class, 'testAuth']);

    Route::get('logout', [LoginController::class, 'logout']);

    Route::post('send-otp', [ResetPasswordController::class, 'sendOtp']);
    Route::post('reset-password', [ResetPasswordController::class, 'resetPassword']);

    Route::get('profile', [ProfileController::class, 'getProfile']);
    Route::post('profile', [ProfileController::class, 'updateProfile']);
    Route::post('change-password', [LoginController::class, 'changePassword']);

    Route::get('get-cart', [CartController::class, 'getCart']);
    Route::post('add-to-cart', [CartController::class, 'addToCart']);
    Route::post('add-to-cart-multiple-product', [CartController::class, 'addToCartMultipleProduct']);
    Route::get('cart-product/{id}', [CartController::class, 'getCartProducts']);
    Route::get('cart-product-remove/{id}', [CartController::class, 'destroy']);

    Route::post('apply-promo', [CartController::class, 'applyPromo']);
    Route::post('checkout', [CheckoutController::class, 'checkout']);
    Route::get('stripe_payment_success/{invoice_id}', [CheckoutController::class, 'paymentSuccess'])->name('stripe_payment_success');
    Route::get('stripe_payment_failed/{invoice_id}', [CheckoutController::class, 'paymentFailed'])->name('stripe_payment_failed');

    Route::post('add-address', [AddressController::class, 'store']);
    Route::get('get-addresses', [AddressController::class, 'getAddresses']);
    Route::get('address-details/{id}', [AddressController::class, 'addressDetails']);

    Route::get('get-saved-product', [SavedProductController::class, 'getSavedProducts']);
    Route::post('add-saved-product', [SavedProductController::class, 'addSavedProduct']);
    Route::post('remove-saved-product', [SavedProductController::class, 'removeSavedProduct']);

    Route::get('payment-method', [PaymentMethodController::class, 'getPaymentMethod']);
    Route::get('payment-method-details/{id}', [PaymentMethodController::class, 'paymentMethodDetails']);

    Route::post('buy-now', [BuyNowController::class, 'buyNow']);

    Route::get('get-referral-code', [UserController::class, 'getReferralCode']);

    Route::post('date-of-birth', [UserController::class, 'addDateOfBirth']);

    Route::get('order-list', [OrderController::class, 'orderList']);
    Route::get('order-details/{id}', [OrderController::class, 'OrderDetails']);
    Route::post('order-rating', [OrderRatingController::class, 'addOrderRating']);
});

Route::get('category', [CategoryController::class, 'getCategories']);
Route::get('category/{id}', [CategoryController::class, 'categoryDetails']);

Route::get('banner', [BannerController::class, 'getBanners']);
Route::get('banner/{id}', [BannerController::class, 'bannerDetails']);

Route::get('brand', [BrandController::class, 'getBrands']);
Route::get('brand/{id}', [BrandController::class, 'brandDetails']);

Route::get('store', [StoreController::class, 'getStores']);
Route::get('store/{id}', [StoreController::class, 'storeDetails']);

Route::get('type', [TypeController::class, 'getTypes']);

Route::get('product', [ProductController::class, 'getProducts']);
Route::get('product/{id}', [ProductController::class, 'productDetails']);
Route::get('product-search', [ProductController::class, 'searchProduct']);
Route::get('product-filter', [ProductController::class, 'filterProduct']);


Route::get('promo', [PromoController::class, 'getPromos']);
Route::get('promo/{id}', [PromoController::class, 'promoDetails']);

Route::get('nutrition', [NutritionController::class, 'getNutritions']);
Route::get('nutrition/{id}', [NutritionController::class, 'nutritionDetails']);

// route for processing payment
Route::post('paypal-pay', 'PaypalPaymentController@payWithpaypal');

// route for check status of the payment
Route::get('paypal-status', 'PaypalPaymentController@getPaymentStatus');
