var Announcements = {
    AnnouncementsURL: "https://raw.githubusercontent.com/SatireSage/EngBuddy/main/latest_announcement.json",
    Data: [],
    AnnouncementCheck: /@everyone/,
    currentAnnouncement: 0,
}


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

function loadAnnouncement(i, body, image) {
    document.querySelector(body).innerHTML = marked.parse(Announcements.Data[i].content);
    document.querySelector(image).src = Announcements.Data[i].images[0] != null ? Announcements.Data[i].images[0] : "img/Announcement.png";
}

function NewsPageInit() {
    Announcements.currentAnnouncement = 0;
    getAnnouncements(false, () => {
        loadAnnouncement(Announcements.currentAnnouncement, "#announcement", "#announcement-image");
    });
}

function ChangeAnnouncement(di) {
    Announcements.currentAnnouncement += di;
    getAnnouncements(false, () => {
        loadAnnouncement(Announcements.currentAnnouncement, "#announcement", "#announcement-image");
    });
}