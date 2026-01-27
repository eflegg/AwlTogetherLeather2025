


document.addEventListener("DOMContentLoaded", function() {

  //fade in
    const fadeInElements = document.querySelectorAll('.fade-me');
    const observerOptions = {
        root: null, // observe against the viewport
        rootMargin: '0px',
        threshold: 0.1 // trigger when 10% of the element is visible
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('faded-in');
                observer.unobserve(entry.target); // optional: stop observing once it has appeared
            }
        });
    }, observerOptions);

    fadeInElements.forEach(element => {
        observer.observe(element);
    });



//FAQ accordion similar to nvb uses aria labels attached to css

const accordionItems = document.querySelectorAll('.accordion-item');

const remove = () => {
  accordionItems.forEach(el => {
    el.setAttribute('aria-expanded', 'false');
    console.log('remove fired');
  })
}
function toggleAccordion(){

  if(this.ariaExpanded === "false"){
    remove();
    this.setAttribute('aria-expanded', 'true');

  } else {
    remove();
    this.setAttribute('aria-expanded', 'false');

  }
 
}
accordionItems.forEach(item => item.addEventListener('click', toggleAccordion));

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
//attempting to append an ion-icon and setting its attributes
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

//this is used as the first function executed when a button is clicked to close all other top level submenus and then open the clicked menu
function collapseTopLevel(){
  menuItems.forEach((item) => {
    console.log('item ', item);
	const topSubMenu = item.querySelector("ul.top-level-subnav");
const topSubButton = item.querySelector("button");
topSubMenu.setAttribute("aria-hidden","true");
topSubButton.setAttribute("aria-expanded","false");
});  
};
//this is used as the first function executed when a button is clicked to close all other second level submenus and then open the clicked menu
function collapseSecondLevel(){
  secondaryMenuItems.forEach((item) => {
    console.log('item ', item);
	const secondSubMenu = item.querySelector("ul.second-level-subnav");
const secondSubButton = item.querySelector("button");
secondSubMenu.setAttribute("aria-hidden","true");
secondSubButton.setAttribute("aria-expanded","false");
});  
};


//used for both top level and second level to handle opening and closing but setting ul and btn aria labels
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


//for top level subnavs check if it's closed and either open it or close it
menuItems.forEach((item) => {
	const button = item.querySelector("button");
	button.addEventListener("click", () => {
		if (button.ariaExpanded === "false") {
      collapseTopLevel();
			expandSubMenu(item);
		} else {
			collapseSubMenu(item);
		}
 
	});

 

//for second level subnavs check if it's closed and either open it or close it
  secondaryMenuItems.forEach((secondItem) => {
    const secondButton = secondItem.querySelector("button");
    secondButton.classList.add("second-sub-button");


    secondButton.addEventListener("click", () => {
      	if (secondButton.ariaExpanded === "false") {
           collapseSecondLevel();
			expandSubMenu(secondItem);
		} else {
			collapseSubMenu(secondItem);
		}
    } )
  })


//this adds accessible hover i think. i didn't want hover but could be added back

	// secondItem.addEventListener("mouseenter", () => {
	// 	expandSubMenu(secondItem);
	// });
	// secondItem.addEventListener("mouseleave", () => {
	// 	collapseSubMenu(secondItem);
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
        document.body.style.height = "110vh";
      
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



// function Hamburger() {
//   let hamburger = document.getElementById("hamburger");
//   let dropdownMenu = document.getElementById("navbarNavDropdown");
//   let dropdownActive = dropdownMenu.classList.contains("show");
//   let navbar = document.getElementById("main-nav");
//   console.log("dropdown active? ",dropdownActive);

//   const openHamburger = () => {
//     hamburger.classList.add("is-active");
//     navbar.classList.add("open");
//   };
//   const closeHamburger = () => {
//     hamburger.classList.remove("is-active");
//     navbar.classList.remove("open");
//   };

//   if (dropdownActive) {
//     closeHamburger();
//   } else {
//     openHamburger();
//   }
// }


// const el = document.getElementById("hamburger");
// el.addEventListener("click", Hamburger, false);



// function MobileArrow() {
//   let context = event.target;
//   if (context.parentNode.classList.contains("show")) {
//     console.log("subnav closed");
//     context.classList.remove("rotate");
//   } else {
//     console.log("subnav open");
//     context.classList.add("rotate");
//   }
// }
// let element = document.getElementsByClassName("dropdown-toggle");
// for (var i = 0; i < element.length; i++)
//   element[i].addEventListener("click", MobileArrow, false);


});







