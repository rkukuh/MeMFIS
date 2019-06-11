<?php

Route::get('/quotation-doc', function () {
    $pdf = \PDF::loadView('frontend/form/quotation');
    return $pdf->stream();
});

Route::get('/preliminary', function () {
    $pdf = \PDF::loadView('frontend/form/preliminary');
    return $pdf->stream();
});

Route::get('/summaryworkpackage', function () {
    $pdf = \PDF::loadView('frontend/form/summary_wp');
    // $pdf->setPaper('A4', 'landscape');
    return $pdf->stream();
});

Route::get('/workpackage-doc', function () {
    $pdf = \PDF::loadView('frontend/form/workpackage');
    $pdf->setPaper('A4', 'landscape');
    return $pdf->stream();
});

Route::get('/wp-summart-doc', function () {
    $pdf = \PDF::loadView('frontend/form/quotation');
    return $pdf->stream();
});

Route::get('/purchase-request-doc', function () {
    $pdf = \PDF::loadView('frontend/form/purchase_request');
    return $pdf->stream();
});

Route::get('/jobcard-routine', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_routine');
    return $pdf->stream();
});

Route::get('/jobcard-eo', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_eo');
    return $pdf->stream();
});

Route::get('/jobcard-si', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_si');
    return $pdf->stream();
});

Route::get('/jobcard-hard-time', function () {
    $pdf = \PDF::loadView('frontend/form/hard_time');
    return $pdf->stream();
});

Route::get('/receiving-inspection-report-doc', function () {
    $pdf = \PDF::loadView('frontend/form/receiving_inspection_report');
    return $pdf->stream();
});

Route::get('/rts-certificate', function () {
    $pdf = \PDF::loadView('frontend/form/rts_certificate');
    return $pdf->stream();
});

Route::get('/jobcard-routine2', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_routine2');
    return $pdf->stream();
});

Route::get('/jobcard-si2', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_si2');
    return $pdf->stream();
});

Route::get('/jobcard-eo2', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_eo2');
    return $pdf->stream();
});

Route::get('/jobcard-sip', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_sip');
    return $pdf->stream();
});

Route::get('/jobcard-cpcp', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_cpcp');
    return $pdf->stream();
});

Route::get('/jobcard-cmrawl', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_cmrawl');
    return $pdf->stream();
});

Route::get('/jobcard-adsb', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_adsb');
    return $pdf->stream();
});

Route::get('/jobcard-basic', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_basic');
    return $pdf->stream();
});

Route::get('/preliminaryinspection-one', function () {
    $pdf = \PDF::loadView('frontend/form/preliminaryinspection-one');
    return $pdf->stream();
});

Route::get('/preliminaryinspection-two', function () {
    $pdf = \PDF::loadView('frontend/form/preliminaryinspection-two');
    return $pdf->stream();
});

Route::get('/quotation-doc2', function () {
    $pdf = \PDF::loadView('frontend/form/quotation2');
    return $pdf->stream();
});

Route::get('/dc-summary', function () {
    $pdf = \PDF::loadView('frontend/form/dc_summary');
    return $pdf->stream();
});