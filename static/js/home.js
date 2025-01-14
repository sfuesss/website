function loadHomePage() {
  // Load Clock
  let nextMeeting = document.querySelector("#next-meeting");
    
  let req = new Request("/REST/getNextMeeting")
  fetch(req).then((res) => {
    return res.text();
  }).then((data) => {
    nextMeeting.innerHTML = data;
  });

  // Load Latest Announcement

  getAnnouncements(true, () => {
    //loadAnnouncement(0, "#announcement-content", "#announcement")
  });
}
