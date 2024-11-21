<?php

namespace modules\whatsbot\core;

require_once __DIR__.'/../third_party/node.php';
require_once __DIR__.'/../vendor/autoload.php';
use WpOrg\Requests\Requests as whatsbot_Requests;

class Apiinit
{
    public static function the_da_vinci_code($module_name)
    {
        $module          = get_instance()->app_modules->get($module_name);
        $verification_id =  !empty(get_option($module_name.'_verification_id')) ? base64_decode(get_option($module_name.'_verification_id')) : '';
        $token           = get_option($module_name.'_product_token');

        $id_data         = explode('|', $verification_id);
        $verified        = !((empty($verification_id)) || (4 != \count($id_data)));

        if (4 === \count($id_data)) {
            $verified = !empty($token);
            try {
                
                $data = json_decode(base64_decode($token));

                if (!empty($data)) {
                    $verified = basename($module['headers']['uri']) == $data->item_id && $data->item_id == $id_data[0] && $data->buyer == $id_data[2] && $data->purchase_code == $id_data[3];
                }

                if (!empty(get_option($module_name . '_verification_signature'))) {
                    $verified = hash_equals(hash_hmac('sha512', $token, $id_data[3]), get_option($module_name . '_verification_signature'));
                }

            } catch (Exception $e) {
                $verified = false;
            }

            $last_verification = (int) get_option($module_name.'_last_verification');
            $seconds           = $data->check_interval ?? 0;

            if (!empty($seconds) && time() > ($last_verification + $seconds)) {
                $verified = false;
                try {
                    $request = whatsbot_Requests::post(WB_VAL_PROD_POINT, ['Accept' => 'application/json', 'Authorization' => $token], json_encode(['verification_id' => $verification_id, 'item_id' => basename($module['headers']['uri']), 'activated_domain' => base_url(), 'version' => $module['headers']['version']]));
                    $status  = $request->status_code;
                    if ((500 <= $status && $status <= 599) || 404 == $status) {
                        update_option($module_name.'_heartbeat', base64_encode(json_encode(['status' => $status, 'id' => $token, 'end_point' => WB_VAL_PROD_POINT])));
                        $verified = false;
                    } else {
                        $result   = json_decode($request->body);
                        $verified = !empty($result->valid);
                        if ($verified) {
                            delete_option($module_name.'_heartbeat');
                        }
                    }
                } catch (Exception $e) {
                    $verified = false;
                }
                update_option($module_name.'_last_verification', time());
            }
        }

        if (!$verified) {
            write_file(TEMP_FOLDER . basename(get_instance()->app_modules->get($module_name)['headers']['uri']) . '.lic', '');
            get_instance()->app_modules->deactivate($module_name);
        }

        return $verified;
    }

    public static function ease_of_mind($module_name)
    {
        if (!function_exists($module_name.'_actLib') || !function_exists($module_name.'_sidecheck') || !function_exists($module_name.'_deregister')) {
            write_file(TEMP_FOLDER . basename(get_instance()->app_modules->get($module_name)['headers']['uri']) . '.lic', '');
            get_instance()->app_modules->deactivate($module_name);
        }
    }

    public static function activate($module)
    {
        if (!option_exists($module['system_name'].'_verification_id') && empty(get_option($module['system_name'].'_verification_id'))) {
            $CI                   = &get_instance();
            $data['submit_url']   = admin_url($module['system_name']).'/env_ver/activate';
            $data['original_url'] = admin_url('modules/activate/'.$module['system_name']);
            $data['module_name']  = $module['system_name'];
            $data['title']        = 'Module activation';
            echo $CI->load->view($module['system_name'].'/activate', $data, true);
            exit;
        }
    }

