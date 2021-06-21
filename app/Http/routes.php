<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

define('VIEW_CODE_LISTING_DASHBOARD', 1);
define('VIEW_CODE_LISTING_WIZARD', 2);
define('VIEW_CODE_LISTING_REGULAR', 3);
define('VIEW_CODE_LISTING_GROUP', 4);
define('VIEW_CODE_LISTING_SHARE', 5);
define('VIEW_CODE_LISTING_PROFILE', 6);
define('BLOWUP_INDEX', 1);
define('BLOWUP_SHARING', 2);
define('WIZARD_CREATE', 1);
define('WIZARD_EDIT', 2);
define('BLOWUP_FROM_DASHBOARD', 1);
define('BLOWUP_FROM_REGULAR', 2);
define('BLOWUP_FROM_GROUP', 4);
define('BLOWUP_FROM_AFFILIATE', 3);
define('BLOWUP_FROM_AFFILIATE_OWN', 5);
define('BLOWUP_FROM_REQUIREMENT', 6);
define('LISTINGS_VIEW_0', 0);
define('LISTINGS_VIEW_1', 1);
define('LISTINGS_VIEW_2', 2);
define('LISTINGS_VIEW_3', 3);
define('LISTINGS_VIEW_4', 4);
define('LISTINGS_VIEW_5', 5);
define('LISTINGS_VIEW_6', 6);


