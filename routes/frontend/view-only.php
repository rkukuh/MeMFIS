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

        Route::view('/material-request', 'frontend.material-request.index')->name('material-request.index');

        Route::view('/material-request/general/create', 'frontend.material-request.general.create')->name('material-request.general.create');
        Route::view('/material-request/general/edit', 'frontend.material-request.general.edit')->name('material-request.general.edit');
        Route::view('/material-request/general/show', 'frontend.material-request.general.show')->name('material-request.general.show');

        Route::view('/material-request/project/create', 'frontend.material-request.project.create')->name('material-request.project.create');
        Route::view('/material-request/project/edit', 'frontend.material-request.project.edit')->name('material-request.project.edit');
        Route::view('/material-request/project/show', 'frontend.material-request.project.show')->name('material-request.project.show');

        /** Tool Request */

        Route::view('/tool-request', 'frontend.tool-request.index')->name('tool-request.index');

        Route::view('/tool-request/general/create', 'frontend.tool-request.general.create')->name('tool-request.general.create');
        Route::view('/tool-request/general/edit', 'frontend.tool-request.general.edit')->name('tool-request.general.edit');
        Route::view('/tool-request/general/show', 'frontend.tool-request.general.show')->name('tool-request.general.show');

        Route::view('/tool-request/project/create', 'frontend.tool-request.project.create')->name('tool-request.project.create');
        Route::view('/tool-request/project/edit', 'frontend.tool-request.project.edit')->name('tool-request.project.edit');
        Route::view('/tool-request/project/show', 'frontend.tool-request.project.show')->name('tool-request.project.show');

        /** Inventory In */

        Route::view('/inventory-in', 'frontend.inventory-in.index')->name('inventory-in.index');
        Route::view('/inventory-in/create', 'frontend.inventory-in.create')->name('inventory-in.create');
        Route::view('/inventory-in/edit', 'frontend.inventory-in.edit')->name('inventory-in.edit');
        Route::view('/inventory-in/show', 'frontend.inventory-in.show')->name('inventory-in.show');

        /** GSE-Tool Returned */

        Route::view('/gse-tool-returned', 'frontend.gse-tool-returned.index')->name('gse-tool-returned.index');

        Route::view('/gse-tool-returned/general/create', 'frontend.gse-tool-returned.general.create')->name('gse-tool-returned.general.create');
        Route::view('/gse-tool-returned/general/edit', 'frontend.gse-tool-returned.general.edit')->name('gse-tool-returned.general.edit');
        Route::view('/gse-tool-returned/general/show', 'frontend.gse-tool-returned.general.show')->name('gse-tool-returned.general.show');

        Route::view('/gse-tool-returned/project/create', 'frontend.gse-tool-returned.project.create')->name('gse-tool-returned.project.create');
        Route::view('/gse-tool-returned/project/edit', 'frontend.gse-tool-returned.project.edit')->name('gse-tool-returned.project.edit');
        Route::view('/gse-tool-returned/project/show', 'frontend.gse-tool-returned.project.show')->name('gse-tool-returned.project.show');

        /** ATTENDANCE */

        Route::view('/attendance', 'frontend.attendance.index')->name('attendance.index');

        Route::view('/attendance/overtime/create', 'frontend.attendance.overtime.create')->name('attendance.overtime.create');
        Route::view('/attendance/overtime/approve', 'frontend.attendance.overtime.approve')->name('attendance.overtime.approve');

        Route::view('/attendance/propose-leave/create', 'frontend.attendance.propose-leave.create')->name('attendance.propose-leave.create');
        Route::view('/attendance/propose-leave/approve-type-1', 'frontend.attendance.propose-leave.approve-type-1')->name('attendance.propose-leave.approve-type-1');
        Route::view('/attendance/propose-leave/approve-type-2', 'frontend.attendance.propose-leave.approve-type-2')->name('attendance.propose-leave.approve-type-2');

        Route::view('/attendance/attendance-correction/create', 'frontend.attendance.attendance-correction.create')->name('attendance.attendance-correction.create');

        /** ATTENDANCE CORRECTION */

        Route::view('/attendance-correction', 'frontend.attendance-correction.index')->name('attendance-correction.index');
        Route::view('/attendance-correction/create', 'frontend.attendance-correction.create')->name('attendance-correction.create');
        Route::view('/attendance-correction/edit', 'frontend.attendance-correction.edit')->name('attendance-correction.edit');
        Route::view('/attendance-correction/approve', 'frontend.attendance-correction.approve')->name('attendance-correction.approve');

        /** OVERTIME */

        Route::view('/overtime', 'frontend.overtime.index')->name('overtime.index');
        Route::view('/overtime/create', 'frontend.overtime.create')->name('overtime.create');
        Route::view('/overtime/edit', 'frontend.overtime.edit')->name('overtime.edit');
        Route::view('/overtime/approve', 'frontend.overtime.approve')->name('overtime.approve');

        /** PROPOSE LEAVE */

        Route::view('/propose-leave', 'frontend.propose-leave.index')->name('propose-leave.index');
        Route::view('/propose-leave/create', 'frontend.propose-leave.propose-leave.create')->name('propose-leave.create');
        Route::view('/propose-leave/edit', 'frontend.propose-leave.propose-leave.edit')->name('propose-leave.edit');
        Route::view('/propose-leave/approve-type-1', 'frontend.propose-leave.propose-leave.approve-type-1')->name('propose-leave.approve-type-1');
        Route::view('/propose-leave/approve-type-2', 'frontend.propose-leave.propose-leave.approve-type-2')->name('propose-leave.approve-type-2');

    });

});
