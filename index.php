<?php
declare(strict_types=1);

require './vendor/autoload.php';

// include config and flash message class
use PerfectApp\Flash\FlashMessage;

session_start();

$config = require_once 'src/config/config-flash.php';

// create new flash message instance
$flash = new FlashMessage($config);

// set a new flash message

// Test Errors
$flash->set('badType', 'validAction');
$flash->set('warning', 'badAction');

$flash->set('primary', 'created');
$flash->set('secondary', 'updated');
$flash->set('light', 'deleted');
$flash->set('dark', 'created');
$flash->set('success', 'updated');
$flash->set('info', 'created');
$flash->set('warning', 'updated');
$flash->set('danger', 'deleted');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
<div class="container">
<h1>Bootstrap 5 Flash Messages</h1>

<?php $flash->display();?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</div>
</body>
</html>

