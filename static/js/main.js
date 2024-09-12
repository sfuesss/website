// File: main.js
// Description:
// - The website's framework code
// - Allows modular pages without having to leave index.mmm

const portal = document.getElementById("portal");
var urlParams = new URLSearchParams(window.location.search);
const navButton = document.getElementsByClassName("pages");

// Functions to call when a specific page is called
callLoadFunctions = {
    "home": loadHomePage,
    "news": NewsPageInit,
}

// Description:
// - Starts by hiding the page portal
// - Pulls the website's page with an HTTP GET Request
// - Loads the page into the portal divider
// - If a function exsists in `callLoadFunctions`, then it will use that as a callback
// - Finishes by showing the page requests
// Catch:
// - Recursively calls this function to load the error page
function loadpage(page) {
    portal.classList.add("hide");
    pageToLoad = new Request(`${page}.html`);

    setTimeout(() => {
        urlParams.set("page", page);
        window.history.replaceState({}, null, `?page=${page}`);
        fetch(pageToLoad).then((res) => {
            if (res.status === 200) {
                return res.text();
            }
            throw new Error("Page Not Found");
        })
        .then((text) => {
            // Page Loads Successfully

            portal.innerHTML = text;
            if (callLoadFunctions[page] != null) callLoadFunctions[page]();
            portal.classList.remove("hide");
        })
        .catch((error) => {
            console.log(error);

            // Recursive Function which guarrantees a loaded page of some sort :D
            loadpage('error');
        })
    }, 300);
}

// Description:
// - Loads an external website requested
function loadexternal(page) {
    window.open("https://" + page, '_blank').focus();
}

// Description:
// - For Mobile Viewports
// - Toggles the navbar pages on/off
function toggleNav() {
    if (navButton[0].classList.contains("active")) return navButton[0].classList.remove("active");
    navButton[0].classList.add("active");
}

// Event Listeners

// Description:
// - Toggles between light mode and dark mode
function ToggleDisplayMode() {
    let isDarkModeAlready = document.querySelector("body").getAttribute("id");

    document.querySelector("body").setAttribute("id", isDarkModeAlready=="dark-mode" ? "" : "dark-mode");
}

window.addEventListener("load", () => {
    // Enable Dark Mode?
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        document.querySelector("body").setAttribute("id", "dark-mode");
    }

    // Load First Page
    if (urlParams.get('page') == null) {
        loadpage("home"); 
        return;
    }
    loadpage(urlParams.get('page'));
});

window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
    document.querySelector("body").setAttribute("id", event.matches ? "dark-mode" : "");
});