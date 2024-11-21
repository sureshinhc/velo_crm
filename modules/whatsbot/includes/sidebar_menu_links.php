<?php

/*
 * Inject sidebar menu and links for whatsbot module
 */
hooks()->add_action('admin_init', function () {
    if (staff_can('connect', 'wtc_connect_account') || staff_can('view', 'wtc_message_bot') || staff_can('view', 'wtc_template_bot') || staff_can('view', 'wtc_template') || staff_can('view', 'wtc_campaign') || staff_can('view', 'wtc_chat') || staff_can('view', 'wtc_log_activity') || staff_can('view', 'wtc_settings') || staff_can('view', 'wtc_canned_reply') || staff_can('view', 'wtc_ai_prompts') || staff_can('view_own', 'wtc_canned_reply') || staff_can('view_own', 'wtc_ai_prompts') || staff_can('send', 'wtc_bulk_campaign') || staff_can('view', 'wtc_bot_flow')) {
        get_instance()->app_menu->add_sidebar_menu_item('whatsbot', [
            'slug' => 'whatsbot',
            'name' => _l('whatsbot'),
            'icon' => 'fa-brands fa-whatsapp',
            'href' => '#',
            'position' => 20,
        ]);
    }

    if (staff_can('connect', 'wtc_connect_account')) {
        get_instance()->app_menu->add_sidebar_children_item(WHATSBOT_MODULE, [
            'slug' => 'connect_account',
            'name' => _l('connect_account'),
            'icon' => 'fa-solid fa-link',
            'href' => admin_url(WHATSBOT_MODULE . '/connect_account'),
            'position' => 1,
        ]);
    }

    if (staff_can('view', 'wtc_message_bot')) {
        get_instance()->app_menu->add_sidebar_children_item(WHATSBOT_MODULE, [
            'slug' => 'whatsapp_message_bot',
            'name' => _l('message_bot'),
            'icon' => 'fa-solid fa-share',
            'href' => admin_url(WHATSBOT_MODULE . '/bots'),
            'position' => 2,
        ]);
    }

    if (staff_can('view', 'wtc_template_bot')) {
        get_instance()->app_menu->add_sidebar_children_item(WHATSBOT_MODULE, [
            'slug' => 'whatsapp_template_bot',
            'name' => _l('template_bot'),
            'icon' => 'fa-solid fa-robot',
            'href' => admin_url(WHATSBOT_MODULE . '/bots?group=template'),
            'position' => 3,
        ]);
    }

    if (staff_can('view', 'wtc_template')) {
        get_instance()->app_menu->add_sidebar_children_item(WHATSBOT_MODULE, [
            'slug' => 'whatsbot_templates',
            'name' => _l('templates'),
            'icon' => 'fa-solid fa-scroll',
            'href' => admin_url(WHATSBOT_MODULE . '/templates'),
            'position' => 4,
        ]);
    }

    if (staff_can('view', 'wtc_campaign')) {
        get_instance()->app_menu->add_sidebar_children_item(WHATSBOT_MODULE, [
            'slug' => 'campaigns',
            'name' => _l('campaigns'),
            'icon' => 'fa-solid fa-bullhorn',
            'href' => admin_url(WHATSBOT_MODULE . '/campaigns'),
            'position' => 5,
        ]);
    }

    if (staff_can('send', 'wtc_bulk_campaign')) {
        get_instance()->app_menu->add_sidebar_children_item(WHATSBOT_MODULE, [
            'slug'     => 'bulk_campaigns',
            'name'     => _l('csv_campaign'),
            'icon'     => 'fa-solid fa-file-import',
            'href'     => admin_url(WHATSBOT_MODULE . '/bulk_campaigns'),
            'position' => 6,
        ]);
    }

    if (staff_can('view', 'wtc_log_activity')) {
        get_instance()->app_menu->add_sidebar_children_item('whatsbot', [
            'slug' => 'whtasbot_activity_log',
            'name' => _l('activity_log'),
            'icon' => 'fa-brands fa-autoprefixer',
            'href' => admin_url('whatsbot/activity_log'),
            'position' => 7,
        ]);
    }

    if (staff_can('view', 'wtc_chat')) {
        get_instance()->app_menu->add_sidebar_children_item(WHATSBOT_MODULE, [
            'slug' => 'whatsapp_chat_integration',
            'name' => _l('chat'),
            'icon' => 'fa-regular fa-comment-dots',
            'href' => admin_url(WHATSBOT_MODULE . '/chat'),
            'position' => 8,
        ]);
    }

    if (staff_can('view', 'wtc_canned_reply') || staff_can('view_own', 'wtc_canned_reply')) {
        get_instance()->app_menu->add_sidebar_children_item(WHATSBOT_MODULE, [
            'slug' => 'canned_reply',
            'name' => _l('canned_reply_menu'),
            'icon' => 'fa-regular fa-pen-to-square',
            'href' => admin_url(WHATSBOT_MODULE . '/canned_reply'),
            'position' => 9,
        ]);
    }

    if (staff_can('view', 'wtc_ai_prompts') || staff_can('view_own', 'wtc_ai_prompts')) {
        get_instance()->app_menu->add_sidebar_children_item(WHATSBOT_MODULE, [
            'slug' => 'ai_prompts',
            'name' => _l('ai_prompts'),
            'icon' => 'fa-solid fa-pen-nib',
            'href' => admin_url(WHATSBOT_MODULE . '/ai_prompts'),
            'position' => 10,
        ]);
    }

    if (staff_can('view', 'wtc_settings')) {
        get_instance()->app_menu->add_sidebar_children_item('whatsbot', [
            'slug' => 'whtasbot_settings',
            'name' => _l('settings'),
            'icon' => 'fa-solid fa-gears',
            'href' => admin_url('settings?group=whatsbot'),
            'position' => 11,
        ]);
    }

    if (staff_can('view', 'wtc_settings')) {
        get_instance()->app_tabs->add_settings_tab('whatsbot', [
            'name' => _l('whatsbot'),
            'view' => 'whatsbot/settings/central_settings',
            'icon' => 'fa-brands fa-whatsapp',
            'position' => 6,
        ]);
    }

    if (staff_can('view', 'wtc_bot_flow')) {
        get_instance()->app_menu->add_sidebar_children_item(WHATSBOT_MODULE, [
            'slug'     => 'bot_flow',
            'name'     => _l('bot_flow_builder'),
            'icon'     => 'fa-solid fa-arrow-trend-up',
            'href'     => admin_url(WHATSBOT_MODULE . '/bot_flow'),
            'position' => 3,
        ]);
    }
});
