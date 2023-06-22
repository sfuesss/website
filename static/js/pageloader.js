const portal = document.getElementById("portal");
var urlParams = new URLSearchParams(window.location.search);
const navButton = document.getElementsByClassName("pages");

callLoadFunctions = {
    "home": loadHomePage,
}

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

function loadstore() {
    window.location.href = "https://stores.coastalreign.com/esss/shop/home";
}

function toggleNav() {
    if (navButton[0].classList.contains("active")) return navButton[0].classList.remove("active");
    navButton[0].classList.add("active");
}

// Event Listeners

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