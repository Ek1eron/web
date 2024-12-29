<?php
/* Template Name: PetCare Template */
get_header(); // Включає заголовок
?>



<div class="mobile-menu-overlay">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'main-menu',
        'container' => false,
        'items_wrap' => '<div class="navigationButton">%3$s</div>',
    ));
    ?>
</div>

<div class="booking-container">
    <h2 class="service-header">Імплантація зубу</h2>
    <div class="doctor-calendar-container">
        <section class="doctor-selection">
            <h3 class="doctor-selection-header">Оберіть лікаря</h3>
            <div class="doctor-list">
                <?php
                $doctors = [
                    [
                        'id' => 'doctor-1',
                        'name' => 'Сидорчук',
                        'fullname' => 'Семен Васильович',
                        'specialty' => 'Ветеринарна стоматологія',
                        'rating' => 4.5,
                        'reviews' => 8,
                        'experience' => '6 років',
                        'avatar' => get_template_directory_uri() . '/images/main/doctor1.png'
                    ],
                    [
                        'id' => 'doctor-2',
                        'name' => 'Петренко',
                        'fullname' => 'Маріана Іванівна',
                        'specialty' => 'Ветеринарна стоматологія',
                        'rating' => 4.9,
                        'reviews' => 4,
                        'experience' => '6 років',
                        'avatar' => get_template_directory_uri() . '/images/main/doctor2.png'
                    ]
                ];

                foreach ($doctors as $doctor) {
                    echo '<div class="doctor-card" id="' . esc_attr($doctor['id']) . '">';
                    echo '    <div class="doctor-info">';
                    echo '        <div class="doctor-avatar">';
                    echo '            <img src="' . esc_url($doctor['avatar']) . '" alt="Фото лікаря ' . esc_attr($doctor['fullname']) . '" />';
                    echo '        </div>';
                    echo '        <h4 class="doctor-name">' . esc_html($doctor['name']) . '</h4>';
                    echo '        <span class="doctor-fullname">' . esc_html($doctor['fullname']) . '</span>';
                    echo '        <p class="doctor-specialty">' . esc_html($doctor['specialty']) . '</p>';
                    echo '        <div class="doctor-characteristics">';
                    echo '            <div class="doctor-rating">';
                    echo '                <span class="label">Рейтинг:</span>';
                    echo '                <div class="icon-text">';
                    echo '                    <img src="' . get_template_directory_uri() . '/images/main/star.png" alt="Star" class="icon" />';
                    echo '                    <span class="doctor-rating-value">' . esc_html($doctor['rating']) . '</span>';
                    echo '                </div>';
                    echo '            </div>';
                    echo '            <div class="doctor-reviews">';
                    echo '                <span class="label">Відгуки:</span>';
                    echo '                <div class="icon-text">';
                    echo '                    <img src="' . get_template_directory_uri() . '/images/main/review.png" alt="Reviews" class="icon" />';
                    echo '                    <span class="doctor-reviews-value">' . esc_html($doctor['reviews']) . '</span>';
                    echo '                </div>';
                    echo '            </div>';
                    echo '            <div class="doctor-experience">';
                    echo '                <span class="label">Досвід:</span>';
                    echo '                <span class="doctor-experience-value">' . esc_html($doctor['experience']) . '</span>';
                    echo '            </div>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '    <button class="book-now-btn">ЗАПИСАТИСЬ</button>';
                    echo '</div>';
                }
                ?>
            </div>
        </section>

        <section class="date-time-selection">
            <h3 class="date-time-selection-header">Оберіть дату і час</h3>
            <div class="calendar-and-time">
                <div class="calendar-wrapper">
                    <div class="calendar-month">Вересень</div>
                    <div class="calendar-grid">
                        <div class="calendar-days">
                            <!-- Дні календаря -->
                            <?php for ($i = 1; $i <= 31; $i++) : ?>
                                <button><?php echo $i; ?></button>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>

                <div class="time-picker">
                    <p class="select-time-header">Обрати час:</p>
                    <div class="time-options">
                        <?php
                        $times = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];
                        foreach ($times as $time) {
                            echo '<button class="time-option">' . esc_html($time) . '</button>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <textarea placeholder="За необхідністю додайте коментар..."></textarea>
            <button class="confirm-btn">Підтвердити</button>
        </section>
    </div>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/booking.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
      // Handle doctor selection
      const doctorCards = document.querySelectorAll('.doctor-card');
      doctorCards.forEach(card => {
          card.addEventListener('click', function() {
              // Remove 'selected' class from all cards and reset button styles
              doctorCards.forEach(c => {
                  c.classList.remove('selected');
                  const button = c.querySelector('.book-now-btn');
                  button.style.backgroundColor = ''; // Reset button color
                  button.style.color = ''; // Reset button text color
              });
              // Add 'selected' class to the clicked card
              this.classList.add('selected');
              const selectedButton = this.querySelector('.book-now-btn');
              selectedButton.style.backgroundColor = 'rgba(219, 174, 107, 1)'; // Change button color
              selectedButton.style.color = 'white'; // Set text color to white
          });
      });
  
      // Handle date selection
      const dateButtons = document.querySelectorAll('.calendar-days button');
      dateButtons.forEach(button => {
          button.addEventListener('click', function() {
              // Remove 'selected' class from all buttons
              dateButtons.forEach(b => b.classList.remove('selected'));
              // Add 'selected' class to the clicked button
              this.classList.add('selected');
          });
      });
  
      // Handle time selection
      const timeButtons = document.querySelectorAll('.time-option');
      timeButtons.forEach(button => {
          button.addEventListener('click', function() {
              // Remove 'selected' class from all buttons
              timeButtons.forEach(b => {
                  b.classList.remove('selected');
                  b.style.backgroundColor = ''; // Reset background color
              });
              // Add 'selected' class to the clicked button
              this.classList.add('selected');
              this.style.backgroundColor = 'rgba(75, 101, 54, 0.2)'; // Change background color
          });
      });
  });
  </script>

<div class="additional-info">
    <p class="title-text">Ветеринарний центр PetCare в Києві</p>
    <p class="description-text">
        Ми створили наш ветеринарний центр для того, щоб запропонувати вам і вашим улюбленцям якісну ветеринарну допомогу, здоров'я і довголіття.
    </p>
</div>


<?php
get_footer(); // Включає підвал
?>