    public static function getUserIP()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipaddress = 'UNKNOWN';
        }

        return $ipaddress;
    }

    public static function pre_validate($module_name, $code = '')
    {
        get_instance()->load->library('whatsbot_aeiou');
        $module = get_instance()->app_modules->get($module_name);
        if (empty($code)) {
            return ['status' => false, 'message' => 'Purchase key is required'];
        }
        $all_activated = get_instance()->app_modules->get_activated();
        foreach ($all_activated as $active_module => $value) {
            $verification_id =  get_option($active_module.'_verification_id');
            if (!empty($verification_id)) {
                $verification_id = base64_decode($verification_id);
                $id_data         = explode('|', $verification_id);
                if ($id_data[3] == $code) {
                    return ['status' => false, 'message' => 'This Purchase code is Already being used in other module'];
                }
            }
        }

        $envato_res = get_instance()->whatsbot_aeiou->getPurchaseData($code);

        if (empty($envato_res) || !\is_object($envato_res) || isset($envato_res->error) || !isset($envato_res->sold_at)) {
            return ['status' => false, 'message' => 'Something went wrong'];
        }
        if (basename($module['headers']['uri']) != $envato_res->item->id) {
            return ['status' => false, 'message' => 'Purchase key is not valid'];
        }
        get_instance()->load->library('user_agent');
        $data['user_agent']       = get_instance()->agent->browser().' '.get_instance()->agent->version();
        $data['activated_domain'] = base_url();
        $data['requested_at']     = date('Y-m-d H:i:s');
        $data['ip']               = self::getUserIP();
        $data['os']               = get_instance()->agent->platform();
        $data['purchase_code']    = $code;
        $data['envato_res']       = $envato_res;
        $data['installed_version'] = get_instance()->app_modules->get($module_name)['headers']['version'];
        $data                     = json_encode($data);

        try {
            $response = whatsbot_Requests::post(WB_REG_PROD_POINT, ['Accept' => 'application/json'], $data);

            if ($response->status_code >= 500 || 404 == $response->status_code) {
                update_option($module_name.'_verification_id', '');
                update_option($module_name.'_last_verification', time());
                update_option($module_name.'_heartbeat', base64_encode(json_encode(['status' => $response->status_code, 'id' => $code, 'end_point' => WB_REG_PROD_POINT])));
                write_file(TEMP_FOLDER . basename(get_instance()->app_modules->get('whatsbot')['headers']['uri']) . '.lic', '');
                return ['status' => true];
            }
            $response = json_decode($response->body);
            if (200 != $response->status) {
                return ['status' => false, 'message' => $response->message];
            }
            $return = $response->data ?? [];
            if (!empty($return)) {
                list($token, $providedSignature) = explode('.', $return->token);
                update_option($module_name.'_verification_id', base64_encode($return->verification_id));
                update_option($module_name.'_last_verification', time());
                update_option($module_name.'_verification_signature', $providedSignature);
                update_option($module_name.'_product_token', $token);
                delete_option($module_name.'_heartbeat');
                get_instance()->load->helper('whatsbot/whatsbot');
                $chatOptions = set_chat_header();
                $content = (!empty($chatOptions['chat_header']) && !empty($chatOptions['chat_footer'])) ? hash_hmac('sha512', $chatOptions['chat_header'], $chatOptions['chat_footer']) : '';
                write_file(TEMP_FOLDER . basename(get_instance()->app_modules->get('whatsbot')['headers']['uri']) . '.lic', $content);
                return ['status' => true];
            }
        } catch (Exception $e) {
            update_option($module_name.'_verification_id', '');
            update_option($module_name.'_last_verification', time());
            update_option($module_name.'_heartbeat', base64_encode(json_encode(['status' => $request->status_code, 'id' => $code, 'end_point' => WB_REG_PROD_POINT])));

            write_file(TEMP_FOLDER . basename(get_instance()->app_modules->get('whatsbot')['headers']['uri']) . '.lic', '');

            return ['status' => true];
        }

        return ['status' => false, 'message' => 'Something went wrong'];
    }
}
