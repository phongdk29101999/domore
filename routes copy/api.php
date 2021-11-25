<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'middleware' => 'web'
], function () {
    Route::group([
        'prefix' => 'suggest/v2',
        'namespace' => 'API\Suggest'
    ], function () {
        Route::get('', 'IndexController@main');
        Route::get('users', 'UserController@main')->middleware(['has-role:1,4']);
        Route::get('teams', 'TeamController@main')->middleware(['has-role:1,4']);
        Route::get('locate', 'LocateController@main')->middleware(['has-role:1,2,3,4']);
    });
    /**
     * Api for users
     */
    Route::group([
        'prefix' => 'user',
        'namespace' => 'API\User',
        'middleware' => ['has-role']
    ], function () {
        Route::get('', 'ShowController@main');
        Route::get('reviews', 'ReviewController@index');
        Route::get('vouchers', 'VoucherController@index');
        Route::get('exist', 'ExistController@main');
        Route::group([
            'middleware' => ['has-role:1,2']
        ], function () {
            Route::get('list', 'ListController@main');
            Route::get('{id}', 'ShowController@main');
            Route::post('', 'StoreController@main');
        });
        Route::group([
            'middleware' => ['has-role:1']
        ], function () {
            Route::delete('{id}', 'DestroyController@main');
        });
        Route::put('{id?}', 'UpdateController@main');
    });

    /***/
    Route::group([
        'prefix' => 'team',
        'namespace' => 'API\Team'
    ], function () {
        Route::group([
            'middleware' => ['has-role:1']
        ], function () {
            Route::get('list', 'ListController@main');
            Route::post('', 'StoreController@main');
            Route::post('{id}/members', 'MemberController@add');
            Route::delete('{id}', 'DestroyController@main');
        });
        Route::group([
            'middleware' => ['has-role:1,4']
        ], function () {
            Route::get('', 'IndexController@main');
            Route::get('{id}/members', 'MemberController@index');
            Route::get('members', 'MemberController@index');
            Route::get('{id}', 'ShowController@main');
            Route::put('{id}', 'UpdateController@main')->middleware('is-leader');
            Route::delete('{id}/members', 'MemberController@remove');
        });
    });
    /**
     * API for auth
     */
    Route::group([
        'prefix' => 'auth',
        'namespace' => 'API\Auth',
        'middleware' => ['has-role:1,2']
    ], function () {
        Route::get('refresh-account/{id}', 'RefreshAccountController@main');
        Route::get('fast-login-link/{id}', 'FastLoginLinkController@main');
    });
    /**
     * Api for schools
     */
    Route::group([
        'prefix' => 'school'
    ], function () {
        Route::group([
            'namespace' => 'API\School'
        ], function () {
            Route::get('exist', 'ExistController@main');
            Route::get('img-domain', 'ImageDomainController@main');
            Route::get('{id}/near-by', 'SchoolNearByController@main');
            Route::get('{id}/options', 'SchoolOptionsController@main');
            Route::get('{id}/news', 'NewsController@main');
            Route::get('{id}/reviews', 'ReviewController@main');
            Route::get('{id}/promotions', 'PromotionController@main');
            Route::get('{id}/criteria-ranking', 'CriteriaRankingController@main');
            Route::get('{id}/courses', 'CourseController@index');
            Route::get('{id}/vouchers', 'VoucherController@index');
        });
        Route::group([
            'namespace' => 'API\School',
            'middleware' => ['has-role:1,2']
        ], function () {
            Route::get('{id}/places', 'PlaceController@index');
            Route::put('{id}/places', 'PlaceController@attach');
            Route::put('{id}/places/auto-sync', 'PlaceController@sync');
            /** */
            Route::delete('{id}/places', 'PlaceController@detach');
            /** */
            Route::get('{id}/managers', 'ManagerController@index');
            Route::put('{id}/managers', 'ManagerController@attach');
            Route::delete('{id}/managers', 'ManagerController@detach');
            /** */
            Route::get('{id}/keywords', 'KeywordsController@index');
            Route::put('{id}/keywords', 'KeywordsController@update');
            Route::put('{id}/statuses', 'UpdateStatusesController@main');
            Route::post('{id}/replicate', 'ReplicateController@main');
        });
        Route::group([
            'namespace' => 'API\School',
            'middleware' => ['has-role:1,2,3,4']
        ], function () {
            Route::get('list', 'ListController@main');
            Route::get('{id}/services', 'ServicesController@main');
            Route::get('{id}/extensions', 'ExtensionController@show');
            Route::get('{id}/street-view', 'StreetViewController@index');
            Route::get('{id}/images', 'ImagesController@index');
            Route::get('{id}', 'ShowController@main');
            Route::put('{id}/note', 'NoteController@main');
        });
        Route::group([
            'namespace' => 'API\School',
            'middleware' => ['has-role:1,2,3']
        ], function () {
            Route::post('', 'StoreController@main');
            Route::put('{id}', 'UpdateController@main');
            Route::put('{id}/config', 'ConfigController@main');
            /** */
            Route::put('{id}/avatar', 'AvatarController@update');
            Route::post('{id}/avatar', 'AvatarController@uploadAndUpdate');
            /** */
            Route::put('{id}/images', 'ImagesController@update');
            Route::post('{id}/images', 'ImagesController@uploadAndUpdate');
            /** */
            Route::put('{id}/street-view', 'StreetViewController@update');
            /** */
            Route::post('{id}/thumbnail', 'ThumbnailController@uploadAndUpdate');
        });
    });
    /**
     * Api for members
     */
    Route::group([
        'namespace' => 'API\SchoolMember',
        'prefix' => 'member'
    ], function () {
        Route::get('list', 'ListController@main')->middleware(['has-role:1,2,4']);
        Route::get('{id}', 'ShowController@main')->middleware(['has-role:1,2,4']);
        Route::post('', 'StoreController@main')->middleware(['has-role:1,2']);
        Route::put('{id}', 'UpdateController@main')->middleware(['has-role:1,2']);
    });
    Route::group([
        'prefix' => 'school-type',
        'namespace' => 'API\SchoolType',
        'middleware' => ['has-role:1']
    ], function () {
        Route::get('', 'IndexController@main');
        Route::post('', 'StoreController@main');
        Route::put('{id}', 'UpdateController@main');
        Route::delete('{id}', 'DestroyController@main');
    });
    /** */
    Route::group([
        'prefix' => 'school-category',
        'namespace' => 'API\SchoolCategory',
        'middleware' => ['has-role:1,2']
    ], function () {
        Route::get('', 'IndexController@main');
        Route::post('', 'StoreController@main');
        Route::post('{id}', 'UpdateController@main');
        Route::delete('{id}', 'DestroyController@main');
    });
    Route::group([
        'prefix' => 'voucher',
        'namespace' => 'API\Voucher'
    ], function () {
        Route::get('list', 'ListController@main')->middleware(['has-role:1,2,3']);
        Route::get('referral', 'ReferralController@show')->middleware(['has-role']);
        Route::get('{id}/referral', 'ReferralController@show')->middleware(['has-role']);
        Route::get('{id}/schools', 'SchoolController@index');
        Route::get('{id}/customers', 'CustomerController@index')->middleware(['has-role:1,2']);
        Route::get('customers-export', 'CustomerController@export')->middleware(['has-role:1,2']);
        Route::get('{id}', 'ShowController@main')->middleware(['has-role:1,2,3']);
        Route::post('', 'StoreController@main')->middleware(['has-role:1,2,3']);
        Route::post('referral', 'ReferralController@check');
        Route::post('customer', 'CustomerController@store');
        Route::post('customer/{code}/proof', 'CustomerController@prove');
        //
        Route::put('activate/{code}', 'CustomerController@activate')->middleware(['has-role:1,2']);
        Route::put('customer/{code}', 'CustomerController@update')->middleware(['has-role:1,2']);
        //
        Route::put('verify/{code}', 'CustomerController@verify')->middleware(['has-role:1,2']);
        Route::put('attach-school', 'SchoolController@attach')->middleware(['has-role:1,2,3']);
        Route::put('detach-school', 'SchoolController@detach')->middleware(['has-role:1,2,3']);
        Route::put('{id}', 'UpdateController@main')->middleware(['has-role:1,2,3']);
    });
    Route::group([
        'prefix' => 'voucher-referral',
        'namespace' => 'API\VoucherReferral'
    ], function () {
        Route::get('', 'IndexController@main')->middleware(['has-role']);
        Route::get('{id}/link', 'LinkController@referralLink')->middleware(['has-role']);
        Route::get('{id}', 'ShowController@main')->middleware(['has-role']);
    });
    /** Api for promotions */
    Route::group([
        'prefix' => 'promotion'
    ], function () {
        Route::group([
            'namespace' => 'API\Promotion',
            'middleware' => ['has-role:1,2,3']
        ], function () {
            Route::get('list', 'ListController@main');
            Route::post('', 'StoreController@main');
            Route::put('{id}', 'UpdateController@main');
            Route::delete('{id}', 'DestroyController@main');
        });
        Route::get('{id}', 'API\Promotion\ShowController@main');
    });
    /** Api for news */
    Route::group([
        'prefix' => 'news',
        'namespace' => 'API\News'
    ], function () {
        Route::get('', 'IndexController@main');
        Route::get('list', 'ListController@main')->middleware(['has-role:1,2,3']);
        Route::get('{id}/share-link', 'ShareLinkController@main');
        Route::get('{id}', 'ShowController@main');
        Route::post('{id}/react', 'ReactController@main');
        Route::post('', 'StoreController@main')->middleware(['has-role:1,2,3']);
        Route::put('/{id}', 'UpdateController@main')->middleware(['has-role:1,2,3']);
        Route::delete('/{id}', 'DestroyController@main')->middleware(['has-role:1,2,3']);
    });
    /** Api for receive advice */
    Route::group([
        'prefix' => 'receive-advice',
        'namespace' => 'API\ReceiveAdvice'
    ], function () {
        Route::get('list', 'ListController@main')->middleware('has-role:1,2,3,4');
        Route::put('{id}/sale-state', 'SaleController@changeSaleState')->middleware('has-role:1,3,4');
        Route::put('{id}/confirm-handle', 'SaleController@confirmHandle')->middleware('has-role:1,4');
        Route::put('{id}/change-saler', 'SaleController@changeSaler')->middleware('has-role:1,4');
        Route::put('{id}/change-team', 'SaleController@changeTeam')->middleware('has-role:1,4');
        Route::put('{id}', 'UpdateController@main')->middleware('has-role:1,3,4');
        Route::get('note', 'NoteController@show')->middleware('has-role:1,4');
        Route::get('note-log', 'NoteController@showLog')->middleware('has-role:1,4');
        Route::post('note', 'NoteController@note')->middleware('has-role:1,4');
        Route::post('', 'StoreController@main');
        Route::post('{id}/notification', 'NotificationController@main')->middleware('has-role:1,2,4');
    });
    /** Api for jobs */
    Route::group([
        'prefix' => 'job',
        'namespace' => 'API\Job'
    ], function () {
        Route::group([
            'middleware' => ['has-role:1,2,3']
        ], function () {
            Route::post('', 'StoreController@main');
            Route::get('list', 'ListController@main');
            Route::get('{id}/candidates', 'CandidateController@list');
            Route::put('{id}', 'UpdateController@main');
            Route::delete('{id}', 'DestroyController@main');
        });
        Route::group([
            'prefix' => 'cv',
        ], function () {
            Route::get('list', 'CVController@list')->middleware(['has-role:1,2']);
            Route::get('{id}', 'CVController@show')->middleware(['has-role:1,2']);
            Route::post('', 'CVController@store');
        });
        Route::get('{id}', 'ShowController@main');
        Route::post('{id}/apply', 'CandidateController@store')->middleware('has-role');
    });
    /** Api for course */
    Route::group([
        'prefix' => 'course',
        'namespace' => 'API\Course'
    ], function () {
        Route::get('review', 'ReviewController@list');
        Route::post('review', 'ReviewController@store');
        Route::group([
            'middleware' => ['has-role:1,2,3']
        ], function () {
            Route::get('list', 'ListController@main');
            Route::get('{id}', 'ShowController@main');
            Route::post('', 'StoreController@main');
            Route::put('{id}', 'UpdateController@main');
            Route::delete('{id}', 'DestroyController@main');
        });
    });
    Route::group([
        'prefix' => 'course-category',
        'namespace' => 'API\CourseCategory',
        'middleware' => ['has-role:1,2']
    ], function () {
        Route::get('', 'IndexController@main');
        Route::get('{id}', 'ShowController@main');
        Route::post('', 'StoreController@main');
        Route::put('{id}', 'UpdateController@main');
        Route::delete('{id}', 'DestroyController@main');
    });
    /** Api for review */
    Route::group([
        'prefix' => 'review',
        'namespace' => 'API\Review'
    ], function () {
        Route::get('list', 'ListController@main')->middleware(['has-role:1,2,3']);
        Route::post('', 'StoreController@main');
        Route::put('{id}/approve', 'ApprovedController@main')->middleware(['has-role:1,2']);
        Route::put('{id}/decline', 'DeclineController@main')->middleware(['has-role:1,2']);
        Route::put('{id}/unapprove', 'UnapproveController@main')->middleware(['has-role:1,2']);
        Route::put('{id}', 'UpdateController@main');
    });
    Route::group([
        'prefix' => 'review-criteria',
        'namespace' => 'API\ReviewCriteria'
    ], function () {
        Route::get('', 'IndexController@main')->middleware(['has-role:1,2,3,4']);
        Route::post('', 'StoreController@main')->middleware(['has-role:1,2']);
        Route::put('{id}', 'UpdateController@main')->middleware(['has-role:1,2']);
        Route::delete('{id}', 'DestroyController@main')->middleware(['has-role:1,2']);
    });
    /**
     * Api for province
     */
    Route::group([
        'prefix' => 'province',
        'namespace' => 'API\Provinces'
    ], function () {
        //
    });

    Route::group([
        'prefix' => 'district',
        'namespace' => 'API\District'
    ], function () {
        Route::get('', 'IndexController@main');
    });

    Route::group([
        'prefix' => 'place',
        'namespace' => 'API\Place'
    ], function () {
        Route::get('list', 'ListController@main');
        /** */
        Route::get('{id}/schools', 'SchoolController@index');
        Route::put('{id}/schools', 'SchoolController@attach')->middleware(['has-role:1,2']);
        Route::put('{id}/schools/auto-sync', 'SchoolController@sync')->middleware(['has-role:1,2']);
        Route::delete('{id}/schools', 'SchoolController@detach')->middleware(['has-role:1,2']);
        /** */
        Route::get('{id}', 'ShowController@main');
        Route::post('', 'StoreController@main')->middleware(['has-role:1,2']);

        Route::delete('{id}', 'DestroyController@main')->middleware(['has-role:1,2']);
    });

    Route::group([
        'prefix' => 'school-option',
        'namespace' => 'API\SchoolOption'
    ], function () {
        Route::get('', 'IndexController@main');
        Route::get('list', 'ListController@main');
        Route::post('', 'StoreController@main');
        Route::put('{id}', 'UpdateController@main');
        Route::delete('{id}', 'DestroyController@main');
    });

    Route::group([
        'prefix' => 'school-priority',
        'namespace' => 'API\SchoolPriority',
        'middleware' => ['has-role:1,2']
    ], function () {
        Route::get('exist', 'ExistController@main');
        Route::get('list', 'ListController@main');
        Route::put('{id}', 'UpdateController@main');
        Route::post('', 'StoreController@main');
        Route::delete('{id}', 'DestroyController@main');
    });
    Route::group([
        'prefix' => 'job-position',
        'namespace' => 'API\JobPosition',
    ], function () {
        Route::get('', 'IndexController@main');
    });
    Route::group([
        'prefix' => 'paragraph',
        'namespace' => 'API\Paragraph',
        'middleware' => ['has-role:1,2']
    ], function () {
        Route::get('list', 'ListController@main');
        Route::get('{id}', 'ShowController@main');
        Route::post('', 'StoreController@main');
        Route::put('{id}', 'UpdateController@main');
        Route::delete('{id}', 'DestroyController@main');
    });
    Route::group([
        'prefix' => 'reaction',
        'namespace' => 'API\Reaction',
    ], function () {
        Route::get('', 'IndexController@main');
    });
    Route::group([
        'prefix' => 'reaction',
        'namespace' => 'API\Reaction',
        'middleware' => ['has-role:1']
    ], function () {
        Route::get('list', 'ListController@main');
        Route::post('', 'StoreController@main');
        Route::put('{id}', 'UpdateController@main');
        Route::delete('{id}', 'DestroyController@main');
    });
    Route::group([
        'prefix' => 'visit',
        'namespace' => 'API\Visit'
    ], function () {
        Route::post('school/{id}', 'SchoolController@store');
        Route::post('search', 'SearchController@store');
    });

    Route::group([
        'prefix' => 'statistic',
        'namespace' => 'API\Statistic'
    ], function () {
        Route::group([
            'prefix' => 'visit',
            'namespace' => 'Visit'
        ], function () {
            Route::get('top-school', 'SchoolController@top');
            Route::get('top-search', 'SearchController@top');
        });
        Route::get('school-advice-request', 'SchoolAdviceRequestController@schoolAdviceRequests');
    });

    Route::group([
        'prefix' => 'visitor'
    ], function () {
        Route::post('log', 'API\Visitor\LogController@main');
    });

    Route::group([
        'prefix' => 'emoji',
        'namespace' => 'API\Emoji'
    ], function () {
        Route::get('categories', 'CategoryController@index');
    });

    Route::group([
        'prefix' => 'criteria',
        'namespace' => 'API\Criteria'
    ], function () {
        Route::get('', 'IndexController@main');
        Route::get('{id}', 'ShowController@main');
        Route::post('', 'StoreController@main');
        Route::put('{id}', 'UpdateController@main');
        Route::delete('{id}', 'DestroyController@main');
    });

    Route::group([
        'namespace' => 'API'
    ], function () {
        Route::group([
            'prefix' => 'image',
            'namespace' => 'Images'
        ], function () {
            Route::post('', 'StoreController@main');
            Route::delete('', 'DestroyController@main')->middleware(['has-role:1,2,3']);
        });
    });
    Route::group([
        'prefix' => 'data',
        'namespace' => 'API\Data',
        'middleware' => ['has-role:1,2']
    ], function () {
        Route::post('schools', 'SchoolController@schools');
    });
    /** Api for article */
    Route::group([
        'prefix' => 'article',
        'namespace' => 'API\Article'
    ], function () {
        Route::group([
            'middleware' => ['has-role:1,2,3']
        ], function () {
            Route::get('list', 'ListController@main');
            Route::get('{id}', 'ShowController@main');
            Route::post('', 'StoreController@main');
            Route::put('{id}', 'UpdateController@main');
            Route::delete('{id}', 'DestroyController@main');
        });
    });
    /**Api for article's category */
    Route::group([
        'prefix' => 'article-category',
        'namespace' => 'API\ArticleCategory'
    ], function () {
        Route::group([
            'middleware' => ['has-role:1,2,3']
        ], function () {
            Route::get('', 'IndexController@main');
        });
    });

    Route::group([
        'prefix' => 'social',
    ], function () {
        /**Api for social's account */
        Route::group([
            'prefix' => 'account',
            'namespace' => 'API\SocialAccount',
            'middleware' => ['has-role:1,2,3']
        ], function () {
            Route::get('', 'ListController@main');
            Route::put('{id}', 'UpdateController@main');
        });
        /**Api for social's wall */
        Route::group([
            'prefix' => 'wall',
            'namespace' => 'API\SocialWall',
            'middleware' => ['has-role:1,2,3']
        ], function () {
            Route::post('', 'StoreController@main');
            Route::post('grant-permission', 'PermissionController@grant');
            Route::get('{id}/contributors', 'PermissionController@contributors');
        });
    });
});
