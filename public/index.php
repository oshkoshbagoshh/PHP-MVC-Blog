<?php
/***
 *
 *
 *  COMMENT HEADER BLOCK
 */

require_once '../vendor/autoload.php';
require_once '../src/Includes/constants.php';
require_once '../src/Includes/config.php';
require_once '../src/Includes/functions.php';

// base dir


use League\Plates\Engine;




//// Initialize Plates
//$templates = new Engine('templates');
//
//// Add template folders
//$templates->addFolder('layouts', '/templates/layouts');
//$templates->addFolder('components', '/templates/components');
//$templates->addFolder('admin', '/templates/admin');
//
//// add some global data
//$templates->addData([
//        'site_name' => 'My Blog',
//        'current_year' => date('Y'),
//]);
//
//// routing logic
//$route = $_GET['route'] ?? 'home';
//$pdo = new PDO('pgsql:host=localhost;dbname=blog_db',DB_USER, DB_PASSWORD);
//
//try {
//    switch ($route) {
//        case $posts = getAllPosts($pdo);
//        $categories = getCategories($pdo);
//        $popular_tags = getPopularTags($pdo);
//
//        echo $templates->render('posts/index', [
//                'posts' => $posts,
//                'categories'=> $categories,
//                'popular_tags' => $popular_tags,
//                'recent_posts' => getRecentPosts($pdo, 5)
//
//
//        ]);
//        break;
//
//        case  'post':
//            $slug = $_GET['slug'] ?? '';
//            $post = getPostBySlug($pdo, $slug);
//
//            if (!$post) {
//                http_response_code(404);
//                echo $templates->render('errors/404');
//                exit;
//            }
//
//            // Increment view count
//            incrementPostViews($pdo, $post['id']);
//
//            echo $templates->render('posts/show', [
//                'post' => $post,
//                'categories' => getCategories($pdo),
//                'popular_tags' => getPopularTags($pdo),
//                'recent_posts' => getRecentPosts($pdo, 5),
//                'comments' => getPostComments($pdo, $post['id'])
//            ]);
//            break;
//
//        case 'admin':
//            // Check admin access
//            if (!isAdmin($_SESSION['user'] ?? null)) {
//                header('Location: /login');
//                exit;
//            }
//
//            echo $templates->render('admin::dashboard', [
//                'stats' => getDashboardStats($pdo),
//                'recent_posts' => getRecentPosts($pdo, 10),
//                'recent_activities' => getRecentActivities($pdo)
//            ]);
//            break;
//
//        default:
//            echo $templates->render('home', [
//                'featured_posts' => getFeaturedPosts($pdo),
//                'categories' => getCategories($pdo)
//            ]);
//
//    }
//} catch (Exception $e) {
//    error_log($e->getMessage());
//    echo $templates->render('errors/500', [
//        ['error' => $e->getMessage()]
//    ]);
//}


// connect to database

// set up base layout

echo phpinfo();