// php.script.js — small UI enhancements: animate visit counter and smooth theme toggle
document.addEventListener('DOMContentLoaded', function () {
  // Animate numeric counters (.num elements with data-value)
  document.querySelectorAll('.num[data-value]').forEach(function (el) {
    var target = parseInt(el.getAttribute('data-value'), 10) || 0;
    var duration = 800;
    var start = 0;
    var startTime = null;

    function step(timestamp) {
      if (!startTime) startTime = timestamp;
      var progress = Math.min((timestamp - startTime) / duration, 1);
      el.textContent = Math.floor(progress * (target - start) + start);
      if (progress < 1) {
        window.requestAnimationFrame(step);
      } else {
        el.textContent = target;
      }
    }

    window.requestAnimationFrame(step);
  });

  // Smooth theme toggle: add CSS class for animation when clicking the theme link
  var themeToggle = document.querySelector('.theme-toggle');
  if (themeToggle) {
    themeToggle.addEventListener('click', function (e) {
      // Add transition class for a short animation, then follow link
      e.preventDefault();
      document.documentElement.classList.add('theme-transition');
      setTimeout(function () {
        window.location = themeToggle.getAttribute('href');
      }, 260);
    });
    // Remove transition class after theme changes
    window.addEventListener('pageshow', function () {
      setTimeout(function () {
        document.documentElement.classList.remove('theme-transition');
      }, 300);
    });
  }
});
