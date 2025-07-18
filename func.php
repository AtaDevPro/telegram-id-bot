<?php

include "confing.php";

function bot(string $methods, array $params)
{
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => "https://api.telegram.org/bot" . API_TOKEN . "/$methods",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $params,
    ]);
    $data = curl_exec($ch);
    curl_close($ch);
    return json_decode($data, true);
};

function sendMessage(int|string $chat_id, string $text, int $message_thread_id = null, string $parse_mode = null, mixed $entities = null, mixed $link_preview_options = null, bool $disable_notification = null, bool $protect_content = null, mixed $reply_parameters = null, mixed $reply_markup = null)
{
    $params = [
        'chat_id' => $chat_id,
        'text' => $text
    ];
    if ($message_thread_id !== null) {
        $params['message_thread_id'] = $message_thread_id;
    }
    if ($parse_mode !== null) {
        $params['parse_mode'] = $parse_mode;
    }
    if ($entities !== null) {
        $params['entities'] = $entities;
    }
    if ($link_preview_options !== null) {
        $params['link_preview_options'] = $link_preview_options;
    }
    if ($disable_notification !== null) {
        $params['disable_notification'] = $disable_notification;
    }
    if ($protect_content !== null) {
        $params['protect_content'] = $protect_content;
    }
    if ($reply_parameters !== null) {
        $params['reply_parameters'] = $reply_parameters;
    }
    if ($reply_markup !== null) {
        $params['reply_markup'] = $reply_markup;
    }

    return bot('sendMessage', $params);
}

function debug(mixed $data)
{
    $printData = print_r($data, true);
    bot('sendMessage', [
        'chat_id' => 303898395,
        'text' => $printData
    ]);
}

// AtaDevPro