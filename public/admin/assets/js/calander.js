$(document).ready(function() {
    $("#calendar-doctor").simpleCalendar({
        fixedStartDay: 0,
        disableEmptyDetails: true,
        events: [{
            startDate: new Date(new Date().setHours(new Date().getHours() + 24)).toDateString(),
            endDate: new Date(new Date().setHours(new Date().getHours() + 25)).toISOString(),
            summary: 'Conference with teachers'
        }, {
            startDate: new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 12, 0)).toISOString(),
            endDate: new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 11)).getTime(),
            summary: 'Old classes'
        }, {
            startDate: new Date(new Date().setHours(new Date().getHours() - 48)).toISOString(),
            endDate: new Date(new Date().setHours(new Date().getHours() - 24)).getTime(),
            summary: 'Old Lessons'
        }],
    });
});
