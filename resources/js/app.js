import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'bootstrap-icons/font/bootstrap-icons.css';

import Chart from 'chart.js/auto';

window.Chart = Chart;

import html2canvas from "html2canvas";
window.html2canvas = html2canvas;

document.addEventListener('DOMContentLoaded', () => {
  const sections = document.querySelectorAll('.section-fade');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.animationPlayState = 'running';
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });

  sections.forEach(section => {
    section.style.animationPlayState = 'paused';
    observer.observe(section);
  });
});

window.addEventListener('DOMContentLoaded', () => {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      const lat = position.coords.latitude;
      const lng = position.coords.longitude;
      const map = document.getElementById('user-map');
      if (map) {
        map.src = `https://www.google.com/maps?q=${lat},${lng}&output=embed`;
      }
    });
  }
});

document.addEventListener('DOMContentLoaded', function() {
    const text = "MediCare";
    const el = document.getElementById('medicare-type');
    let i = 0;
    let reverse = false;

    function typeWriter() {
        if (!reverse && i <= text.length) {
            el.textContent = text.substring(0, i);
            i++;
            if (i > text.length) {
                setTimeout(() => { reverse = true; typeWriter(); }, 1800); // Pause avant effacement
            } else {
                setTimeout(typeWriter, 120);
            }
        } else if (reverse && i >= 0) {
            el.textContent = text.substring(0, i);
            i--;
            if (i < 0) {
                reverse = false;
                setTimeout(typeWriter, 800); // Pause avant de retaper
            } else {
                setTimeout(typeWriter, 60);
            }
        }
    }
    typeWriter();
});

window.Echo.channel('notifications')
    .listen('NotificationEvent', (data) => {
        let notificationList = document.getElementById('notificationList');
        let newNotification = `
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <span class="fw-bold">${data.type}</span> - ${data.message}
                </div>
                <small class="text-muted">${data.date}</small>
            </div>
        `;
        notificationList.innerHTML = newNotification + notificationList.innerHTML;
    });

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendarGrossesse');

    if (calendarEl) {
        const calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, interactionPlugin],
            initialView: 'dayGridMonth',
            locale: 'fr',
            firstDay: 1,
            height: 'auto',
            events: [
                { title: 'Écho 1', start: '2025-05-15' },
                { title: 'Écho 2', start: '2025-06-25' },
                { title: 'Écho 3', start: '2025-08-10' }
            ]
        });

        calendar.render();
    }
});
