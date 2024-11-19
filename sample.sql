CREATE TABLE stock_checks (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    url VARCHAR(255) NOT NULL,
    check_interval INT NOT NULL,
    webhook_url VARCHAR(255) NOT NULL
);
