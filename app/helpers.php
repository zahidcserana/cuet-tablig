<?php

use App\Model\Employer\EmployeeSectionCompletionStatus;

function active_menu()
{
    $current_page = \Request::route()->getName();

    switch ($current_page) {
        case 'dashboard_view':
            return 'dashboard_view';

        case 'all_employee':
        case 'add_employee':
        case 'add_employee_ajax':
        case 'employee_country_select':
        case 'add_employee_personal_details_view':
        case 'save_personal_details':
        case 'positional_details_view':
        case 'save_positional_details':
        case 'save_employee_access':
        case 'save_employee_access_ajax':
        case 'edit_an_employee':
        case 'add_employee_success_msg_view':
        case 'employee_review':
            return 'all_employee';

        case 'financial_advisors_empr_view':
            return 'financial_advisors_empr_view';

        case 'policy_list_view':
        case 'add_new_policy':
        case 'add_policy_view':
        case 'update_policy_file_status':
        case 'edit_policy_view':
        case 'update_policy_view':
        case 'save_policy_document_uploaded_information':
        case 'download_policies':
        case 'post_policy_category':
        case 'policy_category_view':
        case 'update_policy_category':
        case 'settings_view':
        case 'template_list_view':
        case 'settings_payment_view':
        case 'settings_payment_history_view':
        case 'settings_payment_history_methods_view':
        case 'settings_payment_history_plans_view':
        case 'html_template_generator':
        case 'download_policies':
        case 'post_policy_category':
        case 'html_email_template_generator':
        case 'save_sms_template':
        case 'api_integrations_view':
        case 'show_employee_settings':
        case 'all_employer_locations':
        case 'edit_employer_location_view':
        case 'update_employer_location_view':
        case 'two_factor_login_view':
        case 'employer_info_view':
        case 'invoice_list_view':
        case 'invoice_view':
        case 'ordered_product_items_view':
        case 'test_integration':
        case 'show_all_employer_users':
        //case 'superfunds.default':
        case 'superfund_get_default':
        //case 'superfunds.all':
        case 'getAllSuperFund':
        //case 'superfunds.edit':
        case 'editSuperFund':
        case 'xero_integration':
        case 'integrationsIndex':
        case 'integrationsMyob':
        case 'integrationsJobadder':
        case 'integrationsSmartRecruiters':
        case 'integrationsBullhorn':
        case 'integrationsSlack':
        case 'integrationsAscender':
        case 'integrationsAdp':
        case 'integrationsQuickbooks':
        case 'integrationsReckon':
        case 'locations.add':
        //case 'forms.index':
        //case 'forms.show':
        //case 'form.responses':
        //case 'forms.create':
        case 'forms_index':
        case 'forms_show':
        case 'form_responses':
        case 'forms_create':
            return 'settings_view';
        case 'support_view':
            return 'support_view';
        default:
            return 'dashboard_view';
    }
}

function emploee_active_menu()
{
    $current_page = \Request::route()->getName();

    switch ($current_page) {
        case 'employee_dashboard_view':
            return 'employee_dashboard_view';

        case 'personal_details_view':
        case 'update_personal_details_view':
        case 'delete_emergency_contact_view':
            return 'personal_details_view';

        case 'work_rights_view':
        case 'post_work_rights_documents':
            return 'work_rights_view';

        case 'tax_file_view':
        case 'tax_declaration_edit':
            return 'tax_file_view';

        case 'banking_detail_view':
        case 'post_banking_detail_info':
            return 'banking_detail_view';

        case 'employee_superannuation':
            return 'employee_superannuation';

        case 'policies_view':
        case 'post_selected_policies':
        case 'download_policies':
            return 'policies_view';

        case 'information_view':
            return 'information_view';

        case 'financial_advisors_view':
            return 'financial_advisors_view';

        case 'health_insurance_view':
            return 'health_insurance_view';

        case 'employee_work_rights_view':
            return 'employee_work_rights_view';

        case 'emp_tax_file_view':
            return 'emp_tax_file_view';

        case 'emp_banking_detail_view':
            return 'emp_banking_detail_view';
            
        default:
            return 'employee_dashboard_view';
    }
}

function employee_section_completion_statuses($employee_id)
{
    $escs_details = EmployeeSectionCompletionStatus::find($employee_id);
    return $escs_details;
}
