# stock-alert
Here's a well-structured README template for your GitHub repository that explains your project in a professional and clear manner:

---

# Stock Monitoring App

## Overview

The **Matcha Crisis** occurred when resellers bought all the matcha stock in bulk, causing the products to be sold out on various websites. To address this issue, I created this **Stock Monitoring App** that tracks product availability in real-time. When a product is back in stock, the app sends a notification to a **Discord channel** using a Discord webhook.

## Features

- **Track Stock Availability**: Continuously monitors a product's stock status on the specified website.
- **Discord Notifications**: Sends an alert to a designated Discord channel when the product is back in stock.
- **Customizable Check Intervals**: Set intervals (e.g., 20m, 30m, 60m) for how frequently the app checks the stock status.
- **Backend Support**: Built with **BeautifulSoup** (Python) for web scraping, **MySQL** for database management, and **PHP** for handling form submissions and updates.
- **Cloud Hosting**: The app is hosted on **AWS LightSail** for reliable cloud performance.

## Tech Stack

- **Python**: For web scraping using BeautifulSoup.
- **MySQL**: Database management for storing stock data and configuration settings.
- **PHP**: Server-side scripting for handling form submissions and updates.
- **AWS LightSail**: Cloud hosting for app deployment.

## Installation

### Prerequisites

Before running the app, make sure you have the following installed:

- **Python 3.x**  
  Install it from the official [Python website](https://www.python.org/downloads/).

- **MySQL**  
  Install MySQL or use a cloud database service like AWS RDS.

- **PHP 7.x or higher**  
  Install it from the official [PHP website](https://www.php.net/downloads.php).

- **Discord Webhook URL**  
  You will need to create a Discord Webhook for receiving notifications. You can create one by following [Discord's Webhook documentation](https://discord.com/developers/docs/resources/webhook).

### Setting Up the Project

1. **Clone the repository:**

    ```bash
    git clone https://github.com/your-username/stock-alert.git
    cd stock-alert
    ```

2. **Set up the database:**

    - Create a MySQL database.
    - Import the provided SQL schema for the `stock_checks` table.

3. **Configure the App:**

    - Update the database connection details in `db_connection.php`.
    - Configure the webhook URL in `webhook_url` in the database.

4. **Install Python dependencies:**

    ```bash
    pip install beautifulsoup4 requests
    ```

5. **Configure the check intervals:**

    - You can configure how often the app checks for stock by setting the check interval in the `stock_checks` table.

6. **Host on AWS LightSail:**

    - Set up an AWS LightSail instance for hosting the application.
    - Ensure the PHP files are correctly configured and the Python script runs as a background process or cron job.

## Usage

1. **Add a Product URL**: 
   Use the form to enter the product URL, select the check interval, and add the Discord webhook URL for notifications.

2. **Monitoring**: 
   The app will continuously monitor the stock of the specified product at the given interval.

3. **Receive Alerts**: 
   Once the product is back in stock, a notification will be sent to the connected Discord channel.

## Contributing

1. Fork the repository.
2. Create a feature branch.
3. Commit your changes.
4. Push to the branch.
5. Open a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- **BeautifulSoup**: For web scraping product stock.
- **Discord**: For sending notifications through webhooks.
- **AWS LightSail**: For hosting the app.

