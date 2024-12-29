<?php
/**
 * Template Name: Історія відвідувань
 */

get_header(); // Подключение заголовка
?>

<div class="main-content">
  

    <div class="visitHistory">
        <h2>Історія відвідувань</h2>
        <div class="content">
            <div class="visits">
                <div class="visit">
                    <p class="visitReason">Імплантація зубу</p>
                    <p class="visitDoctor">Міщенко Світлана Федорівна</p>
                    <div class="visitInfo">
                        <p class="visitStatus planned">Заплановано</p>
                        <p class="visitTime">16:00, 27 вересня</p>
                    </div>
                </div>
                <div class="visit">
                    <p class="visitReason">Кострація кота</p>
                    <p class="visitDoctor">Шевчук Євген Сергійович</p>
                    <div class="visitInfo">
                        <p class="visitStatus completed">Завершено</p>
                        <p class="visitTime">12:00, 12 липня</p>
                    </div>
                </div>
                <div class="visit">
                    <p class="visitReason">Взяття проби на аналіз</p>
                    <p class="visitDoctor">Бершак Марія Станіславівна</p>
                    <div class="visitInfo">
                        <p class="visitStatus completed">Завершено</p>
                        <p class="visitTime">15:00, 10 липня</p>
                    </div>
                </div>
            </div>
            <div class="visitImageContainer">
                <img src="<?php echo get_template_directory_uri(); ?>/images/main/general_visit.png" alt="General Visit Image" class="visitImage" />
            </div>
        </div>
    </div>
</div>

<div class="additional-info">
    <p class="title-text">Ветеринарний центр PetCare в Києві</p>
    <p class="description-text">
        Ми створили наш ветеринарний центр для того, щоб запропонувати вам і вашим улюбленцям якісну ветеринарну допомогу, здоров'я і довголіття.
    </p>
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