<?php

Route::name('frontend.')->group(function () {

Route::group([

    'middleware'    => 'auth',
    'namespace'     => 'Frontend',

], function () {

        /** Jobcard EO */

        // Route::view('/jobcard-eo', 'frontend.job-card-eo.index')->name('jobcard-eo.index');

        // Route::view('/jobcard-eo-mechanic-progress-open', 'frontend.job-card-eo.mechanic.progress-open')->name('jobcard-eo.mechanic.progress-open');
        // Route::view('/jobcard-eo-mechanic-progress-pause', 'frontend.job-card-eo.mechanic.progress-pause')->name('jobcard-eo.mechanic.progress-pause');
        // Route::view('/jobcard-eo-mechanic-progress-resume', 'frontend.job-card-eo.mechanic.progress-resume')->name('jobcard-eo.mechanic.progress-resume');

        // Route::view('/jobcard-eo-engineer-progress-open', 'frontend.job-card-eo.engineer.progress-open')->name('jobcard-eo.engineer.progress-open');
        // Route::view('/jobcard-eo-engineer-progress-pause', 'frontend.job-card-eo.engineer.progress-pause')->name('jobcard-eo.engineer.progress-pause');
        // Route::view('/jobcard-eo-engineer-progress-resume', 'frontend.job-card-eo.engineer.progress-resume')->name('jobcard-eo.engineer.progress-resume');

        // Route::view('/jobcard-eo-ppc', 'frontend.job-card-eo-ppc.index')->name('jobcard-eo.ppc.index');

        /** Work Progress Report */

        // Route::view('/work-progress-report', 'frontend.work-progress-report.index')->name('work-progress-report.index');
        // Route::view('/work-progress-report/show', 'frontend.work-progress-report.show')->name('work-progress-report.show');

        /** Additional Task */

        // Route::view('/additional-task', 'frontend.project.hm-additional.index')->name('additional-task.index');
        // Route::view('/additional-task/create', 'frontend.project.hm-additional.create')->name('additional-task.create');
        // Route::view('/additional-task/edit', 'frontend.project.hm-additional.edit')->name('additional-task.edit');
        // Route::view('/additional-task/show', 'frontend.project.hm-additional.show')->name('additional-task.show');
        // Route::view('/additional-task/summary', 'frontend.project.hm-additional.summary')->name('additional-task.summary');

        /** Additional Task Quotation*/

        // Route::view('/additional-task-qtn/create', 'frontend.quotation.additional.create')->name('additional-task-qtn.create');
        // Route::view('/additional-task-qtn/edit', 'frontend.quotation.additional.edit')->name('additional-task-qtn.edit');
        // Route::view('/additional-task-qtn/show', 'frontend.quotation.additional.show')->name('additional-task-qtn.show');

        /** Purchase Request */

        // Route::view('/purchase-request/general/create', 'frontend.purchase-request.general.create')->name('purchase-request.general.create');
        // Route::view('/purchase-request/general/edit', 'frontend.purchase-request.general.edit')->name('purchase-request.general.edit');
        // Route::view('/purchase-request/general/show', 'frontend.purchase-request.general.show')->name('purchase-request.general.show');

        // Route::view('/purchase-request/project/create', 'frontend.purchase-request.project.create')->name('purchase-request.project.create');
        // Route::view('/purchase-request/project/edit', 'frontend.purchase-request.project.edit')->name('purchase-request.project.edit');
        // Route::view('/purchase-request/project/show', 'frontend.purchase-request.project.show')->name('purchase-request.project.show');

        /** Material Request */

        // Route::view('/material-request-jobcard', 'frontend.material-request-jobcard.index')->name('material-request-jobcard.index');

        // Route::view('/material-request-jobcard/create', 'frontend.material-request-jobcard.create')->name('material-request-jobcard.create');
        // Route::view('/material-request-jobcard/edit', 'frontend.material-request-jobcard.edit')->name('material-request-jobcard.edit');
        // Route::view('/material-request-jobcard/show', 'frontend.material-request-jobcard.show')->name('material-request-jobcard.show');

        /** Tool Request */

        // Route::view('/tool-request-jobcard', 'frontend.tool-request-jobcard.index')->name('tool-request-jobcard.index');

        // Route::view('/tool-request-jobcard/create', 'frontend.tool-request-jobcard.create')->name('tool-request-jobcard.create');
        // Route::view('/tool-request-jobcard/edit', 'frontend.tool-request-jobcard.edit')->name('tool-request-jobcard.edit');
        // Route::view('/tool-request-jobcard/show', 'frontend.tool-request-jobcard.show')->name('tool-request-jobcard.show');

        /** Inventory In */

        // Route::view('/inventory-in', 'frontend.inventory-in.index')->name('inventory-in.index');
        // Route::view('/inventory-in/create', 'frontend.inventory-in.create')->name('inventory-in.create');
        // Route::view('/inventory-in/edit', 'frontend.inventory-in.edit')->name('inventory-in.edit');
        // Route::view('/inventory-in/show', 'frontend.inventory-in.show')->name('inventory-in.show');

        /** Inventory Out */

        // Route::view('/inventory-out/tool', 'frontend.inventory-out.tool.index')->name('inventory-out-tool.index');
        // Route::view('/inventory-out/tool/create', 'frontend.inventory-out.tool.create')->name('inventory-out-tool.create');
        // Route::view('/inventory-out/tool/edit', 'frontend.inventory-out.tool.edit')->name('inventory-out-tool.edit');
        // Route::view('/inventory-out/tool/show', 'frontend.inventory-out.tool.show')->name('inventory-out-tool.show');

        // Route::view('/inventory-out/material', 'frontend.inventory-out.material.index')->name('inventory-out-material.index');
        // Route::view('/inventory-out/material/create', 'frontend.inventory-out.material.create')->name('inventory-out-material.create');
        // Route::view('/inventory-out/material/edit', 'frontend.inventory-out.material.edit')->name('inventory-out-material.edit');
        // Route::view('/inventory-out/material/show', 'frontend.inventory-out.material.show')->name('inventory-out-material.show');

        /** Material Request */

        // Route::view('/material-transfer', 'frontend.material-transfer.index')->name('material-transfer.index');
        // Route::view('/material-transfer/create', 'frontend.material-transfer.create')->name('material-transfer.create');
        // Route::view('/material-transfer/edit', 'frontend.material-transfer.edit')->name('material-transfer.edit');
        // Route::view('/material-transfer/show', 'frontend.material-transfer.show')->name('material-transfer.show');

        /** Category Item */

        Route::view('/category-item', 'frontend.category-item.index')->name('category-item.index');
        Route::view('/category-item/create', 'frontend.category-item.create')->name('category-item.create');
        Route::view('/category-item/edit', 'frontend.category-item.edit')->name('category-item.edit');
        Route::view('/category-item/show', 'frontend.category-item.show')->name('category-item.show');

        // /** GSE-Tool Returned */

        // Route::view('/gse', 'frontend.gse.index')->name('gse.index');

        // Route::view('/gse/hm/create', 'frontend.gse.hm.create')->name('gse.hm.create');
        // Route::view('/gse/hm/edit', 'frontend.gse.hm.edit')->name('gse.hm.edit');
        // Route::view('/gse/hm/show', 'frontend.gse.hm.show')->name('gse.hm.show');

        // Route::view('/gse/workshop/create', 'frontend.gse.workshop.create')->name('gse.workshop.create');
        // Route::view('/gse/workshop/edit', 'frontend.gse.workshop.edit')->name('gse.workshop.edit');
        // Route::view('/gse/workshop/show', 'frontend.gse.workshop.show')->name('gse.workshop.show');

        // Route::view('/gse/defectcard/create', 'frontend.gse.defectcard.create')->name('gse.defectcard.create');
        // Route::view('/gse/defectcard/edit', 'frontend.gse.defectcard.edit')->name('gse.defectcard.edit');
        // Route::view('/gse/defectcard/show', 'frontend.gse.defectcard.show')->name('gse.defectcard.show');

        // Route::view('/gse/inventory-out/create', 'frontend.gse.inventory-out.create')->name('gse.inventory-out.create');
        // Route::view('/gse/inventory-out/edit', 'frontend.gse.inventory-out.edit')->name('gse.inventory-out.edit');
        // Route::view('/gse/inventory-out/show', 'frontend.gse.inventory-out.show')->name('gse.inventory-out.show');


        // /** STOCK MONITORING */

        // Route::view('/stock-monitoring', 'frontend.stock-monitoring.index')->name('stock-monitoring.index');

        /** ATTENDANCE */

        Route::view('/attendance', 'frontend.attendance.index')->name('attendance.index');

        Route::view('/attendance/overtime/create', 'frontend.attendance.overtime.create')->name('attendance.overtime.create');
        Route::view('/attendance/overtime/approve', 'frontend.attendance.overtime.approve')->name('attendance.overtime.approve');

        Route::view('/attendance/propose-leave/create', 'frontend.attendance.propose-leave.create')->name('attendance.propose-leave.create');
        Route::view('/attendance/propose-leave/approve-type-1', 'frontend.attendance.propose-leave.approve-type-1')->name('attendance.propose-leave.approve-type-1');
        Route::view('/attendance/propose-leave/approve-type-2', 'frontend.attendance.propose-leave.approve-type-2')->name('attendance.propose-leave.approve-type-2');

        Route::view('/attendance/attendance-correction/create', 'frontend.attendance.attendance-correction.create')->name('attendance.attendance-correction.create');

        /** ATTENDANCE CORRECTION */

        // Route::view('/attendance-correction', 'frontend.attendance-correction.index')->name('attendance-correction.index');
        // Route::view('/attendance-correction/create', 'frontend.attendance-correction.create')->name('attendance-correction.create');
        // Route::view('/attendance-correction/edit', 'frontend.attendance-correction.edit')->name('attendance-correction.edit');
        // Route::view('/attendance-correction/approve', 'frontend.attendance-correction.approve')->name('attendance-correction.approve');

        /** OVERTIME */

        // Route::view('/overtime', 'frontend.overtime.index')->name('overtime.index');
        // Route::view('/overtime/create', 'frontend.overtime.create')->name('overtime.create');
        // Route::view('/overtime/edit', 'frontend.overtime.edit')->name('overtime.edit');
        // Route::view('/overtime/approve', 'frontend.overtime.approve')->name('overtime.approve');

        /** PROPOSE LEAVE */

        // Route::view('/propose-leave', 'frontend.propose-leave.index')->name('propose-leave.index');
        // Route::view('/propose-leave/create', 'frontend.propose-leave.propose-leave.create')->name('propose-leave.create');
        // Route::view('/propose-leave/edit', 'frontend.propose-leave.propose-leave.edit')->name('propose-leave.edit');
        Route::view('/propose-leave/approve-type-1', 'frontend.propose-leave.propose-leave.approve-type-1')->name('propose-leave.approve-type-1');
        Route::view('/propose-leave/approve-type-2', 'frontend.propose-leave.propose-leave.approve-type-2')->name('propose-leave.approve-type-2');


        Route::view('/open', 'frontend.defect-card.progress.progress-open')->name('progress.open');
        Route::view('/pause', 'frontend.defect-card.progress.progress-pause')->name('progress.pause');
        Route::view('/resume', 'frontend.defect-card.progress.progress-resume')->name('progress.resume');
        Route::view('/close', 'frontend.defect-card.progress.progress-close')->name('progress.close');
        Route::view('/waiting-rii', 'frontend.defect-card.progress.waiting-rii')->name('progress.waiting-rii');
        Route::view('/release', 'frontend.defect-card.progress.release')->name('progress.release');


        /** QUOTATION WORKSHOP */

       // Route::view('/quotation-workshop', 'frontend.quotation-workshop.index')->name('quotation-workshop.index');
       //Route::view('/quotation-workshop/create', 'frontend.quotation-workshop.create')->name('quotation-workshop.create');
       //Route::view('/quotation-workshop/edit', 'frontend.quotation-workshop.edit')->name('quotation-workshop.edit');
       //Route::view('/quotation-workshop/show', 'frontend.quotation-workshop.show')->name('quotation-workshop.show');


       //Route::view('/quotation-workshop/edit/item/create', 'frontend.quotation-workshop.item.create')->name('quotation-workshop.item.create');
       //Route::view('/quotation-workshop/edit/item/show', 'frontend.quotation-workshop.item.show')->name('quotation-workshop.item.show');


        /** JOB SCOPE */

        Route::view('/job-scope', 'frontend.job-scope.index')->name('job-scope.index');
        Route::view('/job-scope/create', 'frontend.job-scope.create')->name('job-scope.create');
        Route::view('/job-scope/edit', 'frontend.job-scope.edit')->name('job-scope.edit');
        Route::view('/job-scope/show', 'frontend.job-scope.show')->name('job-scope.show');
        
    });

});
