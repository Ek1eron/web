<?php
get_header(); // Подключение заголовка
?>

<div class="single-post-content">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="post-image"/>
            <?php endif; ?>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
        <?php endwhile; 
    else : ?>
        <p>Пост не найден.</p>
    <?php endif; ?>
</div>

<?php
get_footer(); // Подключение подвала
?>