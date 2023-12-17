# Message Sender API

A Message Sender API is a flexible API for sending messages through various channels, including email, WhatsApp, Telegram, Instagram, and Discord.

## Installation

Make sure you have PHP and Composer installed on your system.

1. Clone the repository:

   ```bash
   git clone https://github.com/jacksonsr451/api-message.git
   ```

2. Install dependencies using Composer:

   ```bash
   php composer.phar install
   ```

## Configuration

Configure credentials and specific options for each sending channel in the `.env` file. Use the following environment variables as examples:

```env
# General configuration options
GENERAL_OPTION=value

# Email configuration
EMAIL_SMTP_SERVER=smtp.example.com
EMAIL_USERNAME=your_email@example.com
EMAIL_PASSWORD=your_email_password

# WhatsApp configuration
WHATSAPP_API_KEY=your_whatsapp_api_key

# Add other configuration variables for different channels...
```

Remember to secure your `.env` file, as it may contain sensitive information such as passwords or API keys. Additionally, avoid including the `.env` file in version control to ensure the security of your credentials. If you're working with Symfony, consider using tools like `symfony/dotenv` to make it easier to read these environment variables.

## Contribution

Contributions are welcome! If you would like to contribute to the project, please follow these steps:

1. Fork the repository
2. Create a branch for your feature: `git checkout -b feature/my-feature`
3. Commit your changes: `git commit -am 'Add my feature'`
4. Push to the branch: `git push origin feature/my-feature`
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
