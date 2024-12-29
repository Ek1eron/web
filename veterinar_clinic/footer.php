<footer>
    <div class="footer">
        <div class="contacts">
            <div class="contactPoint">
                <p class="contactText phone">+38 (095) 111 22 33</p>
                <img src="<?php echo get_template_directory_uri(); ?>/images/main/iconPlace.png" alt="Location Icon" class="contactImage" />
                <p class="contactText address">вул. Січових Стрільців, 28, оф. 4</p>
            </div>
        </div>

        <div class="social-icons">
            <a href="https://t.me/petcare" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/main/iconTelegram.png" alt="Telegram Icon" class="socialIcon" />
            </a>
            <a href="https://instagram.com/petcare" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/main/iconInstagram.png" alt="Instagram Icon" class="socialIcon" />
            </a>
            <a href="https://facebook.com/petcare" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/main/iconFacebook.png" alt="Facebook Icon" class="socialIcon" />
            </a>
        </div>
    </div>
</footer>

<script src="<?php echo get_template_directory_uri(); ?>/booking.js"></script>
<script>
    const burgerMenu = document.getElementById('burgerMenu');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');

    // Додаємо подію кліку для бургер-меню
    burgerMenu.addEventListener('click', () => {
        mobileMenuOverlay.classList.toggle('active');
    });

    mobileMenuOverlay.addEventListener('click', (event) => {
        if (event.target === mobileMenuOverlay) {
            mobileMenuOverlay.classList.remove('active');
        }
    });
</script>

<?php wp_footer(); ?>
</body>
</html>