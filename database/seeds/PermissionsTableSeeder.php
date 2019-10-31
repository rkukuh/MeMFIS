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
        // ACCOUNT RECEIVABLE entity permissions:

        Permission::create(['name' => 'account-receivable-create']);
        Permission::create(['name' => 'account-receivable-read']);
        Permission::create(['name' => 'account-receivable-edit']);
        Permission::create(['name' => 'account-receivable-delete']);
        Permission::create(['name' => 'account-receivable-remove']);
        Permission::create(['name' => 'account-receivable-report']);
        Permission::create(['name' => 'account-receivable-print']);
        Permission::create(['name' => 'account-receivable-approve']);
        Permission::create(['name' => 'account-receivable-reject']);
        Permission::create(['name' => 'account-receivable-void']);

        // ATTENDANCE LIST entity permissions:

        Permission::create(['name' => 'attendance-list-create']);
        Permission::create(['name' => 'attendance-list-read']);
        Permission::create(['name' => 'attendance-list-edit']);
        Permission::create(['name' => 'attendance-list-delete']);
        Permission::create(['name' => 'attendance-list-remove']);
        Permission::create(['name' => 'attendance-list-report']);
        Permission::create(['name' => 'attendance-list-print']);
        Permission::create(['name' => 'attendance-list-approve']);
        Permission::create(['name' => 'attendance-list-reject']);
        Permission::create(['name' => 'attendance-list-void']);

        // ATTENDANCE CORRECTION entity permissions:

        Permission::create(['name' => 'attendance-correction-create']);
        Permission::create(['name' => 'attendance-correction-read']);
        Permission::create(['name' => 'attendance-correction-edit']);
        Permission::create(['name' => 'attendance-correction-delete']);
        Permission::create(['name' => 'attendance-correction-remove']);
        Permission::create(['name' => 'attendance-correction-report']);
        Permission::create(['name' => 'attendance-correction-print']);
        Permission::create(['name' => 'attendance-correction-approve']);
        Permission::create(['name' => 'attendance-correction-reject']);
        Permission::create(['name' => 'attendance-correction-void']);

        // ASSIGN LEAVES entity permissions:

        Permission::create(['name' => 'assign-leaves-create']);
        Permission::create(['name' => 'assign-leaves-read']);
        Permission::create(['name' => 'assign-leaves-edit']);
        Permission::create(['name' => 'assign-leaves-delete']);
        Permission::create(['name' => 'assign-leaves-remove']);
        Permission::create(['name' => 'assign-leaves-report']);
        Permission::create(['name' => 'assign-leaves-print']);
        Permission::create(['name' => 'assign-leaves-approve']);
        Permission::create(['name' => 'assign-leaves-reject']);
        Permission::create(['name' => 'assign-leaves-void']);

        // BENEFITS entity permissions:

        Permission::create(['name' => 'benefit-create']);
        Permission::create(['name' => 'benefit-read']);
        Permission::create(['name' => 'benefit-edit']);
        Permission::create(['name' => 'benefit-delete']);
        Permission::create(['name' => 'benefit-remove']);
        Permission::create(['name' => 'benefit-report']);
        Permission::create(['name' => 'benefit-print']);
        Permission::create(['name' => 'benefit-approve']);
        Permission::create(['name' => 'benefit-reject']);
        Permission::create(['name' => 'benefit-void']);

        // CATEGORY ITEM entity permissions:

        Permission::create(['name' => 'category-item-create']);
        Permission::create(['name' => 'category-item-read']);
        Permission::create(['name' => 'category-item-edit']);
        Permission::create(['name' => 'category-item-delete']);
        Permission::create(['name' => 'category-item-remove']);
        Permission::create(['name' => 'category-item-report']);
        Permission::create(['name' => 'category-item-print']);
        Permission::create(['name' => 'category-item-approve']);
        Permission::create(['name' => 'category-item-reject']);
        Permission::create(['name' => 'category-item-void']);

        // CUSTOMER entity permissions:

        Permission::create(['name' => 'customer-create']);
        Permission::create(['name' => 'customer-read']);
        Permission::create(['name' => 'customer-edit']);
        Permission::create(['name' => 'customer-delete']);
        Permission::create(['name' => 'customer-remove']);
        Permission::create(['name' => 'customer-report']);
        Permission::create(['name' => 'customer-print']);
        Permission::create(['name' => 'customer-approve']);
        Permission::create(['name' => 'customer-reject']);
        Permission::create(['name' => 'customer-void']);

        // COMPANY STRUCTUR & DEPARTEMENT entity permissions:

        Permission::create(['name' => 'csd-create']);
        Permission::create(['name' => 'csd-read']);
        Permission::create(['name' => 'csd-edit']);
        Permission::create(['name' => 'csd-delete']);
        Permission::create(['name' => 'csd-remove']);
        Permission::create(['name' => 'csd-report']);
        Permission::create(['name' => 'csd-print']);
        Permission::create(['name' => 'csd-approve']);
        Permission::create(['name' => 'csd-reject']);
        Permission::create(['name' => 'csd-void']);

        // CALENDAR entity permissions:

        Permission::create(['name' => 'calendar-create']);
        Permission::create(['name' => 'calendar-read']);
        Permission::create(['name' => 'calendar-edit']);
        Permission::create(['name' => 'calendar-delete']);
        Permission::create(['name' => 'calendar-remove']);
        Permission::create(['name' => 'calendar-report']);
        Permission::create(['name' => 'calendar-print']);
        Permission::create(['name' => 'calendar-approve']);
        Permission::create(['name' => 'calendar-reject']);
        Permission::create(['name' => 'calendar-void']);

        // CASHBOOK entity permissions:

        Permission::create(['name' => 'cashbook-create']);
        Permission::create(['name' => 'cashbook-read']);
        Permission::create(['name' => 'cashbook-edit']);
        Permission::create(['name' => 'cashbook-delete']);
        Permission::create(['name' => 'cashbook-remove']);
        Permission::create(['name' => 'cashbook-report']);
        Permission::create(['name' => 'cashbook-print']);
        Permission::create(['name' => 'cashbook-approve']);
        Permission::create(['name' => 'cashbook-reject']);
        Permission::create(['name' => 'cashbook-void']);

        // COA entity permissions:

        Permission::create(['name' => 'coa-create']);
        Permission::create(['name' => 'coa-read']);
        Permission::create(['name' => 'coa-edit']);
        Permission::create(['name' => 'coa-delete']);
        Permission::create(['name' => 'coa-remove']);
        Permission::create(['name' => 'coa-report']);
        Permission::create(['name' => 'coa-print']);
        Permission::create(['name' => 'coa-approve']);
        Permission::create(['name' => 'coa-reject']);
        Permission::create(['name' => 'coa-void']);

        // DISCREPANCY FOUND entity permissions:

        Permission::create(['name' => 'discrepancy-create']);
        Permission::create(['name' => 'discrepancy-read']);
        Permission::create(['name' => 'discrepancy-edit']);
        Permission::create(['name' => 'discrepancy-delete']);
        Permission::create(['name' => 'discrepancy-remove']);
        Permission::create(['name' => 'discrepancy-report']);
        Permission::create(['name' => 'discrepancy-print']);
        Permission::create(['name' => 'discrepancy-approve']);
        Permission::create(['name' => 'discrepancy-reject']);
        Permission::create(['name' => 'discrepancy-void']);

        // DEFECTCARD entity permissions:

        Permission::create(['name' => 'defectcard-create']);
        Permission::create(['name' => 'defectcard-read']);
        Permission::create(['name' => 'defectcard-edit']);
        Permission::create(['name' => 'defectcard-delete']);
        Permission::create(['name' => 'defectcard-remove']);
        Permission::create(['name' => 'defectcard-report']);
        Permission::create(['name' => 'defectcard-print']);
        Permission::create(['name' => 'defectcard-approve']);
        Permission::create(['name' => 'defectcard-reject']);
        Permission::create(['name' => 'defectcard-void']);

        // EMPLOYMENT STATUS entity permissions:

        Permission::create(['name' => 'employment-status-create']);
        Permission::create(['name' => 'employment-status-read']);
        Permission::create(['name' => 'employment-status-edit']);
        Permission::create(['name' => 'employment-status-delete']);
        Permission::create(['name' => 'employment-status-remove']);
        Permission::create(['name' => 'employment-status-report']);
        Permission::create(['name' => 'employment-status-print']);
        Permission::create(['name' => 'employment-status-approve']);
        Permission::create(['name' => 'employment-status-reject']);
        Permission::create(['name' => 'employment-status-void']);

        // EMPLOYEE entity permissions:

        Permission::create(['name' => 'employee-create']);
        Permission::create(['name' => 'employee-read']);
        Permission::create(['name' => 'employee-edit']);
        Permission::create(['name' => 'employee-delete']);
        Permission::create(['name' => 'employee-remove']);
        Permission::create(['name' => 'employee-report']);
        Permission::create(['name' => 'employee-print']);
        Permission::create(['name' => 'employee-approve']);
        Permission::create(['name' => 'employee-reject']);
        Permission::create(['name' => 'employee-void']);

        // EVENT/HOLIDAYS entity permissions:

        Permission::create(['name' => 'event-holiday-create']);
        Permission::create(['name' => 'event-holiday-read']);
        Permission::create(['name' => 'event-holiday-edit']);
        Permission::create(['name' => 'event-holiday-delete']);
        Permission::create(['name' => 'event-holiday-remove']);
        Permission::create(['name' => 'event-holiday-report']);
        Permission::create(['name' => 'event-holiday-print']);
        Permission::create(['name' => 'event-holiday-approve']);
        Permission::create(['name' => 'event-holiday-reject']);
        Permission::create(['name' => 'event-holiday-void']);

        // GOODS RECEIVED NOTE entity permissions:

        Permission::create(['name' => 'grn-create']);
        Permission::create(['name' => 'grn-read']);
        Permission::create(['name' => 'grn-edit']);
        Permission::create(['name' => 'grn-delete']);
        Permission::create(['name' => 'grn-remove']);
        Permission::create(['name' => 'grn-report']);
        Permission::create(['name' => 'grn-print']);
        Permission::create(['name' => 'grn-approve']);
        Permission::create(['name' => 'grn-reject']);
        Permission::create(['name' => 'grn-void']);

        // GSE/TOOL RETURNED entity permissions:

        Permission::create(['name' => 'gse-tool-create']);
        Permission::create(['name' => 'gse-tool-read']);
        Permission::create(['name' => 'gse-tool-edit']);
        Permission::create(['name' => 'gse-tool-delete']);
        Permission::create(['name' => 'gse-tool-remove']);
        Permission::create(['name' => 'gse-tool-report']);
        Permission::create(['name' => 'gse-tool-print']);
        Permission::create(['name' => 'gse-tool-approve']);
        Permission::create(['name' => 'gse-tool-reject']);
        Permission::create(['name' => 'gse-tool-void']);

        // INTERCHANGE entity permissions:

        Permission::create(['name' => 'interchange-create']);
        Permission::create(['name' => 'interchange-read']);
        Permission::create(['name' => 'interchange-edit']);
        Permission::create(['name' => 'interchange-delete']);
        Permission::create(['name' => 'interchange-remove']);
        Permission::create(['name' => 'interchange-report']);
        Permission::create(['name' => 'interchange-print']);
        Permission::create(['name' => 'interchange-approve']);
        Permission::create(['name' => 'interchange-reject']);
        Permission::create(['name' => 'interchange-void']);

        // IMPORT FROM FINGERPRINT MACHINE entity permissions:

        Permission::create(['name' => 'import-ffm-create']);
        Permission::create(['name' => 'import-ffm-read']);
        Permission::create(['name' => 'import-ffm-edit']);
        Permission::create(['name' => 'import-ffm-delete']);
        Permission::create(['name' => 'import-ffm-remove']);
        Permission::create(['name' => 'import-ffm-report']);
        Permission::create(['name' => 'import-ffm-print']);
        Permission::create(['name' => 'import-ffm-approve']);
        Permission::create(['name' => 'import-ffm-reject']);
        Permission::create(['name' => 'import-ffm-void']);

        // INVOICE entity permissions:

        Permission::create(['name' => 'invoice-create']);
        Permission::create(['name' => 'invoice-read']);
        Permission::create(['name' => 'invoice-edit']);
        Permission::create(['name' => 'invoice-delete']);
        Permission::create(['name' => 'invoice-remove']);
        Permission::create(['name' => 'invoice-report']);
        Permission::create(['name' => 'invoice-print']);
        Permission::create(['name' => 'invoice-approve']);
        Permission::create(['name' => 'invoice-reject']);
        Permission::create(['name' => 'invoice-void']);

        // ITEMS entity permissions:

        Permission::create(['name' => 'items-create']);
        Permission::create(['name' => 'items-read']);
        Permission::create(['name' => 'items-edit']);
        Permission::create(['name' => 'items-delete']);
        Permission::create(['name' => 'items-remove']);
        Permission::create(['name' => 'items-report']);
        Permission::create(['name' => 'items-print']);
        Permission::create(['name' => 'items-approve']);
        Permission::create(['name' => 'items-reject']);
        Permission::create(['name' => 'items-void']);

        // INVENTORY IN entity permissions:

        Permission::create(['name' => 'inventory-in-create']);
        Permission::create(['name' => 'inventory-in-read']);
        Permission::create(['name' => 'inventory-in-edit']);
        Permission::create(['name' => 'inventory-in-delete']);
        Permission::create(['name' => 'inventory-in-remove']);
        Permission::create(['name' => 'inventory-in-report']);
        Permission::create(['name' => 'inventory-in-print']);
        Permission::create(['name' => 'inventory-in-approve']);
        Permission::create(['name' => 'inventory-in-reject']);
        Permission::create(['name' => 'inventory-in-void']);

        // INVENTORY OUT entity permissions:

        Permission::create(['name' => 'inventory-out-create']);
        Permission::create(['name' => 'inventory-out-read']);
        Permission::create(['name' => 'inventory-out-edit']);
        Permission::create(['name' => 'inventory-out-delete']);
        Permission::create(['name' => 'inventory-out-remove']);
        Permission::create(['name' => 'inventory-out-report']);
        Permission::create(['name' => 'inventory-out-print']);
        Permission::create(['name' => 'inventory-out-approve']);
        Permission::create(['name' => 'inventory-out-reject']);
        Permission::create(['name' => 'inventory-out-void']);

        // JOBCARD entity permissions:

        Permission::create(['name' => 'jobcard-create']);
        Permission::create(['name' => 'jobcard-read']);
        Permission::create(['name' => 'jobcard-edit']);
        Permission::create(['name' => 'jobcard-delete']);
        Permission::create(['name' => 'jobcard-remove']);
        Permission::create(['name' => 'jobcard-report']);
        Permission::create(['name' => 'jobcard-print']);
        Permission::create(['name' => 'jobcard-approve']);
        Permission::create(['name' => 'jobcard-reject']);
        Permission::create(['name' => 'jobcard-void']);

        // JOBCARD HARD TIME entity permissions:

        Permission::create(['name' => 'jobcard-hardtime-create']);
        Permission::create(['name' => 'jobcard-hardtime-read']);
        Permission::create(['name' => 'jobcard-hardtime-edit']);
        Permission::create(['name' => 'jobcard-hardtime-delete']);
        Permission::create(['name' => 'jobcard-hardtime-remove']);
        Permission::create(['name' => 'jobcard-hardtime-report']);
        Permission::create(['name' => 'jobcard-hardtime-print']);
        Permission::create(['name' => 'jobcard-hardtime-approve']);
        Permission::create(['name' => 'jobcard-hardtime-reject']);
        Permission::create(['name' => 'jobcard-hardtime-void']);

        // LEAVE PERIOD entity permissions:

        Permission::create(['name' => 'leave-period-create']);
        Permission::create(['name' => 'leave-period-read']);
        Permission::create(['name' => 'leave-period-edit']);
        Permission::create(['name' => 'leave-period-delete']);
        Permission::create(['name' => 'leave-period-remove']);
        Permission::create(['name' => 'leave-period-report']);
        Permission::create(['name' => 'leave-period-print']);
        Permission::create(['name' => 'leave-period-approve']);
        Permission::create(['name' => 'leave-period-reject']);
        Permission::create(['name' => 'leave-period-void']);

        // LEAVE TYPES entity permissions:

        Permission::create(['name' => 'leave-types-create']);
        Permission::create(['name' => 'leave-types-read']);
        Permission::create(['name' => 'leave-types-edit']);
        Permission::create(['name' => 'leave-types-delete']);
        Permission::create(['name' => 'leave-types-remove']);
        Permission::create(['name' => 'leave-types-report']);
        Permission::create(['name' => 'leave-types-print']);
        Permission::create(['name' => 'leave-types-approve']);
        Permission::create(['name' => 'leave-types-reject']);
        Permission::create(['name' => 'leave-types-void']);

        // LEAVE REPORT entity permissions:

        Permission::create(['name' => 'leave-report-create']);
        Permission::create(['name' => 'leave-report-read']);
        Permission::create(['name' => 'leave-report-edit']);
        Permission::create(['name' => 'leave-report-delete']);
        Permission::create(['name' => 'leave-report-remove']);
        Permission::create(['name' => 'leave-report-report']);
        Permission::create(['name' => 'leave-report-print']);
        Permission::create(['name' => 'leave-report-approve']);
        Permission::create(['name' => 'leave-report-reject']);
        Permission::create(['name' => 'leave-report-void']);

        // LEAVE DATALIST entity permissions:

        Permission::create(['name' => 'leave-datalist-create']);
        Permission::create(['name' => 'leave-datalist-read']);
        Permission::create(['name' => 'leave-datalist-edit']);
        Permission::create(['name' => 'leave-datalist-delete']);
        Permission::create(['name' => 'leave-datalist-remove']);
        Permission::create(['name' => 'leave-datalist-report']);
        Permission::create(['name' => 'leave-datalist-print']);
        Permission::create(['name' => 'leave-datalist-approve']);
        Permission::create(['name' => 'leave-datalist-reject']);
        Permission::create(['name' => 'leave-datalist-void']);

        // MATERIAL REQUEST JOBCARD entity permissions:

        Permission::create(['name' => 'mrj-create']);
        Permission::create(['name' => 'mrj-read']);
        Permission::create(['name' => 'mrj-edit']);
        Permission::create(['name' => 'mrj-delete']);
        Permission::create(['name' => 'mrj-remove']);
        Permission::create(['name' => 'mrj-report']);
        Permission::create(['name' => 'mrj-print']);
        Permission::create(['name' => 'mrj-approve']);
        Permission::create(['name' => 'mrj-reject']);
        Permission::create(['name' => 'mrj-void']);

        // MATERIAL TRANSFER entity permissions:

        Permission::create(['name' => 'material-transfer-create']);
        Permission::create(['name' => 'material-transfer-read']);
        Permission::create(['name' => 'material-transfer-edit']);
        Permission::create(['name' => 'material-transfer-delete']);
        Permission::create(['name' => 'material-transfer-remove']);
        Permission::create(['name' => 'material-transfer-report']);
        Permission::create(['name' => 'material-transfer-print']);
        Permission::create(['name' => 'material-transfer-approve']);
        Permission::create(['name' => 'material-transfer-reject']);
        Permission::create(['name' => 'material-transfer-void']);

        // MASTER entity permissions:

        Permission::create(['name' => 'master-create']);
        Permission::create(['name' => 'master-read']);
        Permission::create(['name' => 'master-edit']);
        Permission::create(['name' => 'master-delete']);
        Permission::create(['name' => 'master-remove']);
        Permission::create(['name' => 'master-report']);
        Permission::create(['name' => 'master-print']);
        Permission::create(['name' => 'master-approve']);
        Permission::create(['name' => 'master-reject']);
        Permission::create(['name' => 'master-void']);

        // OVERTIME entity permissions:

        Permission::create(['name' => 'overtime-create']);
        Permission::create(['name' => 'overtime-read']);
        Permission::create(['name' => 'overtime-edit']);
        Permission::create(['name' => 'overtime-delete']);
        Permission::create(['name' => 'overtime-remove']);
        Permission::create(['name' => 'overtime-report']);
        Permission::create(['name' => 'overtime-print']);
        Permission::create(['name' => 'overtime-approve']);
        Permission::create(['name' => 'overtime-reject']);
        Permission::create(['name' => 'overtime-void']);

        // PROJECT entity permissions:

        Permission::create(['name' => 'project-create']);
        Permission::create(['name' => 'project-read']);
        Permission::create(['name' => 'project-edit']);
        Permission::create(['name' => 'project-delete']);
        Permission::create(['name' => 'project-remove']);
        Permission::create(['name' => 'project-report']);
        Permission::create(['name' => 'project-print']);
        Permission::create(['name' => 'project-approve']);
        Permission::create(['name' => 'project-reject']);
        Permission::create(['name' => 'project-void']);

        // PURCHASE REQUEST entity permissions:

        Permission::create(['name' => 'purchase-request-create']);
        Permission::create(['name' => 'purchase-request-read']);
        Permission::create(['name' => 'purchase-request-edit']);
        Permission::create(['name' => 'purchase-request-delete']);
        Permission::create(['name' => 'purchase-request-remove']);
        Permission::create(['name' => 'purchase-request-report']);
        Permission::create(['name' => 'purchase-request-print']);
        Permission::create(['name' => 'purchase-request-approve']);
        Permission::create(['name' => 'purchase-request-reject']);
        Permission::create(['name' => 'purchase-request-void']);

        // PRICE LIST entity permissions:

        Permission::create(['name' => 'pricelist-create']);
        Permission::create(['name' => 'pricelist-read']);
        Permission::create(['name' => 'pricelist-edit']);
        Permission::create(['name' => 'pricelist-delete']);
        Permission::create(['name' => 'pricelist-remove']);
        Permission::create(['name' => 'pricelist-report']);
        Permission::create(['name' => 'pricelist-print']);
        Permission::create(['name' => 'pricelist-approve']);
        Permission::create(['name' => 'pricelist-reject']);
        Permission::create(['name' => 'pricelist-void']);

        // PURCHASE ORDER entity permissions:

        Permission::create(['name' => 'purchase-order-create']);
        Permission::create(['name' => 'purchase-order-read']);
        Permission::create(['name' => 'purchase-order-edit']);
        Permission::create(['name' => 'purchase-order-delete']);
        Permission::create(['name' => 'purchase-order-remove']);
        Permission::create(['name' => 'purchase-order-report']);
        Permission::create(['name' => 'purchase-order-print']);
        Permission::create(['name' => 'purchase-order-approve']);
        Permission::create(['name' => 'purchase-order-reject']);
        Permission::create(['name' => 'purchase-order-void']);

        // POSITION entity permissions:

        Permission::create(['name' => 'position-create']);
        Permission::create(['name' => 'position-read']);
        Permission::create(['name' => 'position-edit']);
        Permission::create(['name' => 'position-delete']);
        Permission::create(['name' => 'position-remove']);
        Permission::create(['name' => 'position-report']);
        Permission::create(['name' => 'position-print']);
        Permission::create(['name' => 'position-approve']);
        Permission::create(['name' => 'position-reject']);
        Permission::create(['name' => 'position-void']);

        // PROPOSE LEAVE entity permissions:

        Permission::create(['name' => 'propose-leave-create']);
        Permission::create(['name' => 'propose-leave-read']);
        Permission::create(['name' => 'propose-leave-edit']);
        Permission::create(['name' => 'propose-leave-delete']);
        Permission::create(['name' => 'propose-leave-remove']);
        Permission::create(['name' => 'propose-leave-report']);
        Permission::create(['name' => 'propose-leave-print']);
        Permission::create(['name' => 'propose-leave-approve']);
        Permission::create(['name' => 'propose-leave-reject']);
        Permission::create(['name' => 'propose-leave-void']);

        // QUOTATION entity permissions:

        Permission::create(['name' => 'quotation-create']);
        Permission::create(['name' => 'quotation-read']);
        Permission::create(['name' => 'quotation-edit']);
        Permission::create(['name' => 'quotation-delete']);
        Permission::create(['name' => 'quotation-remove']);
        Permission::create(['name' => 'quotation-report']);
        Permission::create(['name' => 'quotation-print']);
        Permission::create(['name' => 'quotation-approve']);
        Permission::create(['name' => 'quotation-reject']);
        Permission::create(['name' => 'quotation-void']);

        // RELEASE TO SERVICE entity permissions:

        Permission::create(['name' => 'rts-create']);
        Permission::create(['name' => 'rts-read']);
        Permission::create(['name' => 'rts-edit']);
        Permission::create(['name' => 'rts-delete']);
        Permission::create(['name' => 'rts-remove']);
        Permission::create(['name' => 'rts-report']);
        Permission::create(['name' => 'rts-print']);
        Permission::create(['name' => 'rts-approve']);
        Permission::create(['name' => 'rts-reject']);
        Permission::create(['name' => 'rts-void']);

        // RECEIVING INSPECTION REPORT entity permissions:

        Permission::create(['name' => 'receiving-ir-create']);
        Permission::create(['name' => 'receiving-ir-read']);
        Permission::create(['name' => 'receiving-ir-edit']);
        Permission::create(['name' => 'receiving-ir-delete']);
        Permission::create(['name' => 'receiving-ir-remove']);
        Permission::create(['name' => 'receiving-ir-report']);
        Permission::create(['name' => 'receiving-ir-print']);
        Permission::create(['name' => 'receiving-ir-approve']);
        Permission::create(['name' => 'receiving-ir-reject']);
        Permission::create(['name' => 'receiving-ir-void']);

        // SETTING entity permissions:

        Permission::create(['name' => 'setting-create']);
        Permission::create(['name' => 'setting-read']);
        Permission::create(['name' => 'setting-edit']);
        Permission::create(['name' => 'setting-delete']);
        Permission::create(['name' => 'setting-remove']);
        Permission::create(['name' => 'setting-report']);
        Permission::create(['name' => 'setting-print']);
        Permission::create(['name' => 'setting-approve']);
        Permission::create(['name' => 'setting-reject']);
        Permission::create(['name' => 'setting-void']);

        // TASKCARD entity permissions:

        Permission::create(['name' => 'taskcard-create']);
        Permission::create(['name' => 'taskcard-read']);
        Permission::create(['name' => 'taskcard-edit']);
        Permission::create(['name' => 'taskcard-delete']);
        Permission::create(['name' => 'taskcard-remove']);
        Permission::create(['name' => 'taskcard-report']);
        Permission::create(['name' => 'taskcard-print']);
        Permission::create(['name' => 'taskcard-approve']);
        Permission::create(['name' => 'taskcard-reject']);
        Permission::create(['name' => 'taskcard-void']);

        // TOOL REQUEST JOBCARD entity permissions:

        Permission::create(['name' => 'trj-create']);
        Permission::create(['name' => 'trj-read']);
        Permission::create(['name' => 'trj-edit']);
        Permission::create(['name' => 'trj-delete']);
        Permission::create(['name' => 'trj-remove']);
        Permission::create(['name' => 'trj-report']);
        Permission::create(['name' => 'trj-print']);
        Permission::create(['name' => 'trj-approve']);
        Permission::create(['name' => 'trj-reject']);
        Permission::create(['name' => 'trj-void']);

        // USER entity permissions:

        Permission::create(['name' => 'user-create']);
        Permission::create(['name' => 'user-read']);
        Permission::create(['name' => 'user-edit']);
        Permission::create(['name' => 'user-delete']);
        Permission::create(['name' => 'user-remove']);
        Permission::create(['name' => 'user-report']);
        Permission::create(['name' => 'user-print']);
        Permission::create(['name' => 'user-approve']);
        Permission::create(['name' => 'user-reject']);
        Permission::create(['name' => 'user-void']);

        // VENDOR entity permissions:

        Permission::create(['name' => 'vendor-create']);
        Permission::create(['name' => 'vendor-read']);
        Permission::create(['name' => 'vendor-edit']);
        Permission::create(['name' => 'vendor-delete']);
        Permission::create(['name' => 'vendor-remove']);
        Permission::create(['name' => 'vendor-report']);
        Permission::create(['name' => 'vendor-print']);
        Permission::create(['name' => 'vendor-approve']);
        Permission::create(['name' => 'vendor-reject']);
        Permission::create(['name' => 'vendor-void']);

        // WORKSHIFT SCHEDULE entity permissions:

        Permission::create(['name' => 'workshift-schedule-create']);
        Permission::create(['name' => 'workshift-schedule-read']);
        Permission::create(['name' => 'workshift-schedule-edit']);
        Permission::create(['name' => 'workshift-schedule-delete']);
        Permission::create(['name' => 'workshift-schedule-remove']);
        Permission::create(['name' => 'workshift-schedule-report']);
        Permission::create(['name' => 'workshift-schedule-print']);
        Permission::create(['name' => 'workshift-schedule-approve']);
        Permission::create(['name' => 'workshift-schedule-reject']);
        Permission::create(['name' => 'workshift-schedule-void']);

        // WORKPACKAGE entity permissions:

        Permission::create(['name' => 'workpackage-create']);
        Permission::create(['name' => 'workpackage-read']);
        Permission::create(['name' => 'workpackage-edit']);
        Permission::create(['name' => 'workpackage-delete']);
        Permission::create(['name' => 'workpackage-remove']);
        Permission::create(['name' => 'workpackage-report']);
        Permission::create(['name' => 'workpackage-print']);
        Permission::create(['name' => 'workpackage-approve']);
        Permission::create(['name' => 'workpackage-reject']);
        Permission::create(['name' => 'workpackage-void']);

        // WORK PROGRESS REPORT entity permissions:

        Permission::create(['name' => 'wpr-create']);
        Permission::create(['name' => 'wpr-read']);
        Permission::create(['name' => 'wpr-edit']);
        Permission::create(['name' => 'wpr-delete']);
        Permission::create(['name' => 'wpr-remove']);
        Permission::create(['name' => 'wpr-report']);
        Permission::create(['name' => 'wpr-print']);
        Permission::create(['name' => 'wpr-approve']);
        Permission::create(['name' => 'wpr-reject']);
        Permission::create(['name' => 'wpr-void']);

    }
}
