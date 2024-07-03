// Swiper js
var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  // grabCursor: true,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

// Swiper js
document.addEventListener("DOMContentLoaded", function() {
  var mySwiper = new Swiper('.swiper-container', {
    // Configurações opcionais
    loop: true,
    autoplay: {
      delay: 5000, // 5000 milissegundos = 5 segundos
    },
  });
});

// Nav open close
const body = document.querySelector('body'),
      navMenu = body.querySelector('.menu-content'),
      navOpenBtn = body.querySelector('.navOpen-btn'),
      navCloseBtn = navMenu.querySelector('.navClose-btn');

if(navMenu && navOpenBtn){
  navOpenBtn.addEventListener("click", () =>{
    navMenu.classList.add("open");
    body.style.overflowY = "hidden";
  })
}

if(navMenu && navCloseBtn){
  navCloseBtn.addEventListener("click", () =>{
    navMenu.classList.remove("open");
    body.style.overflowY = "scroll";
  })
}

// Change header bg color
window.addEventListener("scroll", () => {
  const scrollY = window.pageYOffset;

  if(scrollY > 5){
    document.querySelector("header").classList.add("header-active");
  }else{
    document.querySelector("header").classList.remove("header-active");
  }

  // Scroll up button
  const scrollUpBtn = document.querySelector('.scrollUp-btn');

  if(scrollY > 250){
    scrollUpBtn.classList.add("scrollUpBtn-active");
  }else{
    scrollUpBtn.classList.remove("scrollUpBtn-active");
  }
  
  
  // Nav link indicator

  const sections = document.querySelectorAll('section[id]');
  sections.forEach(section =>{
    const sectionHeight = section.offsetHeight,
          sectionTop = section.offsetTop - 100;

          let navId = document.querySelector(`.menu-content a[href='#${section.id}']`);
          if(scrollY > sectionTop && scrollY <=  sectionTop + sectionHeight){
            navId.classList.add("active-navlink");           
          }else{
            navId.classList.remove("active-navlink");     
          }
          
          navId.addEventListener("click", () => {
            navMenu.classList.remove("open");
            body.style.overflowY = "scroll";
          })
  })
})  
  
  
  // Scroll Reveal Animation
  const sr = ScrollReveal({
    origin: 'top',
    distance: '60px',
    duration: 2500,
    delay: 400,
  })
  
  sr.reveal(`.section-title, .section-subtitle, .section-description, .brand-image, .tesitmonial, .newsletter 
.logo-content, .newsletter-inputBox, .newsletter-mediaIcon, .footer-content, .footer-links`, {interval:100,})

sr.reveal(`.about-imageContent, .menu-items`, {origin: 'left'})
sr.reveal(`.about-details, .time-table`, {origin: 'right'})

 // Accessibility
document.getElementById("increaseFontButton").addEventListener("click", function() {
  increaseFont();
});
function increaseFont() {
  document.querySelectorAll("h1, h2, p, label").forEach(function(icon) {
      icon.style.fontSize = "1.4em";
  });
}

document.getElementById("decreaseFontButton").addEventListener("click", function() {
  decreaseFont();
});
function decreaseFont() {
  document.querySelectorAll("h1, h2, h4, p, label").forEach(function(icon) {
      icon.style.fontSize = "0.8em";
  });
}

document.getElementById("darkModeButton").addEventListener("click", function() {
  toggleDarkMode();
});function toggleDarkMode() {
  document.querySelectorAll(" section, .card-body, .form-group, .list-group-item, .txt #list, .br ").forEach(function(icon) {
      icon.classList.toggle("dark-mode");
  });
}

document.getElementById("iincreaseFontButton").addEventListener("click", function() {
  increaseFont();
});
function increaseFont() {
  document.querySelectorAll("h1, h2, p, label").forEach(function(icon) {
      icon.style.fontSize = "1.4em";
  });
}

document.getElementById("ddecreaseFontButton").addEventListener("click", function() {
  decreaseFont();
});
function decreaseFont() {
  document.querySelectorAll("h1, h2, h4, p, label").forEach(function(icon) {
      icon.style.fontSize = "0.8em";
  });
}

document.getElementById("ddarkModeButton").addEventListener("click", function() {
  toggleDarkMode();
});function toggleDarkMode() {
  document.querySelectorAll(" section, .card-body, .form-group, .list-group-item, .txt #list, .br ").forEach(function(icon) {
      icon.classList.toggle("dark-mode");
  });
}
