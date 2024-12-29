<?php
/**
 * Template Name: Blog
 */

get_header(); // Include the header file
?>

<div class="main-content">
    <div class="mobile-menu-overlay">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'mobile',
            'container' => false,
            'items_wrap' => '%3$s',
            'add_li_class' => 'navigationButton'
        ));
        ?>
    </div>

    <div class="intro">
        <h2 class="blog-header">Блог</h2>
    </div>
    
    <div class="blogPosts">
        <?php
        // Запуск циклу публікацій
        $args = array('post_type' => 'post', 'posts_per_page' => -1); // Отримати всі пости
        $query = new WP_Query($args);
        
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <div class="post">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="postImage"/>
                    <?php endif; ?>
                    <h2 class="postTitle"><?php the_title(); ?></h2>
                    <a href="<?php the_permalink(); ?>" class="readMore">ЧИТАТИ</a>
                </div>
            <?php endwhile; 
        else : ?>
            <p>Сторінок не знайдено.</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); // Скидаємо глобальні дані постів ?>
    </div>

    <div class="additional-info">
        <p class="title-text">Ветеринарний центр PetCare в Києві</p>
        <p class="description-text">
            Ми створили наш ветеринарний центр для того, щоб запропонувати вам і вашим улюбленцям якісну ветеринарну допомогу, здоров'я і довголіття.
        </p>
    </div>
</div>


<?php
get_footer(); // Include the footer file
?>