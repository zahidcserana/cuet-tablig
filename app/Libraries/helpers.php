<?php
function active_menu()
{
    $current_page = \Request::route()->getName();

    switch ($current_page) {
        case 'home':
            return 'home';

        case 'users':
        case 'user_view':
        case 'user_add':
            return 'users';

        case 'notices':
        case 'notice':
        case 'notice_add':
            return 'notices';

        case 'profile':
            return 'profile';

        case 'messages':
        case 'message_add':
        case 'message':
            return 'message';

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

function hallName($name){
    $hall = \Config::get('cuet.hall');
    foreach ($hall as $key=>$value){
        if($name == $key){
            return $value;
        }
    }
}
function departmentName($name){
    $hall = \Config::get('cuet.department');
    foreach ($hall as $key=>$value){
        if($name == $key){
            return $value;
        }
    }
}


