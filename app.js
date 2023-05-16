$(document).ready(function() {
    $('#login-button').click(function() {
        $('.login-form').toggleClass('open').fadeToggle(200)
    });
      
    $('#home').click(function() {
        $('.login-form').toggle();
    });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            console.log(entry)
            if (entry.isIntersecting) {
                entry.target.classList.add('shou');
            } else {
                entry.target.classList.remove('shou');
            }
        });
    }, { rootMargin: '-190px' });
    
    const hiddenElement = document.querySelectorAll('.hide');
    hiddenElement.forEach((el) => observer.observe(el));
});

