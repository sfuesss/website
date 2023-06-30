var Announcements = {
    AnnouncementsURL: "https://raw.githubusercontent.com/SatireSage/EngBuddy/main/latest_announcement.json",
    Data: {},
}


async function getAnnouncements(callback) {
    let req = new Request(Announcements.AnnouncementsURL);

    fetch(req).then((res) => {
        return res.json();
    }).then((data) => {
        Announcements.Data = data;
        callback();
    });
}

function loadAnnouncement(i, body, header) {
    document.querySelector(body).innerHTML = Announcements.Data[i].content;
}