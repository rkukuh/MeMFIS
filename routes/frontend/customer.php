<?php

Route::name('frontend.')->group(function () {

    Route::group([

        'middleware'    => 'auth',
        'namespace'     => 'Frontend',

    ], function () {

        Route::namespace('Customer')->group(function () {

            Route::resource('customer', 'CustomerController');

            Route::name('customer.')->group(function () {
                Route::prefix('customer')->group(function () {

                    /** Polymorph */
                    Route::resource('/{customer}/faxes', 'CustomerFaxesController');
                    Route::resource('/{customer}/emails', 'CustomerEmailsController');
                    Route::resource('/{customer}/phones', 'CustomerPhonesController');
                    Route::resource('/{customer}/websites', 'CustomerWebsitesController');
                    Route::resource('/{customer}/addresses', 'CustomerAddressesController');
                    Route::resource('/{customer}/documents', 'CustomerDocumentsController');

                });
            });

        });

    });

});