<?php

/*
 * ================================================================================================
 * *                                           INFO
 *
 *
 *   Context: Path: src/includes/constants.php
 *  Constants for the PHP Intermediate Blog project.
 *  This file contains various constants used throughout the application.
 *
 * ================================================================================================
 */

define('DB_DRIVER', 'pgsql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'blog_db');
define('DB_USER', 'blog_user');
define('DB_PASSWORD', 'blog_password');

define('SITE_NAME', 'My Blog');
define('SITE_DESCRIPTION', 'A simple blog application.');
define('ADMIN_EMAIL', 'admin@example.com');

define('API_VERSION', '1.0');
define('API_BASE_URL', '/api/v1');

define('POSTS_PER_PAGE', 10);
define('COMMENTS_PER_PAGE', 5);

define('DATE_FORMAT', 'Y-m-d H:i:s');
define('TIMEZONE', 'UTC');
define('CACHE_ENABLED', true);

define('CACHE_DIR', __DIR__ . '/../cache');
define('LOG_DIR', __DIR__ . '/../logs');

define('ERROR_LOG_FILE', LOG_DIR . '/error.log');
define('ACCESS_LOG_FILE', LOG_DIR . '/access.log');

define('MAX_UPLOAD_SIZE', 10485760);  // 10 MB
define('ALLOWED_FILE_TYPES', ['image/jpeg', 'image/png', 'image/gif']);
define('SESSION_TIMEOUT', 3600);  // 1 hour

define('CSRF_TOKEN_LENGTH', 32);
define('PASSWORD_HASH_ALGO', PASSWORD_BCRYPT);
define('API_TOKEN_LENGTH', 64);
define('API_TOKEN_EXPIRY', 3600);  // 1 hour
define('API_RATE_LIMIT', 100);  // 100 requests per hour
define('API_RATE_LIMIT_WINDOW', 3600);  // 1 hour
define('API_KEY', 'your_api_key_here');  // Replace with your actual API key

define('MAINTENANCE_MODE', false);  // Set to true to enable maintenance mode
define('MAINTENANCE_MESSAGE', 'The site is currently under maintenance. Please check back later.');
define('DEBUG_MODE', true);  // Set to false in production

define('LOG_LEVEL', 'error');  // Options: debug, info, notice, warning, error, critical, alert, emergency
define('LOG_FORMAT', '[%datetime%] %level_name%: %message% %context%');
define('LOG_DATE_FORMAT', 'Y-m-d H:i:s');
define('API_LOG_FILE', LOG_DIR . '/api.log');

// FTP

define('FTP_HOST', 'ftp.example.com');
define('FTP_USER', 'ftp_user');
define('FTP_PASSWORD', 'ftp_password');
define('FTP_PORT', 21);
define('FTP_TIMEOUT', 90);  // seconds
define('FTP_SSL', false);  // Set to true to use SSL for FTP connections
define('FTP_ROOT_DIR', '/public_html');  // Root directory for FTP uploads
define('FTP_MAX_FILE_SIZE', 5242880);  // 5 MB
define('FTP_ALLOWED_FILE_TYPES', ['image/jpeg', 'image/png', 'image/gif', 'application/pdf']);
define('FTP_CONNECTION_TIMEOUT', 30);  // seconds
define('FTP_UPLOAD_DIR', '/uploads');  // Directory for uploaded files
define('FTP_BACKUP_DIR', '/backups');  // Directory for backups
define('FTP_LOG_FILE', LOG_DIR . '/ftp.log');  // Log file for FTP operations
define('FTP_DEBUG', DEBUG_MODE);  // Enable FTP debug mode for detailed logs
define('FTP_ENCRYPTION', 'ssl');  // Options: 'ssl', 'tls', or 'none'
define('FTP_PASSIVE_MODE', true);  // Set to true to use passive mode for FTP connections
define('FTP_MAX_CONNECTIONS', 5);  // Maximum number of simultaneous FTP connections
define('FTP_RETRY_COUNT', 3);  // Number of retries for failed FTP operations
// End of constants.php
