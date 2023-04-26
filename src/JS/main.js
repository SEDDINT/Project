
function scroll_effect(element){
    element.forEach(function(link) {
        link.addEventListener("click", function(event) {
            event.preventDefault();
            let target = document.querySelector(link.getAttribute("href"));
            target.scrollIntoView({ behavior: 'smooth' });
        });
    });
}

let navLinks = document.querySelectorAll("nav a");
scroll_effect(navLinks)