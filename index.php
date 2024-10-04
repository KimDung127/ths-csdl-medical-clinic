<?php

require_once 'vendor/autoload.php'; // dotenv
require_once 'core/Router.php';
require_once 'core/Controller.php';
require_once 'core/Model.php';
require_once 'core/Database.php';

ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/logs/error.log');
error_reporting(E_ALL);

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Autoload controllers and models
spl_autoload_register(function($className) {
    if (file_exists("app/controllers/$className.php")) {
        require_once "app/controllers/$className.php";
    }
    if (file_exists("app/models/$className.php")) {
        require_once "app/models/$className.php";
    }
});

// Initialize Router and dispatch
$router = new Router();
$router->add('/', 'HomeController@index');
$router->add('/danh-sach-benh', 'DanhSachBenhController@index');
$router->add('/luong-thang', 'CanBoPhongKhamController@index');
$router->add('/lich-su-kham-chua', 'LichSuKhamChuaController@benhNhan');
$router->add('/doanh-thu', 'LichSuKhamChuaController@doanhThu');
$uri = $_SERVER['REQUEST_URI'];
$router->dispatch($uri);
