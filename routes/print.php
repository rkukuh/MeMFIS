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

Route::get('/hard-time', function () {
    $pdf = \PDF::loadView('frontend/form/hard_time');
    return $pdf->stream();
});

Route::get('/receiving-inspection-report-doc', function () {
    $pdf = \PDF::loadView('frontend/form/receiving_inspection_report');
    return $pdf->stream();
});

Route::get('/rts-certificate', function () {
    $pdf = \PDF::loadView('frontend/form/rts-certificate');
    return $pdf->stream();
});

