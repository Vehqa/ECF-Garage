let slides = document.querySelectorAll('.slide-container');
let index= 0

let nextBtn = document.getElementById('next');
let prevBtn = document.getElementById('prev');

function next(){
    slides[index].classList.remove('active');
    index =(index + 1) % slides.length;
    slides[index].classList.add('active');
}

function prev(){
    slides[index].classList.remove('active');
    index =(index - 1 + slides.length) % slides.length;
    slides[index].classList.add('active'); 
}

nextBtn.addEventListener('click', next);
prevBtn.addEventListener('click', prev);