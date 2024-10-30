<?php

namespace BitCode\BITCF7ZC\Admin\CF7;

use BitCode\BITCF7ZC\Admin\Gclid\Handler as GclidHandler;
use BitCode\BITCF7ZC\Integration\IntegrationHandler;
use BitCode\BITCF7ZC\Integration\Integrations;

final class Handler
{
    public function __construct()
    {
        //
    }


    public static function filter_wpcf7_form_hidden_fields($hidden_fields)
    {
        $current_form_id = \wpcf7_get_current_contact_form()->id();
        $gclidHandler = new GclidHandler();
        $gclid_enabled = $gclidHandler->get_enabled_form_lsit();
        if (in_array($current_form_id, $gclid_enabled)) {
            $hidden_fields['gclid'] = isset($_REQUEST['gclid']) ? \esc_attr($_REQUEST['gclid']) :  '';
        }
        return $hidden_fields;
    }

    public function get_a_form($data)
    {
        $form_text = \get_post_meta($data->formId, '_form', true);

        if (method_exists('WPCF7_FormTagsManager', 'get_instance')) {
            $formManager = \WPCF7_FormTagsManager::get_instance();
            $formManager->scan($form_text);
            $fieldDetails = $formManager->get_scanned_tags();
        } elseif (method_exists('WPCF7_ShortcodeManager', 'get_instance')) { //
            $formManager = \WPCF7_ShortcodeManager::get_instance();
            $formManager->do_shortcode($form_text);
            $fieldDetails = $formManager->get_scanned_tags();
        }
        if (empty($fieldDetails)) {
            wp_send_json_error(__('Form doesn\'t exists', 'bitcf7zc'));
        }

        $fields = [];
        foreach ($fieldDetails as $field) {
            if (!empty($field->name) && $field->type !== 'submit') {
                $fields[] = [
                    'name' => $field->name,
                    'type' => $field->basetype,
                    'label' => !empty($field->labels) ? $field->labels[0] : $field->name,
                ];
            }
        }
        if (empty($fields)) {
            wp_send_json_error(__('Form doesn\'t exists any field', 'bitcf7zc'));
        }

        $responseData['fields'] = $fields;
        $integrationHandler = new IntegrationHandler($data->formId);
        $formIntegrations = $integrationHandler->getAllIntegration();
        if (!is_wp_error($formIntegrations)) {
            $integrations = [];
            foreach ($formIntegrations as $integrationkey => $integrationValue) {
                $integrationData = array(
                    'id' => $integrationValue->id,
                    'name' => $integrationValue->integration_name,
                    'type' => $integrationValue->integration_type,
                    'status' => $integrationValue->status,
                );
                $integrations[] = array_merge(
                    $integrationData,
                    is_string($integrationValue->integration_details) ?
                        (array) json_decode($integrationValue->integration_details) :
                        $integrationValue->integration_details
                );
            }
            $responseData['integrations'] = $integrations;
        }
        wp_send_json_success($responseData);
    }

    public static function handle_wpcf7_submit($form, $response)
    {
        $submission = \WPCF7_Submission::get_instance();

        if (!$submission || !$posted_data = $submission->get_posted_data()) {
            return;
        }
        if (!$submission->is('mail_failed') && !$submission->is('mail_sent')) {
            return;
        }

        if (isset($posted_data['_wpcf7'])) {
            $form_id = $posted_data['_wpcf7'];
        } else {
            $current_form = \WPCF7_ContactForm::get_current();
            $form_id = $current_form->id();
        }
        $files = $submission->uploaded_files();
        $posted_data = array_merge($posted_data, $files);
        if (!empty($form_id)) {
            Integrations::executeIntegrations($form_id, $posted_data);
        }
    }
}
