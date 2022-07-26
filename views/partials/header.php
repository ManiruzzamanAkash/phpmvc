<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo env('APP_TITLE'); ?></title>

    <!-- Load Styles -->
    <link rel="stylesheet" href="<?php echo assets('css/style.css'); ?>">
</head>
<body>
    <!-- Load Header Nav-->
    <?php views('/partials/nav.php'); ?>

    <!-- Content start -->
    <div class="main-content">
        <!-- Content will be loaded here. -->