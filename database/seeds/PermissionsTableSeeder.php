<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * MODULE-NAME_MODEL-NAME_PERMISSION
     * EXAMPLES :
     *  accounting_accounting-receivable_create
     *  heavy-maintenace_project_approve
     * @return void
     */
    public function run()
    {
        // ACCOUNT RECEIVABLE entity permissions:

        Permission::create(['name' => 'finance_account-receivable_create']);
        Permission::create(['name' => 'finance_account-receivable_read']);
        Permission::create(['name' => 'finance_account-receivable_edit']);
        Permission::create(['name' => 'finance_account-receivable_delete']);
        Permission::create(['name' => 'finance_account-receivable_remove']);
        Permission::create(['name' => 'finance_account-receivable_report']);
        Permission::create(['name' => 'finance_account-receivable_print']);
        Permission::create(['name' => 'finance_account-receivable_approve']);
        Permission::create(['name' => 'finance_account-receivable_reject']);
        Permission::create(['name' => 'finance_account-receivable_void']);

        // ACCOUNT PAYABLE entity permissions:

        Permission::create(['name' => 'finance_account-payable_create']);
        Permission::create(['name' => 'finance_account-payable_read']);
        Permission::create(['name' => 'finance_account-payable_edit']);
        Permission::create(['name' => 'finance_account-payable_delete']);
        Permission::create(['name' => 'finance_account-payable_remove']);
        Permission::create(['name' => 'finance_account-payable_report']);
        Permission::create(['name' => 'finance_account-payable_print']);
        Permission::create(['name' => 'finance_account-payable_approve']);
        Permission::create(['name' => 'finance_account-payable_reject']);
        Permission::create(['name' => 'finance_account-payable_void']);

        // AIRCRAFT  entity permissions:

        Permission::create(['name' => 'heavy-maintenace_aircraft_create']);
        Permission::create(['name' => 'heavy-maintenace_aircraft_read']);
        Permission::create(['name' => 'heavy-maintenace_aircraft_edit']);
        Permission::create(['name' => 'heavy-maintenace_aircraft_delete']);
        Permission::create(['name' => 'heavy-maintenace_aircraft_remove']);
        Permission::create(['name' => 'heavy-maintenace_aircraft_report']);
        Permission::create(['name' => 'heavy-maintenace_aircraft_print']);
        Permission::create(['name' => 'heavy-maintenace_aircraft_approve']);
        Permission::create(['name' => 'heavy-maintenace_aircraft_reject']);
        Permission::create(['name' => 'heavy-maintenace_aircraft_void']);

        // ASSIGN LEAVES entity permissions: ???

        Permission::create(['name' => 'assign-leaves_create']);
        Permission::create(['name' => 'assign-leaves_read']);
        Permission::create(['name' => 'assign-leaves_edit']);
        Permission::create(['name' => 'assign-leaves_delete']);
        Permission::create(['name' => 'assign-leaves_remove']);
        Permission::create(['name' => 'assign-leaves_report']);
        Permission::create(['name' => 'assign-leaves_print']);
        Permission::create(['name' => 'assign-leaves_approve']);
        Permission::create(['name' => 'assign-leaves_reject']);
        Permission::create(['name' => 'assign-leaves_void']);

        // ASSETS LEAVES entity permissions:

        Permission::create(['name' => 'finance_asset_create']);
        Permission::create(['name' => 'finance_asset_read']);
        Permission::create(['name' => 'finance_asset_edit']);
        Permission::create(['name' => 'finance_asset_delete']);
        Permission::create(['name' => 'finance_asset_remove']);
        Permission::create(['name' => 'finance_asset_report']);
        Permission::create(['name' => 'finance_asset_print']);
        Permission::create(['name' => 'finance_asset_approve']);
        Permission::create(['name' => 'finance_asset_reject']);
        Permission::create(['name' => 'finance_asset_void']);

        // ATTENDANCE LIST entity permissions:

        Permission::create(['name' => 'human-resources_attendance-list_create']);
        Permission::create(['name' => 'human-resources_attendance-list_read']);
        Permission::create(['name' => 'human-resources_attendance-list_edit']);
        Permission::create(['name' => 'human-resources_attendance-list_delete']);
        Permission::create(['name' => 'human-resources_attendance-list_remove']);
        Permission::create(['name' => 'human-resources_attendance-list_report']);
        Permission::create(['name' => 'human-resources_attendance-list_print']);
        Permission::create(['name' => 'human-resources_attendance-list_approve']);
        Permission::create(['name' => 'human-resources_attendance-list_reject']);
        Permission::create(['name' => 'human-resources_attendance-list_void']);

        // ATTENDANCE CORRECTION entity permissions:

        Permission::create(['name' => 'human-resources_attendance-correction_create']);
        Permission::create(['name' => 'human-resources_attendance-correction_read']);
        Permission::create(['name' => 'human-resources_attendance-correction_edit']);
        Permission::create(['name' => 'human-resources_attendance-correction_delete']);
        Permission::create(['name' => 'human-resources_attendance-correction_remove']);
        Permission::create(['name' => 'human-resources_attendance-correction_report']);
        Permission::create(['name' => 'human-resources_attendance-correction_print']);
        Permission::create(['name' => 'human-resources_attendance-correction_approve']);
        Permission::create(['name' => 'human-resources_attendance-correction_reject']);
        Permission::create(['name' => 'human-resources_attendance-correction_void']);

        // BANKS entity permissions:

        Permission::create(['name' => 'finance_bank_create']);
        Permission::create(['name' => 'finance_bank_read']);
        Permission::create(['name' => 'finance_bank_edit']);
        Permission::create(['name' => 'finance_bank_delete']);
        Permission::create(['name' => 'finance_bank_remove']);
        Permission::create(['name' => 'finance_bank_report']);
        Permission::create(['name' => 'finance_bank_print']);
        Permission::create(['name' => 'finance_bank_approve']);
        Permission::create(['name' => 'finance_bank_reject']);
        Permission::create(['name' => 'finance_bank_void']);

        // BALANCE SHEETS entity permissions:

        Permission::create(['name' => 'finance_balance-sheet_create']);
        Permission::create(['name' => 'finance_balance-sheet_read']);
        Permission::create(['name' => 'finance_balance-sheet_edit']);
        Permission::create(['name' => 'finance_balance-sheet_delete']);
        Permission::create(['name' => 'finance_balance-sheet_remove']);
        Permission::create(['name' => 'finance_balance-sheet_report']);
        Permission::create(['name' => 'finance_balance-sheet_print']);
        Permission::create(['name' => 'finance_balance-sheet_approve']);
        Permission::create(['name' => 'finance_balance-sheet_reject']);
        Permission::create(['name' => 'finance_balance-sheet_void']);

        // BENEFITS entity permissions:

        Permission::create(['name' => 'human-resources_benefit_create']);
        Permission::create(['name' => 'human-resources_benefit_read']);
        Permission::create(['name' => 'human-resources_benefit_edit']);
        Permission::create(['name' => 'human-resources_benefit_delete']);
        Permission::create(['name' => 'human-resources_benefit_remove']);
        Permission::create(['name' => 'human-resources_benefit_report']);
        Permission::create(['name' => 'human-resources_benefit_print']);
        Permission::create(['name' => 'human-resources_benefit_approve']);
        Permission::create(['name' => 'human-resources_benefit_reject']);
        Permission::create(['name' => 'human-resources_benefit_void']);

        // CATEGORY ITEM entity permissions:

        Permission::create(['name' => 'scm_category-item_create']);
        Permission::create(['name' => 'scm_category-item_read']);
        Permission::create(['name' => 'scm_category-item_edit']);
        Permission::create(['name' => 'scm_category-item_delete']);
        Permission::create(['name' => 'scm_category-item_remove']);
        Permission::create(['name' => 'scm_category-item_report']);
        Permission::create(['name' => 'scm_category-item_print']);
        Permission::create(['name' => 'scm_category-item_approve']);
        Permission::create(['name' => 'scm_category-item_reject']);
        Permission::create(['name' => 'scm_category-item_void']);

        // CATEGORY ITEM CODE OF ACCOUNTING entity permissions:

        Permission::create(['name' => 'finance_category-item-coa_create']);
        Permission::create(['name' => 'finance_category-item-coa_read']);
        Permission::create(['name' => 'finance_category-item-coa_edit']);
        Permission::create(['name' => 'finance_category-item-coa_delete']);
        Permission::create(['name' => 'finance_category-item-coa_remove']);
        Permission::create(['name' => 'finance_category-item-coa_report']);
        Permission::create(['name' => 'finance_category-item-coa_print']);
        Permission::create(['name' => 'finance_category-item-coa_approve']);
        Permission::create(['name' => 'finance_category-item-coa_reject']);
        Permission::create(['name' => 'finance_category-item-coa_void']);

        // CALENDAR entity permissions: ???

        Permission::create(['name' => 'calendar_create']);
        Permission::create(['name' => 'calendar_read']);
        Permission::create(['name' => 'calendar_edit']);
        Permission::create(['name' => 'calendar_delete']);
        Permission::create(['name' => 'calendar_remove']);
        Permission::create(['name' => 'calendar_report']);
        Permission::create(['name' => 'calendar_print']);
        Permission::create(['name' => 'calendar_approve']);
        Permission::create(['name' => 'calendar_reject']);
        Permission::create(['name' => 'calendar_void']);

        // MASTER CAPABILITY entity permissions: ???

        Permission::create(['name' => 'capability_create']);
        Permission::create(['name' => 'capability_read']);
        Permission::create(['name' => 'capability_edit']);
        Permission::create(['name' => 'capability_delete']);
        Permission::create(['name' => 'capability_remove']);
        Permission::create(['name' => 'capability_report']);
        Permission::create(['name' => 'capability_print']);
        Permission::create(['name' => 'capability_approve']);
        Permission::create(['name' => 'capability_reject']);
        Permission::create(['name' => 'capability_void']);

        // CASHBOOK entity permissions:

        Permission::create(['name' => 'finance_cashbook_create']);
        Permission::create(['name' => 'finance_cashbook_read']);
        Permission::create(['name' => 'finance_cashbook_edit']);
        Permission::create(['name' => 'finance_cashbook_delete']);
        Permission::create(['name' => 'finance_cashbook_remove']);
        Permission::create(['name' => 'finance_cashbook_report']);
        Permission::create(['name' => 'finance_cashbook_print']);
        Permission::create(['name' => 'finance_cashbook_approve']);
        Permission::create(['name' => 'finance_cashbook_reject']);
        Permission::create(['name' => 'finance_cashbook_void']);

        // CASH / BANK REPORT entity permissions:

        Permission::create(['name' => 'finance_cbr_create']);
        Permission::create(['name' => 'finance_cbr_read']);
        Permission::create(['name' => 'finance_cbr_edit']);
        Permission::create(['name' => 'finance_cbr_delete']);
        Permission::create(['name' => 'finance_cbr_remove']);
        Permission::create(['name' => 'finance_cbr_report']);
        Permission::create(['name' => 'finance_cbr_print']);
        Permission::create(['name' => 'finance_cbr_approve']);
        Permission::create(['name' => 'finance_cbr_reject']);
        Permission::create(['name' => 'finance_cbr_void']);

        // CUSTOMER entity permissions:

        Permission::create(['name' => 'marketing_customer_create']);
        Permission::create(['name' => 'marketing_customer_read']);
        Permission::create(['name' => 'marketing_customer_edit']);
        Permission::create(['name' => 'marketing_customer_delete']);
        Permission::create(['name' => 'marketing_customer_remove']);
        Permission::create(['name' => 'marketing_customer_report']);
        Permission::create(['name' => 'marketing_customer_print']);
        Permission::create(['name' => 'marketing_customer_approve']);
        Permission::create(['name' => 'marketing_customer_reject']);
        Permission::create(['name' => 'marketing_customer_void']);

        // MASTER COA entity permissions:

        Permission::create(['name' => 'finance_coa_create']);
        Permission::create(['name' => 'finance_coa_read']);
        Permission::create(['name' => 'finance_coa_edit']);
        Permission::create(['name' => 'finance_coa_delete']);
        Permission::create(['name' => 'finance_coa_remove']);
        Permission::create(['name' => 'finance_coa_report']);
        Permission::create(['name' => 'finance_coa_print']);
        Permission::create(['name' => 'finance_coa_approve']);
        Permission::create(['name' => 'finance_coa_reject']);
        Permission::create(['name' => 'finance_coa_void']);

        // COMPANY STRUCTUR & DEPARTEMENT entity permissions:

        Permission::create(['name' => 'human-resources_csd_create']);
        Permission::create(['name' => 'human-resources_csd_read']);
        Permission::create(['name' => 'human-resources_csd_edit']);
        Permission::create(['name' => 'human-resources_csd_delete']);
        Permission::create(['name' => 'human-resources_csd_remove']);
        Permission::create(['name' => 'human-resources_csd_report']);
        Permission::create(['name' => 'human-resources_csd_print']);
        Permission::create(['name' => 'human-resources_csd_approve']);
        Permission::create(['name' => 'human-resources_csd_reject']);
        Permission::create(['name' => 'human-resources_csd_void']);

        // DISCREPANCY FOUND entity permissions:

        Permission::create(['name' => 'heavy-maintenace_discrepancy_create']);
        Permission::create(['name' => 'heavy-maintenace_discrepancy_read']);
        Permission::create(['name' => 'heavy-maintenace_discrepancy_edit']);
        Permission::create(['name' => 'heavy-maintenace_discrepancy_delete']);
        Permission::create(['name' => 'heavy-maintenace_discrepancy_remove']);
        Permission::create(['name' => 'heavy-maintenace_discrepancy_report']);
        Permission::create(['name' => 'heavy-maintenace_discrepancy_print']);
        Permission::create(['name' => 'heavy-maintenace_discrepancy_approve']);
        Permission::create(['name' => 'heavy-maintenace_discrepancy_reject']);
        Permission::create(['name' => 'heavy-maintenace_discrepancy_void']);

        // DEFECTCARD entity permissions:

        Permission::create(['name' => 'heavy-maintenace_defectcard_create']);
        Permission::create(['name' => 'heavy-maintenace_defectcard_read']);
        Permission::create(['name' => 'heavy-maintenace_defectcard_edit']);
        Permission::create(['name' => 'heavy-maintenace_defectcard_delete']);
        Permission::create(['name' => 'heavy-maintenace_defectcard_remove']);
        Permission::create(['name' => 'heavy-maintenace_defectcard_report']);
        Permission::create(['name' => 'heavy-maintenace_defectcard_print']);
        Permission::create(['name' => 'heavy-maintenace_defectcard_approve']);
        Permission::create(['name' => 'heavy-maintenace_defectcard_reject']);
        Permission::create(['name' => 'heavy-maintenace_defectcard_void']);

        // DEFECT REPORT entity permissions: ???

        Permission::create(['name' => 'workshop_defect-report_create']);
        Permission::create(['name' => 'workshop_defect-report_read']);
        Permission::create(['name' => 'workshop_defect-report_edit']);
        Permission::create(['name' => 'workshop_defect-report_delete']);
        Permission::create(['name' => 'workshop_defect-report_remove']);
        Permission::create(['name' => 'workshop_defect-report_report']);
        Permission::create(['name' => 'workshop_defect-report_print']);
        Permission::create(['name' => 'workshop_defect-report_approve']);
        Permission::create(['name' => 'workshop_defect-report_reject']);
        Permission::create(['name' => 'workshop_defect-report_void']);

        // EMPLOYMENT STATUS entity permissions:

        Permission::create(['name' => 'human-resources_employment-status_create']);
        Permission::create(['name' => 'human-resources_employment-status_read']);
        Permission::create(['name' => 'human-resources_employment-status_edit']);
        Permission::create(['name' => 'human-resources_employment-status_delete']);
        Permission::create(['name' => 'human-resources_employment-status_remove']);
        Permission::create(['name' => 'human-resources_employment-status_report']);
        Permission::create(['name' => 'human-resources_employment-status_print']);
        Permission::create(['name' => 'human-resources_employment-status_approve']);
        Permission::create(['name' => 'human-resources_employment-status_reject']);
        Permission::create(['name' => 'human-resources_employment-status_void']);

        // EMPLOYEE entity permissions:

        Permission::create(['name' => 'human-resources_employee_create']);
        Permission::create(['name' => 'human-resources_employee_read']);
        Permission::create(['name' => 'human-resources_employee_edit']);
        Permission::create(['name' => 'human-resources_employee_delete']);
        Permission::create(['name' => 'human-resources_employee_remove']);
        Permission::create(['name' => 'human-resources_employee_report']);
        Permission::create(['name' => 'human-resources_employee_print']);
        Permission::create(['name' => 'human-resources_employee_approve']);
        Permission::create(['name' => 'human-resources_employee_reject']);
        Permission::create(['name' => 'human-resources_employee_void']);

        // EVENT/HOLIDAYS entity permissions:

        Permission::create(['name' => 'human-resources_event-holiday_create']);
        Permission::create(['name' => 'human-resources_event-holiday_read']);
        Permission::create(['name' => 'human-resources_event-holiday_edit']);
        Permission::create(['name' => 'human-resources_event-holiday_delete']);
        Permission::create(['name' => 'human-resources_event-holiday_remove']);
        Permission::create(['name' => 'human-resources_event-holiday_report']);
        Permission::create(['name' => 'human-resources_event-holiday_print']);
        Permission::create(['name' => 'human-resources_event-holiday_approve']);
        Permission::create(['name' => 'human-resources_event-holiday_reject']);
        Permission::create(['name' => 'human-resources_event-holiday_void']);

        // GENERAL LEDGER entity permissions:

        Permission::create(['name' => 'finance_general-ledger_create']);
        Permission::create(['name' => 'finance_general-ledger_read']);
        Permission::create(['name' => 'finance_general-ledger_edit']);
        Permission::create(['name' => 'finance_general-ledger_delete']);
        Permission::create(['name' => 'finance_general-ledger_remove']);
        Permission::create(['name' => 'finance_general-ledger_report']);
        Permission::create(['name' => 'finance_general-ledger_print']);
        Permission::create(['name' => 'finance_general-ledger_approve']);
        Permission::create(['name' => 'finance_general-ledger_reject']);
        Permission::create(['name' => 'finance_general-ledger_void']);

        // GOODS RECEIVED NOTE entity permissions:

        Permission::create(['name' => 'scm_grn_create']);
        Permission::create(['name' => 'scm_grn_read']);
        Permission::create(['name' => 'scm_grn_edit']);
        Permission::create(['name' => 'scm_grn_delete']);
        Permission::create(['name' => 'scm_grn_remove']);
        Permission::create(['name' => 'scm_grn_report']);
        Permission::create(['name' => 'scm_grn_print']);
        Permission::create(['name' => 'scm_grn_approve']);
        Permission::create(['name' => 'scm_grn_reject']);
        Permission::create(['name' => 'scm_grn_void']);

        // GSE/TOOL RETURNED entity permissions:

        Permission::create(['name' => 'scm_gse-tool_create']);
        Permission::create(['name' => 'scm_gse-tool_read']);
        Permission::create(['name' => 'scm_gse-tool_edit']);
        Permission::create(['name' => 'scm_gse-tool_delete']);
        Permission::create(['name' => 'scm_gse-tool_remove']);
        Permission::create(['name' => 'scm_gse-tool_report']);
        Permission::create(['name' => 'scm_gse-tool_print']);
        Permission::create(['name' => 'scm_gse-tool_approve']);
        Permission::create(['name' => 'scm_gse-tool_reject']);
        Permission::create(['name' => 'scm_gse-tool_void']);

        // INTERCHANGE entity permissions:

        Permission::create(['name' => 'scm_interchange_create']);
        Permission::create(['name' => 'scm_interchange_read']);
        Permission::create(['name' => 'scm_interchange_edit']);
        Permission::create(['name' => 'scm_interchange_delete']);
        Permission::create(['name' => 'scm_interchange_remove']);
        Permission::create(['name' => 'scm_interchange_report']);
        Permission::create(['name' => 'scm_interchange_print']);
        Permission::create(['name' => 'scm_interchange_approve']);
        Permission::create(['name' => 'scm_interchange_reject']);
        Permission::create(['name' => 'scm_interchange_void']);

        // IMPORT FROM FINGERPRINT MACHINE entity permissions:

        Permission::create(['name' => 'human-resources_import-ffm_create']);
        Permission::create(['name' => 'human-resources_import-ffm_read']);
        Permission::create(['name' => 'human-resources_import-ffm_edit']);
        Permission::create(['name' => 'human-resources_import-ffm_delete']);
        Permission::create(['name' => 'human-resources_import-ffm_remove']);
        Permission::create(['name' => 'human-resources_import-ffm_report']);
        Permission::create(['name' => 'human-resources_import-ffm_print']);
        Permission::create(['name' => 'human-resources_import-ffm_approve']);
        Permission::create(['name' => 'human-resources_import-ffm_reject']);
        Permission::create(['name' => 'human-resources_import-ffm_void']);

        // INVOICE entity permissions:

        Permission::create(['name' => 'finance_invoice_create']);
        Permission::create(['name' => 'finance_invoice_read']);
        Permission::create(['name' => 'finance_invoice_edit']);
        Permission::create(['name' => 'finance_invoice_delete']);
        Permission::create(['name' => 'finance_invoice_remove']);
        Permission::create(['name' => 'finance_invoice_report']);
        Permission::create(['name' => 'finance_invoice_print']);
        Permission::create(['name' => 'finance_invoice_approve']);
        Permission::create(['name' => 'finance_invoice_reject']);
        Permission::create(['name' => 'finance_invoice_void']);

        // ITEMS entity permissions:

        Permission::create(['name' => 'scm_item_create']);
        Permission::create(['name' => 'scm_item_read']);
        Permission::create(['name' => 'scm_item_edit']);
        Permission::create(['name' => 'scm_item_delete']);
        Permission::create(['name' => 'scm_item_remove']);
        Permission::create(['name' => 'scm_item_report']);
        Permission::create(['name' => 'scm_item_print']);
        Permission::create(['name' => 'scm_item_approve']);
        Permission::create(['name' => 'scm_item_reject']);
        Permission::create(['name' => 'scm_item_void']);

        // INVENTORY IN entity permissions:

        Permission::create(['name' => 'scm_inventory-in_create']);
        Permission::create(['name' => 'scm_inventory-in_read']);
        Permission::create(['name' => 'scm_inventory-in_edit']);
        Permission::create(['name' => 'scm_inventory-in_delete']);
        Permission::create(['name' => 'scm_inventory-in_remove']);
        Permission::create(['name' => 'scm_inventory-in_report']);
        Permission::create(['name' => 'scm_inventory-in_print']);
        Permission::create(['name' => 'scm_inventory-in_approve']);
        Permission::create(['name' => 'scm_inventory-in_reject']);
        Permission::create(['name' => 'scm_inventory-in_void']);

        // INVENTORY OUT entity permissions:

        Permission::create(['name' => 'scm_inventory-out_create']);
        Permission::create(['name' => 'scm_inventory-out_read']);
        Permission::create(['name' => 'scm_inventory-out_edit']);
        Permission::create(['name' => 'scm_inventory-out_delete']);
        Permission::create(['name' => 'scm_inventory-out_remove']);
        Permission::create(['name' => 'scm_inventory-out_report']);
        Permission::create(['name' => 'scm_inventory-out_print']);
        Permission::create(['name' => 'scm_inventory-out_approve']);
        Permission::create(['name' => 'scm_inventory-out_reject']);
        Permission::create(['name' => 'scm_inventory-out_void']);

        // JOBCARD entity permissions:

        Permission::create(['name' => 'heavy-maintenace_jobcard_create']);
        Permission::create(['name' => 'heavy-maintenace_jobcard_read']);
        Permission::create(['name' => 'heavy-maintenace_jobcard_edit']);
        Permission::create(['name' => 'heavy-maintenace_jobcard_delete']);
        Permission::create(['name' => 'heavy-maintenace_jobcard_remove']);
        Permission::create(['name' => 'heavy-maintenace_jobcard_report']);
        Permission::create(['name' => 'heavy-maintenace_jobcard_print']);
        Permission::create(['name' => 'heavy-maintenace_jobcard_approve']);
        Permission::create(['name' => 'heavy-maintenace_jobcard_reject']);
        Permission::create(['name' => 'heavy-maintenace_jobcard_void']);

        // JOURNAL entity permissions:

        Permission::create(['name' => 'finance_journal_create']);
        Permission::create(['name' => 'finance_journal_read']);
        Permission::create(['name' => 'finance_journal_edit']);
        Permission::create(['name' => 'finance_journal_delete']);
        Permission::create(['name' => 'finance_journal_remove']);
        Permission::create(['name' => 'finance_journal_report']);
        Permission::create(['name' => 'finance_journal_print']);
        Permission::create(['name' => 'finance_journal_approve']);
        Permission::create(['name' => 'finance_journal_reject']);
        Permission::create(['name' => 'finance_journal_void']);

        // JOBCARD HARD TIME entity permissions:

        Permission::create(['name' => 'heavy-maintenace_jobcard-hardtime_create']);
        Permission::create(['name' => 'heavy-maintenace_jobcard-hardtime_read']);
        Permission::create(['name' => 'heavy-maintenace_jobcard-hardtime_edit']);
        Permission::create(['name' => 'heavy-maintenace_jobcard-hardtime_delete']);
        Permission::create(['name' => 'heavy-maintenace_jobcard-hardtime_remove']);
        Permission::create(['name' => 'heavy-maintenace_jobcard-hardtime_report']);
        Permission::create(['name' => 'heavy-maintenace_jobcard-hardtime_print']);
        Permission::create(['name' => 'heavy-maintenace_jobcard-hardtime_approve']);
        Permission::create(['name' => 'heavy-maintenace_jobcard-hardtime_reject']);
        Permission::create(['name' => 'heavy-maintenace_jobcard-hardtime_void']);

        // JOBCARD WORKSHOP entity permissions:

        Permission::create(['name' => 'workshop_jobcard-workshop_create']);
        Permission::create(['name' => 'workshop_jobcard-workshop_read']);
        Permission::create(['name' => 'workshop_jobcard-workshop_edit']);
        Permission::create(['name' => 'workshop_jobcard-workshop_delete']);
        Permission::create(['name' => 'workshop_jobcard-workshop_remove']);
        Permission::create(['name' => 'workshop_jobcard-workshop_report']);
        Permission::create(['name' => 'workshop_jobcard-workshop_print']);
        Permission::create(['name' => 'workshop_jobcard-workshop_approve']);
        Permission::create(['name' => 'workshop_jobcard-workshop_reject']);
        Permission::create(['name' => 'workshop_jobcard-workshop_void']);

        // JOB SCOPE LEVEL entity permissions: ???

        Permission::create(['name' => 'jsl_create']);
        Permission::create(['name' => 'jsl_read']);
        Permission::create(['name' => 'jsl_edit']);
        Permission::create(['name' => 'jsl_delete']);
        Permission::create(['name' => 'jsl_remove']);
        Permission::create(['name' => 'jsl_report']);
        Permission::create(['name' => 'jsl_print']);
        Permission::create(['name' => 'jsl_approve']);
        Permission::create(['name' => 'jsl_reject']);
        Permission::create(['name' => 'jsl_void']);

        // JOB REQUEST entity permissions: ???

        Permission::create(['name' => 'job-request_create']);
        Permission::create(['name' => 'job-request_read']);
        Permission::create(['name' => 'job-request_edit']);
        Permission::create(['name' => 'job-request_delete']);
        Permission::create(['name' => 'job-request_remove']);
        Permission::create(['name' => 'job-request_report']);
        Permission::create(['name' => 'job-request_print']);
        Permission::create(['name' => 'job-request_approve']);
        Permission::create(['name' => 'job-request_reject']);
        Permission::create(['name' => 'job-request_void']);

        // LEAVE PERIOD entity permissions:

        Permission::create(['name' => 'human-resources_leave-period_create']);
        Permission::create(['name' => 'human-resources_leave-period_read']);
        Permission::create(['name' => 'human-resources_leave-period_edit']);
        Permission::create(['name' => 'human-resources_leave-period_delete']);
        Permission::create(['name' => 'human-resources_leave-period_remove']);
        Permission::create(['name' => 'human-resources_leave-period_report']);
        Permission::create(['name' => 'human-resources_leave-period_print']);
        Permission::create(['name' => 'human-resources_leave-period_approve']);
        Permission::create(['name' => 'human-resources_leave-period_reject']);
        Permission::create(['name' => 'human-resources_leave-period_void']);

        // LEAVE TYPES entity permissions:

        Permission::create(['name' => 'human-resources_leave-types_create']);
        Permission::create(['name' => 'human-resources_leave-types_read']);
        Permission::create(['name' => 'human-resources_leave-types_edit']);
        Permission::create(['name' => 'human-resources_leave-types_delete']);
        Permission::create(['name' => 'human-resources_leave-types_remove']);
        Permission::create(['name' => 'human-resources_leave-types_report']);
        Permission::create(['name' => 'human-resources_leave-types_print']);
        Permission::create(['name' => 'human-resources_leave-types_approve']);
        Permission::create(['name' => 'human-resources_leave-types_reject']);
        Permission::create(['name' => 'human-resources_leave-types_void']);

        // LEAVE REPORT entity permissions:

        Permission::create(['name' => 'human-resources_leave_report_create']);
        Permission::create(['name' => 'human-resources_leave_report_read']);
        Permission::create(['name' => 'human-resources_leave_report_edit']);
        Permission::create(['name' => 'human-resources_leave_report_delete']);
        Permission::create(['name' => 'human-resources_leave_report_remove']);
        Permission::create(['name' => 'human-resources_leave_report_report']);
        Permission::create(['name' => 'human-resources_leave_report_print']);
        Permission::create(['name' => 'human-resources_leave_report_approve']);
        Permission::create(['name' => 'human-resources_leave_report_reject']);
        Permission::create(['name' => 'human-resources_leave_report_void']);

        // LEAVE DATALIST entity permissions:

        Permission::create(['name' => 'human-resources_leave-datalist_create']);
        Permission::create(['name' => 'human-resources_leave-datalist_read']);
        Permission::create(['name' => 'human-resources_leave-datalist_edit']);
        Permission::create(['name' => 'human-resources_leave-datalist_delete']);
        Permission::create(['name' => 'human-resources_leave-datalist_remove']);
        Permission::create(['name' => 'human-resources_leave-datalist_report']);
        Permission::create(['name' => 'human-resources_leave-datalist_print']);
        Permission::create(['name' => 'human-resources_leave-datalist_approve']);
        Permission::create(['name' => 'human-resources_leave-datalist_reject']);
        Permission::create(['name' => 'human-resources_leave-datalist_void']);

        // Manufacturer  entity permissions: ???

        Permission::create(['name' => 'manufacturer_create']);
        Permission::create(['name' => 'manufacturer_read']);
        Permission::create(['name' => 'manufacturer_edit']);
        Permission::create(['name' => 'manufacturer_delete']);
        Permission::create(['name' => 'manufacturer_remove']);
        Permission::create(['name' => 'manufacturer_report']);
        Permission::create(['name' => 'manufacturer_print']);
        Permission::create(['name' => 'manufacturer_approve']);
        Permission::create(['name' => 'manufacturer_reject']);
        Permission::create(['name' => 'manufacturer_void']);

        // MATERIAL REQUEST JOBCARD entity permissions:

        Permission::create(['name' => 'scm_mrj_create']);
        Permission::create(['name' => 'scm_mrj_read']);
        Permission::create(['name' => 'scm_mrj_edit']);
        Permission::create(['name' => 'scm_mrj_delete']);
        Permission::create(['name' => 'scm_mrj_remove']);
        Permission::create(['name' => 'scm_mrj_report']);
        Permission::create(['name' => 'scm_mrj_print']);
        Permission::create(['name' => 'scm_mrj_approve']);
        Permission::create(['name' => 'scm_mrj_reject']);
        Permission::create(['name' => 'scm_mrj_void']);

        // MATERIAL TRANSFER entity permissions:

        Permission::create(['name' => 'scm_material-transfer_create']);
        Permission::create(['name' => 'scm_material-transfer_read']);
        Permission::create(['name' => 'scm_material-transfer_edit']);
        Permission::create(['name' => 'scm_material-transfer_delete']);
        Permission::create(['name' => 'scm_material-transfer_remove']);
        Permission::create(['name' => 'scm_material-transfer_report']);
        Permission::create(['name' => 'scm_material-transfer_print']);
        Permission::create(['name' => 'scm_material-transfer_approve']);
        Permission::create(['name' => 'scm_material-transfer_reject']);
        Permission::create(['name' => 'scm_material-transfer_void']);

        // OVERTIME entity permissions:

        Permission::create(['name' => 'human-resources_overtime_create']);
        Permission::create(['name' => 'human-resources_overtime_read']);
        Permission::create(['name' => 'human-resources_overtime_edit']);
        Permission::create(['name' => 'human-resources_overtime_delete']);
        Permission::create(['name' => 'human-resources_overtime_remove']);
        Permission::create(['name' => 'human-resources_overtime_report']);
        Permission::create(['name' => 'human-resources_overtime_print']);
        Permission::create(['name' => 'human-resources_overtime_approve']);
        Permission::create(['name' => 'human-resources_overtime_reject']);
        Permission::create(['name' => 'human-resources_overtime_void']);

        // PAYROLL entity permissions:

        Permission::create(['name' => 'human-resources_payroll_create']);
        Permission::create(['name' => 'human-resources_payroll_read']);
        Permission::create(['name' => 'human-resources_payroll_edit']);
        Permission::create(['name' => 'human-resources_payroll_delete']);
        Permission::create(['name' => 'human-resources_payroll_remove']);
        Permission::create(['name' => 'human-resources_payroll_report']);
        Permission::create(['name' => 'human-resources_payroll_print']);
        Permission::create(['name' => 'human-resources_payroll_approve']);
        Permission::create(['name' => 'human-resources_payroll_reject']);
        Permission::create(['name' => 'human-resources_payroll_void']);

        // PETTY CASH / BON SEMENTARA entity permissions:

        Permission::create(['name' => 'finance_pettycash_create']);
        Permission::create(['name' => 'finance_pettycash_read']);
        Permission::create(['name' => 'finance_pettycash_edit']);
        Permission::create(['name' => 'finance_pettycash_delete']);
        Permission::create(['name' => 'finance_pettycash_remove']);
        Permission::create(['name' => 'finance_pettycash_report']);
        Permission::create(['name' => 'finance_pettycash_print']);
        Permission::create(['name' => 'finance_pettycash_approve']);
        Permission::create(['name' => 'finance_pettycash_reject']);
        Permission::create(['name' => 'finance_pettycash_void']);

        // PROJECT entity permissions:

        Permission::create(['name' => 'heavy-maintenace_project_create']);
        Permission::create(['name' => 'heavy-maintenace_project_read']);
        Permission::create(['name' => 'heavy-maintenace_project_edit']);
        Permission::create(['name' => 'heavy-maintenace_project_delete']);
        Permission::create(['name' => 'heavy-maintenace_project_remove']);
        Permission::create(['name' => 'heavy-maintenace_project_report']);
        Permission::create(['name' => 'heavy-maintenace_project_print']);
        Permission::create(['name' => 'heavy-maintenace_project_approve']);
        Permission::create(['name' => 'heavy-maintenace_project_reject']);
        Permission::create(['name' => 'heavy-maintenace_project_void']);

        // PRICE LIST entity permissions:

        Permission::create(['name' => 'marketing_pricelist_create']);
        Permission::create(['name' => 'marketing_pricelist_read']);
        Permission::create(['name' => 'marketing_pricelist_edit']);
        Permission::create(['name' => 'marketing_pricelist_delete']);
        Permission::create(['name' => 'marketing_pricelist_remove']);
        Permission::create(['name' => 'marketing_pricelist_report']);
        Permission::create(['name' => 'marketing_pricelist_print']);
        Permission::create(['name' => 'marketing_pricelist_approve']);
        Permission::create(['name' => 'marketing_pricelist_reject']);
        Permission::create(['name' => 'marketing_pricelist_void']);

        // PURCHASE REQUEST entity permissions:

        Permission::create(['name' => 'scm_purchase-request_create']);
        Permission::create(['name' => 'scm_purchase-request_read']);
        Permission::create(['name' => 'scm_purchase-request_edit']);
        Permission::create(['name' => 'scm_purchase-request_delete']);
        Permission::create(['name' => 'scm_purchase-request_remove']);
        Permission::create(['name' => 'scm_purchase-request_report']);
        Permission::create(['name' => 'scm_purchase-request_print']);
        Permission::create(['name' => 'scm_purchase-request_approve']);
        Permission::create(['name' => 'scm_purchase-request_reject']);
        Permission::create(['name' => 'scm_purchase-request_void']);

        // PURCHASE ORDER entity permissions:

        Permission::create(['name' => 'scm_purchase-order_create']);
        Permission::create(['name' => 'scm_purchase-order_read']);
        Permission::create(['name' => 'scm_purchase-order_edit']);
        Permission::create(['name' => 'scm_purchase-order_delete']);
        Permission::create(['name' => 'scm_purchase-order_remove']);
        Permission::create(['name' => 'scm_purchase-order_report']);
        Permission::create(['name' => 'scm_purchase-order_print']);
        Permission::create(['name' => 'scm_purchase-order_approve']);
        Permission::create(['name' => 'scm_purchase-order_reject']);
        Permission::create(['name' => 'scm_purchase-order_void']);

        // PROPOSE LEAVE entity permissions:

        Permission::create(['name' => 'human-resources_propose-leave_create']);
        Permission::create(['name' => 'human-resources_propose-leave_read']);
        Permission::create(['name' => 'human-resources_propose-leave_edit']);
        Permission::create(['name' => 'human-resources_propose-leave_delete']);
        Permission::create(['name' => 'human-resources_propose-leave_remove']);
        Permission::create(['name' => 'human-resources_propose-leave_report']);
        Permission::create(['name' => 'human-resources_propose-leave_print']);
        Permission::create(['name' => 'human-resources_propose-leave_approve']);
        Permission::create(['name' => 'human-resources_propose-leave_reject']);
        Permission::create(['name' => 'human-resources_propose-leave_void']);

        // PROFIT LOSS entity permissions:

        Permission::create(['name' => 'finance_profit-loss_create']);
        Permission::create(['name' => 'finance_profit-loss_read']);
        Permission::create(['name' => 'finance_profit-loss_edit']);
        Permission::create(['name' => 'finance_profit-loss_delete']);
        Permission::create(['name' => 'finance_profit-loss_remove']);
        Permission::create(['name' => 'finance_profit-loss_report']);
        Permission::create(['name' => 'finance_profit-loss_print']);
        Permission::create(['name' => 'finance_profit-loss_approve']);
        Permission::create(['name' => 'finance_profit-loss_reject']);
        Permission::create(['name' => 'finance_profit-loss_void']);

        // POSITION entity permissions:

        Permission::create(['name' => 'human-resources_position_create']);
        Permission::create(['name' => 'human-resources_position_read']);
        Permission::create(['name' => 'human-resources_position_edit']);
        Permission::create(['name' => 'human-resources_position_delete']);
        Permission::create(['name' => 'human-resources_position_remove']);
        Permission::create(['name' => 'human-resources_position_report']);
        Permission::create(['name' => 'human-resources_position_print']);
        Permission::create(['name' => 'human-resources_position_approve']);
        Permission::create(['name' => 'human-resources_position_reject']);
        Permission::create(['name' => 'human-resources_position_void']);

        // QUOTATION entity permissions:

        Permission::create(['name' => 'marketing_quotation_create']);
        Permission::create(['name' => 'marketing_quotation_read']);
        Permission::create(['name' => 'marketing_quotation_edit']);
        Permission::create(['name' => 'marketing_quotation_delete']);
        Permission::create(['name' => 'marketing_quotation_remove']);
        Permission::create(['name' => 'marketing_quotation_report']);
        Permission::create(['name' => 'marketing_quotation_print']);
        Permission::create(['name' => 'marketing_quotation_approve']);
        Permission::create(['name' => 'marketing_quotation_reject']);
        Permission::create(['name' => 'marketing_quotation_void']);

        // RELEASE TO SERVICE entity permissions:

        Permission::create(['name' => 'heavy-maintenace_rts_create']);
        Permission::create(['name' => 'heavy-maintenace_rts_read']);
        Permission::create(['name' => 'heavy-maintenace_rts_edit']);
        Permission::create(['name' => 'heavy-maintenace_rts_delete']);
        Permission::create(['name' => 'heavy-maintenace_rts_remove']);
        Permission::create(['name' => 'heavy-maintenace_rts_report']);
        Permission::create(['name' => 'heavy-maintenace_rts_print']);
        Permission::create(['name' => 'heavy-maintenace_rts_approve']);
        Permission::create(['name' => 'heavy-maintenace_rts_reject']);
        Permission::create(['name' => 'heavy-maintenace_rts_void']);

        // TASK RELEASE entity permissions:

        Permission::create(['name' => 'heavy-maintenace_task-release_create']);
        Permission::create(['name' => 'heavy-maintenace_task-release_read']);
        Permission::create(['name' => 'heavy-maintenace_task-release_edit']);
        Permission::create(['name' => 'heavy-maintenace_task-release_delete']);
        Permission::create(['name' => 'heavy-maintenace_task-release_remove']);
        Permission::create(['name' => 'heavy-maintenace_task-release_report']);
        Permission::create(['name' => 'heavy-maintenace_task-release_print']);
        Permission::create(['name' => 'heavy-maintenace_task-release_approve']);
        Permission::create(['name' => 'heavy-maintenace_task-release_reject']);
        Permission::create(['name' => 'heavy-maintenace_task-release_void']);

        // RII RELEASE entity permissions:

        Permission::create(['name' => 'heavy-maintenace_rii-release_create']);
        Permission::create(['name' => 'heavy-maintenace_rii-release_read']);
        Permission::create(['name' => 'heavy-maintenace_rii-release_edit']);
        Permission::create(['name' => 'heavy-maintenace_rii-release_delete']);
        Permission::create(['name' => 'heavy-maintenace_rii-release_remove']);
        Permission::create(['name' => 'heavy-maintenace_rii-release_report']);
        Permission::create(['name' => 'heavy-maintenace_rii-release_print']);
        Permission::create(['name' => 'heavy-maintenace_rii-release_approve']);
        Permission::create(['name' => 'heavy-maintenace_rii-release_reject']);
        Permission::create(['name' => 'heavy-maintenace_rii-release_void']);

        // RECEIVING INSPECTION REPORT entity permissions:

        Permission::create(['name' => 'scm_receiving-inspection_report_create']);
        Permission::create(['name' => 'scm_receiving-inspection_report_read']);
        Permission::create(['name' => 'scm_receiving-inspection_report_edit']);
        Permission::create(['name' => 'scm_receiving-inspection_report_delete']);
        Permission::create(['name' => 'scm_receiving-inspection_report_remove']);
        Permission::create(['name' => 'scm_receiving-inspection_report_report']);
        Permission::create(['name' => 'scm_receiving-inspection_report_print']);
        Permission::create(['name' => 'scm_receiving-inspection_report_approve']);
        Permission::create(['name' => 'scm_receiving-inspection_report_reject']);
        Permission::create(['name' => 'scm_receiving-inspection_report_void']);

        // SETTING entity permissions: ???

        Permission::create(['name' => 'setting_create']);
        Permission::create(['name' => 'setting_read']);
        Permission::create(['name' => 'setting_edit']);
        Permission::create(['name' => 'setting_delete']);
        Permission::create(['name' => 'setting_remove']);
        Permission::create(['name' => 'setting_report']);
        Permission::create(['name' => 'setting_print']);
        Permission::create(['name' => 'setting_approve']);
        Permission::create(['name' => 'setting_reject']);
        Permission::create(['name' => 'setting_void']);

        // STOCK MONITORING entity permissions:

        Permission::create(['name' => 'scm_stock-monitoring_create']);
        Permission::create(['name' => 'scm_stock-monitoring_read']);
        Permission::create(['name' => 'scm_stock-monitoring_edit']);
        Permission::create(['name' => 'scm_stock-monitoring_delete']);
        Permission::create(['name' => 'scm_stock-monitoring_remove']);
        Permission::create(['name' => 'scm_stock-monitoring_report']);
        Permission::create(['name' => 'scm_stock-monitoring_print']);
        Permission::create(['name' => 'scm_stock-monitoring_approve']);
        Permission::create(['name' => 'scm_stock-monitoring_reject']);
        Permission::create(['name' => 'scm_stock-monitoring_void']);

        // STORAGE entity permissions:

        Permission::create(['name' => 'scm_storage_create']);
        Permission::create(['name' => 'scm_storage_read']);
        Permission::create(['name' => 'scm_storage_edit']);
        Permission::create(['name' => 'scm_storage_delete']);
        Permission::create(['name' => 'scm_storage_remove']);
        Permission::create(['name' => 'scm_storage_report']);
        Permission::create(['name' => 'scm_storage_print']);
        Permission::create(['name' => 'scm_storage_approve']);
        Permission::create(['name' => 'scm_storage_reject']);
        Permission::create(['name' => 'scm_storage_void']);

        // STRIP REPORT entity permissions:

        Permission::create(['name' => 'workshop_strip_report_create']);
        Permission::create(['name' => 'workshop_strip_report_read']);
        Permission::create(['name' => 'workshop_strip_report_edit']);
        Permission::create(['name' => 'workshop_strip_report_delete']);
        Permission::create(['name' => 'workshop_strip_report_remove']);
        Permission::create(['name' => 'workshop_strip_report_report']);
        Permission::create(['name' => 'workshop_strip_report_print']);
        Permission::create(['name' => 'workshop_strip_report_approve']);
        Permission::create(['name' => 'workshop_strip_report_reject']);
        Permission::create(['name' => 'workshop_strip_report_void']);

        // TASKCARD entity permissions:

        Permission::create(['name' => 'heavy-maintenace_taskcard_create']);
        Permission::create(['name' => 'heavy-maintenace_taskcard_read']);
        Permission::create(['name' => 'heavy-maintenace_taskcard_edit']);
        Permission::create(['name' => 'heavy-maintenace_taskcard_delete']);
        Permission::create(['name' => 'heavy-maintenace_taskcard_remove']);
        Permission::create(['name' => 'heavy-maintenace_taskcard_report']);
        Permission::create(['name' => 'heavy-maintenace_taskcard_print']);
        Permission::create(['name' => 'heavy-maintenace_taskcard_approve']);
        Permission::create(['name' => 'heavy-maintenace_taskcard_reject']);
        Permission::create(['name' => 'heavy-maintenace_taskcard_void']);

        // TOOL REQUEST JOBCARD entity permissions:

        Permission::create(['name' => 'scm_trj_create']);
        Permission::create(['name' => 'scm_trj_read']);
        Permission::create(['name' => 'scm_trj_edit']);
        Permission::create(['name' => 'scm_trj_delete']);
        Permission::create(['name' => 'scm_trj_remove']);
        Permission::create(['name' => 'scm_trj_report']);
        Permission::create(['name' => 'scm_trj_print']);
        Permission::create(['name' => 'scm_trj_approve']);
        Permission::create(['name' => 'scm_trj_reject']);
        Permission::create(['name' => 'scm_trj_void']);

        // TRIAL BALANCE entity permissions:

        Permission::create(['name' => 'finance_trial-balance_create']);
        Permission::create(['name' => 'finance_trial-balance_read']);
        Permission::create(['name' => 'finance_trial-balance_edit']);
        Permission::create(['name' => 'finance_trial-balance_delete']);
        Permission::create(['name' => 'finance_trial-balance_remove']);
        Permission::create(['name' => 'finance_trial-balance_report']);
        Permission::create(['name' => 'finance_trial-balance_print']);
        Permission::create(['name' => 'finance_trial-balance_approve']);
        Permission::create(['name' => 'finance_trial-balance_reject']);
        Permission::create(['name' => 'finance_trial-balance_void']);

        // UNIT entity permissions:

        Permission::create(['name' => 'scm_unit_create']);
        Permission::create(['name' => 'scm_unit_read']);
        Permission::create(['name' => 'scm_unit_edit']);
        Permission::create(['name' => 'scm_unit_delete']);
        Permission::create(['name' => 'scm_unit_remove']);
        Permission::create(['name' => 'scm_unit_report']);
        Permission::create(['name' => 'scm_unit_print']);
        Permission::create(['name' => 'scm_unit_approve']);
        Permission::create(['name' => 'scm_unit_reject']);
        Permission::create(['name' => 'scm_unit_void']);

        // USER entity permissions: ???

        Permission::create(['name' => 'user_create']);
        Permission::create(['name' => 'user_read']);
        Permission::create(['name' => 'user_edit']);
        Permission::create(['name' => 'user_delete']);
        Permission::create(['name' => 'user_remove']);
        Permission::create(['name' => 'user_report']);
        Permission::create(['name' => 'user_print']);
        Permission::create(['name' => 'user_approve']);
        Permission::create(['name' => 'user_reject']);
        Permission::create(['name' => 'user_void']);

        // VENDOR entity permissions:

        Permission::create(['name' => 'scm_vendor_create']);
        Permission::create(['name' => 'scm_vendor_read']);
        Permission::create(['name' => 'scm_vendor_edit']);
        Permission::create(['name' => 'scm_vendor_delete']);
        Permission::create(['name' => 'scm_vendor_remove']);
        Permission::create(['name' => 'scm_vendor_report']);
        Permission::create(['name' => 'scm_vendor_print']);
        Permission::create(['name' => 'scm_vendor_approve']);
        Permission::create(['name' => 'scm_vendor_reject']);
        Permission::create(['name' => 'scm_vendor_void']);

        // WORKSHIFT SCHEDULE entity permissions:

        Permission::create(['name' => 'human-resources_workshift-schedule_create']);
        Permission::create(['name' => 'human-resources_workshift-schedule_read']);
        Permission::create(['name' => 'human-resources_workshift-schedule_edit']);
        Permission::create(['name' => 'human-resources_workshift-schedule_delete']);
        Permission::create(['name' => 'human-resources_workshift-schedule_remove']);
        Permission::create(['name' => 'human-resources_workshift-schedule_report']);
        Permission::create(['name' => 'human-resources_workshift-schedule_print']);
        Permission::create(['name' => 'human-resources_workshift-schedule_approve']);
        Permission::create(['name' => 'human-resources_workshift-schedule_reject']);
        Permission::create(['name' => 'human-resources_workshift-schedule_void']);

        // WORKPACKAGE entity permissions:

        Permission::create(['name' => 'heavy-maintenace_workpackage_create']);
        Permission::create(['name' => 'heavy-maintenace_workpackage_read']);
        Permission::create(['name' => 'heavy-maintenace_workpackage_edit']);
        Permission::create(['name' => 'heavy-maintenace_workpackage_delete']);
        Permission::create(['name' => 'heavy-maintenace_workpackage_remove']);
        Permission::create(['name' => 'heavy-maintenace_workpackage_report']);
        Permission::create(['name' => 'heavy-maintenace_workpackage_print']);
        Permission::create(['name' => 'heavy-maintenace_workpackage_approve']);
        Permission::create(['name' => 'heavy-maintenace_workpackage_reject']);
        Permission::create(['name' => 'heavy-maintenace_workpackage_void']);

        // WORK PROGRESS REPORT entity permissions:

        Permission::create(['name' => 'heavy-maintenace_wpr_create']);
        Permission::create(['name' => 'heavy-maintenace_wpr_read']);
        Permission::create(['name' => 'heavy-maintenace_wpr_edit']);
        Permission::create(['name' => 'heavy-maintenace_wpr_delete']);
        Permission::create(['name' => 'heavy-maintenace_wpr_remove']);
        Permission::create(['name' => 'heavy-maintenace_wpr_report']);
        Permission::create(['name' => 'heavy-maintenace_wpr_print']);
        Permission::create(['name' => 'heavy-maintenace_wpr_approve']);
        Permission::create(['name' => 'heavy-maintenace_wpr_reject']);
        Permission::create(['name' => 'heavy-maintenace_wpr_void']);

    }
}
