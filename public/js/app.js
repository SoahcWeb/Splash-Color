document.addEventListener("DOMContentLoaded", function () {

    const elements = document.querySelectorAll(".fade");

    function showOnScroll() {
        elements.forEach(el => {
            const position = el.getBoundingClientRect().top;
            const screenHeight = window.innerHeight;

            if (position < screenHeight - 100) {
                el.classList.add("visible");
            }
        });
    }

    window.addEventListener("scroll", showOnScroll);

    showOnScroll(); // lance au chargement
});
