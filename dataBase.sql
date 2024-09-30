-- Create a database
CREATE DATABASE IF NOT EXISTS finance_tracker;

-- Use the finance_tracker database
USE finance_tracker;

-- Create a table for users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    totalMoney DECIMAL(10, 2),
    totalInvestedMoney DECIMAL(10, 2)
);


-- Create a table for transactions
CREATE TABLE IF NOT EXISTS transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    type ENUM('income', 'expense') NOT NULL,
    category VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    description TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Create table for savings accounts
CREATE TABLE IF NOT EXISTS savingsAccount (
    accountName VARCHAR(45) PRIMARY KEY,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Create a table for investments
CREATE TABLE IF NOT EXISTS stock (
    id VARCHAR(45) PRIMARY KEY,
    user_id INT NOT NULL,
    accountName VARCHAR(45) NOT NULL,
    symbol VARCHAR(10) NOT NULL,
    quantity DECIMAL(10, 2) NOT NULL,
    purchase_price DECIMAL(10, 2) NOT NULL,
    purchase_date DATE NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (accountName) REFERENCES savingsAccount(accountName)
);


-- SQL to retrieve all savings accounts of a user
SELECT s.accountName
FROM savingsAccount as s
JOIN users as u ON u.id = s.user_id;

