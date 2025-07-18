<?php

// show chat id bot

include "confing.php";
include "func.php";

$input = file_get_contents("php://input");
$update = json_decode($input, true);
$printData = print_r($update, true);


$chat_id = $update['message']['chat']['id'];
$from_id = $update['message']['from']['id'];
$message_id = $update['message']['message_id'];
$from_first_name = $update['message']['from']['first_name'];
$from_username = $update['message']['from']['username'];
$text = $update['message']['text'];
$first_name = $update['message']['chat']['first_name'];
$username = $update['message']['chat']['username'];
$type = $update['message']['chat']['type'];



if ($type == 'private') {
  if ($update['message']['forward_origin']) {
    if ($update['message']['forward_origin']['type'] == 'user') {
      $user_id = $update['message']['forward_origin']['sender_user']['id'];
      $txt = "🔰 آیدی عددی پیام فوروارد شده:
    🆔 `$user_id`
    
    🔰 آیدی عددی شما:
    🆔 `$from_id`
    
    ➖➖➖➖➖
    🔸 اگه دوست داشتی آیدی عددی گروه رو مشاهده کنی ربات رو به گروه اضافه کن (نیازی به ادمین کردن ربات نیست) و دستور زیر رو داخل گروه وارد کن:
    ➡️ `/show_id`
    
    🔸 اگه دوست داشتی آیدی عددی کانال رو مشاهده کنی کافیه یک پیام از سمت کانال برای من فوروارد کنی!
    
    🔸 اگه دوست داشتی آیدی عددی شخص دیگه ای رو مشاهده کنی، کافیه یک پیام از سمت اون شخص برای من فوروارد کنی (فوروارد شخص باید باز باشد)";
      sendMessage(chat_id: $from_id, text: $txt, parse_mode: 'Markdown');
    }
    if ($update['message']['forward_origin']['type'] == 'channel') {
      $channel_id = $update['message']['forward_origin']['chat']['id'];
      $txt = "🔰 آیدی عددی کانال:
🆔 `$channel_id`

🔰 آیدی عددی شما:
🆔 `$from_id`

➖➖➖➖➖
🔸 اگه دوست داشتی آیدی عددی گروه رو مشاهده کنی ربات رو به گروه اضافه کن (نیازی به ادمین کردن ربات نیست) و دستور زیر رو داخل گروه وارد کن:
➡️ `/show_id`

🔸 اگه دوست داشتی آیدی عددی کانال رو مشاهده کنی کافیه یک پیام از سمت کانال برای من فوروارد کنی!

🔸 اگه دوست داشتی آیدی عددی شخص دیگه ای رو مشاهده کنی، کافیه یک پیام از سمت اون شخص برای من فوروارد کنی (فوروارد شخص باید باز باشد)";
      sendMessage(chat_id: $from_id, text: $txt, parse_mode: 'Markdown');
    }
    if ($update['message']['forward_origin']['type'] == 'hidden_user') {
      $txt = "⭕️ به دلیل فعال کردن قفل فوروارد توسط کاربر آیدی عددی قابل مشاهده نیست!";
      sendMessage(chat_id: $from_id, text: $txt);
    }

  } else {
    $txt = "🔻سلام خوش اومدید!

🔰 آیدی عددی شما:
🆔 `$from_id`

➖➖➖➖➖

🔸 اگه دوست داشتی آیدی عددی گروه رو مشاهده کنی ربات رو به گروه اضافه کن (نیازی به ادمین کردن ربات نیست) و دستور زیر رو داخل گروه وارد کن:
➡️ `/show_id`

🔸 اگه دوست داشتی آیدی عددی کانال رو مشاهده کنی کافیه یک پیام از سمت کانال برای من فوروارد کنی!

🔸 اگه دوست داشتی آیدی عددی شخص دیگه ای رو مشاهده کنی، کافیه یک پیام از سمت اون شخص برای من فوروارد کنی (فوروارد شخص باید باز باشد)";
    sendMessage(chat_id: $from_id, text: $txt, parse_mode: 'Markdown');
  }
}
if ($text == '/show_id') {
  if ($type == 'group' or $type == 'supergroup') {
    $txt = "🔰 آیدی عددی گروه:
🆔 `$chat_id`

🔰 آیدی عددی شما:
🆔 `$from_id`

➖➖➖➖➖
🔸 اگه دوست داشتی آیدی عددی گروه رو مشاهده کنی ربات رو به گروه اضافه کن (نیازی به ادمین کردن ربات نیست) و دستور زیر رو داخل گروه وارد کن:
➡️ `/show_id`

🔸 اگه دوست داشتی آیدی عددی کانال رو مشاهده کنی کافیه یک پیام از سمت کانال برای من فوروارد کنی!

🔸 اگه دوست داشتی آیدی عددی شخص دیگه ای رو مشاهده کنی، کافیه یک پیام از سمت اون شخص برای من فوروارد کنی (فوروارد شخص باید باز باشد)";
    sendMessage(chat_id: $chat_id, text: $txt, parse_mode: 'Markdown');
  }
}

debug($printData);

// AtaDevPro