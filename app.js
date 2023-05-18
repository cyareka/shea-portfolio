$(document).ready(function() {
    /* This code is adding a click event listener to the element with the ID "login-button". When the
    button is clicked, it toggles the "open" class on the element with the class "login-form" and
    fades it in or out over a duration of 200 milliseconds. */
    $('#login-button').click(function() {
        $('.login-form').toggleClass('open').fadeToggle(200)
    });
      
    /* This code is adding a click event listener to the entire document. When a click event occurs, it
    checks if the clicked element is not a descendant of the element with the class "login-wrapper".
    If it is not, it fades out the element with the class "login-form" over a duration of 200
    milliseconds and removes the "open" class from it. This is used to close the login form if the
    user clicks outside of it. */
    $(document).click(function(event) {
        if (!$(event.target).closest('.login-wrapper').length) {
            $('.login-form').fadeOut(200).removeClass('open');
        }
    });

    /* This code is creating an IntersectionObserver object that observes elements with the class
    "hide". When an observed element intersects with the root element (which is the viewport by
    default), the observer adds the class "shou" to the observed element if it is intersecting, or
    removes the class "shou" if it is not intersecting. The rootMargin option is set to '-190px',
    which means that the observer will trigger when the observed element is 190 pixels away from the
    viewport. The observed elements are selected using the querySelectorAll method and are looped
    through using forEach to call the observe method on each element. */
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

    /* This code is adding a click event listener to the entire document. When a click event occurs, it
    checks if the clicked element is not a descendant of the element with the class "login-form". If
    it is not, it sets the display style of the element with the class "login-form" to "none". This
    is used to close the login form if the user clicks outside of it. */
    document.body.addEventListener("click", function(event) {
        var login_form = document.getElementsByClassName("login-form[0]");
        
        if (!login_form.contains(event.target)) {
            login_form.style.display = "none";
        }
    });

    function toggleNav() {
        const navbarLinks = document.getElementById('navbarLinks');
        navbarLinks.classList.toggle('show');
    }
});




