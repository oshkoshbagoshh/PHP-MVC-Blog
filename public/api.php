<?php
///*
// * @Author: AJ Javadi
// * @Email: amirjavadi25@gmail.com
// * @Date: 2025-07-30 01:09:20
// * @Last Modified by: Someone
// * @Last Modified time: 2025-07-30 02:52:38
// * @Description: file:///Users/aj/Herd/php-intermediate-blog/public/api.php
// * This file serves as the API endpoint for the PHP Intermediate Blog project.
// * It handles requests for data related to posts, users, comments, and categories.
// * The API supports both GET and POST methods for retrieving and inserting data.
// * //TODO: Implement error handling and validation for incoming requests.
// * //TODO: Consider adding authentication for sensitive operations.
// * //TODO: API token-based authentication for secure access.
// *
// */
//
//// require_once __DIR__ . '../src/includes/config.php';
//
////require_once __DIR__ . '/../src/Includes/constants.php';
////require_once __DIR__ . '/../src/classes/Database.php';
//// require_once __DIR__ . '/../src/includes/functions.php';
//// require_once __DIR__ . '/../src/includes/config.php';
////require_once __DIR__ . '/../src/Includes/config.php';
//
//// Initialize the database connection
//$database = new Database();
//$pdo = $database->getConnection();
//
//// Check if the connection was successful
//// if (!$pdo) {
////     http_response_code(500);
////     echo json_encode(['error' => 'Database connection failed']);
////     exit;
//// }
//
//// // Include the Database class
//// require_once __DIR__ . '/../classes/Database.php';
//
//// Initialize the database connection
//// $database = new Database();
//// $pdo = $database->getConnection();
//// if (!$pdo) {
////     http_response_code(500);
////     echo json_encode(['error' => 'Database connection failed']);
////     exit;
//// }
//// Set the content type to JSON
//header('Content-Type: application/json');
//// Handle the request
//$requestMethod = $_SERVER['REQUEST_METHOD'];
//
//switch ($requestMethod) {
//    case 'GET':
//        // Handle GET requests
//        $data = $database->getData();
//        echo json_encode($data);
//        break;
//    case 'POST':
//        // Handle POST requests
//        $input = json_decode(file_get_contents('php://input'), true);
//        $result = $database->insertData($input);
//        echo json_encode(['success' => $result]);
//        break;
//    default:
//        // Method not allowed
//        http_response_code(405);
//        echo json_encode(['error' => 'Method Not Allowed']);
//        break;
//}
//
