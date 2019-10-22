<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // USER entity permissions:

        Permission::create(['name' => 'user-create']);
        Permission::create(['name' => 'user-edit']);
        Permission::create(['name' => 'user-remove']);
        Permission::create(['name' => 'user-delete']);

        // CUSTOMER entity permissions:

        Permission::create(['name' => 'customer-create']);
        Permission::create(['name' => 'customer-edit']);
        Permission::create(['name' => 'customer-remove']);
        Permission::create(['name' => 'customer-delete']);

        // QUOTATION entity permissions:

        Permission::create(['name' => 'quotation-create']);
        Permission::create(['name' => 'quotation-edit']);
        Permission::create(['name' => 'quotation-remove']);
        Permission::create(['name' => 'quotation-delete']);

        // TASKCARD entity permissions:

        Permission::create(['name' => 'taskcard-create']);
        Permission::create(['name' => 'taskcard-edit']);
        Permission::create(['name' => 'taskcard-remove']);
        Permission::create(['name' => 'taskcard-delete']);

        // WORKPACKAGE entity permissions:

        Permission::create(['name' => 'workpackage-create']);
        Permission::create(['name' => 'workpackage-edit']);
        Permission::create(['name' => 'workpackage-remove']);
        Permission::create(['name' => 'workpackage-delete']);

        // PROJECT entity permissions:

        Permission::create(['name' => 'project-create']);
        Permission::create(['name' => 'project-edit']);
        Permission::create(['name' => 'project-remove']);
        Permission::create(['name' => 'project-delete']);

        // JOBCARD entity permissions:

        Permission::create(['name' => 'jobcard-create']);
        Permission::create(['name' => 'jobcard-edit']);
        Permission::create(['name' => 'jobcard-remove']);
        Permission::create(['name' => 'jobcard-delete']);

        // JOBCARD HARD TIME entity permissions:

        Permission::create(['name' => 'jobcard-hardtime-create']);
        Permission::create(['name' => 'jobcard-hardtime-edit']);
        Permission::create(['name' => 'jobcard-hardtime-remove']);
        Permission::create(['name' => 'jobcard-hardtime-delete']);

        // DISCREPANCY FOUND entity permissions:

        Permission::create(['name' => 'discrepancy-create']);
        Permission::create(['name' => 'discrepancy-edit']);
        Permission::create(['name' => 'discrepancy-remove']);
        Permission::create(['name' => 'discrepancy-delete']);

        // DEFECTCARD entity permissions:

        Permission::create(['name' => 'defectcard-create']);
        Permission::create(['name' => 'defectcard-edit']);
        Permission::create(['name' => 'defectcard-remove']);
        Permission::create(['name' => 'defectcard-delete']);

        // RELEASE TO SERVICE entity permissions:

        Permission::create(['name' => 'rts-create']);
        Permission::create(['name' => 'rts-edit']);
        Permission::create(['name' => 'rts-remove']);
        Permission::create(['name' => 'rts-delete']);

        // WORK PROGRESS REPORT entity permissions:

        Permission::create(['name' => 'wpr-create']);
        Permission::create(['name' => 'wpr-edit']);
        Permission::create(['name' => 'wpr-remove']);
        Permission::create(['name' => 'wpr-delete']);

        // PURCHASE REQUEST entity permissions:

        Permission::create(['name' => 'purchase-request-create']);
        Permission::create(['name' => 'purchase-request-edit']);
        Permission::create(['name' => 'purchase-request-remove']);
        Permission::create(['name' => 'purchase-request-delete']);

        // PRICE LIST entity permissions:

        Permission::create(['name' => 'pricelist-create']);
        Permission::create(['name' => 'pricelist-edit']);
        Permission::create(['name' => 'pricelist-remove']);
        Permission::create(['name' => 'pricelist-delete']);

        // PURCHASE ORDER entity permissions:

        Permission::create(['name' => 'purchase-order-create']);
        Permission::create(['name' => 'purchase-order-edit']);
        Permission::create(['name' => 'purchase-order-remove']);
        Permission::create(['name' => 'purchase-order-delete']);

        // VENDOR entity permissions:

        Permission::create(['name' => 'vendor-create']);
        Permission::create(['name' => 'vendor-edit']);
        Permission::create(['name' => 'vendor-remove']);
        Permission::create(['name' => 'vendor-delete']);

        // COMPANY STRUCTUR & DEPARTEMENT entity permissions:

        Permission::create(['name' => 'csd-create']);
        Permission::create(['name' => 'csd-edit']);
        Permission::create(['name' => 'csd-remove']);
        Permission::create(['name' => 'csd-delete']);

        // EMPLOYMENT STATUS entity permissions:

        Permission::create(['name' => 'employment-status-create']);
        Permission::create(['name' => 'employment-status-edit']);
        Permission::create(['name' => 'employment-status-remove']);
        Permission::create(['name' => 'employment-status-delete']);

        // BENEFITS entity permissions:

        Permission::create(['name' => 'benefit-create']);
        Permission::create(['name' => 'benefit-edit']);
        Permission::create(['name' => 'benefit-remove']);
        Permission::create(['name' => 'benefit-delete']);

        // POSITION entity permissions:

        Permission::create(['name' => 'position-create']);
        Permission::create(['name' => 'position-edit']);
        Permission::create(['name' => 'position-remove']);
        Permission::create(['name' => 'position-delete']);

        // EVENT/HOLIDAYS entity permissions:

        Permission::create(['name' => 'event-holiday-create']);
        Permission::create(['name' => 'event-holiday-edit']);
        Permission::create(['name' => 'event-holiday-remove']);
        Permission::create(['name' => 'event-holiday-delete']);

        // WORKSHIFT SCHEDULE entity permissions:

        Permission::create(['name' => 'workshift-schedule-create']);
        Permission::create(['name' => 'workshift-schedule-edit']);
        Permission::create(['name' => 'workshift-schedule-remove']);
        Permission::create(['name' => 'workshift-schedule-delete']);

        // LEAVE PERIOD entity permissions:

        Permission::create(['name' => 'leave-period-create']);
        Permission::create(['name' => 'leave-period-edit']);
        Permission::create(['name' => 'leave-period-remove']);
        Permission::create(['name' => 'leave-period-delete']);

        // LEAVE TYPES entity permissions:

        Permission::create(['name' => 'leave-types-create']);
        Permission::create(['name' => 'leave-types-edit']);
        Permission::create(['name' => 'leave-types-remove']);
        Permission::create(['name' => 'leave-types-delete']);

        // EMPLOYEE entity permissions:

        Permission::create(['name' => 'employee-create']);
        Permission::create(['name' => 'employee-edit']);
        Permission::create(['name' => 'employee-remove']);
        Permission::create(['name' => 'employee-delete']);

        // IMPORT FROM FINGERPRINT MACHINE entity permissions:

        Permission::create(['name' => 'import-ffm-create']);
        Permission::create(['name' => 'import-ffm-edit']);
        Permission::create(['name' => 'import-ffm-remove']);
        Permission::create(['name' => 'import-ffm-delete']);

        // ATTENDANCE LIST entity permissions:

        Permission::create(['name' => 'attendance-list-create']);
        Permission::create(['name' => 'attendance-list-edit']);
        Permission::create(['name' => 'attendance-list-remove']);
        Permission::create(['name' => 'attendance-list-delete']);

        // ATTENDANCE CORRECTION entity permissions:

        Permission::create(['name' => 'attendance-correction-create']);
        Permission::create(['name' => 'attendance-correction-edit']);
        Permission::create(['name' => 'attendance-correction-remove']);
        Permission::create(['name' => 'attendance-correction-delete']);

        // OVERTIME entity permissions:

        Permission::create(['name' => 'overtime-create']);
        Permission::create(['name' => 'overtime-edit']);
        Permission::create(['name' => 'overtime-remove']);
        Permission::create(['name' => 'overtime-delete']);

        // PROPOSE LEAVE entity permissions:

        Permission::create(['name' => 'propose-leave-create']);
        Permission::create(['name' => 'propose-leave-edit']);
        Permission::create(['name' => 'propose-leave-remove']);
        Permission::create(['name' => 'propose-leave-delete']);

        // LEAVE REPORT entity permissions:

        Permission::create(['name' => 'leave-report-create']);
        Permission::create(['name' => 'leave-report-edit']);
        Permission::create(['name' => 'leave-report-remove']);
        Permission::create(['name' => 'leave-report-delete']);

        // CALENDAR entity permissions:

        Permission::create(['name' => 'calendar-create']);
        Permission::create(['name' => 'calendar-edit']);
        Permission::create(['name' => 'calendar-remove']);
        Permission::create(['name' => 'calendar-delete']);

        // ASSIGN LEAVES entity permissions:

        Permission::create(['name' => 'assign-leaves-create']);
        Permission::create(['name' => 'assign-leaves-edit']);
        Permission::create(['name' => 'assign-leaves-remove']);
        Permission::create(['name' => 'assign-leaves-delete']);

        // LEAVE DATALIST entity permissions:

        Permission::create(['name' => 'leave-datalist-create']);
        Permission::create(['name' => 'leave-datalist-edit']);
        Permission::create(['name' => 'leave-datalist-remove']);
        Permission::create(['name' => 'leave-datalist-delete']);

        // CASHBOOK entity permissions:

        Permission::create(['name' => 'cashbook-create']);
        Permission::create(['name' => 'cashbook-edit']);
        Permission::create(['name' => 'cashbook-remove']);
        Permission::create(['name' => 'cashbook-delete']);

        // INVOICE entity permissions:

        Permission::create(['name' => 'invoice-create']);
        Permission::create(['name' => 'invoice-edit']);
        Permission::create(['name' => 'invoice-remove']);
        Permission::create(['name' => 'invoice-delete']);

        // COA entity permissions:

        Permission::create(['name' => 'coa-create']);
        Permission::create(['name' => 'coa-edit']);
        Permission::create(['name' => 'coa-remove']);
        Permission::create(['name' => 'coa-delete']);

        // ACCOUNT RECEIVABLE entity permissions:

        Permission::create(['name' => 'account-receivable-create']);
        Permission::create(['name' => 'account-receivable-edit']);
        Permission::create(['name' => 'account-receivable-remove']);
        Permission::create(['name' => 'account-receivable-delete']);

        // ITEMS entity permissions:

        Permission::create(['name' => 'items-create']);
        Permission::create(['name' => 'items-edit']);
        Permission::create(['name' => 'items-remove']);
        Permission::create(['name' => 'items-delete']);

        // GOODS RECEIVED NOTE entity permissions:

        Permission::create(['name' => 'grn-create']);
        Permission::create(['name' => 'grn-edit']);
        Permission::create(['name' => 'grn-remove']);
        Permission::create(['name' => 'grn-delete']);

        // MATERIAL REQUEST JOBCARD entity permissions:

        Permission::create(['name' => 'mrj-create']);
        Permission::create(['name' => 'mrj-edit']);
        Permission::create(['name' => 'mrj-remove']);
        Permission::create(['name' => 'mrj-delete']);

        // TOOL REQUEST JOBCARD entity permissions:

        Permission::create(['name' => 'trj-create']);
        Permission::create(['name' => 'trj-edit']);
        Permission::create(['name' => 'trj-remove']);
        Permission::create(['name' => 'trj-delete']);

        // INVENTORY IN entity permissions:

        Permission::create(['name' => 'inventory-in-create']);
        Permission::create(['name' => 'inventory-in-edit']);
        Permission::create(['name' => 'inventory-in-remove']);
        Permission::create(['name' => 'inventory-in-delete']);

        // INVENTORY OUT entity permissions:

        Permission::create(['name' => 'inventory-out-create']);
        Permission::create(['name' => 'inventory-out-edit']);
        Permission::create(['name' => 'inventory-out-remove']);
        Permission::create(['name' => 'inventory-out-delete']);

        // MATERIAL TRANSFER entity permissions:

        Permission::create(['name' => 'material-transfer-create']);
        Permission::create(['name' => 'material-transfer-edit']);
        Permission::create(['name' => 'material-transfer-remove']);
        Permission::create(['name' => 'material-transfer-delete']);

        // CATEGORY ITEM entity permissions:

        Permission::create(['name' => 'category-item-create']);
        Permission::create(['name' => 'category-item-edit']);
        Permission::create(['name' => 'category-item-remove']);
        Permission::create(['name' => 'category-item-delete']);

        // GSE/TOOL RETURNED entity permissions:

        Permission::create(['name' => 'gse-tool-create']);
        Permission::create(['name' => 'gse-tool-edit']);
        Permission::create(['name' => 'gse-tool-remove']);
        Permission::create(['name' => 'gse-tool-delete']);

        // INTERCHANGE entity permissions:

        Permission::create(['name' => 'interchange-create']);
        Permission::create(['name' => 'interchange-edit']);
        Permission::create(['name' => 'interchange-remove']);
        Permission::create(['name' => 'interchange-delete']);

        // RECEIVING INSPECTION REPORT entity permissions:

        Permission::create(['name' => 'receiving-ir-create']);
        Permission::create(['name' => 'receiving-ir-edit']);
        Permission::create(['name' => 'receiving-ir-remove']);
        Permission::create(['name' => 'receiving-ir-delete']);

        // MASTER entity permissions:

        Permission::create(['name' => 'master-create']);
        Permission::create(['name' => 'master-edit']);
        Permission::create(['name' => 'master-remove']);
        Permission::create(['name' => 'master-delete']);

        // SETTING entity permissions:

        Permission::create(['name' => 'setting-create']);
        Permission::create(['name' => 'setting-edit']);
        Permission::create(['name' => 'setting-remove']);
        Permission::create(['name' => 'setting-delete']);
    }
}
