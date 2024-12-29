<?php
/**
 * Template Name: Запис на прийом
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

    <h2 class="appointment-title">Запис на прийом</h2>
    <div class="main-content1">
        <div class="appointment-services">
            <div class="appointment-service">
                <p class="appointment-name">Видалення зубу (без урахування анестезії)</p>
                <p class="appointment-price">2600 грн.</p>
                <button class="appointment-button">
                    <a href="<?php echo site_url('/select_doctor'); ?>">ЗАПИСАТИСЬ</a>
                </button>
            </div>
            <div class="appointment-service">
                <p class="appointment-name">Ін’єкція внутрішньосуглобова</p>
                <p class="appointment-price">800 грн.</p>
                <button class="appointment-button">
                    <a href="<?php echo site_url('/select_doctor'); ?>">ЗАПИСАТИСЬ</a>
                </button>
            </div>
            <div class="appointment-service">
                <p class="appointment-name">Взяття проби на аналіз</p>
                <p class="appointment-price">100 грн.</p>
                <button class="appointment-button">
                    <a href="<?php echo site_url('/select_doctor'); ?>">ЗАПИСАТИСЬ</a>
                </button>
            </div>
            <div class="appointment-service">
                <p class="appointment-name">Дерматологічний прийом</p>
                <p class="appointment-price">500 грн.</p>
                <button class="appointment-button">
                    <a href="<?php echo site_url('/select_doctor'); ?>">ЗАПИСАТИСЬ</a>
                </button>
            </div>
        </div>
        
        <div class="image-container1">
            <img src="<?php echo get_template_directory_uri(); ?>/images/main/appointment.png" alt="Картинка праворуч" class="right-image" />
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
    const burgerMenu = document.getElementById('burgerMenu');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');

    burgerMenu.addEventListener('click', () => {
        mobileMenuOverlay.classList.toggle('active');
    });

    mobileMenuOverlay.addEventListener('click', (event) => {
        if (event.target === mobileMenuOverlay) {
            mobileMenuOverlay.classList.remove('active');
        }
    });
</script>

<?php
get_footer(); // Подключение подвала
?>