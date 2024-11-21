<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<link rel="stylesheet" href="<?php echo module_dir_url(WHATSBOT_MODULE, 'assets/css/tail_output.css'); ?>">
<div id="wrapper">
    <div class="content">
        <?php echo form_open('', ['id' => 'workflow-form', 'autocomplete' => 'off'], ['id' => $flow['id'] ?? '', 'flow_data' => $flow['flow_data'] ?? '', 'is_validate' => '0', 'file_url' => base_url(get_upload_path_by_type('flow') . '/' . $flow['id'] ?? '' . '/')]); ?>
        <div id="new-vue-id"></div>
        <?php echo form_close(); ?>
    </div>
</div>
<?php init_tail(); ?>
<script>
    var image_path = '<?= site_url(basename(APP_MODULES_PATH) . '/' . WHATSBOT_MODULE . '/') ?>';
    var allowed_extension = '<?= json_encode(wb_get_allowed_extension()); ?>';
</script>
<script src="<?= module_dir_url('whatsbot', 'assets/js/vueflow.bundle.js') ?>"></script>
<script>
    $('#workflow-form').on('submit', function(event) {
        event.preventDefault();
    });
    $('#save_btn').click(function(event) {
        event.preventDefault();
        if ($('input[name="is_validate"]').val() == '1') {
            $.ajax({
                url: `${admin_url}whatsbot/bot_flow/save`,
                type: 'post',
                data: {
                    id: $('input[name="id"]').val(),
                    flow_data: $('input[name="flow_data"]').val(),
                },
                dataType: 'json',
            }).done(function(res) {
                alert_float(res.type, res.message);
                setTimeout(() => {
                    location.href = admin_url + 'whatsbot/bot_flow';
                }, 1000);
            })
        }
    });
</script>