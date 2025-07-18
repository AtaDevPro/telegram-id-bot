# Telegram ID Bot

A simple PHP-based Telegram bot that returns numeric IDs of users, groups, or channels based on forwarded messages or commands.

## 🧠 Features

- Show user ID by sending a direct message.
- Show another user's ID by forwarding their message (forwarding must be allowed).
- Show group ID with `/show_id` command inside a group.
- Show channel ID by forwarding a post from a channel.
- Automatically deletes forwarded messages in group for a cleaner chat.
- Supports hidden users (will notify if the user has forward protection enabled).

## 📁 File Structure

- `confing.php` – Configuration file (e.g., contains your bot token).
- `func.php` – Contains helper functions like `bot()` and `sendMessage()`.
- `index.php` – Main logic that handles updates and displays IDs.
- `setWebhook.php` – Helper to register your webhook with Telegram Bot API.

## ⚙️ Setup

1. Set your bot token in `confing.php`:

```php
define("API_TOKEN", "YOUR_BOT_TOKEN_HERE");
```

2. Deploy the code to a server with HTTPS.

3. Register your webhook via setWebhook.php by calling:

```php
setWebhook("https://your-domain.com/index.php");
```

📌 Commands
/show_id → returns group ID when used in a group.

💬 Forward Behavior
If user forwards a message:

From a person → Shows user ID.

From a channel → Shows channel ID.

From a protected user → Informs user that ID cannot be retrieved.

📜 License
MIT License – Use freely and contribute if you'd like!


Made with ❤️ by [AtaDevPro](https://github.com/AtaDevPro)
