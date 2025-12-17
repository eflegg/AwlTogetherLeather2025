


document.addEventListener("DOMContentLoaded", function() {


//// Accessible navigation////

//add classes to subnav for easier styling

const topListItems = document.querySelectorAll('#menu-main-menu >.menu-item-has-children');
topListItems.forEach(li => {
  li.dataset.expanded = "false";
})

const topSubnavs = document.querySelectorAll('#menu-main-menu >.menu-item-has-children>.sub-menu');


//insert a button after each top level subnav, set aria hidden to true and data attribute on the button to expanded = false
topSubnavs.forEach(sub => {
  sub.classList.add('top-level-subnav');
  sub.setAttribute("aria-hidden","true");
  const dropButton = document.createElement('button');
  dropButton.setAttribute("aria-expanded","false");
  dropButton.classList.add('sub-nav-toggle');
  sub.parentNode.insertBefore(dropButton, sub);
})

//add class to second sub-subnav
const secondSubnavs = document.querySelectorAll('.top-level-subnav>.menu-item-has-children>.sub-menu');
secondSubnavs.forEach(sub => {
  sub.classList.add('second-level-subnav');
})
//insert a button after each second level subnav set aria hidden to true and data attribute on the button to expanded = false
secondSubnavs.forEach(secondSub => {
  secondSub.setAttribute("aria-hidden","true");
  const dropButton = document.createElement('button');
  dropButton.setAttribute("aria-expanded","false");
  dropButton.classList.add('sub-nav-toggle');
  secondSub.parentNode.insertBefore(dropButton, secondSub);
})


// click funtionality and proper tab direction behaviour

//target top level subnav
const menuItems = document.querySelectorAll(".main>.menu-item-has-children");
// target second level subnav
const secondaryMenuItems = document.querySelectorAll(".top-level-subnav>.menu-item-has-children")
let expandedItem = null;
console.log(secondaryMenuItems);

const expandSubMenu = (item) => {
	const subMenu = item.querySelector("ul.sub-menu");
	const button = item.querySelector("button");
	expandedItem = item;
console.log("expanded subnav");
	subMenu.setAttribute("aria-hidden","false");
	button.setAttribute("aria-expanded","true");
	item.dataset.expanded = "true";
  button.handleKeydown(e.target.blur())
};

const collapseSubMenu = (item) => {
	const subMenu = item.querySelector("ul");
	const button = item.querySelector("button");
console.log("collapsed subnav");
	expandedItem = null;

	subMenu.setAttribute("aria-hidden","true");
	button.setAttribute("aria-expanded","false");
	item.dataset.expanded = "false";
};

menuItems.forEach((item) => {
	const button = item.querySelector("button");
	button.addEventListener("click", () => {
		if (button.ariaExpanded === "false") {
			expandSubMenu(item);
		} else {
			collapseSubMenu(item);
		}
	});

  secondaryMenuItems.forEach((secondItem) => {
    const secondButton = secondItem.querySelector("button");
    secondButton.classList.add("i-am-second-button");
    secondButton.addEventListener("click", () => {
      	if (secondButton.ariaExpanded === "false") {
			expandSubMenu(secondItem);
		} else {
			collapseSubMenu(secondItem);
		}
    } )
  })


//this adds accessible hover i think. i didn't want hover but could be added back

	// item.addEventListener("mouseenter", () => {
	// 	expandSubMenu(item);
	// });
	// item.addEventListener("mouseleave", () => {
	// 	collapseSubMenu(item);
	// });
});




document.addEventListener("keydown", (event) => {
	if (event.key === "Tab") {
		if (!expandedItem) {
			return;
		}
   
		const subMenu = expandedItem.querySelector(".second-level-subnav");
		const focusedElement = expandedItem.querySelector(":focus");
		const firstFocusableElement = expandedItem.querySelector("a");
		const lastFocusableElement = subMenu.lastElementChild.querySelector("a");
  

		if (!event.shiftKey && focusedElement === lastFocusableElement) {
			collapseSubMenu(expandedItem);
			return;
		}

		if (event.shiftKey && focusedElement === firstFocusableElement) {
			collapseSubMenu(expandedItem);
			return;
		}
	}

	if (event.key == "Escape") {
		collapseSubMenu(expandedItem);
	}
})

//check viewport width on resize

let viewportWidth = window.innerWidth;
  function updateWindowWidth(){
    if(viewportWidth < 1000){
      navigation.classList.add('mobile-nav');
      navigation.classList.remove('desktop-nav');
    } else if (viewportWidth >= 1000) {
      navigation.classList.add('desktop-nav');
      navigation.classList.remove('mobile-nav');
    }
  }
  
  window.addEventListener("resize", updateWindowWidth);

  const mobileScreen = document.querySelector(".mobile-nav");
  const menuButton = document.querySelector(".js-menu-button");
  const navigation = document.querySelector(".js-navigation");
  const trapContainer = document.querySelector("header");
  
  const handleHamburgerClose = () => {
    navigation.setAttribute("aria-hidden", true);
    menuButton.setAttribute("aria-expanded", false);
    menuButton.setAttribute("aria-label", "Menu");
    // menuButton.lastElementChild.textContent = "Menu";
  
    if (mobileScreen){
      mobileScreen.style.overflowY = "scroll";
    } else {
      document.body.style.overflowY = "initial";
    }
  };



  //Focus trap

  
  function focusTrap(element, removeButton, handleClose) {

    const focusable =
      'button:not(#header-search, #searchsubmit2),  a:not(.skiplink, .btn--fat, .home-logo)';
    const focusableElements = element.querySelectorAll(focusable);

    const firstFocusableElement = focusableElements[0];
    const lastFocusableElement = focusableElements[focusableElements.length - 1];
    firstFocusableElement.focus();
  
    const shutdownFocusTrap = () => {
      handleClose();
      element.removeEventListener('keydown', handleKeydown);
      removeButton.removeEventListener('click', shutdownFocusTrap);
      removeButton.focus();
    };
  
    removeButton.addEventListener('click', shutdownFocusTrap);
    
    const handleKeydown = (event) => {
      const isEscPressed = (event.key === 'Escape');
      const isTabPressed = (event.key === 'Tab' || event.keyCode === 9);
      
  
      if ( isEscPressed ) {
        shutdownFocusTrap();
      }
      
      if ( !isTabPressed ) {
        return;
      }
      
      if ( event.shiftKey ) {
        if ( document.activeElement === firstFocusableElement ) {
          event.preventDefault();
          lastFocusableElement.focus();
        }
        return;
      }
      
      if ( document.activeElement === lastFocusableElement ) {
        event.preventDefault();
        firstFocusableElement.focus();
      }
    };
    
    element.addEventListener('keydown', handleKeydown);
  }
  
  //toggle mobile nav open using aria-labels connected to css
  const headerButtons = document.querySelector('.header-buttons');
  const header = document.querySelector('header');
  menuButton.addEventListener("click", () => {
  const expanded = menuButton.getAttribute("aria-expanded");
  if (expanded === "false") {
    navigation.setAttribute("aria-hidden", false);
      menuButton.setAttribute("aria-expanded", true);
      menuButton.setAttribute("aria-label", "Close menu");
      // menuButton.lastElementChild.textContent = "Close";
      document.body.style.overflow = "hidden";

      // header.style.backgroundColor = "#f9afa7";
      focusTrap(trapContainer, menuButton, handleHamburgerClose);
      if (mobileScreen){
        mobileScreen.style.overflowY = "hidden";

      } else {
        document.body.style.overflow = "hidden";
        document.body.style.height = "120vh";
      
      }
  } else {
    navigation.setAttribute("aria-hidden", true);
    menuButton.setAttribute("aria-expanded", false);
    menuButton.setAttribute("aria-label", "Open menu");
    // menuButton.lastElementChild.textContent = "Menu";
    document.body.style.overflowY = "initial";
    document.body.style.height = "100%";
    // header.style.backgroundColor = "#fff8e6";
  }
  });



function Hamburger() {
  let hamburger = document.getElementById("hamburger");
  let dropdownMenu = document.getElementById("navbarNavDropdown");
  let dropdownActive = dropdownMenu.classList.contains("show");
  let navbar = document.getElementById("main-nav");
  console.log("dropdown active? ",dropdownActive);

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


});





//// Masonry for posts ///////

//UNSURE IF ANY OF THIS IS USED. CHECK//

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
  // console.log("grid working");
  var allItems = document.getElementsByClassName("item");
  if (allItems) {
    // console.log("all items in function", allItems);

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

