const MeetingSchedule = true;

const MonthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

function NumberSuffix(num) {
    let lastDig = num % 10;

    if (!(num > 10 && num < 14)) {
        if (lastDig == 1) return num + "st";
        if (lastDig == 2) return num + "nd";
        if (lastDig == 3) return num + "rd";
    }

    return num + "th";
}

var NextMeeting = new Date();

function loadHomePage() {
    // Load Clock
    let nextMeeting = document.querySelector("#next-meeting");
    let currentDate = new Date();
    let FirstMeetingDate = Date.parse('7 Feb 2024 6:00 GMT-0800');
    let MeetingInterval = Date.parse('15 Jan 1970 0:00 GMT'); // This is the interval for two weeks
    NextMeeting = new Date();
    
    NextMeeting.setTime(FirstMeetingDate);

    while (currentDate.getTime() > NextMeeting.getTime())
        NextMeeting.setTime(NextMeeting.getTime() + MeetingInterval);

    if (MeetingSchedule)
        nextMeeting.innerHTML = `${MonthNames[NextMeeting.getMonth()]} ${NumberSuffix(NextMeeting.getDate())} - ${NextMeeting.getHours() <= 12 ? NextMeeting.getHours() : NextMeeting.getHours() - 12}:${NextMeeting.getMinutes() >= 10 ? NextMeeting.getMinutes() : `0${NextMeeting.getMinutes()}`} ${NextMeeting.getHours() >= 12 ? "AM": "PM"}`;
    else
        nextMeeting.innerHTML = "TBA";

    // Load Latest Announcement

    getAnnouncements(true, () => {
        //loadAnnouncement(0, "#announcement-content", "#announcement")
    });
}
