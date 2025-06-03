import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'bootstrap-icons/font/bootstrap-icons.css';

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
