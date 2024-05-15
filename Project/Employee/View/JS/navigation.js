document.addEventListener("DOMContentLoaded", function() {
    const navLinks = document.querySelectorAll(".nav-btn");

    navLinks.forEach(function(navLink) {
        navLink.addEventListener("click", function() {
            // Remove active class from all nav links
            navLinks.forEach(function(link) {
                link.classList.remove("active");
            });

            // Add active class to the clicked nav link
            this.classList.add("active");
        });
    });
});
