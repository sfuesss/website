const toggleButton = document.querySelector('.toggle-button');
const nav = document.querySelector('nav');
const navLinks = document.querySelector('.nav-links');
const logo = document.querySelector('.logo');
const pages = document.querySelectorAll('.page');
const links = document.querySelectorAll('.page-link');
const panel_links = document.querySelectorAll('.hover-container');
const scrollable = document.querySelector('.scroll-container');
const contact_button = document.querySelector('.contact-button');
const modalContainer = document.querySelector('.modal-container');
const modal = document.querySelector('.contact-modal');
const exit_button = document.querySelector('.exit-button');

let current_page;

contact_button.addEventListener('click', () => {
    modalContainer.style.display = 'flex';
    modal.style.display = 'flex';
    for (let page of pages) {
        if (page.style.display != 'none') {
            current_page = page;
            page.style.opacity = '0.5';
            page.style.pointerEvents = 'none';
        }
    }
    nav.style.opacity = '0.5';
    nav.style.pointerEvents = 'none';
});

exit_button.addEventListener('click', () => {
    modalContainer.style.display = 'none';
    modal.style.display = 'none';
    current_page.style.opacity = '1';
    current_page.style.pointerEvents = 'all';
    nav.style.opacity = '1';
    nav.style.pointerEvents = 'all';
});

for (num of panel_links) {
    num.addEventListener('click', e => {
        let container = e.target.closest('.hover-container');
        if (container?.classList.contains('1')) {
            scrollable.scrollTo(0,0);
        }
        else if (container?.classList.contains('2')) {
            scrollable.scrollTo(0,425);
        }
        else if (container?.classList.contains('3')) {
            scrollable.scrollTo(0,425*2);
        }
        else if (container?.classList.contains('4')) {
            scrollable.scrollTo(0,425*3);
        }
        else if (container?.classList.contains('5')) {
            scrollable.scrollTo(0,425*4);
        }
    });
}

for (let page of pages) {
    if (!page.classList.contains('home')) {
        page.style.display = 'none';
    }
}

links.forEach( link => {
    link.addEventListener('click', e => {
        let target_class;
        for (let c of e.target.classList) {   
            if (c !== 'page-link' && c !== 'logo') {
                target_class = c;
            }
        }
        for (let page of pages) {
            if (!page.classList.contains(target_class)) {
                page.style.display = 'none';
            }
            else {
                page.style.display = 'block';
                if (target_class === 'resources' || target_class === 'annual-events' || target_class == 'our-team') {
                        page.style.display = 'flex';
                }
            }
        }
    });
});

toggleButton.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});


document.addEventListener("click", e => {
    const isDropdownButton = e.target.matches('[data-dropdown-button]');
    if (!isDropdownButton && e.target.closest('[data-dropdown]') != null) return

    let currentDropdown
    if (isDropdownButton) {
        currentDropdown = e.target.closest('[data-dropdown]');
        currentDropdown.classList.toggle('active');
    }

    document.querySelectorAll('[data-dropdown].active').forEach(dropdown => {
        if (dropdown === currentDropdown) return
        dropdown.classList.remove('active');
    });
});