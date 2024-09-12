// File: announcements.js
// Description:
// - All functions related to pulling announcements from discord
// - Pulls the announcements from EngBuddy and loads them into the website

var Announcements = {
    AnnouncementsURL: "https://raw.githubusercontent.com/SatireSage/EngBuddy/main/latest_announcement.json",
    Data: [],
    AnnouncementCheck: /@everyone/,
    currentAnnouncement: 0,
}

// Description:
// - Performs an HTTP GET Request from EngBuddy
// - Stores resulting data in Announcements.data
// - If `restrict` is true, it will filter out anncouncements that do not ping users
// - finishes by calling the `callback` function
async function getAnnouncements(restrict, callback) {
    let req = new Request(Announcements.AnnouncementsURL);

    fetch(req).then((res) => {
        return res.json();
    }).then((data) => {
        Announcements.Data = data;
        if (restrict) {
            for (let i = 0; i < Announcements.Data.length; i++) {
                if (!Announcements.AnnouncementCheck.test(Announcements.Data[i].content)) {
                    Announcements.Data.splice(i--, 1);
                    continue;
                }
            }
        }
        callback();
    });
}

// Description:
// - takes announcement at index `i`
// - Formats the content into the `body` tag
// - Places the image in the `image` tag
function loadAnnouncement(i, body, image) {
    document.querySelector(body).innerHTML = marked.parse(Announcements.Data[i].content);
    document.querySelector(image).src = Announcements.Data[i].images[0] != null ? Announcements.Data[i].images[0] : "img/Announcement.png";
}

// Description
// - Initializes the news page with the most recent announcement
function NewsPageInit() {
    Announcements.currentAnnouncement = 0;
    getAnnouncements(false, () => {
        loadAnnouncement(Announcements.currentAnnouncement, "#announcement", "#announcement-image");
    });
}

// Description:
// - Changes the announcement directory
function ChangeAnnouncement(di) {
    Announcements.currentAnnouncement += di;
    getAnnouncements(false, () => {
        loadAnnouncement(Announcements.currentAnnouncement, "#announcement", "#announcement-image");
    });
}