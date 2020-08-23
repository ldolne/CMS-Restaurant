<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head() ?>
</head>
<body>
<header>
    <a href="#main-menu"
       id="main-menu-toggle"
       class="menu-toggle"
       aria-label="Open main menu">
        <span class="sr-only">Open main menu</span>
        <span class="fa fa-bars" aria-hidden="true"></span>
    </a>

    <h1 class="logo"><? bloginfo("name"); ?></h1>

    <nav id="main-menu" class="main-menu" aria-label="Main menu">
        <a href="#main-menu-toggle"
           id="main-menu-close"
           class="menu-close"
           aria-label="Close main menu">
            <span class="sr-only">Close main menu</span>
            <span class="fa fa-close" aria-hidden="true"></span>
        </a>
        <?php wp_nav_menu(array('menu' => 'main-menu-desktop')); ?>
    </nav>
    <a href="#main-menu-toggle"
       class="backdrop"
       tabindex="-1"
       aria-hidden="true" hidden></a>
    <script src="https://kit.fontawesome.com/945bf57f6d.js" crossorigin="anonymous"></script>
</header>
