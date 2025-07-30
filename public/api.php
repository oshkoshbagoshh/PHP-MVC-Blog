<?php

/*
 * @Author: AJ Javadi 
 * @Email: amirjavadi25@gmail.com
 * @Date: 2025-07-30 01:09:20 
 * @Last Modified by:   undefined 
 * @Last Modified time: 2025-07-30 01:09:20
 * @Description: file:///Users/aj/Herd/php-intermediate-blog/public/api.php
 */

require_once __DIR__ . '/../config.php';

// Initialize the database connection
$database = new Database();
$pdo = $database->getConnection();
// Set the content type to JSON
header('Content-Type: application/json');
// Handle the request
$requestMethod = $_SERVER['REQUEST_METHOD'];
