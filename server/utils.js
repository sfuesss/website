"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.NumberSuffix = NumberSuffix;
exports.GetMeetingDate = GetMeetingDate;
const ServerConfig = require("./../server_conf.json");
var CurrentMeetingDate = Date.parse(ServerConfig.Meeting.Date);
const MeetingInterval = Date.parse('15 Jan 1970 0:00 GMT');
const MonthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
// Returns the number with the suffix attached to it 
function NumberSuffix(num) {
    if (num > 10 && num < 20)
        return num + "th";
    let lastDig = num % 10;
    if (lastDig == 1)
        return num + "st";
    if (lastDig == 2)
        return num + "nd";
    if (lastDig == 3)
        return num + "rd";
    return num + "th";
}
// Returns the Next Meeting Date
// If there is no scheduled meeting time, then it will return TBA
function GetMeetingDate(scheduled = ServerConfig.Meeting.Scheduled) {
    if (!scheduled)
        return "TBA";
    let currentDate = new Date();
    while (currentDate.getTime() > CurrentMeetingDate)
        CurrentMeetingDate = CurrentMeetingDate + MeetingInterval;
    let FormattedDate = new Date(CurrentMeetingDate);
    return `${MonthNames[FormattedDate.getMonth()]} ${NumberSuffix(FormattedDate.getDay())} - ${FormattedDate.getHours() <= 12 ? FormattedDate.getHours() : FormattedDate.getHours() - 12}:${FormattedDate.getMinutes()} ${FormattedDate.getHours() < 12 ? "AM" : "PM"}`;
}
