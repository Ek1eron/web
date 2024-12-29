<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>

    <link href="https://fonts.googleapis.com/css?family=Kodchasan&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Kokoro&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/styles.css">
</head>

<body>
    <div class="main-content">
        <div class="titlePart">
            <div class="logo-container">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/main/logo.png" alt="Логотип компанії" class="logo" />
                </a>
                <div class="brand-name">
                    <h1>PetCare</h1>
                    <p>Ветеринарний центр</p>
                </div>
            </div>
            <div class="profile">
                <a href="<?php echo wp_login_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/main/iconProfile.png" alt="Аватар" class="profileIcon" />
                </a>
                <a href="<?php echo wp_login_url(); ?>" class="profileText">Увійти</a>
            </div>
            
            <img src="<?php echo get_template_directory_uri(); ?>/images/main/burgerMenu.png" alt="Кнопка меню" class="burger-menu" id="burgerMenu" />
        </div>

        <div class="navigation">
            <div class="navigationButtons" id="navMenu">
                <?php
           wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => false,
            'items_wrap' => '%3$s',
            'add_li_class' => 'navigationButton'
        ));
        
                ?>
            </div>
        </div>

        <div class="mobile-menu-overlay">
            <?php
            // Ви можете також відобразити меню для мобільного вигляду
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => false,
                'items_wrap' => '<div class="navigationButton">%3$s</div>',
            ));
            ?>
        </div>