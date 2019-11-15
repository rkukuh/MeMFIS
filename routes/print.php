<?php

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

Route::get('/jobcard-eo-1page', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_eo_1page');
    return $pdf->stream();
});

Route::get('/jobcard-eo-2page', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_eo_2page');
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

Route::get('/jobcard-cri', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_cri');
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
    $pdf = \PDF::loadView('frontend/form/quotation');
    return $pdf->stream();
});

Route::get('/dc-summary', function () {
    $pdf = \PDF::loadView('frontend/form/dc_summary');
    return $pdf->stream();
});

Route::get('/dc-page1', function () {
    $pdf = \PDF::loadView('frontend/form/dc_page1');
    return $pdf->stream();
});

Route::get('/dc-page2', function () {
    $pdf = \PDF::loadView('frontend/form/dc_page2');
    $pdf->setPaper('A4', 'landscape');
    return $pdf->stream();
});


Route::get('/grn-doc', function () {
    $pdf = \PDF::loadView('frontend/form/goods_received_note');
    return $pdf->stream();
});

Route::get('/purchase-request-general-doc', function () {
    $pdf = \PDF::loadView('frontend/form/purchase_request_general');
    return $pdf->stream();
});

Route::get('/purchase-request-project-doc', function () {
    $pdf = \PDF::loadView('frontend/form/purchase_request_project');
    return $pdf->stream();
});

Route::get('/additional-quotation-page1', function () {
    $pdf = \PDF::loadView('frontend/form/additional_quotation_1');
    return $pdf->stream();
});

Route::get('/additional-quotation-page2', function () {
    $pdf = \PDF::loadView('frontend/form/additional_quotation_2');
    return $pdf->stream();
});

Route::get('/additional-quotation-page3', function () {
    $pdf = \PDF::loadView('frontend/form/additional_quotation_3');
    return $pdf->stream();
});


Route::get('/purchase-order-doc', function () {
    $pdf = \PDF::loadView('frontend/form/purchase_order');
    return $pdf->stream();
});


Route::get('/jobcard-ad-1page', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_ad_1page');
    return $pdf->stream();
});


Route::get('/jobcard-ad-2page', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_ad_2page');
    return $pdf->stream();
});

Route::get('/jobcard-awl-1page', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_awl_1page');
    return $pdf->stream();
});

Route::get('/jobcard-awl-2page', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_awl_2page');
    return $pdf->stream();
});

Route::get('/jobcard-cmr-1page', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_cmr_1page');
    return $pdf->stream();
});

Route::get('/jobcard-cmr-2page', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_cmr_2page');
    return $pdf->stream();
});

Route::get('/jobcard-ea-1page', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_ea_1page');
    return $pdf->stream();
});

Route::get('/jobcard-ea-2page', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_ea_2page');
    return $pdf->stream();
});

Route::get('/jobcard-sb-1page', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_sb_1page');
    return $pdf->stream();
});

Route::get('/jobcard-sb-2page', function () {
    $pdf = \PDF::loadView('frontend/form/jobcard_sb_2page');
    return $pdf->stream();
});

Route::get('/tool-request-dc', function () {
    $pdf = \PDF::loadView('frontend/form/tool_request_dc');
    $pdf->setPaper('A5', 'potrait');
    return $pdf->stream();
});

Route::get('/tool-request-hm', function () {
    $pdf = \PDF::loadView('frontend/form/tool_request_hm');
    $pdf->setPaper('A5', 'potrait');
    return $pdf->stream();
});

Route::get('/tool-request-workshop', function () {
    $pdf = \PDF::loadView('frontend/form/tool_request_workshop');
    $pdf->setPaper('A5', 'potrait');
    return $pdf->stream();
});

Route::get('/material-request-dc', function () {
    $pdf = \PDF::loadView('frontend/form/material_request_dc');
    $pdf->setPaper('A5', 'potrait');
    return $pdf->stream();
});

Route::get('/material-request-hm', function () {
    $pdf = \PDF::loadView('frontend/form/material_request_hm');
    $pdf->setPaper('A5', 'potrait');
    return $pdf->stream();
});

Route::get('/material-request-workshop', function () {
    $pdf = \PDF::loadView('frontend/form/material_request_workshop');
    $pdf->setPaper('A5', 'potrait');
    return $pdf->stream();
});

Route::get('/inventory-out-tool', function () {
    $pdf = \PDF::loadView('frontend/form/inventory_out_tool');
    $pdf->setPaper('A5', 'potrait');
    return $pdf->stream();
});

Route::get('/inventory-out-material', function () {
    $pdf = \PDF::loadView('frontend/form/inventory_out_material');
    $pdf->setPaper('A5', 'potrait');
    return $pdf->stream();
});

Route::get('/inventory-in-docs', function () {
    $pdf = \PDF::loadView('frontend/form/inventory_in');
    $pdf->setPaper('A5', 'potrait');
    return $pdf->stream();
});

Route::get('/gse-tool-returned', function () {
    $pdf = \PDF::loadView('frontend/form/gse_tool_returned');
    $pdf->setPaper('A5', 'potrait');
    return $pdf->stream();
});

Route::get('/dc', function () {
    // $m = new iio\libmergepdf\Merger();

    // $view1 = \View::make('frontend.form.dc_page1')->render();
    // $view2 = \View::make('frontend.form.dc_page2')->render();

    // $pdf = App::make('dompdf.wrapper');
    // $pdf->loadHTML($view1)->setPaper('a4', 'portrait');
    // $m->addRaw($pdf->output());

    // $pdf = App::make('dompdf.wrapper');
    // $pdf->loadHTML($view2)->setPaper('a4', 'landscape');
    // $m->addRaw($pdf->output());


    // file_put_contents('img/test_tes.pdf', $m->merge());
    // $invnoabc = new \PDF;
    // $invnoabc = 'test_tes.pdf';

// ob_end_clean();

// $invnoabc->stream();
return response()->file(
    public_path('test_tes.pdf')
);
    // $dompdf->stream('img/test_tes.pdf');
    // $dompdf->stream("img/test_tes.pdf", array("Attachment" => false));


    // $pdf = \PDF::loadView('frontend/form/dc_page1');
    // $pdf = \PDF::loadView('frontend/form/dc_page2');
    // $pdf->setPaper('A4', 'landscape');

    // return $pdf->stream();
});

