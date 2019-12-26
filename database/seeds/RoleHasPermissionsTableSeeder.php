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

        $marketing->givePermissionTo('marketing_customer_create');
        $marketing->givePermissionTo('marketing_customer_read');
        $marketing->givePermissionTo('marketing_customer_edit');
        $marketing->givePermissionTo('marketing_customer_delete');
        $marketing->givePermissionTo('marketing_customer_remove');
        $marketing->givePermissionTo('marketing_customer_report');
        $marketing->givePermissionTo('marketing_customer_print');
        $marketing->givePermissionTo('marketing_customer_approve');
        $marketing->givePermissionTo('marketing_customer_reject');
        $marketing->givePermissionTo('marketing_customer_void');

        $marketing->givePermissionTo('marketing_pricelist_create');
        $marketing->givePermissionTo('marketing_pricelist_read');
        $marketing->givePermissionTo('marketing_pricelist_edit');
        $marketing->givePermissionTo('marketing_pricelist_delete');
        $marketing->givePermissionTo('marketing_pricelist_remove');
        $marketing->givePermissionTo('marketing_pricelist_report');
        $marketing->givePermissionTo('marketing_pricelist_print');
        $marketing->givePermissionTo('marketing_pricelist_approve');
        $marketing->givePermissionTo('marketing_pricelist_reject');
        $marketing->givePermissionTo('marketing_pricelist_void');

        $marketing->givePermissionTo('marketing_quotation_create');
        $marketing->givePermissionTo('marketing_quotation_read');
        $marketing->givePermissionTo('marketing_quotation_edit');
        $marketing->givePermissionTo('marketing_quotation_delete');
        $marketing->givePermissionTo('marketing_quotation_remove');
        $marketing->givePermissionTo('marketing_quotation_report');
        $marketing->givePermissionTo('marketing_quotation_print');
        $marketing->givePermissionTo('marketing_quotation_approve');
        $marketing->givePermissionTo('marketing_quotation_reject');
        $marketing->givePermissionTo('marketing_quotation_void');

        // ppic role permissions:

        $ppic = Role::where('name', 'ppic')->first();

        $ppic->givePermissionTo('heavy-maintenace_aircraft_create');
        $ppic->givePermissionTo('heavy-maintenace_aircraft_read');
        $ppic->givePermissionTo('heavy-maintenace_aircraft_edit');
        $ppic->givePermissionTo('heavy-maintenace_aircraft_delete');
        $ppic->givePermissionTo('heavy-maintenace_aircraft_remove');
        $ppic->givePermissionTo('heavy-maintenace_aircraft_report');
        $ppic->givePermissionTo('heavy-maintenace_aircraft_print');
        $ppic->givePermissionTo('heavy-maintenace_aircraft_approve');
        $ppic->givePermissionTo('heavy-maintenace_aircraft_reject');
        $ppic->givePermissionTo('heavy-maintenace_aircraft_void');

        $ppic->givePermissionTo('heavy-maintenace_defectcard_create');
        $ppic->givePermissionTo('heavy-maintenace_defectcard_read');
        $ppic->givePermissionTo('heavy-maintenace_defectcard_edit');
        $ppic->givePermissionTo('heavy-maintenace_defectcard_delete');
        $ppic->givePermissionTo('heavy-maintenace_defectcard_remove');
        $ppic->givePermissionTo('heavy-maintenace_defectcard_report');
        $ppic->givePermissionTo('heavy-maintenace_defectcard_print');
        $ppic->givePermissionTo('heavy-maintenace_defectcard_approve');
        $ppic->givePermissionTo('heavy-maintenace_defectcard_reject');
        $ppic->givePermissionTo('heavy-maintenace_defectcard_void');

        $ppic->givePermissionTo('heavy-maintenace_discrepancy_create');
        $ppic->givePermissionTo('heavy-maintenace_discrepancy_read');
        $ppic->givePermissionTo('heavy-maintenace_discrepancy_edit');
        $ppic->givePermissionTo('heavy-maintenace_discrepancy_delete');
        $ppic->givePermissionTo('heavy-maintenace_discrepancy_remove');
        $ppic->givePermissionTo('heavy-maintenace_discrepancy_report');
        $ppic->givePermissionTo('heavy-maintenace_discrepancy_print');
        $ppic->givePermissionTo('heavy-maintenace_discrepancy_approve');
        $ppic->givePermissionTo('heavy-maintenace_discrepancy_reject');
        $ppic->givePermissionTo('heavy-maintenace_discrepancy_void');

        $ppic->givePermissionTo('heavy-maintenace_jobcard_create');
        $ppic->givePermissionTo('heavy-maintenace_jobcard_read');
        $ppic->givePermissionTo('heavy-maintenace_jobcard_edit');
        $ppic->givePermissionTo('heavy-maintenace_jobcard_delete');
        $ppic->givePermissionTo('heavy-maintenace_jobcard_remove');
        $ppic->givePermissionTo('heavy-maintenace_jobcard_report');
        $ppic->givePermissionTo('heavy-maintenace_jobcard_print');
        $ppic->givePermissionTo('heavy-maintenace_jobcard_approve');
        $ppic->givePermissionTo('heavy-maintenace_jobcard_reject');
        $ppic->givePermissionTo('heavy-maintenace_jobcard_void');

        $ppic->givePermissionTo('manufacturer_create');
        $ppic->givePermissionTo('manufacturer_read');
        $ppic->givePermissionTo('manufacturer_edit');
        $ppic->givePermissionTo('manufacturer_delete');
        $ppic->givePermissionTo('manufacturer_remove');
        $ppic->givePermissionTo('manufacturer_report');
        $ppic->givePermissionTo('manufacturer_print');
        $ppic->givePermissionTo('manufacturer_approve');
        $ppic->givePermissionTo('manufacturer_reject');
        $ppic->givePermissionTo('manufacturer_void');

        $ppic->givePermissionTo('heavy-maintenace_project_create');
        $ppic->givePermissionTo('heavy-maintenace_project_read');
        $ppic->givePermissionTo('heavy-maintenace_project_edit');
        $ppic->givePermissionTo('heavy-maintenace_project_delete');
        $ppic->givePermissionTo('heavy-maintenace_project_remove');
        $ppic->givePermissionTo('heavy-maintenace_project_report');
        $ppic->givePermissionTo('heavy-maintenace_project_print');
        $ppic->givePermissionTo('heavy-maintenace_project_approve');
        $ppic->givePermissionTo('heavy-maintenace_project_reject');
        $ppic->givePermissionTo('heavy-maintenace_project_void');

        $ppic->givePermissionTo('heavy-maintenace_rts_create');
        $ppic->givePermissionTo('heavy-maintenace_rts_read');
        $ppic->givePermissionTo('heavy-maintenace_rts_edit');
        $ppic->givePermissionTo('heavy-maintenace_rts_delete');
        $ppic->givePermissionTo('heavy-maintenace_rts_remove');
        $ppic->givePermissionTo('heavy-maintenace_rts_report');
        $ppic->givePermissionTo('heavy-maintenace_rts_print');
        $ppic->givePermissionTo('heavy-maintenace_rts_approve');
        $ppic->givePermissionTo('heavy-maintenace_rts_reject');
        $ppic->givePermissionTo('heavy-maintenace_rts_void');

        $ppic->givePermissionTo('heavy-maintenace_taskcard_create');
        $ppic->givePermissionTo('heavy-maintenace_taskcard_read');
        $ppic->givePermissionTo('heavy-maintenace_taskcard_edit');
        $ppic->givePermissionTo('heavy-maintenace_taskcard_delete');
        $ppic->givePermissionTo('heavy-maintenace_taskcard_remove');
        $ppic->givePermissionTo('heavy-maintenace_taskcard_report');
        $ppic->givePermissionTo('heavy-maintenace_taskcard_print');
        $ppic->givePermissionTo('heavy-maintenace_taskcard_approve');
        $ppic->givePermissionTo('heavy-maintenace_taskcard_reject');
        $ppic->givePermissionTo('heavy-maintenace_taskcard_void');

        $ppic->givePermissionTo('heavy-maintenace_wpr_create');
        $ppic->givePermissionTo('heavy-maintenace_wpr_read');
        $ppic->givePermissionTo('heavy-maintenace_wpr_edit');
        $ppic->givePermissionTo('heavy-maintenace_wpr_delete');
        $ppic->givePermissionTo('heavy-maintenace_wpr_remove');
        $ppic->givePermissionTo('heavy-maintenace_wpr_report');
        $ppic->givePermissionTo('heavy-maintenace_wpr_print');
        $ppic->givePermissionTo('heavy-maintenace_wpr_approve');
        $ppic->givePermissionTo('heavy-maintenace_wpr_reject');
        $ppic->givePermissionTo('heavy-maintenace_wpr_void');

        $ppic->givePermissionTo('heavy-maintenace_workpackage_create');
        $ppic->givePermissionTo('heavy-maintenace_workpackage_read');
        $ppic->givePermissionTo('heavy-maintenace_workpackage_edit');
        $ppic->givePermissionTo('heavy-maintenace_workpackage_delete');
        $ppic->givePermissionTo('heavy-maintenace_workpackage_remove');
        $ppic->givePermissionTo('heavy-maintenace_workpackage_report');
        $ppic->givePermissionTo('heavy-maintenace_workpackage_print');
        $ppic->givePermissionTo('heavy-maintenace_workpackage_approve');
        $ppic->givePermissionTo('heavy-maintenace_workpackage_reject');
        $ppic->givePermissionTo('heavy-maintenace_workpackage_void');

        // SUPPLY CHAIN MANAGEMENT role permissions:

        $scm = Role::where('name', 'scm')->first();

        $scm->givePermissionTo('scm_storage_create');
        $scm->givePermissionTo('scm_storage_read');
        $scm->givePermissionTo('scm_storage_edit');
        $scm->givePermissionTo('scm_storage_delete');
        $scm->givePermissionTo('scm_storage_remove');
        $scm->givePermissionTo('scm_storage_report');
        $scm->givePermissionTo('scm_storage_print');
        $scm->givePermissionTo('scm_storage_approve');
        $scm->givePermissionTo('scm_storage_reject');
        $scm->givePermissionTo('scm_storage_void');

        $scm->givePermissionTo('scm_unit_create');
        $scm->givePermissionTo('scm_unit_read');
        $scm->givePermissionTo('scm_unit_edit');
        $scm->givePermissionTo('scm_unit_delete');
        $scm->givePermissionTo('scm_unit_remove');
        $scm->givePermissionTo('scm_unit_report');
        $scm->givePermissionTo('scm_unit_print');
        $scm->givePermissionTo('scm_unit_approve');
        $scm->givePermissionTo('scm_unit_reject');
        $scm->givePermissionTo('scm_unit_void');

        $scm->givePermissionTo('scm_category-item_create');
        $scm->givePermissionTo('scm_category-item_read');
        $scm->givePermissionTo('scm_category-item_edit');
        $scm->givePermissionTo('scm_category-item_delete');
        $scm->givePermissionTo('scm_category-item_remove');
        $scm->givePermissionTo('scm_category-item_report');
        $scm->givePermissionTo('scm_category-item_print');
        $scm->givePermissionTo('scm_category-item_approve');
        $scm->givePermissionTo('scm_category-item_reject');
        $scm->givePermissionTo('scm_category-item_void');

        $scm->givePermissionTo('scm_item_create');
        $scm->givePermissionTo('scm_item_read');
        $scm->givePermissionTo('scm_item_edit');
        $scm->givePermissionTo('scm_item_delete');
        $scm->givePermissionTo('scm_item_remove');
        $scm->givePermissionTo('scm_item_report');
        $scm->givePermissionTo('scm_item_print');
        $scm->givePermissionTo('scm_item_approve');
        $scm->givePermissionTo('scm_item_reject');
        $scm->givePermissionTo('scm_item_void');

        $scm->givePermissionTo('scm_interchange_create');
        $scm->givePermissionTo('scm_interchange_read');
        $scm->givePermissionTo('scm_interchange_edit');
        $scm->givePermissionTo('scm_interchange_delete');
        $scm->givePermissionTo('scm_interchange_remove');
        $scm->givePermissionTo('scm_interchange_report');
        $scm->givePermissionTo('scm_interchange_print');
        $scm->givePermissionTo('scm_interchange_approve');
        $scm->givePermissionTo('scm_interchange_reject');
        $scm->givePermissionTo('scm_interchange_void');

        $scm->givePermissionTo('scm_vendor_create');
        $scm->givePermissionTo('scm_vendor_read');
        $scm->givePermissionTo('scm_vendor_edit');
        $scm->givePermissionTo('scm_vendor_delete');
        $scm->givePermissionTo('scm_vendor_remove');
        $scm->givePermissionTo('scm_vendor_report');
        $scm->givePermissionTo('scm_vendor_print');
        $scm->givePermissionTo('scm_vendor_approve');
        $scm->givePermissionTo('scm_vendor_reject');
        $scm->givePermissionTo('scm_vendor_void');

        $scm->givePermissionTo('scm_purchase-request_create');
        $scm->givePermissionTo('scm_purchase-request_read');
        $scm->givePermissionTo('scm_purchase-request_edit');
        $scm->givePermissionTo('scm_purchase-request_delete');
        $scm->givePermissionTo('scm_purchase-request_remove');
        $scm->givePermissionTo('scm_purchase-request_report');
        $scm->givePermissionTo('scm_purchase-request_print');
        $scm->givePermissionTo('scm_purchase-request_approve');
        $scm->givePermissionTo('scm_purchase-request_reject');
        $scm->givePermissionTo('scm_purchase-request_void');

        $scm->givePermissionTo('scm_purchase-order_create');
        $scm->givePermissionTo('scm_purchase-order_read');
        $scm->givePermissionTo('scm_purchase-order_edit');
        $scm->givePermissionTo('scm_purchase-order_delete');
        $scm->givePermissionTo('scm_purchase-order_remove');
        $scm->givePermissionTo('scm_purchase-order_report');
        $scm->givePermissionTo('scm_purchase-order_print');
        $scm->givePermissionTo('scm_purchase-order_approve');
        $scm->givePermissionTo('scm_purchase-order_reject');
        $scm->givePermissionTo('scm_purchase-order_void');

        $scm->givePermissionTo('scm_receiving-inspection_report_create');
        $scm->givePermissionTo('scm_receiving-inspection_report_read');
        $scm->givePermissionTo('scm_receiving-inspection_report_edit');
        $scm->givePermissionTo('scm_receiving-inspection_report_delete');
        $scm->givePermissionTo('scm_receiving-inspection_report_remove');
        $scm->givePermissionTo('scm_receiving-inspection_report_report');
        $scm->givePermissionTo('scm_receiving-inspection_report_print');
        $scm->givePermissionTo('scm_receiving-inspection_report_approve');
        $scm->givePermissionTo('scm_receiving-inspection_report_reject');
        $scm->givePermissionTo('scm_receiving-inspection_report_void');

        $scm->givePermissionTo('scm_grn_create');
        $scm->givePermissionTo('scm_grn_read');
        $scm->givePermissionTo('scm_grn_edit');
        $scm->givePermissionTo('scm_grn_delete');
        $scm->givePermissionTo('scm_grn_remove');
        $scm->givePermissionTo('scm_grn_report');
        $scm->givePermissionTo('scm_grn_print');
        $scm->givePermissionTo('scm_grn_approve');
        $scm->givePermissionTo('scm_grn_reject');
        $scm->givePermissionTo('scm_grn_void');

        $scm->givePermissionTo('scm_material-transfer_create');
        $scm->givePermissionTo('scm_material-transfer_read');
        $scm->givePermissionTo('scm_material-transfer_edit');
        $scm->givePermissionTo('scm_material-transfer_delete');
        $scm->givePermissionTo('scm_material-transfer_remove');
        $scm->givePermissionTo('scm_material-transfer_report');
        $scm->givePermissionTo('scm_material-transfer_print');
        $scm->givePermissionTo('scm_material-transfer_approve');
        $scm->givePermissionTo('scm_material-transfer_reject');
        $scm->givePermissionTo('scm_material-transfer_void');

        $scm->givePermissionTo('scm_mrj_create');
        $scm->givePermissionTo('scm_mrj_read');
        $scm->givePermissionTo('scm_mrj_edit');
        $scm->givePermissionTo('scm_mrj_delete');
        $scm->givePermissionTo('scm_mrj_remove');
        $scm->givePermissionTo('scm_mrj_report');
        $scm->givePermissionTo('scm_mrj_print');
        $scm->givePermissionTo('scm_mrj_approve');
        $scm->givePermissionTo('scm_mrj_reject');
        $scm->givePermissionTo('scm_mrj_void');

        $scm->givePermissionTo('scm_trj_create');
        $scm->givePermissionTo('scm_trj_read');
        $scm->givePermissionTo('scm_trj_edit');
        $scm->givePermissionTo('scm_trj_delete');
        $scm->givePermissionTo('scm_trj_remove');
        $scm->givePermissionTo('scm_trj_report');
        $scm->givePermissionTo('scm_trj_print');
        $scm->givePermissionTo('scm_trj_approve');
        $scm->givePermissionTo('scm_trj_reject');
        $scm->givePermissionTo('scm_trj_void');

        $scm->givePermissionTo('scm_inventory-in_create');
        $scm->givePermissionTo('scm_inventory-in_read');
        $scm->givePermissionTo('scm_inventory-in_edit');
        $scm->givePermissionTo('scm_inventory-in_delete');
        $scm->givePermissionTo('scm_inventory-in_remove');
        $scm->givePermissionTo('scm_inventory-in_report');
        $scm->givePermissionTo('scm_inventory-in_print');
        $scm->givePermissionTo('scm_inventory-in_approve');
        $scm->givePermissionTo('scm_inventory-in_reject');
        $scm->givePermissionTo('scm_inventory-in_void');

        $scm->givePermissionTo('scm_inventory-out_create');
        $scm->givePermissionTo('scm_inventory-out_read');
        $scm->givePermissionTo('scm_inventory-out_edit');
        $scm->givePermissionTo('scm_inventory-out_delete');
        $scm->givePermissionTo('scm_inventory-out_remove');
        $scm->givePermissionTo('scm_inventory-out_report');
        $scm->givePermissionTo('scm_inventory-out_print');
        $scm->givePermissionTo('scm_inventory-out_approve');
        $scm->givePermissionTo('scm_inventory-out_reject');
        $scm->givePermissionTo('scm_inventory-out_void');

        $scm->givePermissionTo('scm_gse-tool_create');
        $scm->givePermissionTo('scm_gse-tool_read');
        $scm->givePermissionTo('scm_gse-tool_edit');
        $scm->givePermissionTo('scm_gse-tool_delete');
        $scm->givePermissionTo('scm_gse-tool_remove');
        $scm->givePermissionTo('scm_gse-tool_report');
        $scm->givePermissionTo('scm_gse-tool_print');
        $scm->givePermissionTo('scm_gse-tool_approve');
        $scm->givePermissionTo('scm_gse-tool_reject');
        $scm->givePermissionTo('scm_gse-tool_void');

        $scm->givePermissionTo('scm_stock-monitoring_create');
        $scm->givePermissionTo('scm_stock-monitoring_read');
        $scm->givePermissionTo('scm_stock-monitoring_edit');
        $scm->givePermissionTo('scm_stock-monitoring_delete');
        $scm->givePermissionTo('scm_stock-monitoring_remove');
        $scm->givePermissionTo('scm_stock-monitoring_report');
        $scm->givePermissionTo('scm_stock-monitoring_print');
        $scm->givePermissionTo('scm_stock-monitoring_approve');
        $scm->givePermissionTo('scm_stock-monitoring_reject');
        $scm->givePermissionTo('scm_stock-monitoring_void');

        $scm->givePermissionTo('scm_purchase-request_create');
        $scm->givePermissionTo('scm_purchase-request_read');
        $scm->givePermissionTo('scm_purchase-request_edit');
        $scm->givePermissionTo('scm_purchase-request_delete');
        $scm->givePermissionTo('scm_purchase-request_remove');
        $scm->givePermissionTo('scm_purchase-request_report');
        $scm->givePermissionTo('scm_purchase-request_print');
        $scm->givePermissionTo('scm_purchase-request_approve');
        $scm->givePermissionTo('scm_purchase-request_reject');
        $scm->givePermissionTo('scm_purchase-request_void');

        // HUMAN RESOURCE DEPARTMENT role permissions:

        $hrd = Role::where('name', 'hrd')->first();

        $hrd->givePermissionTo('human-resources_attendance-list_create');
        $hrd->givePermissionTo('human-resources_attendance-list_read');
        $hrd->givePermissionTo('human-resources_attendance-list_edit');
        $hrd->givePermissionTo('human-resources_attendance-list_delete');
        $hrd->givePermissionTo('human-resources_attendance-list_remove');
        $hrd->givePermissionTo('human-resources_attendance-list_report');
        $hrd->givePermissionTo('human-resources_attendance-list_print');
        $hrd->givePermissionTo('human-resources_attendance-list_approve');
        $hrd->givePermissionTo('human-resources_attendance-list_reject');
        $hrd->givePermissionTo('human-resources_attendance-list_void');

        $hrd->givePermissionTo('human-resources_attendance-correction_create');
        $hrd->givePermissionTo('human-resources_attendance-correction_read');
        $hrd->givePermissionTo('human-resources_attendance-correction_edit');
        $hrd->givePermissionTo('human-resources_attendance-correction_delete');
        $hrd->givePermissionTo('human-resources_attendance-correction_remove');
        $hrd->givePermissionTo('human-resources_attendance-correction_report');
        $hrd->givePermissionTo('human-resources_attendance-correction_print');
        $hrd->givePermissionTo('human-resources_attendance-correction_approve');
        $hrd->givePermissionTo('human-resources_attendance-correction_reject');
        $hrd->givePermissionTo('human-resources_attendance-correction_void');

        $hrd->givePermissionTo('human-resources_benefit_create');
        $hrd->givePermissionTo('human-resources_benefit_read');
        $hrd->givePermissionTo('human-resources_benefit_edit');
        $hrd->givePermissionTo('human-resources_benefit_delete');
        $hrd->givePermissionTo('human-resources_benefit_remove');
        $hrd->givePermissionTo('human-resources_benefit_report');
        $hrd->givePermissionTo('human-resources_benefit_print');
        $hrd->givePermissionTo('human-resources_benefit_approve');
        $hrd->givePermissionTo('human-resources_benefit_reject');
        $hrd->givePermissionTo('human-resources_benefit_void');

        $hrd->givePermissionTo('human-resources_csd_create');
        $hrd->givePermissionTo('human-resources_csd_read');
        $hrd->givePermissionTo('human-resources_csd_edit');
        $hrd->givePermissionTo('human-resources_csd_delete');
        $hrd->givePermissionTo('human-resources_csd_remove');
        $hrd->givePermissionTo('human-resources_csd_report');
        $hrd->givePermissionTo('human-resources_csd_print');
        $hrd->givePermissionTo('human-resources_csd_approve');
        $hrd->givePermissionTo('human-resources_csd_reject');
        $hrd->givePermissionTo('human-resources_csd_void');

        $hrd->givePermissionTo('human-resources_employee_create');
        $hrd->givePermissionTo('human-resources_employee_read');
        $hrd->givePermissionTo('human-resources_employee_edit');
        $hrd->givePermissionTo('human-resources_employee_delete');
        $hrd->givePermissionTo('human-resources_employee_remove');
        $hrd->givePermissionTo('human-resources_employee_report');
        $hrd->givePermissionTo('human-resources_employee_print');
        $hrd->givePermissionTo('human-resources_employee_approve');
        $hrd->givePermissionTo('human-resources_employee_reject');
        $hrd->givePermissionTo('human-resources_employee_void');

        $hrd->givePermissionTo('human-resources_employment-status_create');
        $hrd->givePermissionTo('human-resources_employment-status_read');
        $hrd->givePermissionTo('human-resources_employment-status_edit');
        $hrd->givePermissionTo('human-resources_employment-status_delete');
        $hrd->givePermissionTo('human-resources_employment-status_remove');
        $hrd->givePermissionTo('human-resources_employment-status_report');
        $hrd->givePermissionTo('human-resources_employment-status_print');
        $hrd->givePermissionTo('human-resources_employment-status_approve');
        $hrd->givePermissionTo('human-resources_employment-status_reject');
        $hrd->givePermissionTo('human-resources_employment-status_void');

        $hrd->givePermissionTo('human-resources_event-holiday_create');
        $hrd->givePermissionTo('human-resources_event-holiday_read');
        $hrd->givePermissionTo('human-resources_event-holiday_edit');
        $hrd->givePermissionTo('human-resources_event-holiday_delete');
        $hrd->givePermissionTo('human-resources_event-holiday_remove');
        $hrd->givePermissionTo('human-resources_event-holiday_report');
        $hrd->givePermissionTo('human-resources_event-holiday_print');
        $hrd->givePermissionTo('human-resources_event-holiday_approve');
        $hrd->givePermissionTo('human-resources_event-holiday_reject');
        $hrd->givePermissionTo('human-resources_event-holiday_void');

        $hrd->givePermissionTo('human-resources_import-ffm_create');
        $hrd->givePermissionTo('human-resources_import-ffm_read');
        $hrd->givePermissionTo('human-resources_import-ffm_edit');
        $hrd->givePermissionTo('human-resources_import-ffm_delete');
        $hrd->givePermissionTo('human-resources_import-ffm_remove');
        $hrd->givePermissionTo('human-resources_import-ffm_report');
        $hrd->givePermissionTo('human-resources_import-ffm_print');
        $hrd->givePermissionTo('human-resources_import-ffm_approve');
        $hrd->givePermissionTo('human-resources_import-ffm_reject');
        $hrd->givePermissionTo('human-resources_import-ffm_void');

        $hrd->givePermissionTo('human-resources_leave-period_create');
        $hrd->givePermissionTo('human-resources_leave-period_read');
        $hrd->givePermissionTo('human-resources_leave-period_edit');
        $hrd->givePermissionTo('human-resources_leave-period_delete');
        $hrd->givePermissionTo('human-resources_leave-period_remove');
        $hrd->givePermissionTo('human-resources_leave-period_report');
        $hrd->givePermissionTo('human-resources_leave-period_print');
        $hrd->givePermissionTo('human-resources_leave-period_approve');
        $hrd->givePermissionTo('human-resources_leave-period_reject');
        $hrd->givePermissionTo('human-resources_leave-period_void');

        $hrd->givePermissionTo('human-resources_leave-types_create');
        $hrd->givePermissionTo('human-resources_leave-types_read');
        $hrd->givePermissionTo('human-resources_leave-types_edit');
        $hrd->givePermissionTo('human-resources_leave-types_delete');
        $hrd->givePermissionTo('human-resources_leave-types_remove');
        $hrd->givePermissionTo('human-resources_leave-types_report');
        $hrd->givePermissionTo('human-resources_leave-types_print');
        $hrd->givePermissionTo('human-resources_leave-types_approve');
        $hrd->givePermissionTo('human-resources_leave-types_reject');
        $hrd->givePermissionTo('human-resources_leave-types_void');

        $hrd->givePermissionTo('human-resources_overtime_create');
        $hrd->givePermissionTo('human-resources_overtime_read');
        $hrd->givePermissionTo('human-resources_overtime_edit');
        $hrd->givePermissionTo('human-resources_overtime_delete');
        $hrd->givePermissionTo('human-resources_overtime_remove');
        $hrd->givePermissionTo('human-resources_overtime_report');
        $hrd->givePermissionTo('human-resources_overtime_print');
        $hrd->givePermissionTo('human-resources_overtime_approve');
        $hrd->givePermissionTo('human-resources_overtime_reject');
        $hrd->givePermissionTo('human-resources_overtime_void');

        $hrd->givePermissionTo('human-resources_payroll_create');
        $hrd->givePermissionTo('human-resources_payroll_read');
        $hrd->givePermissionTo('human-resources_payroll_edit');
        $hrd->givePermissionTo('human-resources_payroll_delete');
        $hrd->givePermissionTo('human-resources_payroll_remove');
        $hrd->givePermissionTo('human-resources_payroll_report');
        $hrd->givePermissionTo('human-resources_payroll_print');
        $hrd->givePermissionTo('human-resources_payroll_approve');
        $hrd->givePermissionTo('human-resources_payroll_reject');
        $hrd->givePermissionTo('human-resources_payroll_void');

        $hrd->givePermissionTo('human-resources_position_create');
        $hrd->givePermissionTo('human-resources_position_read');
        $hrd->givePermissionTo('human-resources_position_edit');
        $hrd->givePermissionTo('human-resources_position_delete');
        $hrd->givePermissionTo('human-resources_position_remove');
        $hrd->givePermissionTo('human-resources_position_report');
        $hrd->givePermissionTo('human-resources_position_print');
        $hrd->givePermissionTo('human-resources_position_approve');
        $hrd->givePermissionTo('human-resources_position_reject');
        $hrd->givePermissionTo('human-resources_position_void');

        $hrd->givePermissionTo('human-resources_propose-leave_create');
        $hrd->givePermissionTo('human-resources_propose-leave_read');
        $hrd->givePermissionTo('human-resources_propose-leave_edit');
        $hrd->givePermissionTo('human-resources_propose-leave_delete');
        $hrd->givePermissionTo('human-resources_propose-leave_remove');
        $hrd->givePermissionTo('human-resources_propose-leave_report');
        $hrd->givePermissionTo('human-resources_propose-leave_print');
        $hrd->givePermissionTo('human-resources_propose-leave_approve');
        $hrd->givePermissionTo('human-resources_propose-leave_reject');
        $hrd->givePermissionTo('human-resources_propose-leave_void');

        $hrd->givePermissionTo('human-resources_workshift-schedule_create');
        $hrd->givePermissionTo('human-resources_workshift-schedule_read');
        $hrd->givePermissionTo('human-resources_workshift-schedule_edit');
        $hrd->givePermissionTo('human-resources_workshift-schedule_delete');
        $hrd->givePermissionTo('human-resources_workshift-schedule_remove');
        $hrd->givePermissionTo('human-resources_workshift-schedule_report');
        $hrd->givePermissionTo('human-resources_workshift-schedule_print');
        $hrd->givePermissionTo('human-resources_workshift-schedule_approve');
        $hrd->givePermissionTo('human-resources_workshift-schedule_reject');
        $hrd->givePermissionTo('human-resources_workshift-schedule_void');

        // FINANCE ACCOUNTING role permissions:

        $fa = Role::where('name', 'finance')->first();

        $fa->givePermissionTo('finance_account-receivable_create');
        $fa->givePermissionTo('finance_account-receivable_read');
        $fa->givePermissionTo('finance_account-receivable_edit');
        $fa->givePermissionTo('finance_account-receivable_delete');
        $fa->givePermissionTo('finance_account-receivable_remove');
        $fa->givePermissionTo('finance_account-receivable_report');
        $fa->givePermissionTo('finance_account-receivable_print');
        $fa->givePermissionTo('finance_account-receivable_approve');
        $fa->givePermissionTo('finance_account-receivable_reject');
        $fa->givePermissionTo('finance_account-receivable_void');

        $fa->givePermissionTo('finance_account-payable_create');
        $fa->givePermissionTo('finance_account-payable_read');
        $fa->givePermissionTo('finance_account-payable_edit');
        $fa->givePermissionTo('finance_account-payable_delete');
        $fa->givePermissionTo('finance_account-payable_remove');
        $fa->givePermissionTo('finance_account-payable_report');
        $fa->givePermissionTo('finance_account-payable_print');
        $fa->givePermissionTo('finance_account-payable_approve');
        $fa->givePermissionTo('finance_account-payable_reject');
        $fa->givePermissionTo('finance_account-payable_void');

        $fa->givePermissionTo('finance_asset_create');
        $fa->givePermissionTo('finance_asset_read');
        $fa->givePermissionTo('finance_asset_edit');
        $fa->givePermissionTo('finance_asset_delete');
        $fa->givePermissionTo('finance_asset_remove');
        $fa->givePermissionTo('finance_asset_report');
        $fa->givePermissionTo('finance_asset_print');
        $fa->givePermissionTo('finance_asset_approve');
        $fa->givePermissionTo('finance_asset_reject');
        $fa->givePermissionTo('finance_asset_void');

        $fa->givePermissionTo('finance_bank_create');
        $fa->givePermissionTo('finance_bank_read');
        $fa->givePermissionTo('finance_bank_edit');
        $fa->givePermissionTo('finance_bank_delete');
        $fa->givePermissionTo('finance_bank_remove');
        $fa->givePermissionTo('finance_bank_report');
        $fa->givePermissionTo('finance_bank_print');
        $fa->givePermissionTo('finance_bank_approve');
        $fa->givePermissionTo('finance_bank_reject');
        $fa->givePermissionTo('finance_bank_void');

        $fa->givePermissionTo('finance_balance-sheet_create');
        $fa->givePermissionTo('finance_balance-sheet_read');
        $fa->givePermissionTo('finance_balance-sheet_edit');
        $fa->givePermissionTo('finance_balance-sheet_delete');
        $fa->givePermissionTo('finance_balance-sheet_remove');
        $fa->givePermissionTo('finance_balance-sheet_report');
        $fa->givePermissionTo('finance_balance-sheet_print');
        $fa->givePermissionTo('finance_balance-sheet_approve');
        $fa->givePermissionTo('finance_balance-sheet_reject');
        $fa->givePermissionTo('finance_balance-sheet_void');

        $fa->givePermissionTo('finance_cashbook_create');
        $fa->givePermissionTo('finance_cashbook_read');
        $fa->givePermissionTo('finance_cashbook_edit');
        $fa->givePermissionTo('finance_cashbook_delete');
        $fa->givePermissionTo('finance_cashbook_remove');
        $fa->givePermissionTo('finance_cashbook_report');
        $fa->givePermissionTo('finance_cashbook_print');
        $fa->givePermissionTo('finance_cashbook_approve');
        $fa->givePermissionTo('finance_cashbook_reject');
        $fa->givePermissionTo('finance_cashbook_void');

        $fa->givePermissionTo('finance_cbr_create');
        $fa->givePermissionTo('finance_cbr_read');
        $fa->givePermissionTo('finance_cbr_edit');
        $fa->givePermissionTo('finance_cbr_delete');
        $fa->givePermissionTo('finance_cbr_remove');
        $fa->givePermissionTo('finance_cbr_report');
        $fa->givePermissionTo('finance_cbr_print');
        $fa->givePermissionTo('finance_cbr_approve');
        $fa->givePermissionTo('finance_cbr_reject');
        $fa->givePermissionTo('finance_cbr_void');

        $fa->givePermissionTo('finance_coa_create');
        $fa->givePermissionTo('finance_coa_read');
        $fa->givePermissionTo('finance_coa_edit');
        $fa->givePermissionTo('finance_coa_delete');
        $fa->givePermissionTo('finance_coa_remove');
        $fa->givePermissionTo('finance_coa_report');
        $fa->givePermissionTo('finance_coa_print');
        $fa->givePermissionTo('finance_coa_approve');
        $fa->givePermissionTo('finance_coa_reject');
        $fa->givePermissionTo('finance_coa_void');

        $fa->givePermissionTo('finance_category-item-coa_create');
        $fa->givePermissionTo('finance_category-item-coa_read');
        $fa->givePermissionTo('finance_category-item-coa_edit');
        $fa->givePermissionTo('finance_category-item-coa_delete');
        $fa->givePermissionTo('finance_category-item-coa_remove');
        $fa->givePermissionTo('finance_category-item-coa_report');
        $fa->givePermissionTo('finance_category-item-coa_print');
        $fa->givePermissionTo('finance_category-item-coa_approve');
        $fa->givePermissionTo('finance_category-item-coa_reject');
        $fa->givePermissionTo('finance_category-item-coa_void');

        $fa->givePermissionTo('finance_general-ledger_create');
        $fa->givePermissionTo('finance_general-ledger_read');
        $fa->givePermissionTo('finance_general-ledger_edit');
        $fa->givePermissionTo('finance_general-ledger_delete');
        $fa->givePermissionTo('finance_general-ledger_remove');
        $fa->givePermissionTo('finance_general-ledger_report');
        $fa->givePermissionTo('finance_general-ledger_print');
        $fa->givePermissionTo('finance_general-ledger_approve');
        $fa->givePermissionTo('finance_general-ledger_reject');
        $fa->givePermissionTo('finance_general-ledger_void');

        $fa->givePermissionTo('finance_invoice_create');
        $fa->givePermissionTo('finance_invoice_read');
        $fa->givePermissionTo('finance_invoice_edit');
        $fa->givePermissionTo('finance_invoice_delete');
        $fa->givePermissionTo('finance_invoice_remove');
        $fa->givePermissionTo('finance_invoice_report');
        $fa->givePermissionTo('finance_invoice_print');
        $fa->givePermissionTo('finance_invoice_approve');
        $fa->givePermissionTo('finance_invoice_reject');
        $fa->givePermissionTo('finance_invoice_void');

        $fa->givePermissionTo('finance_journal_create');
        $fa->givePermissionTo('finance_journal_read');
        $fa->givePermissionTo('finance_journal_edit');
        $fa->givePermissionTo('finance_journal_delete');
        $fa->givePermissionTo('finance_journal_remove');
        $fa->givePermissionTo('finance_journal_report');
        $fa->givePermissionTo('finance_journal_print');
        $fa->givePermissionTo('finance_journal_approve');
        $fa->givePermissionTo('finance_journal_reject');
        $fa->givePermissionTo('finance_journal_void');

        $fa->givePermissionTo('finance_profit-loss_create');
        $fa->givePermissionTo('finance_profit-loss_read');
        $fa->givePermissionTo('finance_profit-loss_edit');
        $fa->givePermissionTo('finance_profit-loss_delete');
        $fa->givePermissionTo('finance_profit-loss_remove');
        $fa->givePermissionTo('finance_profit-loss_report');
        $fa->givePermissionTo('finance_profit-loss_print');
        $fa->givePermissionTo('finance_profit-loss_approve');
        $fa->givePermissionTo('finance_profit-loss_reject');
        $fa->givePermissionTo('finance_profit-loss_void');

        $fa->givePermissionTo('finance_trial-balance_create');
        $fa->givePermissionTo('finance_trial-balance_read');
        $fa->givePermissionTo('finance_trial-balance_edit');
        $fa->givePermissionTo('finance_trial-balance_delete');
        $fa->givePermissionTo('finance_trial-balance_remove');
        $fa->givePermissionTo('finance_trial-balance_report');
        $fa->givePermissionTo('finance_trial-balance_print');
        $fa->givePermissionTo('finance_trial-balance_approve');
        $fa->givePermissionTo('finance_trial-balance_reject');
        $fa->givePermissionTo('finance_trial-balance_void');

        // WORKSHOP JAKARTA role permissions:

        $wj = Role::where('name', 'workshop-jakarta')->first();

        $wj->givePermissionTo('capability_create');
        $wj->givePermissionTo('capability_read');
        $wj->givePermissionTo('capability_edit');
        $wj->givePermissionTo('capability_delete');
        $wj->givePermissionTo('capability_remove');
        $wj->givePermissionTo('capability_report');
        $wj->givePermissionTo('capability_print');
        $wj->givePermissionTo('capability_approve');
        $wj->givePermissionTo('capability_reject');
        $wj->givePermissionTo('capability_void');

        $wj->givePermissionTo('workshop_defect-report_create');
        $wj->givePermissionTo('workshop_defect-report_read');
        $wj->givePermissionTo('workshop_defect-report_edit');
        $wj->givePermissionTo('workshop_defect-report_delete');
        $wj->givePermissionTo('workshop_defect-report_remove');
        $wj->givePermissionTo('workshop_defect-report_report');
        $wj->givePermissionTo('workshop_defect-report_print');
        $wj->givePermissionTo('workshop_defect-report_approve');
        $wj->givePermissionTo('workshop_defect-report_reject');
        $wj->givePermissionTo('workshop_defect-report_void');

        $wj->givePermissionTo('jsl_create');
        $wj->givePermissionTo('jsl_read');
        $wj->givePermissionTo('jsl_edit');
        $wj->givePermissionTo('jsl_delete');
        $wj->givePermissionTo('jsl_remove');
        $wj->givePermissionTo('jsl_report');
        $wj->givePermissionTo('jsl_print');
        $wj->givePermissionTo('jsl_approve');
        $wj->givePermissionTo('jsl_reject');
        $wj->givePermissionTo('jsl_void');

        $wj->givePermissionTo('job-request_create');
        $wj->givePermissionTo('job-request_read');
        $wj->givePermissionTo('job-request_edit');
        $wj->givePermissionTo('job-request_delete');
        $wj->givePermissionTo('job-request_remove');
        $wj->givePermissionTo('job-request_report');
        $wj->givePermissionTo('job-request_print');
        $wj->givePermissionTo('job-request_approve');
        $wj->givePermissionTo('job-request_reject');
        $wj->givePermissionTo('job-request_void');

        $wj->givePermissionTo('workshop_jobcard-workshop_create');
        $wj->givePermissionTo('workshop_jobcard-workshop_read');
        $wj->givePermissionTo('workshop_jobcard-workshop_edit');
        $wj->givePermissionTo('workshop_jobcard-workshop_delete');
        $wj->givePermissionTo('workshop_jobcard-workshop_remove');
        $wj->givePermissionTo('workshop_jobcard-workshop_report');
        $wj->givePermissionTo('workshop_jobcard-workshop_print');
        $wj->givePermissionTo('workshop_jobcard-workshop_approve');
        $wj->givePermissionTo('workshop_jobcard-workshop_reject');
        $wj->givePermissionTo('workshop_jobcard-workshop_void');

        $wj->givePermissionTo('workshop_strip_report_create');
        $wj->givePermissionTo('workshop_strip_report_read');
        $wj->givePermissionTo('workshop_strip_report_edit');
        $wj->givePermissionTo('workshop_strip_report_delete');
        $wj->givePermissionTo('workshop_strip_report_remove');
        $wj->givePermissionTo('workshop_strip_report_report');
        $wj->givePermissionTo('workshop_strip_report_print');
        $wj->givePermissionTo('workshop_strip_report_approve');
        $wj->givePermissionTo('workshop_strip_report_reject');
        $wj->givePermissionTo('workshop_strip_report_void');

        // QUALITY role permissions:

        $quality = Role::where('name', 'quality')->first();

        $quality->givePermissionTo('capability_create');
        $quality->givePermissionTo('capability_read');
        $quality->givePermissionTo('capability_edit');
        $quality->givePermissionTo('capability_delete');
        $quality->givePermissionTo('capability_remove');
        $quality->givePermissionTo('capability_report');
        $quality->givePermissionTo('capability_print');
        $quality->givePermissionTo('capability_approve');
        $quality->givePermissionTo('capability_reject');
        $quality->givePermissionTo('capability_void');

        // unknow
        $quality->givePermissionTo('workshop_defect-report_create');
        $quality->givePermissionTo('workshop_defect-report_read');
        $quality->givePermissionTo('workshop_defect-report_edit');
        $quality->givePermissionTo('workshop_defect-report_delete');
        $quality->givePermissionTo('workshop_defect-report_remove');
        $quality->givePermissionTo('workshop_defect-report_report');
        $quality->givePermissionTo('workshop_defect-report_print');
        $quality->givePermissionTo('workshop_defect-report_approve');
        $quality->givePermissionTo('workshop_defect-report_reject');
        $quality->givePermissionTo('workshop_defect-report_void');

        $quality->givePermissionTo('jsl_create');
        $quality->givePermissionTo('jsl_read');
        $quality->givePermissionTo('jsl_edit');
        $quality->givePermissionTo('jsl_delete');
        $quality->givePermissionTo('jsl_remove');
        $quality->givePermissionTo('jsl_report');
        $quality->givePermissionTo('jsl_print');
        $quality->givePermissionTo('jsl_approve');
        $quality->givePermissionTo('jsl_reject');
        $quality->givePermissionTo('jsl_void');

        $quality->givePermissionTo('job-request_create');
        $quality->givePermissionTo('job-request_read');
        $quality->givePermissionTo('job-request_edit');
        $quality->givePermissionTo('job-request_delete');
        $quality->givePermissionTo('job-request_remove');
        $quality->givePermissionTo('job-request_report');
        $quality->givePermissionTo('job-request_print');
        $quality->givePermissionTo('job-request_approve');
        $quality->givePermissionTo('job-request_reject');
        $quality->givePermissionTo('job-request_void');

        // WORKSHOP role permissions:

        $workshop = Role::where('name', 'workshop')->first();

        $workshop->givePermissionTo('capability_create');
        $workshop->givePermissionTo('capability_read');
        $workshop->givePermissionTo('capability_edit');
        $workshop->givePermissionTo('capability_delete');
        $workshop->givePermissionTo('capability_remove');
        $workshop->givePermissionTo('capability_report');
        $workshop->givePermissionTo('capability_print');
        $workshop->givePermissionTo('capability_approve');
        $workshop->givePermissionTo('capability_reject');
        $workshop->givePermissionTo('capability_void');

        $workshop->givePermissionTo('workshop_defect-report_create');
        $workshop->givePermissionTo('workshop_defect-report_read');
        $workshop->givePermissionTo('workshop_defect-report_edit');
        $workshop->givePermissionTo('workshop_defect-report_delete');
        $workshop->givePermissionTo('workshop_defect-report_remove');
        $workshop->givePermissionTo('workshop_defect-report_report');
        $workshop->givePermissionTo('workshop_defect-report_print');
        $workshop->givePermissionTo('workshop_defect-report_approve');
        $workshop->givePermissionTo('workshop_defect-report_reject');
        $workshop->givePermissionTo('workshop_defect-report_void');

        $workshop->givePermissionTo('jsl_create');
        $workshop->givePermissionTo('jsl_read');
        $workshop->givePermissionTo('jsl_edit');
        $workshop->givePermissionTo('jsl_delete');
        $workshop->givePermissionTo('jsl_remove');
        $workshop->givePermissionTo('jsl_report');
        $workshop->givePermissionTo('jsl_print');
        $workshop->givePermissionTo('jsl_approve');
        $workshop->givePermissionTo('jsl_reject');
        $workshop->givePermissionTo('jsl_void');

        $workshop->givePermissionTo('job-request_create');
        $workshop->givePermissionTo('job-request_read');
        $workshop->givePermissionTo('job-request_edit');
        $workshop->givePermissionTo('job-request_delete');
        $workshop->givePermissionTo('job-request_remove');
        $workshop->givePermissionTo('job-request_report');
        $workshop->givePermissionTo('job-request_print');
        $workshop->givePermissionTo('job-request_approve');
        $workshop->givePermissionTo('job-request_reject');
        $workshop->givePermissionTo('job-request_void');

        $workshop->givePermissionTo('workshop_jobcard-workshop_create');
        $workshop->givePermissionTo('workshop_jobcard-workshop_read');
        $workshop->givePermissionTo('workshop_jobcard-workshop_edit');
        $workshop->givePermissionTo('workshop_jobcard-workshop_delete');
        $workshop->givePermissionTo('workshop_jobcard-workshop_remove');
        $workshop->givePermissionTo('workshop_jobcard-workshop_report');
        $workshop->givePermissionTo('workshop_jobcard-workshop_print');
        $workshop->givePermissionTo('workshop_jobcard-workshop_approve');
        $workshop->givePermissionTo('workshop_jobcard-workshop_reject');
        $workshop->givePermissionTo('workshop_jobcard-workshop_void');

        $workshop->givePermissionTo('workshop_jobcard-workshop_create');
        $workshop->givePermissionTo('workshop_jobcard-workshop_read');
        $workshop->givePermissionTo('workshop_jobcard-workshop_edit');
        $workshop->givePermissionTo('workshop_jobcard-workshop_delete');
        $workshop->givePermissionTo('workshop_jobcard-workshop_remove');
        $workshop->givePermissionTo('workshop_jobcard-workshop_report');
        $workshop->givePermissionTo('workshop_jobcard-workshop_print');
        $workshop->givePermissionTo('workshop_jobcard-workshop_approve');
        $workshop->givePermissionTo('workshop_jobcard-workshop_reject');
        $workshop->givePermissionTo('workshop_jobcard-workshop_void');

        $workshop->givePermissionTo('workshop_strip_report_create');
        $workshop->givePermissionTo('workshop_strip_report_read');
        $workshop->givePermissionTo('workshop_strip_report_edit');
        $workshop->givePermissionTo('workshop_strip_report_delete');
        $workshop->givePermissionTo('workshop_strip_report_remove');
        $workshop->givePermissionTo('workshop_strip_report_report');
        $workshop->givePermissionTo('workshop_strip_report_print');
        $workshop->givePermissionTo('workshop_strip_report_approve');
        $workshop->givePermissionTo('workshop_strip_report_reject');
        $workshop->givePermissionTo('workshop_strip_report_void');
    }
}
