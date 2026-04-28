document.addEventListener("DOMContentLoaded", () => {
  
    const currentPage = window.location.pathname.split("/").pop() || "home.html";
    
    const navLinks = document.querySelectorAll(".menu a");
    
    navLinks.forEach(link => {
        const linkPage = link.getAttribute("href");
        const li = link.querySelector(".nav-bar");
        
        li.classList.remove("active");
        
        if (linkPage === currentPage) {
            li.classList.add("active");
        }
    });
});