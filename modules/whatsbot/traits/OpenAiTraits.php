<?php

namespace modules\whatsbot\traits;

use Orhanerday\OpenAi\OpenAi;
use WpOrg\Requests\Requests as OpenaiRequests;

/**
 * Trait OpenAiTraits
 *
 * Provides methods to interact with the OpenAI API.
 */
trait OpenAiTraits
{
    /**
     * OpenAI API endpoint URL.
     *
     * @var string
     */
    public static $openAiEndpoint = 'https://api.openai.com/v1';

    /**
     * Retrieves the OpenAI API key from the options.
     *
     * @return string|null The OpenAI API key.
     */
    public function getOpenAiKey()
    {
        return get_option('wb_open_ai_key');
    }

    /**
     * Lists available OpenAI models and updates options based on the response.
     *
     * @return array Contains status and message or data of the models.
     */
    public function listModel()
    {
        try {
            $openAiKey = $this->getOpenAiKey();
            $openAi = new OpenAi($openAiKey);
            $request = $openAi->listModels();
            $response = json_decode($request);
            $status = true;
            $message = '';
            if (property_exists($response, 'error')) {
                update_option('wb_open_ai_key_verify', 0, 0);
                update_option('wb_openai_model', '', 0);
                return [
                    'status' => false,
                    'message' => $response->error->message,
                ];
            }
            update_option('wb_open_ai_key_verify', 1, 0);
        } catch (\Throwable $th) {
            $status = false;
            $message = _l('something_went_wrong');
        }
        return [
            'status' => $status,
            'data' => $message,
        ];
    }

    /**
     * Sends a request to the OpenAI API to get a response based on provided data.
     *
     * @param array $data The data to be sent to the OpenAI API.
     *
     * @return array Contains status and message of the response.
     */
    public function aiResponse(array $data)
    {
        try {
            $openAiKey = $this->getOpenAiKey();
            $openAi = new OpenAi($openAiKey);
            $message = $data['input_msg'];
            $menuItem = $data['menu'];
            $submenuItem = $data['submenu'];
            $model = get_option('wb_openai_model');
            $status = true;

            $prompt = match ($menuItem) {
                'Simplify Language' => 'You will be provided with statements, and your task is to convert them to Simplify Language. but don\'t change inputed language.',
                'Fix Spelling & Grammar' => 'You will be provided with statements, and your task is to convert them to standard Language. but don\'t change inputed language.',
                'Translate' => 'You will be provided with a sentence, and your task is to translate it into ' . $submenuItem,
                'Change Tone' => 'You will be provided with statements, and your task is to change tone into ' . $submenuItem . '. but don\'t chnage inputed language.',
                'Custom Prompt' => $submenuItem,
            };

            $response = $openAi->chat([
                'model' => $model,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => $prompt,
                    ],
                    [
                        'role' => 'user',
                        'content' => $message,
                    ],
                ],
                'temperature' => 0.7,
                'max_tokens' => 400,
                'frequency_penalty' => 0,
                'presence_penalty' => 0,
            ]);

            $response = json_decode($response);

            if (property_exists($response, 'error')) {
                return [
                    'status' => false,
                    'message' => $response->error->message,
                ];
            }

            $response = (array) $response;
            $choices = collect($response['choices']);
            $content = $choices->pluck('message.content')->first();
        } catch (\Throwable $th) {
            $status = false;
            $message = _l('something_went_wrong');
        }

        return [
            'status' => $status,
            'message' => $status ? $content : $message,
        ];
    }
}
