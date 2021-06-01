function Hamburger() {
  let hamburger = document.getElementById("hamburger");
  let dropdownMenu = document.getElementById("navbarNavDropdown");
  let dropdownActive = dropdownMenu.classList.contains("show");
  let navbar = document.getElementById("main-nav");
  console.log(dropdownActive);

  const openHamburger = () => {
    hamburger.classList.add("is-active");
    navbar.classList.add("open");
  };
  const closeHamburger = () => {
    hamburger.classList.remove("is-active");
    navbar.classList.remove("open");
  };

  if (dropdownActive) {
    closeHamburger();
  } else {
    openHamburger();
  }
}

function Test() {
  console.log("the click event works");
  let dropdownMenu = document.getElementById("navbarNavDropdown");
  let dropdownActive = dropdownMenu.classList.contains("show");
  console.log(dropdownActive);
}

const el = document.getElementById("hamburger");
el.addEventListener("click", Hamburger, false);
