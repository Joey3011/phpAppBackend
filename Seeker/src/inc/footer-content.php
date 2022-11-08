<script type="text/javascript">
let navbar = document.querySelector(".navbar");
let navLinks = document.querySelector(".nav-links");
let menuOpenBtn = document.querySelector(".navbar .fa-bars");
let menuCloseBtn = document.querySelector(".nav-links .fa-close");
menuOpenBtn.onclick = function() {
navLinks.style.left = "0";
}
menuCloseBtn.onclick = function() {
navLinks.style.left = "-100%";
}
let tsArrow = document.querySelector(".ts-arrow");
tsArrow.onclick = function() {
 navLinks.classList.toggle("show");
}
</script>
</body>
</html>