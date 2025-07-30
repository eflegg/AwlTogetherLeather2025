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



const el = document.getElementById("hamburger");
el.addEventListener("click", Hamburger, false);

function MobileArrow() {
  let context = event.target;
  if (context.parentNode.classList.contains("show")) {
    console.log("subnav closed");
    context.classList.remove("rotate");
  } else {
    console.log("subnav open");
    context.classList.add("rotate");
  }
}
let element = document.getElementsByClassName("dropdown-toggle");
for (var i = 0; i < element.length; i++)
  element[i].addEventListener("click", MobileArrow, false);

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
  console.log("grid working");
  var allItems = document.getElementsByClassName("item");
  if (allItems) {
    console.log("all items in function", allItems);

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

//// Second Type of Masonry ////
(function ($) {
  let mainId = "masonry-effect";
  let itemIdentifier = "#masonry-effect .item";

  document.addEventListener("DOMContentLoaded", function (e) {
    // Programmatically get the column width
    let item = document.querySelector(itemIdentifier);
    let parentWidth = item.parentNode.getBoundingClientRect().width;
    let itemWidth =
      item.getBoundingClientRect().width +
      parseFloat(getComputedStyle(item).marginLeft) +
      parseFloat(getComputedStyle(item).marginRight);
    let columnWidth = Math.round(1 / (itemWidth / parentWidth));

    // We need this line since JS nodes are dumb
    let arrayOfItems = Array.prototype.slice.call(
      document.querySelectorAll(itemIdentifier)
    );
    let trackHeights = {};
    arrayOfItems.forEach(function (item) {
      // Get index of item
      let thisIndex = arrayOfItems.indexOf(item);
      // Get column this and set width
      let thisColumn = thisIndex % columnWidth;
      if (typeof trackHeights[thisColumn] == "undefined") {
        trackHeights[thisColumn] = 0;
      }
      trackHeights[thisColumn] +=
        item.getBoundingClientRect().height +
        parseFloat(getComputedStyle(item).marginBottom);
      // If the item has an item above it, then move it to fill the gap
      if (thisIndex - columnWidth >= 0) {
        let getItemAbove = document.querySelector(
          `${itemIdentifier}:nth-of-type(${thisIndex - columnWidth + 1})`
        );
        let previousBottom = getItemAbove.getBoundingClientRect().bottom;
        let currentTop =
          item.getBoundingClientRect().top -
          parseFloat(getComputedStyle(item).marginBottom);
        item.style.top = `-${currentTop - previousBottom}px`;
      }
    });
    let max = Math.max(...Object.values(trackHeights));
    document.getElementById(mainId).style.height = `${max}px`;
  });
})(jQuery);
