<?php

include "func.php";

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

function setWebhook(string $url, mixed $certificate = null, int $max_connections = null, array|string $allowed_updates = null, string $ip_address = null, bool $drop_pending_updates = null, string $secret_token = null): array
{

    $params = [
        "url" => $url,
    ];
    if ($certificate !== null) {
        $params["certificate"] = $certificate;
    }
    if ($max_connections !== null) {
        $params["max_connections"] = $max_connections;
    }
    if ($allowed_updates !== null) {
        $params["allowed_updates"] = $allowed_updates;
    }
    if ($ip_address !== null) {
        $params["ip_address"] = $ip_address;
    }
    if ($drop_pending_updates !== null) {
        $params["drop_pending_updates"] = $drop_pending_updates;
    }
    if ($secret_token !== null) {
        $params["secret_token"] = $secret_token;
    }

    return bot('setWebhook', $params);
}

$out = setWebhook(url: '', max_connections: 50, allowed_updates: '["update_id","message","edited_message","channel_post","edited_channel_post","business_connection","tesbusiness_messaget","edited_business_message","deleted_business_messages","message_reaction	","message_reaction_count","inline_query","chosen_inline_result","callback_query","shipping_query","pre_checkout_query","purchased_paid_media","poll","poll_answer","my_chat_member","chat_member","chat_join_request","chat_boost","removed_chat_boost"]');

$out = bot("setWebhook", $params);

echo "<pre>";
print_r($out);
echo "</pre>";

// AtaDevPro