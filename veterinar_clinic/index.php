<?php get_header(); ?>

<div class="services">
    <h2>Наші послуги</h2>

    <div class="services-container">
        <div class="service">
            <div class="image-container">
                <img src="<?php echo get_template_directory_uri(); ?>/images/main/service_vaccination.png" alt="Vaccination" class="serviceImage" />
            </div>
            <div class="text-block">
                <h3 class="serviceTitle">Вакцинація</h3>
                <p class="serviceDescription">Введення комплексу антигенів проти захворювань, що викликає імунну реакцію</p>
            </div>
        </div>

        <div class="service">
            <div class="image-container">
                <img src="<?php echo get_template_directory_uri(); ?>/images/main/service_chip.png" alt="Chipping" class="serviceImage" />
            </div>
            <div class="text-block">
                <h3 class="serviceTitle">Чіпування</h3>
                <p class="serviceDescription">Мікрочіп із записаним у ньому індивідуальним кодом - це паспорт тварини</p>
            </div>
        </div>

        <div class="service">
            <div class="image-container">
                <img src="<?php echo get_template_directory_uri(); ?>/images/main/service_surgery.png" alt="Surgery" class="serviceImage" />
            </div>
            <div class="text-block">
                <h3 class="serviceTitle">Хірургія</h3>
                <p class="serviceDescription">Проведення операцій різного ступеня складності</p>
            </div>
        </div>

        <div class="service">
            <div class="image-container">
                <img src="<?php echo get_template_directory_uri(); ?>/images/main/service_dentistry.png" alt="Dentistry" class="serviceImage" />
            </div>
            <div class="text-block">
                <h3 class="serviceTitle">Стоматологія</h3>
                <p class="serviceDescription">Спектр стоматологічних послуг для тварин: лікування, видалення зубних відкладень, тощо</p>
            </div>
        </div>
    </div>

    <div class="button-container">
        <a href="<?php echo site_url('appointment'); ?>" class="serviceButton">Записатись</a>
    </div>

    <div class="additional-info">
        <p class="title-text">Ветеринарний центр PetCare в Києві</p>
        <p class="description-text">
            Ми створили наш ветеринарний центр для того, щоб запропонувати вам і вашим улюбленцям якісну ветеринарну допомогу, здоров'я і довголіття.
        </p>
    </div>
</div>

<?php get_footer(); ?>