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

//// Masonry for posts ///////

function resizeGridItem(item) {
  var grid = document.getElementsByClassName("grid")[0];
  var rowHeight = parseInt(
    window.getComputedStyle(grid).getPropertyValue("grid-auto-rows")
  );
  var rowGap = parseInt(
    window.getComputedStyle(grid).getPropertyValue("grid-row-gap")
  );
  var rowSpan = Math.ceil(
    (item.querySelector(".content").getBoundingClientRect().height + rowGap) /
      (rowHeight + rowGap)
  );
  item.style.gridRowEnd = "span " + rowSpan;
}

function resizeAllGridItems() {
  console.log("hey");
  var allItems = document.getElementsByClassName("item");
  if (allItems) {
    console.log("allitems in function", allItems);

    for (var x = 0; x < allItems.length; x++) {
      resizeGridItem(allItems[x]);
    }
  }
}

window.addEventListener("resize", resizeAllGridItems);
window.onload = resizeAllGridItems();
function resizeInstance(instance) {
  var item = instance.elements[0];
  resizeGridItem(item);
}
var allItems = document.getElementsByClassName("item");
console.log("allitems in global", allItems);
for (var x = 0; x < allItems.length; x++) {
  imagesLoaded(allItems[x], resizeInstance);
}
