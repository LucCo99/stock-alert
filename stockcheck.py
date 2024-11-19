import mysql.connector
import requests
from bs4 import BeautifulSoup
import time

def connect_db():
    return mysql.connector.connect(
        host='localhost',
        user='root',
        password='EeL48!b=nD/W',
        database='stock_checks',
        charset='utf8mb3'
    )

def get_stock_data():
    conn = connect_db()
    cursor = conn.cursor()
    query = "SELECT url, check_interval, webhook_url FROM stock_checks"
    cursor.execute(query)
    result = cursor.fetchall()  # Fetch all stock check data
    cursor.close()
    conn.close()
    return result

def notify_discord(webhook_url, message):
    payload = {"content": message}
    response = requests.post(webhook_url, json=payload)
    if response.status_code == 204:
        print("Notification sent to Discord.")
    else:
        print("Failed to send notification.")

def check_stock(url, webhook_url):
    headers = {"User-Agent": "Mozilla/5.0"}
    response = requests.get(url, headers=headers)
    soup = BeautifulSoup(response.text, "html.parser")
    
    stock_status = soup.find("p", {"class": "stock out-of-stock"})
    if stock_status:
        print(f"{url} is Out of stock")
    else:
        add_to_cart_button = soup.find("button", {"class": "single_add_to_cart_button"})
        if add_to_cart_button and not add_to_cart_button.has_attr("disabled"):
            message = f":green_circle: Product is in stock! [Buy here]({url})"
            notify_discord(webhook_url, message)
        else:
            print(f"{url} stock status is unclear")

# Run periodically
while True:
    stock_data = get_stock_data()
    for data in stock_data:
        url = data[0]
        check_interval = data[1]
        webhook_url = data[2]
        check_stock(url, webhook_url)
        time.sleep(check_interval)  # Sleep for the interval from DB