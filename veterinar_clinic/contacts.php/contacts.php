<?php
/**
 * Template Name: Контакти
 */

get_header(); // Подключение заголовка
?>

<div class="main-content">
    
    <div class="mobile-menu-overlay">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'mobile', // Укажите ваше местоположение мобильного меню
            'container' => false,
            'items_wrap' => '%3$s',
            'add_li_class' => 'navigationButton'
        ));
        ?>
    </div>

    <div class="contact-info">
        <h2>Контакти</h2>
        <div class="contact-content">
            <div class="contact-details">
                <div class="address">
                    <h3 class="contact-title">Адреса:</h3>
                    <p class="contact-text">Січових стрільців, 28, оф. 4</p>
                    <p class="contact-text">Зручна парковка перед клінікою</p>
                </div>
                <div class="phones">
                    <h3 class="contact-title">Телефони:</h3>
                    <p class="contact-text">+38 099 566 79 96</p>
                    <p class="contact-text">+38 095 111 22 33</p>
                </div>
                <div class="schedule">
                    <h3 class="contact-title">Розклад роботи:</h3>
                    <p class="contact-text">за попереднім записом</p>
                </div>
                <div class="email">
                    <h3 class="contact-title">Електронна пошта:</h3>
                    <p class="contact-text"><a href="mailto:petcare@gmail.com">petcare@gmail.com</a></p>
                </div>
            </div>
            <div class="map">
                <img src="<?php echo get_template_directory_uri(); ?>/images/main/map-image.png" alt="Мапа локації" class="map-image">
            </div>
        </div>
    </div>

    <div class="additional-info">
        <p class="title-text">Ветеринарний центр PetCare в Києві</p>
        <p class="description-text">
            Ми створили наш ветеринарний центр для того, щоб запропонувати вам і вашим улюбленцям якісну ветеринарну допомогу, здоров'я і довголіття.
        </p>
    </div>
</div>



<script>
    // Отримуємо елементи
    const burgerMenu = document.getElementById('burgerMenu');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');

    // Додаємо подію кліку для бургер-меню
    burgerMenu.addEventListener('click', () => {
        mobileMenuOverlay.classList.toggle('active');
    });

    // Додаємо подію кліку для закриття меню при натисканні за межами меню
    mobileMenuOverlay.addEventListener('click', (event) => {
        if (event.target === mobileMenuOverlay) {
            mobileMenuOverlay.classList.remove('active');
        }
    });
</script>

<?php
get_footer(); // Подключение подвала
?>