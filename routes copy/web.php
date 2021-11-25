<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
if (env('APP_ENV') === 'prod') {
    URL::forceScheme('https');
} else {
    Route::get('test-auto-post-fb', function () {
        return view('test-auto-post-fb');
    });
}
Route::get('refactor-news', 'Frontend\HomeController@refactorNews')->middleware(['has-role:1,2']);
Route::group([
    'namespace' => 'Auth',
    'middleware' => ['web']
], function () {
    Route::get('/dang-ky-tai-khoan', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('/dang-ky-tai-khoan', 'RegisterController@register');

    Route::get('/{id}/xac-minh-email', 'VerifyEmailController@showVerificationForm')->name('verify-email');
    Route::post('/{id}/xac-minh-email', 'VerifyEmailController@verify');

    Route::get('/'.env('MIX_LOGIN_PATH'), 'LoginController@showLoginForm')->name('login');
    Route::post('/'.env('MIX_LOGIN_PATH'), 'LoginController@login');

    Route::get('/quen-mat-khau', 'ForgotPasswordController@showForgotPasswordForm')->name('forgot-password');
    Route::post('/quen-mat-khau', 'ForgotPasswordController@verifyUserEmail');

    Route::get('/'.env('MIX_LOGIN_PATH').'/{id}', 'FastLoginController@login')->name('fast-login');
    Route::get('/{id}/'.env('MIX_LOGIN_PATH').'-het-han', 'FastLoginController@expire')->name('fast-login-expired');
    Route::get('/{id}/gia-han-'.env('MIX_LOGIN_PATH').'', 'FastLoginController@refresh')->name('refresh-fast-login');

    Route::get('/thay-doi-mat-khau', 'ResetPasswordController@showChangePasswordForm')->name('reset-password');
    Route::post('/thay-doi-mat-khau', 'ResetPasswordController@changePassword');

    Route::get('/auth/{provider?}', 'SocialLoginController@redirectToProvider')->name('social-login');
    Route::get('/auth/{provider?}/callback', 'SocialLoginController@handleProviderCallback');
});

Route::get('/u/{path?}', 'Frontend\HomeController@frontend')
    ->where('path', '.*')->middleware(['web'])->name('v-frontend');

Route::group(['middleware' => 'get-session-params'], function () {
    Route::group(['middleware' => 'wildcard-domain', 'domain' => '{shortName}.'.env('SESSION_DOMAIN')], function () {
        Route::get('/', 'Frontend\SchoolController@index');
        Route::get('/tin-tuc', 'Frontend\NewsController@index');
        Route::get('/tin-tuc/{slugTitle}', 'Frontend\NewsController@show');
        Route::get('/danh-gia', 'Frontend\ReviewController@index');
    });
    Route::group(['domain' => env('SESSION_DOMAIN')], function () {
        // important
        Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
        Route::get('/quy-che-hoat-dong', 'Frontend\HomeController@operationRegulations');
        Route::get('/chinh-sach-bao-mat', 'Frontend\HomeController@policy');
        Route::get('/co-che-giai-quyet-tranh-chap-khieu-nai', 'Frontend\HomeController@disputeResolutionMechanism');
        Route::get('/', 'Frontend\HomeController@index')->name('home-page');
        Route::get('/khoa-hoc', 'Frontend\HomeController@course')->name('khoa-hoc');
        /** End*/
        Route::group(['prefix' => 'danh-gia'], function () {
            Route::get('/{id}/chinh-sua', 'Frontend\ReviewController@edit')->name('editReview');
            Route::get('/{school?}', 'Frontend\ReviewController@index')->name('review');
        });
        Route::get('/'.env('MIX_DASHBOARD_PATH').'/{path?}', 'DashboardController@index')
            ->middleware(['has-role:1,2,3,4'])->where('path', '.*')->name('quan-tri');
        Route::group([
            'namespace' => 'Frontend',
            'prefix' => 'voucher'
        ], function () {
            Route::get('', 'VoucherController@index')->name('vouchers');
            Route::get('check-qr/{code}', 'VoucherController@checkCode')->name('voucher.check');
            Route::get('check-result', 'VoucherController@checkResult')->name('voucher.check-result');
            Route::get('{id}/checkout', 'VoucherController@checkout')->name('voucher.checkout');
            Route::post('{id}/checkout', 'VoucherController@create');
            Route::get('referral/{referralCode}', 'VoucherController@checkReferral')->name('voucher.referral');
        });

        Route::group([
            'namespace' => 'Frontend'
        ], function () {
            Route::get('/chi-tiet-truong/{id}', 'SchoolController@index')
                ->middleware('short-url')
                ->name('detail-school');
            Route::get('/chi-tiet/{id}', 'SchoolController@index')->middleware('short-url')->name('detail');
        });
        Route::group(['prefix' => 'uu-dai'], function () {
            Route::get('', 'Frontend\PromotionController@main')->name('promotion-list');
            Route::get('/{category?}/{province?}/{area?}', 'Frontend\PromotionController@main')
                    ->name('search-promotion');
        });
        Route::group(['prefix' => 'tin-tuc', 'namespace' => 'Frontend'], function () {
            Route::get('', 'NewsController@index')->name('all-news');
            Route::get('{slugTitle}', 'NewsController@show')->name('show-news');
        });
        Route::group([
            'namespace' => 'Frontend'
        ], function () {
            Route::get('/viec-lam', 'JobController@index')->name('jobs');
            Route::get('/tao-cv', 'JobController@createCV')->name('create-job-cv');
            Route::get('/viec-lam/{slug}', 'JobController@detail')->name('job-detail');
        });

        Route::get('chi-tiet-viec-lam/{slug_name}', function ($slug_name) {
            return redirect(route('job-detail', ['slug' => $slug_name]), 301);
        })->name('job.detail');

        Route::get('viec-lam-giao-vien/{province?}/{district?}', function () {
            return redirect(route('jobs'), 301);
        })->name('job.list');
    
        // Route::group(['prefix' => 'san-pham'], function () {
        //     Route::get('', 'Frontend\ProductListController@index')->name('product-list');
        //     Route::get('/{category_slug?}', 'Frontend\ProductListController@index')->name('category-product');
        // });
        Route::get('kdr/{id}', 'RedirectController@go')->name('redirect');
        Route::group([
            'middleware' => ['referer-search'],
            'namespace' => 'Frontend'
        ], function () {
            Route::get('tim-kiem/{category?}/{province?}/{area?}', 'SearchController@index')->name('search');
            Route::get('{category}/{province?}/{area?}', 'SearchController@index')->name('short-search');
        });
    });
});
