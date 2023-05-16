$(document).ready(function() {
    $('#login-button').click(function() {
        $('.login-form').toggleClass('open').fadeToggle(200)
    });
      
    $(document).click(function(event) {
        if (!$(event.target).closest('.login-wrapper').length) {
            $('.login-form').fadeOut(200).removeClass('open');
        }
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

    document.body.addEventListener("click", function(event) {
        var login_form = document.getElementsByClassName("login-form");
        
        if (!login_form.contains(event.target)) {
            login_form.style.display = "none";
        }
    });
});




