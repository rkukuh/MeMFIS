<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ADMIN role permissions:

        $admin = Role::where('name', 'admin')->first();

        $permissions = Permission::get();
        $admin->syncPermissions($permissions);

        // MARKETING role permissions:

        $marketing = Role::where('name', 'marketing')->first();

        $marketing->givePermissionTo('customer-create');
        $marketing->givePermissionTo('customer-read');
        $marketing->givePermissionTo('customer-edit');
        $marketing->givePermissionTo('customer-delete');
        $marketing->givePermissionTo('customer-remove');
        $marketing->givePermissionTo('customer-report');
        $marketing->givePermissionTo('customer-print');
        $marketing->givePermissionTo('customer-approve');
        $marketing->givePermissionTo('customer-reject');
        $marketing->givePermissionTo('customer-void');

        $marketing->givePermissionTo('pricelist-create');
        $marketing->givePermissionTo('pricelist-read');
        $marketing->givePermissionTo('pricelist-edit');
        $marketing->givePermissionTo('pricelist-delete');
        $marketing->givePermissionTo('pricelist-remove');
        $marketing->givePermissionTo('pricelist-report');
        $marketing->givePermissionTo('pricelist-print');
        $marketing->givePermissionTo('pricelist-approve');
        $marketing->givePermissionTo('pricelist-reject');
        $marketing->givePermissionTo('pricelist-void');

        $marketing->givePermissionTo('quotation-create');
        $marketing->givePermissionTo('quotation-read');
        $marketing->givePermissionTo('quotation-edit');
        $marketing->givePermissionTo('quotation-delete');
        $marketing->givePermissionTo('quotation-remove');
        $marketing->givePermissionTo('quotation-report');
        $marketing->givePermissionTo('quotation-print');
        $marketing->givePermissionTo('quotation-approve');
        $marketing->givePermissionTo('quotation-reject');
        $marketing->givePermissionTo('quotation-void');

        // ppic role permissions:

        $ppic = Role::where('name', 'ppic')->first();

        $ppic->givePermissionTo('aircraft-create');
        $ppic->givePermissionTo('aircraft-read');
        $ppic->givePermissionTo('aircraft-edit');
        $ppic->givePermissionTo('aircraft-delete');
        $ppic->givePermissionTo('aircraft-remove');
        $ppic->givePermissionTo('aircraft-report');
        $ppic->givePermissionTo('aircraft-print');
        $ppic->givePermissionTo('aircraft-approve');
        $ppic->givePermissionTo('aircraft-reject');
        $ppic->givePermissionTo('aircraft-void');

        $ppic->givePermissionTo('defectcard-create');
        $ppic->givePermissionTo('defectcard-read');
        $ppic->givePermissionTo('defectcard-edit');
        $ppic->givePermissionTo('defectcard-delete');
        $ppic->givePermissionTo('defectcard-remove');
        $ppic->givePermissionTo('defectcard-report');
        $ppic->givePermissionTo('defectcard-print');
        $ppic->givePermissionTo('defectcard-approve');
        $ppic->givePermissionTo('defectcard-reject');
        $ppic->givePermissionTo('defectcard-void');

        $ppic->givePermissionTo('discrepancy-create');
        $ppic->givePermissionTo('discrepancy-read');
        $ppic->givePermissionTo('discrepancy-edit');
        $ppic->givePermissionTo('discrepancy-delete');
        $ppic->givePermissionTo('discrepancy-remove');
        $ppic->givePermissionTo('discrepancy-report');
        $ppic->givePermissionTo('discrepancy-print');
        $ppic->givePermissionTo('discrepancy-approve');
        $ppic->givePermissionTo('discrepancy-reject');
        $ppic->givePermissionTo('discrepancy-void');

        $ppic->givePermissionTo('jobcard-create');
        $ppic->givePermissionTo('jobcard-read');
        $ppic->givePermissionTo('jobcard-edit');
        $ppic->givePermissionTo('jobcard-delete');
        $ppic->givePermissionTo('jobcard-remove');
        $ppic->givePermissionTo('jobcard-report');
        $ppic->givePermissionTo('jobcard-print');
        $ppic->givePermissionTo('jobcard-approve');
        $ppic->givePermissionTo('jobcard-reject');
        $ppic->givePermissionTo('jobcard-void');

        $ppic->givePermissionTo('manufacturer-create');
        $ppic->givePermissionTo('manufacturer-read');
        $ppic->givePermissionTo('manufacturer-edit');
        $ppic->givePermissionTo('manufacturer-delete');
        $ppic->givePermissionTo('manufacturer-remove');
        $ppic->givePermissionTo('manufacturer-report');
        $ppic->givePermissionTo('manufacturer-print');
        $ppic->givePermissionTo('manufacturer-approve');
        $ppic->givePermissionTo('manufacturer-reject');
        $ppic->givePermissionTo('manufacturer-void');

        $ppic->givePermissionTo('project-create');
        $ppic->givePermissionTo('project-read');
        $ppic->givePermissionTo('project-edit');
        $ppic->givePermissionTo('project-delete');
        $ppic->givePermissionTo('project-remove');
        $ppic->givePermissionTo('project-report');
        $ppic->givePermissionTo('project-print');
        $ppic->givePermissionTo('project-approve');
        $ppic->givePermissionTo('project-reject');
        $ppic->givePermissionTo('project-void');

        $ppic->givePermissionTo('rts-create');
        $ppic->givePermissionTo('rts-read');
        $ppic->givePermissionTo('rts-edit');
        $ppic->givePermissionTo('rts-delete');
        $ppic->givePermissionTo('rts-remove');
        $ppic->givePermissionTo('rts-report');
        $ppic->givePermissionTo('rts-print');
        $ppic->givePermissionTo('rts-approve');
        $ppic->givePermissionTo('rts-reject');
        $ppic->givePermissionTo('rts-void');

        $ppic->givePermissionTo('taskcard-create');
        $ppic->givePermissionTo('taskcard-read');
        $ppic->givePermissionTo('taskcard-edit');
        $ppic->givePermissionTo('taskcard-delete');
        $ppic->givePermissionTo('taskcard-remove');
        $ppic->givePermissionTo('taskcard-report');
        $ppic->givePermissionTo('taskcard-print');
        $ppic->givePermissionTo('taskcard-approve');
        $ppic->givePermissionTo('taskcard-reject');
        $ppic->givePermissionTo('taskcard-void');

        $ppic->givePermissionTo('wpr-create');
        $ppic->givePermissionTo('wpr-read');
        $ppic->givePermissionTo('wpr-edit');
        $ppic->givePermissionTo('wpr-delete');
        $ppic->givePermissionTo('wpr-remove');
        $ppic->givePermissionTo('wpr-report');
        $ppic->givePermissionTo('wpr-print');
        $ppic->givePermissionTo('wpr-approve');
        $ppic->givePermissionTo('wpr-reject');
        $ppic->givePermissionTo('wpr-void');

        $ppic->givePermissionTo('workpackage-create');
        $ppic->givePermissionTo('workpackage-read');
        $ppic->givePermissionTo('workpackage-edit');
        $ppic->givePermissionTo('workpackage-delete');
        $ppic->givePermissionTo('workpackage-remove');
        $ppic->givePermissionTo('workpackage-report');
        $ppic->givePermissionTo('workpackage-print');
        $ppic->givePermissionTo('workpackage-approve');
        $ppic->givePermissionTo('workpackage-reject');
        $ppic->givePermissionTo('workpackage-void');

        // SUPPLY CHAIN MANAGEMENT role permissions:

        $scm = Role::where('name', 'scm')->first();

        $scm->givePermissionTo('storage-create');
        $scm->givePermissionTo('storage-read');
        $scm->givePermissionTo('storage-edit');
        $scm->givePermissionTo('storage-delete');
        $scm->givePermissionTo('storage-remove');
        $scm->givePermissionTo('storage-report');
        $scm->givePermissionTo('storage-print');
        $scm->givePermissionTo('storage-approve');
        $scm->givePermissionTo('storage-reject');
        $scm->givePermissionTo('storage-void');

        $scm->givePermissionTo('unit-create');
        $scm->givePermissionTo('unit-read');
        $scm->givePermissionTo('unit-edit');
        $scm->givePermissionTo('unit-delete');
        $scm->givePermissionTo('unit-remove');
        $scm->givePermissionTo('unit-report');
        $scm->givePermissionTo('unit-print');
        $scm->givePermissionTo('unit-approve');
        $scm->givePermissionTo('unit-reject');
        $scm->givePermissionTo('unit-void');

        $scm->givePermissionTo('category-item-create');
        $scm->givePermissionTo('category-item-read');
        $scm->givePermissionTo('category-item-edit');
        $scm->givePermissionTo('category-item-delete');
        $scm->givePermissionTo('category-item-remove');
        $scm->givePermissionTo('category-item-report');
        $scm->givePermissionTo('category-item-print');
        $scm->givePermissionTo('category-item-approve');
        $scm->givePermissionTo('category-item-reject');
        $scm->givePermissionTo('category-item-void');

        $scm->givePermissionTo('item-create');
        $scm->givePermissionTo('item-read');
        $scm->givePermissionTo('item-edit');
        $scm->givePermissionTo('item-delete');
        $scm->givePermissionTo('item-remove');
        $scm->givePermissionTo('item-report');
        $scm->givePermissionTo('item-print');
        $scm->givePermissionTo('item-approve');
        $scm->givePermissionTo('item-reject');
        $scm->givePermissionTo('item-void');

        $scm->givePermissionTo('interchange-create');
        $scm->givePermissionTo('interchange-read');
        $scm->givePermissionTo('interchange-edit');
        $scm->givePermissionTo('interchange-delete');
        $scm->givePermissionTo('interchange-remove');
        $scm->givePermissionTo('interchange-report');
        $scm->givePermissionTo('interchange-print');
        $scm->givePermissionTo('interchange-approve');
        $scm->givePermissionTo('interchange-reject');
        $scm->givePermissionTo('interchange-void');

        $scm->givePermissionTo('vendor-create');
        $scm->givePermissionTo('vendor-read');
        $scm->givePermissionTo('vendor-edit');
        $scm->givePermissionTo('vendor-delete');
        $scm->givePermissionTo('vendor-remove');
        $scm->givePermissionTo('vendor-report');
        $scm->givePermissionTo('vendor-print');
        $scm->givePermissionTo('vendor-approve');
        $scm->givePermissionTo('vendor-reject');
        $scm->givePermissionTo('vendor-void');

        $scm->givePermissionTo('purchase-request-create');
        $scm->givePermissionTo('purchase-request-read');
        $scm->givePermissionTo('purchase-request-edit');
        $scm->givePermissionTo('purchase-request-delete');
        $scm->givePermissionTo('purchase-request-remove');
        $scm->givePermissionTo('purchase-request-report');
        $scm->givePermissionTo('purchase-request-print');
        $scm->givePermissionTo('purchase-request-approve');
        $scm->givePermissionTo('purchase-request-reject');
        $scm->givePermissionTo('purchase-request-void');

        $scm->givePermissionTo('purchase-order-create');
        $scm->givePermissionTo('purchase-order-read');
        $scm->givePermissionTo('purchase-order-edit');
        $scm->givePermissionTo('purchase-order-delete');
        $scm->givePermissionTo('purchase-order-remove');
        $scm->givePermissionTo('purchase-order-report');
        $scm->givePermissionTo('purchase-order-print');
        $scm->givePermissionTo('purchase-order-approve');
        $scm->givePermissionTo('purchase-order-reject');
        $scm->givePermissionTo('purchase-order-void');

        $scm->givePermissionTo('receiving-inspection-report-create');
        $scm->givePermissionTo('receiving-inspection-report-read');
        $scm->givePermissionTo('receiving-inspection-report-edit');
        $scm->givePermissionTo('receiving-inspection-report-delete');
        $scm->givePermissionTo('receiving-inspection-report-remove');
        $scm->givePermissionTo('receiving-inspection-report-report');
        $scm->givePermissionTo('receiving-inspection-report-print');
        $scm->givePermissionTo('receiving-inspection-report-approve');
        $scm->givePermissionTo('receiving-inspection-report-reject');
        $scm->givePermissionTo('receiving-inspection-report-void');

        $scm->givePermissionTo('grn-create');
        $scm->givePermissionTo('grn-read');
        $scm->givePermissionTo('grn-edit');
        $scm->givePermissionTo('grn-delete');
        $scm->givePermissionTo('grn-remove');
        $scm->givePermissionTo('grn-report');
        $scm->givePermissionTo('grn-print');
        $scm->givePermissionTo('grn-approve');
        $scm->givePermissionTo('grn-reject');
        $scm->givePermissionTo('grn-void');

        $scm->givePermissionTo('material-transfer-create');
        $scm->givePermissionTo('material-transfer-read');
        $scm->givePermissionTo('material-transfer-edit');
        $scm->givePermissionTo('material-transfer-delete');
        $scm->givePermissionTo('material-transfer-remove');
        $scm->givePermissionTo('material-transfer-report');
        $scm->givePermissionTo('material-transfer-print');
        $scm->givePermissionTo('material-transfer-approve');
        $scm->givePermissionTo('material-transfer-reject');
        $scm->givePermissionTo('material-transfer-void');

        $scm->givePermissionTo('mrj-create');
        $scm->givePermissionTo('mrj-read');
        $scm->givePermissionTo('mrj-edit');
        $scm->givePermissionTo('mrj-delete');
        $scm->givePermissionTo('mrj-remove');
        $scm->givePermissionTo('mrj-report');
        $scm->givePermissionTo('mrj-print');
        $scm->givePermissionTo('mrj-approve');
        $scm->givePermissionTo('mrj-reject');
        $scm->givePermissionTo('mrj-void');

        $scm->givePermissionTo('trj-create');
        $scm->givePermissionTo('trj-read');
        $scm->givePermissionTo('trj-edit');
        $scm->givePermissionTo('trj-delete');
        $scm->givePermissionTo('trj-remove');
        $scm->givePermissionTo('trj-report');
        $scm->givePermissionTo('trj-print');
        $scm->givePermissionTo('trj-approve');
        $scm->givePermissionTo('trj-reject');
        $scm->givePermissionTo('trj-void');

        $scm->givePermissionTo('inventory-in-create');
        $scm->givePermissionTo('inventory-in-read');
        $scm->givePermissionTo('inventory-in-edit');
        $scm->givePermissionTo('inventory-in-delete');
        $scm->givePermissionTo('inventory-in-remove');
        $scm->givePermissionTo('inventory-in-report');
        $scm->givePermissionTo('inventory-in-print');
        $scm->givePermissionTo('inventory-in-approve');
        $scm->givePermissionTo('inventory-in-reject');
        $scm->givePermissionTo('inventory-in-void');

        $scm->givePermissionTo('inventory-out-create');
        $scm->givePermissionTo('inventory-out-read');
        $scm->givePermissionTo('inventory-out-edit');
        $scm->givePermissionTo('inventory-out-delete');
        $scm->givePermissionTo('inventory-out-remove');
        $scm->givePermissionTo('inventory-out-report');
        $scm->givePermissionTo('inventory-out-print');
        $scm->givePermissionTo('inventory-out-approve');
        $scm->givePermissionTo('inventory-out-reject');
        $scm->givePermissionTo('inventory-out-void');

        $scm->givePermissionTo('gse-tool-create');
        $scm->givePermissionTo('gse-tool-read');
        $scm->givePermissionTo('gse-tool-edit');
        $scm->givePermissionTo('gse-tool-delete');
        $scm->givePermissionTo('gse-tool-remove');
        $scm->givePermissionTo('gse-tool-report');
        $scm->givePermissionTo('gse-tool-print');
        $scm->givePermissionTo('gse-tool-approve');
        $scm->givePermissionTo('gse-tool-reject');
        $scm->givePermissionTo('gse-tool-void');

        $scm->givePermissionTo('stock-monitoring-create');
        $scm->givePermissionTo('stock-monitoring-read');
        $scm->givePermissionTo('stock-monitoring-edit');
        $scm->givePermissionTo('stock-monitoring-delete');
        $scm->givePermissionTo('stock-monitoring-remove');
        $scm->givePermissionTo('stock-monitoring-report');
        $scm->givePermissionTo('stock-monitoring-print');
        $scm->givePermissionTo('stock-monitoring-approve');
        $scm->givePermissionTo('stock-monitoring-reject');
        $scm->givePermissionTo('stock-monitoring-void');

        // HUMAN RESOURCE DEPARTMENT role permissions:

        $hrd = Role::where('name', 'hrd')->first();

        $hrd->givePermissionTo('attendance-list-create');
        $hrd->givePermissionTo('attendance-list-read');
        $hrd->givePermissionTo('attendance-list-edit');
        $hrd->givePermissionTo('attendance-list-delete');
        $hrd->givePermissionTo('attendance-list-remove');
        $hrd->givePermissionTo('attendance-list-report');
        $hrd->givePermissionTo('attendance-list-print');
        $hrd->givePermissionTo('attendance-list-approve');
        $hrd->givePermissionTo('attendance-list-reject');
        $hrd->givePermissionTo('attendance-list-void');

        $hrd->givePermissionTo('attendance-correction-create');
        $hrd->givePermissionTo('attendance-correction-read');
        $hrd->givePermissionTo('attendance-correction-edit');
        $hrd->givePermissionTo('attendance-correction-delete');
        $hrd->givePermissionTo('attendance-correction-remove');
        $hrd->givePermissionTo('attendance-correction-report');
        $hrd->givePermissionTo('attendance-correction-print');
        $hrd->givePermissionTo('attendance-correction-approve');
        $hrd->givePermissionTo('attendance-correction-reject');
        $hrd->givePermissionTo('attendance-correction-void');

        $hrd->givePermissionTo('benefit-create');
        $hrd->givePermissionTo('benefit-read');
        $hrd->givePermissionTo('benefit-edit');
        $hrd->givePermissionTo('benefit-delete');
        $hrd->givePermissionTo('benefit-remove');
        $hrd->givePermissionTo('benefit-report');
        $hrd->givePermissionTo('benefit-print');
        $hrd->givePermissionTo('benefit-approve');
        $hrd->givePermissionTo('benefit-reject');
        $hrd->givePermissionTo('benefit-void');

        $hrd->givePermissionTo('csd-create');
        $hrd->givePermissionTo('csd-read');
        $hrd->givePermissionTo('csd-edit');
        $hrd->givePermissionTo('csd-delete');
        $hrd->givePermissionTo('csd-remove');
        $hrd->givePermissionTo('csd-report');
        $hrd->givePermissionTo('csd-print');
        $hrd->givePermissionTo('csd-approve');
        $hrd->givePermissionTo('csd-reject');
        $hrd->givePermissionTo('csd-void');

        $hrd->givePermissionTo('employee-create');
        $hrd->givePermissionTo('employee-read');
        $hrd->givePermissionTo('employee-edit');
        $hrd->givePermissionTo('employee-delete');
        $hrd->givePermissionTo('employee-remove');
        $hrd->givePermissionTo('employee-report');
        $hrd->givePermissionTo('employee-print');
        $hrd->givePermissionTo('employee-approve');
        $hrd->givePermissionTo('employee-reject');
        $hrd->givePermissionTo('employee-void');

        $hrd->givePermissionTo('employment-status-create');
        $hrd->givePermissionTo('employment-status-read');
        $hrd->givePermissionTo('employment-status-edit');
        $hrd->givePermissionTo('employment-status-delete');
        $hrd->givePermissionTo('employment-status-remove');
        $hrd->givePermissionTo('employment-status-report');
        $hrd->givePermissionTo('employment-status-print');
        $hrd->givePermissionTo('employment-status-approve');
        $hrd->givePermissionTo('employment-status-reject');
        $hrd->givePermissionTo('employment-status-void');

        $hrd->givePermissionTo('event-holiday-create');
        $hrd->givePermissionTo('event-holiday-read');
        $hrd->givePermissionTo('event-holiday-edit');
        $hrd->givePermissionTo('event-holiday-delete');
        $hrd->givePermissionTo('event-holiday-remove');
        $hrd->givePermissionTo('event-holiday-report');
        $hrd->givePermissionTo('event-holiday-print');
        $hrd->givePermissionTo('event-holiday-approve');
        $hrd->givePermissionTo('event-holiday-reject');
        $hrd->givePermissionTo('event-holiday-void');

        $hrd->givePermissionTo('import-ffm-create');
        $hrd->givePermissionTo('import-ffm-read');
        $hrd->givePermissionTo('import-ffm-edit');
        $hrd->givePermissionTo('import-ffm-delete');
        $hrd->givePermissionTo('import-ffm-remove');
        $hrd->givePermissionTo('import-ffm-report');
        $hrd->givePermissionTo('import-ffm-print');
        $hrd->givePermissionTo('import-ffm-approve');
        $hrd->givePermissionTo('import-ffm-reject');
        $hrd->givePermissionTo('import-ffm-void');

        $hrd->givePermissionTo('leave-period-create');
        $hrd->givePermissionTo('leave-period-read');
        $hrd->givePermissionTo('leave-period-edit');
        $hrd->givePermissionTo('leave-period-delete');
        $hrd->givePermissionTo('leave-period-remove');
        $hrd->givePermissionTo('leave-period-report');
        $hrd->givePermissionTo('leave-period-print');
        $hrd->givePermissionTo('leave-period-approve');
        $hrd->givePermissionTo('leave-period-reject');
        $hrd->givePermissionTo('leave-period-void');

        $hrd->givePermissionTo('leave-types-create');
        $hrd->givePermissionTo('leave-types-read');
        $hrd->givePermissionTo('leave-types-edit');
        $hrd->givePermissionTo('leave-types-delete');
        $hrd->givePermissionTo('leave-types-remove');
        $hrd->givePermissionTo('leave-types-report');
        $hrd->givePermissionTo('leave-types-print');
        $hrd->givePermissionTo('leave-types-approve');
        $hrd->givePermissionTo('leave-types-reject');
        $hrd->givePermissionTo('leave-types-void');

        $hrd->givePermissionTo('overtime-create');
        $hrd->givePermissionTo('overtime-read');
        $hrd->givePermissionTo('overtime-edit');
        $hrd->givePermissionTo('overtime-delete');
        $hrd->givePermissionTo('overtime-remove');
        $hrd->givePermissionTo('overtime-report');
        $hrd->givePermissionTo('overtime-print');
        $hrd->givePermissionTo('overtime-approve');
        $hrd->givePermissionTo('overtime-reject');
        $hrd->givePermissionTo('overtime-void');

        $hrd->givePermissionTo('payroll-create');
        $hrd->givePermissionTo('payroll-read');
        $hrd->givePermissionTo('payroll-edit');
        $hrd->givePermissionTo('payroll-delete');
        $hrd->givePermissionTo('payroll-remove');
        $hrd->givePermissionTo('payroll-report');
        $hrd->givePermissionTo('payroll-print');
        $hrd->givePermissionTo('payroll-approve');
        $hrd->givePermissionTo('payroll-reject');
        $hrd->givePermissionTo('payroll-void');

        $hrd->givePermissionTo('position-create');
        $hrd->givePermissionTo('position-read');
        $hrd->givePermissionTo('position-edit');
        $hrd->givePermissionTo('position-delete');
        $hrd->givePermissionTo('position-remove');
        $hrd->givePermissionTo('position-report');
        $hrd->givePermissionTo('position-print');
        $hrd->givePermissionTo('position-approve');
        $hrd->givePermissionTo('position-reject');
        $hrd->givePermissionTo('position-void');

        $hrd->givePermissionTo('purchase-request-create');
        $hrd->givePermissionTo('purchase-request-read');
        $hrd->givePermissionTo('purchase-request-edit');
        $hrd->givePermissionTo('purchase-request-delete');
        $hrd->givePermissionTo('purchase-request-remove');
        $hrd->givePermissionTo('purchase-request-report');
        $hrd->givePermissionTo('purchase-request-print');
        $hrd->givePermissionTo('purchase-request-approve');
        $hrd->givePermissionTo('purchase-request-reject');
        $hrd->givePermissionTo('purchase-request-void');

        $hrd->givePermissionTo('propose-leave-create');
        $hrd->givePermissionTo('propose-leave-read');
        $hrd->givePermissionTo('propose-leave-edit');
        $hrd->givePermissionTo('propose-leave-delete');
        $hrd->givePermissionTo('propose-leave-remove');
        $hrd->givePermissionTo('propose-leave-report');
        $hrd->givePermissionTo('propose-leave-print');
        $hrd->givePermissionTo('propose-leave-approve');
        $hrd->givePermissionTo('propose-leave-reject');
        $hrd->givePermissionTo('propose-leave-void');

        $hrd->givePermissionTo('workshift-schedule-create');
        $hrd->givePermissionTo('workshift-schedule-read');
        $hrd->givePermissionTo('workshift-schedule-edit');
        $hrd->givePermissionTo('workshift-schedule-delete');
        $hrd->givePermissionTo('workshift-schedule-remove');
        $hrd->givePermissionTo('workshift-schedule-report');
        $hrd->givePermissionTo('workshift-schedule-print');
        $hrd->givePermissionTo('workshift-schedule-approve');
        $hrd->givePermissionTo('workshift-schedule-reject');
        $hrd->givePermissionTo('workshift-schedule-void');

        // FINANCE ACCOUNTING role permissions:

        $fa = Role::where('name', 'finance')->first();

        $fa->givePermissionTo('account-receivable-create');
        $fa->givePermissionTo('account-receivable-read');
        $fa->givePermissionTo('account-receivable-edit');
        $fa->givePermissionTo('account-receivable-delete');
        $fa->givePermissionTo('account-receivable-remove');
        $fa->givePermissionTo('account-receivable-report');
        $fa->givePermissionTo('account-receivable-print');
        $fa->givePermissionTo('account-receivable-approve');
        $fa->givePermissionTo('account-receivable-reject');
        $fa->givePermissionTo('account-receivable-void');

        $fa->givePermissionTo('account-payable-create');
        $fa->givePermissionTo('account-payable-read');
        $fa->givePermissionTo('account-payable-edit');
        $fa->givePermissionTo('account-payable-delete');
        $fa->givePermissionTo('account-payable-remove');
        $fa->givePermissionTo('account-payable-report');
        $fa->givePermissionTo('account-payable-print');
        $fa->givePermissionTo('account-payable-approve');
        $fa->givePermissionTo('account-payable-reject');
        $fa->givePermissionTo('account-payable-void');

        $fa->givePermissionTo('asset-create');
        $fa->givePermissionTo('asset-read');
        $fa->givePermissionTo('asset-edit');
        $fa->givePermissionTo('asset-delete');
        $fa->givePermissionTo('asset-remove');
        $fa->givePermissionTo('asset-report');
        $fa->givePermissionTo('asset-print');
        $fa->givePermissionTo('asset-approve');
        $fa->givePermissionTo('asset-reject');
        $fa->givePermissionTo('asset-void');

        $fa->givePermissionTo('bank-create');
        $fa->givePermissionTo('bank-read');
        $fa->givePermissionTo('bank-edit');
        $fa->givePermissionTo('bank-delete');
        $fa->givePermissionTo('bank-remove');
        $fa->givePermissionTo('bank-report');
        $fa->givePermissionTo('bank-print');
        $fa->givePermissionTo('bank-approve');
        $fa->givePermissionTo('bank-reject');
        $fa->givePermissionTo('bank-void');

        $fa->givePermissionTo('balance-sheet-create');
        $fa->givePermissionTo('balance-sheet-read');
        $fa->givePermissionTo('balance-sheet-edit');
        $fa->givePermissionTo('balance-sheet-delete');
        $fa->givePermissionTo('balance-sheet-remove');
        $fa->givePermissionTo('balance-sheet-report');
        $fa->givePermissionTo('balance-sheet-print');
        $fa->givePermissionTo('balance-sheet-approve');
        $fa->givePermissionTo('balance-sheet-reject');
        $fa->givePermissionTo('balance-sheet-void');

        $fa->givePermissionTo('cashbook-create');
        $fa->givePermissionTo('cashbook-read');
        $fa->givePermissionTo('cashbook-edit');
        $fa->givePermissionTo('cashbook-delete');
        $fa->givePermissionTo('cashbook-remove');
        $fa->givePermissionTo('cashbook-report');
        $fa->givePermissionTo('cashbook-print');
        $fa->givePermissionTo('cashbook-approve');
        $fa->givePermissionTo('cashbook-reject');
        $fa->givePermissionTo('cashbook-void');

        $fa->givePermissionTo('cbr-create');
        $fa->givePermissionTo('cbr-read');
        $fa->givePermissionTo('cbr-edit');
        $fa->givePermissionTo('cbr-delete');
        $fa->givePermissionTo('cbr-remove');
        $fa->givePermissionTo('cbr-report');
        $fa->givePermissionTo('cbr-print');
        $fa->givePermissionTo('cbr-approve');
        $fa->givePermissionTo('cbr-reject');
        $fa->givePermissionTo('cbr-void');

        $fa->givePermissionTo('coa-create');
        $fa->givePermissionTo('coa-read');
        $fa->givePermissionTo('coa-edit');
        $fa->givePermissionTo('coa-delete');
        $fa->givePermissionTo('coa-remove');
        $fa->givePermissionTo('coa-report');
        $fa->givePermissionTo('coa-print');
        $fa->givePermissionTo('coa-approve');
        $fa->givePermissionTo('coa-reject');
        $fa->givePermissionTo('coa-void');

        $fa->givePermissionTo('category-item-coa-create');
        $fa->givePermissionTo('category-item-coa-read');
        $fa->givePermissionTo('category-item-coa-edit');
        $fa->givePermissionTo('category-item-coa-delete');
        $fa->givePermissionTo('category-item-coa-remove');
        $fa->givePermissionTo('category-item-coa-report');
        $fa->givePermissionTo('category-item-coa-print');
        $fa->givePermissionTo('category-item-coa-approve');
        $fa->givePermissionTo('category-item-coa-reject');
        $fa->givePermissionTo('category-item-coa-void');

        $fa->givePermissionTo('general-ledger-create');
        $fa->givePermissionTo('general-ledger-read');
        $fa->givePermissionTo('general-ledger-edit');
        $fa->givePermissionTo('general-ledger-delete');
        $fa->givePermissionTo('general-ledger-remove');
        $fa->givePermissionTo('general-ledger-report');
        $fa->givePermissionTo('general-ledger-print');
        $fa->givePermissionTo('general-ledger-approve');
        $fa->givePermissionTo('general-ledger-reject');
        $fa->givePermissionTo('general-ledger-void');

        $fa->givePermissionTo('invoice-create');
        $fa->givePermissionTo('invoice-read');
        $fa->givePermissionTo('invoice-edit');
        $fa->givePermissionTo('invoice-delete');
        $fa->givePermissionTo('invoice-remove');
        $fa->givePermissionTo('invoice-report');
        $fa->givePermissionTo('invoice-print');
        $fa->givePermissionTo('invoice-approve');
        $fa->givePermissionTo('invoice-reject');
        $fa->givePermissionTo('invoice-void');

        $fa->givePermissionTo('journal-create');
        $fa->givePermissionTo('journal-read');
        $fa->givePermissionTo('journal-edit');
        $fa->givePermissionTo('journal-delete');
        $fa->givePermissionTo('journal-remove');
        $fa->givePermissionTo('journal-report');
        $fa->givePermissionTo('journal-print');
        $fa->givePermissionTo('journal-approve');
        $fa->givePermissionTo('journal-reject');
        $fa->givePermissionTo('journal-void');

        $fa->givePermissionTo('profit-loss-create');
        $fa->givePermissionTo('profit-loss-read');
        $fa->givePermissionTo('profit-loss-edit');
        $fa->givePermissionTo('profit-loss-delete');
        $fa->givePermissionTo('profit-loss-remove');
        $fa->givePermissionTo('profit-loss-report');
        $fa->givePermissionTo('profit-loss-print');
        $fa->givePermissionTo('profit-loss-approve');
        $fa->givePermissionTo('profit-loss-reject');
        $fa->givePermissionTo('profit-loss-void');

        $fa->givePermissionTo('trial-balance-create');
        $fa->givePermissionTo('trial-balance-read');
        $fa->givePermissionTo('trial-balance-edit');
        $fa->givePermissionTo('trial-balance-delete');
        $fa->givePermissionTo('trial-balance-remove');
        $fa->givePermissionTo('trial-balance-report');
        $fa->givePermissionTo('trial-balance-print');
        $fa->givePermissionTo('trial-balance-approve');
        $fa->givePermissionTo('trial-balance-reject');
        $fa->givePermissionTo('trial-balance-void');

        // WORKSHOP JAKARTA role permissions:

        $wj = Role::where('name', 'workshop-jakarta')->first();

        $wj->givePermissionTo('capability-create');
        $wj->givePermissionTo('capability-read');
        $wj->givePermissionTo('capability-edit');
        $wj->givePermissionTo('capability-delete');
        $wj->givePermissionTo('capability-remove');
        $wj->givePermissionTo('capability-report');
        $wj->givePermissionTo('capability-print');
        $wj->givePermissionTo('capability-approve');
        $wj->givePermissionTo('capability-reject');
        $wj->givePermissionTo('capability-void');

        $wj->givePermissionTo('defect-report-create');
        $wj->givePermissionTo('defect-report-read');
        $wj->givePermissionTo('defect-report-edit');
        $wj->givePermissionTo('defect-report-delete');
        $wj->givePermissionTo('defect-report-remove');
        $wj->givePermissionTo('defect-report-report');
        $wj->givePermissionTo('defect-report-print');
        $wj->givePermissionTo('defect-report-approve');
        $wj->givePermissionTo('defect-report-reject');
        $wj->givePermissionTo('defect-report-void');

        $wj->givePermissionTo('jsl-create');
        $wj->givePermissionTo('jsl-read');
        $wj->givePermissionTo('jsl-edit');
        $wj->givePermissionTo('jsl-delete');
        $wj->givePermissionTo('jsl-remove');
        $wj->givePermissionTo('jsl-report');
        $wj->givePermissionTo('jsl-print');
        $wj->givePermissionTo('jsl-approve');
        $wj->givePermissionTo('jsl-reject');
        $wj->givePermissionTo('jsl-void');

        $wj->givePermissionTo('job-request-create');
        $wj->givePermissionTo('job-request-read');
        $wj->givePermissionTo('job-request-edit');
        $wj->givePermissionTo('job-request-delete');
        $wj->givePermissionTo('job-request-remove');
        $wj->givePermissionTo('job-request-report');
        $wj->givePermissionTo('job-request-print');
        $wj->givePermissionTo('job-request-approve');
        $wj->givePermissionTo('job-request-reject');
        $wj->givePermissionTo('job-request-void');

        $wj->givePermissionTo('jobcard-workshop-create');
        $wj->givePermissionTo('jobcard-workshop-read');
        $wj->givePermissionTo('jobcard-workshop-edit');
        $wj->givePermissionTo('jobcard-workshop-delete');
        $wj->givePermissionTo('jobcard-workshop-remove');
        $wj->givePermissionTo('jobcard-workshop-report');
        $wj->givePermissionTo('jobcard-workshop-print');
        $wj->givePermissionTo('jobcard-workshop-approve');
        $wj->givePermissionTo('jobcard-workshop-reject');
        $wj->givePermissionTo('jobcard-workshop-void');

        $wj->givePermissionTo('strip-report-create');
        $wj->givePermissionTo('strip-report-read');
        $wj->givePermissionTo('strip-report-edit');
        $wj->givePermissionTo('strip-report-delete');
        $wj->givePermissionTo('strip-report-remove');
        $wj->givePermissionTo('strip-report-report');
        $wj->givePermissionTo('strip-report-print');
        $wj->givePermissionTo('strip-report-approve');
        $wj->givePermissionTo('strip-report-reject');
        $wj->givePermissionTo('strip-report-void');

        // QUALITY role permissions:

        $quality = Role::where('name', 'quality')->first();

        $quality->givePermissionTo('capability-create');
        $quality->givePermissionTo('capability-read');
        $quality->givePermissionTo('capability-edit');
        $quality->givePermissionTo('capability-delete');
        $quality->givePermissionTo('capability-remove');
        $quality->givePermissionTo('capability-report');
        $quality->givePermissionTo('capability-print');
        $quality->givePermissionTo('capability-approve');
        $quality->givePermissionTo('capability-reject');
        $quality->givePermissionTo('capability-void');

        $quality->givePermissionTo('defect-report-create');
        $quality->givePermissionTo('defect-report-read');
        $quality->givePermissionTo('defect-report-edit');
        $quality->givePermissionTo('defect-report-delete');
        $quality->givePermissionTo('defect-report-remove');
        $quality->givePermissionTo('defect-report-report');
        $quality->givePermissionTo('defect-report-print');
        $quality->givePermissionTo('defect-report-approve');
        $quality->givePermissionTo('defect-report-reject');
        $quality->givePermissionTo('defect-report-void');

        $quality->givePermissionTo('jsl-create');
        $quality->givePermissionTo('jsl-read');
        $quality->givePermissionTo('jsl-edit');
        $quality->givePermissionTo('jsl-delete');
        $quality->givePermissionTo('jsl-remove');
        $quality->givePermissionTo('jsl-report');
        $quality->givePermissionTo('jsl-print');
        $quality->givePermissionTo('jsl-approve');
        $quality->givePermissionTo('jsl-reject');
        $quality->givePermissionTo('jsl-void');

        $quality->givePermissionTo('job-request-create');
        $quality->givePermissionTo('job-request-read');
        $quality->givePermissionTo('job-request-edit');
        $quality->givePermissionTo('job-request-delete');
        $quality->givePermissionTo('job-request-remove');
        $quality->givePermissionTo('job-request-report');
        $quality->givePermissionTo('job-request-print');
        $quality->givePermissionTo('job-request-approve');
        $quality->givePermissionTo('job-request-reject');
        $quality->givePermissionTo('job-request-void');

        $quality->givePermissionTo('jobcard-workshop-create');
        $quality->givePermissionTo('jobcard-workshop-read');
        $quality->givePermissionTo('jobcard-workshop-edit');
        $quality->givePermissionTo('jobcard-workshop-delete');
        $quality->givePermissionTo('jobcard-workshop-remove');
        $quality->givePermissionTo('jobcard-workshop-report');
        $quality->givePermissionTo('jobcard-workshop-print');
        $quality->givePermissionTo('jobcard-workshop-approve');
        $quality->givePermissionTo('jobcard-workshop-reject');
        $quality->givePermissionTo('jobcard-workshop-void');

        $quality->givePermissionTo('strip-report-create');
        $quality->givePermissionTo('strip-report-read');
        $quality->givePermissionTo('strip-report-edit');
        $quality->givePermissionTo('strip-report-delete');
        $quality->givePermissionTo('strip-report-remove');
        $quality->givePermissionTo('strip-report-report');
        $quality->givePermissionTo('strip-report-print');
        $quality->givePermissionTo('strip-report-approve');
        $quality->givePermissionTo('strip-report-reject');
        $quality->givePermissionTo('strip-report-void');
    }
}
