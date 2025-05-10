var typed = new Typed('#element', {
    strings: ['Web Developer', 'Web Designer'],
    typeSpeed: 50,
});

  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
          e.preventDefault();
          document.querySelector(this.getAttribute('href')).scrollIntoView({
              behavior: 'smooth'
          });
      });
  });