// define('VIEWER')
// use this global constants


Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'middleware' => 'auth'], function () {

    Route::group(['prefix' => 'overview', 'namespace' => 'Overview'], function () {
        Route::controller('/', 'HomeController');
    });

    Route::group(['prefix' => 'sample', 'namespace' => 'Sample'], function () {
        Route::controller('/', 'HomeController');
    });

    Route::group(['prefix' => 'requirement', 'namespace' => 'Requirement'], function () {
        post('new', 'PostController@store');
        post('share', 'ShareController@create');
        post('shareRequirements', 'RequirementUserController@store');
        post('update', 'PostController@update');
        get('delete/{req_id}', 'EditController@delete');
        get('search', 'HomeController@search');
        Route::controller('edit/{req_id}', 'EditController');
        Route::controller('match/{req_id}/{listing_type}', 'MatchController');
        Route::controller('post', 'PostController');
        Route::controller('/', 'HomeController');
    });
    Route::group(['prefix' => 'listings', 'namespace' => 'Listings'], function () {
        Route::group(['prefix' => 'reports', 'namespace' => 'Reports'], function () {
            Route::controller('/{id}', 'HomeController');
        });
        post('/unshare','UnshareController@removeShare');
        post('/action', 'HomeController@moveProperty');
        post('/delete', 'HomeController@deleteProperty');
        Route::controller('unshare','UnshareController');
        Route::controller('/', 'HomeController');
    });
    Route::group(['prefix' => 'reports', 'namespace' => 'Reports'], function () {

        Route::group(['prefix' => 'listings', 'namespace' => 'Listings'], function () {
            Route::controller('/', 'HomeController');
        });

        Route::group(['prefix' => 'affiliates', 'namespace' => 'Affiliates'], function () {
            Route::controller('/', 'HomeController');
        });
        Route::controller('/', 'HomeController');

    });
    Route::group(['prefix' => 'mapsummary', 'namespace' => 'Mapsummary'], function () {
        Route::controller('/', 'HomeController');
    });
    Route::group(['prefix' => 'property', 'namespace' => 'Property'], function () {
        get('wizard/requests', 'WizardController@showData');
        get('wizard/bldgname','WizardController@BldgData');
        get('wizard/getData','WizardController@getData');
        Route::controller('wizard', 'WizardController');



        Route::group(['prefix' => 'quickpost', 'namespace' => 'Quickpost'], function () {
            post('edit', 'EditController@update');
            Route::controller('edit/{slug}/{id}', 'EditController');
        });
    });
    Route::group(['prefix' => 'message', 'namespace' => 'Message'], function () {
        Route::controller('send', 'SendController');
        Route::controller('inbox', 'InboxController');

        post('thread','MessageController@postThread');
        post('read','MessageController@read');
        get('/thread/{id}', 'MessageController@getThread');
        get('/new', 'MessageController@getNew');
        Route::controller('/', 'MessageController');
    });
    Route::group(['prefix' => 'profile', 'namespace' => 'Profile'], function () {
        Route::controller('shared', 'SharedController');
        Route::controller('/', 'HomeController');
    });
    Route::group(['prefix' => 'account', 'namespace' => 'Account'], function () {

        Route::group(['prefix' => 'payment', 'namespace' => 'Payment'], function () {
            get('/pay/{subs_type}', 'HomeController@getIndex');
            get('/payments/{subs_type}', 'HomeController@store');
            post('/pay_via_paypal', 'HomeController@postPayment');
            get('/payment_success', 'HomeController@getSuccessPayment');
            Route::controller('payment', 'PaymentController');
            Route::controller('success', 'SuccessController');
            Route::controller('ipn', 'IPNController');
            Route::controller('cancel', 'CancelController');
            Route::controller('thank', 'ThankController');
            Route::controller('/', 'HomeController');
        });

        Route::group(['prefix' => 'password', 'namespace' => 'Password'], function () {
            post('change_password', 'HomeController@change_password');
            Route::controller('/', 'HomeController');
        });
        Route::group(['prefix' => 'deactivate', 'namespace' => 'Deactivate'], function () {
            Route::controller('password', 'PasswordController');
            Route::controller('/', 'HomeController');
        });

        post('deactivate', 'HomeController@deactivate');
        post('edit', 'HomeController@update');
        get('downgrade/{subsc_type}', 'SubscribeController@downgrade');        
        get('subscribe/{subsc_type}', 'SubscribeController@subscribe');
        get('blowup/{id}', 'InvoiceController@getIndex');
        Route::controller('billing', 'BillingController');
        Route::controller('blowup', 'InvoiceController');
        Route::controller('ledger', 'LedgerController');
        Route::controller('ftproj', 'FeatprojController');
        Route::controller('upgrade', 'UpgradeController');
        Route::controller('checkout', 'CheckoutController');
        Route::controller('/', 'HomeController');
    });
    Route::group(['prefix' => 'profile', 'namespace' => 'Profile'], function () {
        Route::controller('/', 'ProfileController');

    });
    Route::group(['prefix' => 'blowup', 'namespace' => 'Blowup'], function () {
        post('message', 'HomeController@message');
        post('save_log', 'HomeController@savelog');
        Route::controller('/{code}', 'HomeController');
    });
    Route::group(['prefix' => 'edit', 'namespace' => 'Property'], function () {
        // post('/ajax/thumbnail', 'EditController@thumbnail');
        post('/ajax/remove', 'EditController@removeFile');
        Route::controller('/{slug}/{id}', 'EditController');
    });
    Route::group(['prefix' => 'affiliates', 'namespace' => 'Affiliates'], function () {
        Route::group(['prefix' => 'shared', 'namespace' => 'Shared'], function () {
            get('/{slug}/{id}', 'HomeController@getIndex');
        });
        post('remove', 'HomeController@remove');
        get('/', 'HomeController@getIndex');
        get('/new', 'HomeController@getNew');
    });
    Route::group(['prefix' => 'edit', 'namespace' => 'Property'], function () {
        Route::controller('/{slug}/{id}', 'EditController');
    });
    post('removeShare', 'ShareController@detach');
    // post('update', 'ShareController@update');
    post('updateSharings', 'ShareController@update');
    post('postSharings', 'ShareController@share');
    post('postShareaff','ShareController@shareaff');
    get('getDocuments', 'ShareController@getDocuments');
    get('getSharable', 'ShareController@getSharable');
    get('getUsersInfo', 'ShareController@getUsers');
    Route::controller('share', 'ShareController');
    Route::controller('quick', 'QuickController');
    get('listing-shared', 'HomeController@shared');
    get('listing-quick', 'HomeController@quick');
    get('listing-group', 'HomeController@group');
    // post('/', 'HomeController@getIndex');
    get('/', 'HomeController@getIndex');
    post('/', 'HomeController@getIndex');
    get('search','HomeController@getSearch');
    get('filter','HomeController@filter_search');
});
Route::group(['prefix' => 'contact', 'namespace' => 'Contact'], function () {

    Route::controller('/', 'HomeController');

});
Route::group(['prefix' => 'groups', 'namespace' => 'Group'], function () {
    Route::controller('member', 'MemberController');
    // Route::controller('group', 'GroupController');
    Route::controller('/{id}/{slug}', 'GroupController');
    Route::controller('/', 'HomeController');
});
Route::group(['prefix' => 'projects', 'namespace' => 'Projects'], function () {
    Route::group(['prefix' => 'place', 'namespace' => 'Places'], function () {
        Route::controller('/{slug}', 'PlaceController');

    });

    Route::controller('/units/{slug}', 'Featured\Units\UnitsController');
    Route::controller('/{slug}', 'Featured\FeaturedController');

    // Route::controller('/{place}', 'HomeController@getPlace');
    Route::post('/', 'HomeController@getIndex');
    Route::controller('/', 'HomeController');
});
Route::group(['prefix' => 'agents', 'namespace' => 'Agents'], function () {
    Route::controller('public', 'AgentsController');
    Route::controller('public-profile', 'PublicController');
    Route::controller('profile', 'ProfileController');
    post('ajax/add', 'ResourceController@postAdd');
    post('ajax/accept', 'ResourceController@postAccept');
    post('ajax/remove', 'ResourceController@postRemove');
    post('ajax/reject', 'ResourceController@postReject');
    post('ajax/cancel', 'ResourceController@postReject');
    Route::controller('/', 'HomeController');
});
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'login', 'namespace' => 'Login'], function () {
        Route::controller('/', 'LoginController');
    });
    Route::group(['prefix' => 'group', 'namespace' => 'Group'], function () {
        get('create', 'HomeController@create');
        post('postCreate', 'HomeController@postCreate');
        Route::controller('view', 'ViewController');
        Route::controller('edit/{id}', 'EditController');
        Route::controller('/', 'HomeController');
    });
    Route::group(['prefix' => 'listings', 'namespace' => 'Listings'], function () {
        Route::controller('/', 'ListingsController');

    });
    Route::group(['prefix' => 'buildings', 'namespace' => 'Building'], function () {
        get('/', 'BuildingController@index');
        get('building/requests', 'BuildingController@showData');
        get('/building/addBuilding','BuildingController@store');

    });
    Route::group(['prefix' => 'mobiledb', 'namespace' => 'Mobiledb'], function () {
        Route::controller('/', 'HomeController');

    });

    Route::group(['prefix' => 'logs', 'namespace' => 'Logs'], function () {
        Route::controller('/', 'LogsController');
    });

    Route::group(['prefix' => 'sub-log', 'namespace' => 'SubLog'], function () {
        Route::controller('/', 'HomeController');
    });

    Route::group(['prefix' => 'prices', 'namespace' => 'Prices'], function () {
        post('delete', 'HomeController@delete');
        post('new/create', 'NewController@create');
        post('edit/update', 'EditController@update');
        Route::controller('edit/{slug}/{id}', 'EditController');
        Route::controller('new', 'NewController');
        Route::controller('/', 'HomeController');
    });

    Route::group(['prefix' => 'reports', 'namespace' => 'Reports'], function () {
        Route::controller('users', 'UsersController');
        Route::controller('logs', 'LogsController');
        Route::controller('properties', 'PropertiesController');
        Route::controller('ledger', 'LedgerController');
        Route::controller('/', 'ReportsController');

    });

    Route::group(['prefix' => 'users', 'namespace' => 'Users'], function () {

        Route::group(['prefix' => 'ledger', 'namespace' => 'Ledger'], function () {
            Route::controller('/{id}', 'LedgerController');

        });
        post('new/create', 'NewController@register');
        Route::controller('new', 'NewController');
        Route::controller('email', 'EmailController');
        post('create', 'UsersController@create');
        post('delete', 'UsersController@delete');
        post('edit/update', 'EditController@update');
        post('edit/expire', 'EditController@expire');
        Route::controller('edit/{slug}/{id}', 'EditController');
        Route::controller('/', 'UsersController');
    });
    Route::group(['prefix' => 'post', 'namespace' => 'Post'], function () {
        post('/postFeatured', 'PostFeaturedController@makeFeaturedProperty');
        post('/addDeveloper', 'PostFeaturedController@addDeveloper');
        post('/postImage', 'PostImageController@storeImage');
        post('/postClassification', 'PostFeaturedController@getTypes');
        Route::group(['prefix' => 'unit', 'namespace' => 'Unit'], function () {
            post('postPropertyType', 'UnitController@getPropertyType');
            post('postProject', 'UnitController@getProject');
            post('postUnit', 'UnitController@create');
            Route::controller('/', 'UnitController');
        });
        Route::controller('/', 'PostFeaturedController');;
    });
    Route::group(['prefix' => 'reports', 'namespace' => 'Reports'], function () {
        Route::controller('/', 'ReportsController');
    });

    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::controller('login', 'LoginController');
    });

    Route::group(['prefix' => 'invitation', 'namespace' => 'Invitation'], function () {
        post('/send_invitation', 'InvitationController@sendEmail');
        Route::controller('/', 'InvitationController');
    });
    Route::controller('/', 'HomeController');


});
Route::group(['prefix' => 'profile', 'namespace' => 'Profile'], function () {
    get('/admin-index/{id}','AdminProfileController@getIndex');
    post('/send', 'ProfileController@message');
    get('/{user_code}/{slug}', 'ProfileController@getIndex');

});
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::group(['prefix' => 'forgot_password', 'namespace' => 'ForgotPassword'], function () {
        Route::post('change_password/update', 'ChangePasswordController@Update');
        Route::controller('change_password/{slug}/{id}', 'ChangePasswordController');
    });
    Route::controller('admin', 'AdminLoginController');
    Route::controller('register', 'RegisterController');
    Route::controller('login', 'LoginController');
    post('forgot_password/send_email', 'ForgotPasswordController@sendEmail');
    Route::controller('forgot_password', 'ForgotPasswordController');
    get('logout', 'LoginController@getLogout');
    post('activate/update', 'ActivateController@update');
    Route::controller('activate/{slug}/{code}', 'ActivateController');
});
Route::group(['namespace' => 'Resource'], function () {
    resource('upload', 'ImageController');
    resource('property', 'PropertyController');

    Route::group(['namespace' => 'Properties', 'prefix' => 'properties'], function () {
        get('regular', 'RegularController@getIndex');
        get('quick', 'QuickController@getIndex');
        get('search', 'HomeController@getSearch');
        get('/', 'HomeController@getIndex');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        get('search_aff', 'ProfileController@getSearchedAffiliates');
        get('search', 'ProfileController@getSearch');
        get('searchNonAffiliate', 'ProfileController@getSearchNonAffiliate');
        post('{user_id}/upload', 'ProfileController@postUpload');
        Route::group(['namespace' => 'Affiliates', 'prefix' => 'affiliates'], function () {
            post('add', 'ProfileController@postAddAffiliate');
            post('sendemail', 'ProfileController@sendMail');
            post('confirm', 'ProfileController@postConfirm');
            post('reject', 'ProfileController@postReject');
        });
    });

    Route::group(['namespace' => 'Threads', 'prefix' => 'threads'], function () {
        post('/', 'ThreadController@postNew');
        post('{thread_id}/reply', 'ThreadController@postReply');
    });

    get('/faker', 'FakerController@getIndex');
});
Route::group(['prefix' => 'resources', 'namespace' => 'Resources'], function () {
    get('/getData', 'ResourcesController@showData');
});
Route::group(['namespace' => 'Feature', 'prefix' => 'feature'], function () {
    post('contact/message', 'ContactController@contact');
    Route::controller('terms', 'TermsController');
    Route::controller('contact', 'ContactController');
    Route::controller('/', 'FeatureController');
});
Route::group(['prefix' => 'blowup', 'namespace' => 'Blowup'], function () {
    post('message', 'HomeController@message');
    post('save_log', 'HomeController@savelog');
    get('/{code}', 'HomeController@getIndex')->middleware(['blowup', 'blowup.group']);
});
Route::group(['prefix' => 'apicall', 'namespace' => 'API'], function () {
    get('/filteredPropertyTypes', 'HomeController@getPropertyTypesFiltered');
    get('/filteredCities', 'HomeController@getFilteredCities');
});
Route::group(['namespace' => 'API', 'prefix' => 'api'], function () {
    Route::resource('articles', 'ArticleController');
});
Route::controller('/', 'HomeController');

