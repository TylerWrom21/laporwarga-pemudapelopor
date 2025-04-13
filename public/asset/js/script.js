function theme() {
    let theme = document.querySelector('#theme');
    theme.onclick = () => {
        theme.classList.toggle('fa-moon');
        document.querySelector('html').classList.toggle('dark');
    }
}
theme();
function homeSlider() {
    let slides = document.querySelectorAll(".slide");
    let index = 0;
    
    function showSlide(i) {
        slides.forEach((slide) => slide.classList.remove("active"));
        slides[i].classList.add("active");
    }
    
    function nextSlide() {
        index = (index + 1) % slides.length;
        showSlide(index);
    }
    
    function prevSlide() {
        index = (index - 1 + slides.length) % slides.length;
        showSlide(index);
    }
    
    document.getElementById("nextSlide").addEventListener("click", nextSlide);
    document.getElementById("prevSlide").addEventListener("click", prevSlide);
    
    setInterval(nextSlide, 5000);
}
homeSlider();