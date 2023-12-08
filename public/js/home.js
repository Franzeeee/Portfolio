document.addEventListener('DOMContentLoaded', function () {
    const sideNav = document.querySelector('.side-nav');
    const closeBtn = document.querySelector('.nav-header .close');
    const sideNavContainer = document.querySelector('.sideNav-container');

    // Function to close the side nav
    function closeSideNav() {
        sideNavContainer.classList.add('close');
        sideNav.classList.add('close');
    }

    // Open side nav when burger menu is clicked
    document.querySelector('.burger-menu').addEventListener('click', function () {
        sideNav.classList.remove('close');
        sideNavContainer.classList.remove('close');
    });

    // Close side nav when close button is clicked
    closeBtn.addEventListener('click', closeSideNav);

    // Close side nav when clicking outside the sideNav-container
    document.querySelector('.close-outside').addEventListener('click', function () {
        closeSideNav();
    });
});

// Typing Effect 
const typingText = document.querySelector('#typing-effect')

const textArray = [
    'Student.',
    'Developer.',
    'Programmer.',
]

const delay = 1000;
let textIndex = 0;
let currentText = '';
let isDeleting = false;

const type = () => {
    const text = textArray[textIndex];

    if (isDeleting) {
        currentText = text.substring(0, currentText.length - 1);
    } else {
        currentText = text.substring(0, currentText.length + 1);
    }

    typingText.innerHTML = currentText;

    let typeSpeed = 120;

    if (isDeleting) {
        typeSpeed /= 2;
    }

    if (!isDeleting && currentText === text) {
        typeSpeed = delay;
        isDeleting = true;
    } else if (isDeleting && currentText === "") {
        isDeleting = false;
        textIndex++;

        if (textIndex === textArray.length) {
            textIndex = 0;
        }
    }

    setTimeout(() => {
        type();
    }, typeSpeed);
}

type();


// Function to handle the scroll event
function handleScroll() {
    // Check if the scroll position is greater than or equal to 50 pixels
    if (window.scrollY >= 200) {
        // Trigger an alert
        document.querySelector('nav').classList.add('scrolled');
        document.querySelector('header').classList.add('scrolled');
        
        // Remove the event listener after the alert is triggered
        window.removeEventListener('scroll', handleScroll);

        // Reattach the event listener when the scroll position returns to 0
        window.addEventListener('scroll', reattachScrollListener);
    }
}

// Function to reattach the scroll event listener when the scroll position is back to 0
function reattachScrollListener() {
    if (window.scrollY < 100) {
        document.querySelector('nav').classList.remove('scrolled');
        document.querySelector('header').classList.remove('scrolled');
        // Reattach the handleScroll function to the scroll event
        window.addEventListener('scroll', handleScroll);

        // Remove the event listener for reattachment once it's done
        window.removeEventListener('scroll', reattachScrollListener);
    }
}

// Attach the handleScroll function to the scroll event
window.addEventListener('scroll', handleScroll);