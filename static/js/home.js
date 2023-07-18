const MonthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

function NumberSuffix(num) {
    let lastDig = num % 10;

    if (lastDig == 1) return "st";
    if (lastDig == 2) return "nd";
    if (lastDig == 3) return "rd";

    return "th";
}

function loadHomePage() {
    // Load Clock
    let nextMeeting = document.querySelector("#next-meeting");
    let currentDate = new Date();
    let FirstMeetingDate = Date.parse('11 July 2023 12:30 GMT-0700');
    let MeetingInterval = Date.parse('15 Jan 1970 0:00 GMT');
    let NextMeeting = new Date();
    
    NextMeeting.setTime(FirstMeetingDate + MeetingInterval);

    while (currentDate.getTime() > NextMeeting.getTime())
        NextMeeting.setTime(NextMeeting.getTime() + MeetingInterval);

    nextMeeting.innerHTML = `${MonthNames[NextMeeting.getMonth()]} ${NextMeeting.getDate()}${NumberSuffix(NextMeeting.getDate())} - ${NextMeeting.getHours() <= 12 ? NextMeeting.getHours() : NextMeeting.getHours() - 12}:${NextMeeting.getMinutes() >= 10 ? NextMeeting.getMinutes() : `0${NextMeeting.getMinutes()} ${NextMeeting.getHours() < 12 ? "AM": "PM"}`}`;

    // Load Latest Announcement

    getAnnouncements(true, () => {
        loadAnnouncement(0, "#announcement-content", "#announcement")
    });
}