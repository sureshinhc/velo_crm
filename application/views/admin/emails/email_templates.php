<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content email-templates">
        <div class="row">
            <div class="col-md-12">
                <h4 class="tw-mt-0 tw-font-semibold tw-text-lg tw-text-neutral-700">
                    <?php echo _l('email_templates'); ?>
                </h4>
                <div class="panel_s">

                    <div class="panel-body">
                        <div class="row">
                            <?php hooks()->do_action('before_tickets_email_templates'); ?>
                            <div class="col-md-12">
                                <h4 class="tw-font-semibold email-template-heading">
                                    <?php echo _l('email_template_ticket_fields_heading'); ?>
                                    <?php if ($hasPermissionEdit) { ?>
                                    <a href="<?php echo admin_url('emails/disable_by_type/ticket'); ?>"
                                        class="pull-right mleft5 mright25"><small><?php echo _l('disable_all'); ?></small></a>
                                    <a href="<?php echo admin_url('emails/enable_by_type/ticket'); ?>"
                                        class="pull-right"><small><?php echo _l('enable_all'); ?></small></a>
                                    <?php } ?>
                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <span class="tw-font-semibold">
                                                        <?php echo _l('email_templates_table_heading_name'); ?>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($tickets as $ticket_template) { ?>
                                            <tr>
                                                <td class="<?php if ($ticket_template['active'] == 0) {
    echo 'text-throught';
} ?>">
                                                    <a
                                                        href="<?php echo admin_url('emails/email_template/' . $ticket_template['emailtemplateid']); ?>"><?php echo e($ticket_template['name']); ?></a>
                                                    <?php if (ENVIRONMENT !== 'production') { ?>
                                                    <br /><small><?php echo e($ticket_template['slug']); ?></small>
                                                    <?php } ?>
                                                    <?php if ($hasPermissionEdit) { ?>
                                                    <a href="<?php echo admin_url('emails/' . ($ticket_template['active'] == '1' ? 'disable/' : 'enable/') . $ticket_template['emailtemplateid']); ?>"
                                                        class="pull-right"><small><?php echo _l($ticket_template['active'] == 1 ? 'disable' : 'enable'); ?></small></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php hooks()->do_action('before_estimates_email_templates'); ?>
                            <div class="col-md-12">
                                <h4 class="bold email-template-heading">
                                    <?php echo _l('estimates'); ?>
                                    <?php if ($hasPermissionEdit) { ?>
                                    <a href="<?php echo admin_url('emails/disable_by_type/estimate'); ?>"
                                        class="pull-right mleft5 mright25"><small><?php echo _l('disable_all'); ?></small></a>
                                    <a href="<?php echo admin_url('emails/enable_by_type/estimate'); ?>"
                                        class="pull-right"><small><?php echo _l('enable_all'); ?></small></a>
                                    <?php } ?>

                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <span class="tw-font-semibold">
                                                        <?php echo _l('email_templates_table_heading_name'); ?>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($estimate as $estimate_template) { ?>
                                            <tr>
                                                <td class="<?php if ($estimate_template['active'] == 0) {
    echo 'text-throught';
} ?>">
                                                    <a
                                                        href="<?php echo admin_url('emails/email_template/' . $estimate_template['emailtemplateid']); ?>"><?php echo e($estimate_template['name']); ?></a>
                                                    <?php if (ENVIRONMENT !== 'production') { ?>
                                                    <br /><small><?php echo e($estimate_template['slug']); ?></small>
                                                    <?php } ?>
                                                    <?php if ($hasPermissionEdit) { ?>
                                                    <a href="<?php echo admin_url('emails/' . ($estimate_template['active'] == '1' ? 'disable/' : 'enable/') . $estimate_template['emailtemplateid']); ?>"
                                                        class="pull-right"><small><?php echo _l($estimate_template['active'] == 1 ? 'disable' : 'enable'); ?></small></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <?php hooks()->do_action('before_contracts_email_templates'); ?>
                            <div class="col-md-12">
                                <h4 class="bold email-template-heading">
                                    <?php echo _l('email_template_contracts_fields_heading'); ?>
                                    <?php if ($hasPermissionEdit) { ?>
                                    <a href="<?php echo admin_url('emails/disable_by_type/contract'); ?>"
                                        class="pull-right mleft5 mright25"><small><?php echo _l('disable_all'); ?></small></a>
                                    <a href="<?php echo admin_url('emails/enable_by_type/contract'); ?>"
                                        class="pull-right"><small><?php echo _l('enable_all'); ?></small></a>
                                    <?php } ?>

                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <span class="tw-font-semibold">
                                                        <?php echo _l('email_templates_table_heading_name'); ?>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($contracts as $contract_template) { ?>
                                            <tr>
                                                <td class="<?php if ($contract_template['active'] == 0) {
    echo 'text-throught';
} ?>">
                                                    <a
                                                        href="<?php echo admin_url('emails/email_template/' . $contract_template['emailtemplateid']); ?>"><?php echo e($contract_template['name']); ?></a>
                                                    <?php if (ENVIRONMENT !== 'production') { ?>
                                                    <br /><small><?php echo e($contract_template['slug']); ?></small>
                                                    <?php } ?>
                                                    <?php if ($hasPermissionEdit) { ?>
                                                    <a href="<?php echo admin_url('emails/' . ($contract_template['active'] == '1' ? 'disable/' : 'enable/') . $contract_template['emailtemplateid']); ?>"
                                                        class="pull-right"><small><?php echo _l($contract_template['active'] == 1 ? 'disable' : 'enable'); ?></small></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php hooks()->do_action('before_invoices_email_templates'); ?>
                            <div class="col-md-12">
                                <h4 class="bold email-template-heading">
                                    <?php echo _l('email_template_invoices_fields_heading'); ?>
                                    <?php if ($hasPermissionEdit) { ?>
                                    <a href="<?php echo admin_url('emails/disable_by_type/invoice'); ?>"
                                        class="pull-right mleft5 mright25"><small><?php echo _l('disable_all'); ?></small></a>
                                    <a href="<?php echo admin_url('emails/enable_by_type/invoice'); ?>"
                                        class="pull-right"><small><?php echo _l('enable_all'); ?></small></a>
                                    <?php } ?>

                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <span class="tw-font-semibold">
                                                        <?php echo _l('email_templates_table_heading_name'); ?>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($invoice as $invoice_template) { ?>
                                            <tr>
                                                <td class="<?php if ($invoice_template['active'] == 0) {
    echo 'text-throught';
} ?>">
                                                    <a
                                                        href="<?php echo admin_url('emails/email_template/' . $invoice_template['emailtemplateid']); ?>"><?php echo e($invoice_template['name']); ?></a>
                                                    <?php if (ENVIRONMENT !== 'production') { ?>
                                                    <br /><small><?php echo e($invoice_template['slug']); ?></small>
                                                    <?php } ?>
                                                    <?php if ($hasPermissionEdit) { ?>
                                                    <a href="<?php echo admin_url('emails/' . ($invoice_template['active'] == '1' ? 'disable/' : 'enable/') . $invoice_template['emailtemplateid']); ?>"
                                                        class="pull-right"><small><?php echo _l($invoice_template['active'] == 1 ? 'disable' : 'enable'); ?></small></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <?php hooks()->do_action('before_subscriptions_email_templates'); ?>
                            <div class="col-md-12">
                                <h4 class="bold email-template-heading">
                                    <?php echo _l('subscriptions'); ?>
                                    <?php if ($hasPermissionEdit) { ?>
                                    <a href="<?php echo admin_url('emails/disable_by_type/subscriptions'); ?>"
                                        class="pull-right mleft5 mright25"><small><?php echo _l('disable_all'); ?></small></a>
                                    <a href="<?php echo admin_url('emails/enable_by_type/subscriptions'); ?>"
                                        class="pull-right"><small><?php echo _l('enable_all'); ?></small></a>
                                    <?php } ?>

                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <span class="tw-font-semibold">
                                                        <?php echo _l('email_templates_table_heading_name'); ?>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($subscriptions as $subscription_template) { ?>
                                            <tr>
                                                <td class="<?php if ($subscription_template['active'] == 0) {
    echo 'text-throught';
} ?>">
                                                    <a
                                                        href="<?php echo admin_url('emails/email_template/' . $subscription_template['emailtemplateid']); ?>"><?php echo e($subscription_template['name']); ?></a>
                                                    <?php if (ENVIRONMENT !== 'production') { ?>
                                                    <br /><small><?php echo e($subscription_template['slug']); ?></small>
                                                    <?php } ?>
                                                    <?php if ($hasPermissionEdit) { ?>
                                                    <a href="<?php echo admin_url('emails/' . ($subscription_template['active'] == '1' ? 'disable/' : 'enable/') . $subscription_template['emailtemplateid']); ?>"
                                                        class="pull-right"><small><?php echo _l($subscription_template['active'] == 1 ? 'disable' : 'enable'); ?></small></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <?php hooks()->do_action('before_credit_notes_email_templates'); ?>
                            <div class="col-md-12">
                                <h4 class="bold email-template-heading">
                                    <?php echo _l('credit_note'); ?>
                                    <?php if ($hasPermissionEdit) { ?>
                                    <a href="<?php echo admin_url('emails/disable_by_type/credit_note'); ?>"
                                        class="pull-right mleft5 mright25"><small><?php echo _l('disable_all'); ?></small></a>
                                    <a href="<?php echo admin_url('emails/enable_by_type/credit_note'); ?>"
                                        class="pull-right"><small><?php echo _l('enable_all'); ?></small></a>
                                    <?php } ?>

                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <span class="tw-font-semibold">
                                                        <?php echo _l('email_templates_table_heading_name'); ?>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($credit_notes as $credit_note_template) { ?>
                                            <tr>
                                                <td class="<?php if ($credit_note_template['active'] == 0) {
    echo 'text-throught';
} ?>">
                                                    <a
                                                        href="<?php echo admin_url('emails/email_template/' . $credit_note_template['emailtemplateid']); ?>"><?php echo e($credit_note_template['name']); ?></a>
                                                    <?php if (ENVIRONMENT !== 'production') { ?>
                                                    <br /><small><?php echo e($credit_note_template['slug']); ?></small>
                                                    <?php } ?>
                                                    <?php if ($hasPermissionEdit) { ?>
                                                    <a href="<?php echo admin_url('emails/' . ($credit_note_template['active'] == '1' ? 'disable/' : 'enable/') . $credit_note_template['emailtemplateid']); ?>"
                                                        class="pull-right"><small><?php echo _l($credit_note_template['active'] == 1 ? 'disable' : 'enable'); ?></small></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <?php hooks()->do_action('before_tasks_email_templates'); ?>
                            <div class="col-md-12">
                                <h4 class="bold email-template-heading">
                                    <?php echo _l('tasks'); ?>
                                    <?php if ($hasPermissionEdit) { ?>
                                    <a href="<?php echo admin_url('emails/disable_by_type/tasks'); ?>"
                                        class="pull-right mleft5 mright25"><small><?php echo _l('disable_all'); ?></small></a>
                                    <a href="<?php echo admin_url('emails/enable_by_type/tasks'); ?>"
                                        class="pull-right"><small><?php echo _l('enable_all'); ?></small></a>
                                    <?php } ?>

                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <span class="tw-font-semibold">
                                                        <?php echo _l('email_templates_table_heading_name'); ?>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($tasks as $task_template) { ?>
                                            <tr>
                                                <td class="<?php if ($task_template['active'] == 0) {
    echo 'text-throught';
} ?>">
                                                    <a
                                                        href="<?php echo admin_url('emails/email_template/' . $task_template['emailtemplateid']); ?>"><?php echo e($task_template['name']); ?></a>
                                                    <?php if (ENVIRONMENT !== 'production') { ?>
                                                    <br /><small><?php echo e($task_template['slug']); ?></small>
                                                    <?php } ?>
                                                    <?php if ($hasPermissionEdit) { ?>
                                                    <a href="<?php echo admin_url('emails/' . ($task_template['active'] == '1' ? 'disable/' : 'enable/') . $task_template['emailtemplateid']); ?>"
                                                        class="pull-right"><small><?php echo _l($task_template['active'] == 1 ? 'disable' : 'enable'); ?></small></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php hooks()->do_action('before_customers_email_templates'); ?>
                            <div class="col-md-12">
                                <h4 class="bold email-template-heading">
                                    <?php echo _l('email_template_clients_fields_heading'); ?>
                                    <?php if ($hasPermissionEdit) { ?>
                                    <a href="<?php echo admin_url('emails/disable_by_type/client'); ?>"
                                        class="pull-right mleft5 mright25"><small><?php echo _l('disable_all'); ?></small></a>
                                    <a href="<?php echo admin_url('emails/enable_by_type/client'); ?>"
                                        class="pull-right"><small><?php echo _l('enable_all'); ?></small></a>
                                    <?php } ?>

                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <span class="tw-font-semibold">
                                                        <?php echo _l('email_templates_table_heading_name'); ?>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($client as $client_template) {
    if ($client_template['slug'] == 'client-registration-confirmed' && get_option('customers_register_require_confirmation') == '0' && total_rows(db_prefix() . 'clients', 'registration_confirmed=0') == 0) {
        continue;
    } ?>
                                            <tr>
                                                <td class="<?php if ($client_template['active'] == 0) {
        echo 'text-throught';
    } ?>">
                                                    <a
                                                        href="<?php echo admin_url('emails/email_template/' . $client_template['emailtemplateid']); ?>"><?php echo e($client_template['name']); ?></a>
                                                    <?php if (ENVIRONMENT !== 'production') { ?>
                                                    <br /><small><?php echo e($client_template['slug']); ?></small>
                                                    <?php } ?>
                                                    <?php if ($hasPermissionEdit) { ?>
                                                    <a href="<?php echo admin_url('emails/' . ($client_template['active'] == '1' ? 'disable/' : 'enable/') . $client_template['emailtemplateid']); ?>"
                                                        class="pull-right"><small><?php echo _l($client_template['active'] == 1 ? 'disable' : 'enable'); ?></small></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php
} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <?php hooks()->do_action('before_proposals_email_templates'); ?>
                            <div class="col-md-12">
                                <h4 class="bold email-template-heading">
                                    <?php echo _l('email_template_proposals_fields_heading'); ?>
                                    <?php if ($hasPermissionEdit) { ?>
                                    <a href="<?php echo admin_url('emails/disable_by_type/proposals'); ?>"
                                        class="pull-right mleft5 mright25"><small><?php echo _l('disable_all'); ?></small></a>
                                    <a href="<?php echo admin_url('emails/enable_by_type/proposals'); ?>"
                                        class="pull-right"><small><?php echo _l('enable_all'); ?></small></a>
                                    <?php } ?>

                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <span class="tw-font-semibold">
                                                        <?php echo _l('email_templates_table_heading_name'); ?>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($proposals as $proposal_template) { ?>
                                            <tr>
                                                <td class="<?php if ($proposal_template['active'] == 0) {
        echo 'text-throught';
    } ?>">
                                                    <a
                                                        href="<?php echo admin_url('emails/email_template/' . $proposal_template['emailtemplateid']); ?>"><?php echo e($proposal_template['name']); ?></a>
                                                    <?php if (ENVIRONMENT !== 'production') { ?>
                                                    <br /><small><?php echo e($proposal_template['slug']); ?></small>
                                                    <?php } ?>
                                                    <?php if ($hasPermissionEdit) { ?>
                                                    <a href="<?php echo admin_url('emails/' . ($proposal_template['active'] == '1' ? 'disable/' : 'enable/') . $proposal_template['emailtemplateid']); ?>"
                                                        class="pull-right"><small><?php echo _l($proposal_template['active'] == 1 ? 'disable' : 'enable'); ?></small></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php hooks()->do_action('before_projects_email_templates'); ?>
                            <div class="col-md-12">
                                <h4 class="bold email-template-heading">
                                    <?php echo _l('projects'); ?>
                                    <?php if ($hasPermissionEdit) { ?>
                                    <a href="<?php echo admin_url('emails/disable_by_type/project'); ?>"
                                        class="pull-right mleft5 mright25"><small><?php echo _l('disable_all'); ?></small></a>
                                    <a href="<?php echo admin_url('emails/enable_by_type/project'); ?>"
                                        class="pull-right"><small><?php echo _l('enable_all'); ?></small></a>
                                    <?php } ?>
                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <span class="tw-font-semibold">
                                                        <?php echo _l('email_templates_table_heading_name'); ?>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($projects as $project_template) { ?>
                                            <tr>
                                                <td class="<?php if ($project_template['active'] == 0) {
        echo 'text-throught';
    } ?>">
                                                    <a
                                                        href="<?php echo admin_url('emails/email_template/' . $project_template['emailtemplateid']); ?>"><?php echo e($project_template['name']); ?></a>
                                                    <?php if (ENVIRONMENT !== 'production') { ?>
                                                    <br /><small><?php echo e($project_template['slug']); ?></small>
                                                    <?php } ?>
                                                    <?php if ($hasPermissionEdit) { ?>
                                                    <a href="<?php echo admin_url('emails/' . ($project_template['active'] == '1' ? 'disable/' : 'enable/') . $project_template['emailtemplateid']); ?>"
                                                        class="pull-right"><small><?php echo _l($project_template['active'] == 1 ? 'disable' : 'enable'); ?></small></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php hooks()->do_action('before_staff_email_templates'); ?>
                            <div class="col-md-12">
                                <h4 class="bold email-template-heading">
                                    <?php echo _l('staff_members'); ?>
                                    <?php if ($hasPermissionEdit) { ?>
                                    <a href="<?php echo admin_url('emails/disable_by_type/staff'); ?>"
                                        class="pull-right mleft5 mright25"><small><?php echo _l('disable_all'); ?></small></a>
                                    <a href="<?php echo admin_url('emails/enable_by_type/staff'); ?>"
                                        class="pull-right"><small><?php echo _l('enable_all'); ?></small></a>
                                    <?php } ?>

                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <span class="tw-font-semibold">
                                                        <?php echo _l('email_templates_table_heading_name'); ?>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($staff as $staff_template) { ?>
                                            <tr>
                                                <td class="<?php if ($staff_template['active'] == 0) {
        echo 'text-throught';
    } ?>">
                                                    <a
                                                        href="<?php echo admin_url('emails/email_template/' . $staff_template['emailtemplateid']); ?>"><?php echo e($staff_template['name']); ?></a>
                                                    <?php if (ENVIRONMENT !== 'production') { ?>
                                                    <br /><small><?php echo e($staff_template['slug']); ?></small>
                                                    <?php } ?>
                                                    <?php if ($hasPermissionEdit && $staff_template['slug'] != 'two-factor-authentication') { ?>
                                                    <a href="<?php echo admin_url('emails/' . ($staff_template['active'] == '1' ? 'disable/' : 'enable/') . $staff_template['emailtemplateid']); ?>"
                                                        class="pull-right"><small><?php echo _l($staff_template['active'] == 1 ? 'disable' : 'enable'); ?></small></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php hooks()->do_action('before_leads_email_templates'); ?>
                            <div class="col-md-12">
                                <h4 class="bold email-template-heading">
                                    <?php echo _l('leads'); ?>
                                    <?php if ($hasPermissionEdit) { ?>
                                    <a href="<?php echo admin_url('emails/disable_by_type/leads'); ?>"
                                        class="pull-right mleft5 mright25"><small><?php echo _l('disable_all'); ?></small></a>
                                    <a href="<?php echo admin_url('emails/enable_by_type/leads'); ?>"
                                        class="pull-right"><small><?php echo _l('enable_all'); ?></small></a>
                                    <?php } ?>

                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <span class="tw-font-semibold">
                                                        <?php echo _l('email_templates_table_heading_name'); ?>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($leads as $lead_template) { ?>
                                            <tr>
                                                <td class="<?php if ($lead_template['active'] == 0) {
        echo 'text-throught';
    } ?>">
                                                    <a
                                                        href="<?php echo admin_url('emails/email_template/' . $lead_template['emailtemplateid']); ?>"><?php echo e($lead_template['name']); ?></a>
                                                    <?php if (ENVIRONMENT !== 'production') { ?>
                                                    <br /><small><?php echo e($lead_template['slug']); ?></small>
                                                    <?php } ?>
                                                    <?php if ($hasPermissionEdit) { ?>
                                                    <a href="<?php echo admin_url('emails/' . ($lead_template['active'] == '1' ? 'disable/' : 'enable/') . $lead_template['emailtemplateid']); ?>"
                                                        class="pull-right"><small><?php echo _l($lead_template['active'] == 1 ? 'disable' : 'enable'); ?></small></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php hooks()->do_action('before_estimate_request_email_templates'); ?>
                            <div class="col-md-12">
                                <h4 class="bold email-template-heading">
                                    <?php echo _l('estimate_request'); ?>
                                    <?php if ($hasPermissionEdit) { ?>
                                    <a href="<?php echo admin_url('emails/disable_by_type/estimate_request'); ?>"
                                        class="pull-right mleft5 mright25"><small><?php echo _l('disable_all'); ?></small></a>
                                    <a href="<?php echo admin_url('emails/enable_by_type/estimate_request'); ?>"
                                        class="pull-right"><small><?php echo _l('enable_all'); ?></small></a>
                                    <?php } ?>

                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <span class="tw-font-semibold">
                                                        <?php echo _l('email_templates_table_heading_name'); ?>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($estimate_request as $estimate_request) { ?>
                                            <tr>
                                                <td class="<?php if ($estimate_request['active'] == 0) {
        echo 'text-throught';
    } ?>">
                                                    <a
                                                        href="<?php echo admin_url('emails/email_template/' . $estimate_request['emailtemplateid']); ?>"><?php echo e($estimate_request['name']); ?></a>
                                                    <?php if (ENVIRONMENT !== 'production') { ?>
                                                    <br /><small><?php echo e($estimate_request['slug']); ?></small>
                                                    <?php } ?>
                                                    <?php if ($hasPermissionEdit) { ?>
                                                    <a href="<?php echo admin_url('emails/' . ($estimate_request['active'] == '1' ? 'disable/' : 'enable/') . $estimate_request['emailtemplateid']); ?>"
                                                        class="pull-right"><small><?php echo _l($estimate_request['active'] == 1 ? 'disable' : 'enable'); ?></small></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php hooks()->do_action('before_notifications_email_templates'); ?>
                            <div class="col-md-12">
                                <h4 class="bold email-template-heading">
                                    <?php echo _l('notifications'); ?>
                                    <?php if ($hasPermissionEdit) { ?>
                                    <a href="<?php echo admin_url('emails/disable_by_type/notifications'); ?>"
                                        class="pull-right mleft5 mright25"><small><?php echo _l('disable_all'); ?></small></a>
                                    <a href="<?php echo admin_url('emails/enable_by_type/notifications'); ?>"
                                        class="pull-right"><small><?php echo _l('enable_all'); ?></small></a>
                                    <?php } ?>

                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <span class="tw-font-semibold">
                                                        <?php echo _l('email_templates_table_heading_name'); ?>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($notifications as $notification) { ?>
                                            <tr>
                                                <td class="<?php if ($notification['active'] == 0) {
        echo 'text-throught';
    } ?>">
                                                    <a
                                                        href="<?php echo admin_url('emails/email_template/' . $notification['emailtemplateid']); ?>"><?php echo e($notification['name']); ?></a>
                                                    <?php if (ENVIRONMENT !== 'production') { ?>
                                                    <br /><small><?php echo e($notification['slug']); ?></small>
                                                    <?php } ?>
                                                    <?php if ($hasPermissionEdit) { ?>
                                                    <a href="<?php echo admin_url('emails/' . ($notification['active'] == '1' ? 'disable/' : 'enable/') . $notification['emailtemplateid']); ?>"
                                                        class="pull-right"><small><?php echo _l($notification['active'] == 1 ? 'disable' : 'enable'); ?></small></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php hooks()->do_action('before_gdpr_email_templates'); ?>
                            <div class="col-md-12<?php if (!is_gdpr()) {
        echo ' hide';
    } ?>">
                                <h4 class="bold email-template-heading">
                                    <?php echo _l('gdpr'); ?>
                                    <?php if ($hasPermissionEdit) { ?>
                                    <a href="<?php echo admin_url('emails/disable_by_type/gdpr'); ?>"
                                        class="pull-right mleft5 mright25"><small><?php echo _l('disable_all'); ?></small></a>
                                    <a href="<?php echo admin_url('emails/enable_by_type/gdpr'); ?>"
                                        class="pull-right"><small><?php echo _l('enable_all'); ?></small></a>
                                    <?php } ?>

                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <span class="tw-font-semibold">
                                                        <?php echo _l('email_templates_table_heading_name'); ?>
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($gdpr as $gdpr_template) { ?>
                                            <tr>
                                                <td class="<?php if ($gdpr_template['active'] == 0) {
        echo 'text-throught';
    } ?>">
                                                    <a
                                                        href="<?php echo admin_url('emails/email_template/' . $gdpr_template['emailtemplateid']); ?>"><?php echo e($gdpr_template['name']); ?></a>
                                                    <?php if (ENVIRONMENT !== 'production') { ?>
                                                    <br /><small><?php echo e($gdpr_template['slug']); ?></small>
                                                    <?php } ?>
                                                    <?php if ($hasPermissionEdit) { ?>
                                                    <a href="<?php echo admin_url('emails/' . ($gdpr_template['active'] == '1' ? 'disable/' : 'enable/') . $gdpr_template['emailtemplateid']); ?>"
                                                        class="pull-right"><small><?php echo _l($gdpr_template['active'] == 1 ? 'disable' : 'enable'); ?></small></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php hooks()->do_action('after_email_templates'); ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>
</body>

</html>