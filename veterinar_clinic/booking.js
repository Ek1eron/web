document.addEventListener('DOMContentLoaded', () => {
    let selectedDoctor = null;
    let selectedDate = null;
    let selectedTime = null;
    let comment = '';

    const doctorCards = document.querySelectorAll('.doctor-card');
    const dateButtons = document.querySelectorAll('.calendar-days button');
    const timeButtons = document.querySelectorAll('.time-option');
    const confirmButton = document.querySelector('.confirm-btn');
    const commentTextarea = document.querySelector('textarea');

    // Функція для отримання лікарів з API
    function loadDoctors() {
        fetch('http://localhost:3000/doctors')
            .then(response => response.json())
            .then(data => displayDoctors(data))
            .catch(error => console.error('Error loading doctors:', error));
    }

    // Функція для відображення лікарів
    function displayDoctors(doctors) {
        doctors.forEach(doctor => {
            const doctorId = `doctor-${doctor.id}`;
            const doctorCard = document.querySelector(`#${doctorId}`);
            if (doctorCard) {
                doctorCard.querySelector('.doctor-name').textContent = '';
                doctorCard.querySelector('.doctor-fullname').textContent = '';
                doctorCard.querySelector('.doctor-specialty').textContent = '';
                doctorCard.querySelector('.doctor-rating-value').textContent = '';
                doctorCard.querySelector('.doctor-reviews-value').textContent = '';
                doctorCard.querySelector('.doctor-experience-value').textContent = '';
    
                doctorCard.querySelector('.doctor-name').textContent = doctor.name;
                doctorCard.querySelector('.doctor-fullname').textContent = doctor.fullname; 
                doctorCard.querySelector('.doctor-specialty').textContent = doctor.specialty; 
                doctorCard.querySelector('.doctor-rating-value').textContent = doctor.rating;
                doctorCard.querySelector('.doctor-reviews-value').textContent = doctor.reviews;
                doctorCard.querySelector('.doctor-experience-value').textContent = doctor.experience;
    
                doctorCard.querySelector('.book-now-btn').addEventListener('click', () => {
                    selectedDoctor = doctor;
                    clearDateTimeSelection();
                    displaySchedule(selectedDoctor.schedule);
                });
            }
        });
    }

    // Очистити вибір дати та часу
    function clearDateTimeSelection() {
        dateButtons.forEach(button => {
            button.disabled = false; 
            button.classList.remove('disabled');
        });
        timeButtons.forEach(button => {
            button.disabled = false;
            button.classList.remove('disabled');
        });
        selectedDate = null;
        selectedTime = null;
        commentTextarea.value = '';
    }

    // Відображення графіка лікаря
    function displaySchedule(schedule) {
        const availableDates = schedule.map(slot => slot.date);
        dateButtons.forEach(button => {
            const date = `2024-09-${button.textContent.padStart(2, '0')}`; 
            if (!availableDates.includes(date)) {
                button.disabled = true; 
                button.classList.add('disabled'); 
            } else {
                button.disabled = false; 
                button.classList.remove('disabled');
                button.addEventListener('click', () => {
                    selectedDate = date;
                    const times = schedule.find(slot => slot.date === date)?.times || [];
                    updateAvailableTimes(times);
                });
            }
        });
    }

    // Оновлення доступних часів
    function updateAvailableTimes(availableTimes) {
        timeButtons.forEach(button => {
            const time = button.textContent.trim();
            if (!availableTimes.includes(time)) {
                button.disabled = true; 
                button.classList.add('disabled'); 
            } else {
                button.disabled = false;
                button.classList.remove('disabled');
                button.addEventListener('click', () => {
                    selectedTime = time;
                    updateSelectedTimeButton(button);
                });
            }
        });
    }

    // Оновлення вибраного часу
    function updateSelectedTimeButton(selectedButton) {
        timeButtons.forEach(button => button.classList.remove('selected'));
        selectedButton.classList.add('selected');
    }

    // Перевірка та підтвердження запису
    confirmButton.addEventListener('click', async () => {
        if (!selectedDoctor) {
            alert('Будь ласка, виберіть лікаря.');
        } else if (!selectedDate) {
            alert('Будь ласка, виберіть дату.');
        } else if (!selectedTime) {
            alert('Будь ласка, виберіть час.');
        } else {
            comment = commentTextarea.value;
            const appointmentDetails = {
                doctor: selectedDoctor.name,
                date: selectedDate,
                time: selectedTime,
                comment: comment
            };

            const response = await fetch('http://localhost:3000/appointments', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(appointmentDetails)
            });

            if (response.ok) {
                alert(`Записано на прийом до ${appointmentDetails.doctor} на ${appointmentDetails.date} о ${appointmentDetails.time}.`);
                
                // Оновлення графіка лікаря
                await removeTimeFromSchedule(selectedDoctor.id, selectedDate, selectedTime);
                
                // Очистити вибір після успішного запису
                clearDateTimeSelection();
            } else {
                alert('Щось пішло не так. Спробуйте ще раз.');
            }
        }
    });

    // Видалення вибраного часу з графіка лікаря
    async function removeTimeFromSchedule(doctorId, date, time) {

        const doctorResponse = await fetch(`http://localhost:3000/doctors/${doctorId}`);
        const doctor = await doctorResponse.json();

        const doctorSchedule = doctor.schedule.find(slot => slot.date === date);
        if (doctorSchedule) {
            const timeIndex = doctorSchedule.times.indexOf(time);
            if (timeIndex > -1) {
                doctorSchedule.times.splice(timeIndex, 1); 
            }

            const updateResponse = await fetch(`http://localhost:3000/doctors/${doctorId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ schedule: doctor.schedule })
            });

            if (!updateResponse.ok) {
                alert('Не вдалося оновити графік лікаря.');
            }
        }
    }

    loadDoctors();
});