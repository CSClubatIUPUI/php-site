var calendar, events;

function onCalendarNavigate() {
    calendar.navigate($(this).data("calendar-nav"));
}

function onCalendarViewLoad(view) {
    $("#label-month").text(this.getTitle());
}

function onEventOpen(rawID) {
    var id = rawID - 1;
    if (!events[id]) {
        console.log(id);
        return;
    }
    var startDate = new Date(Number(events[id].start));
    var endDate = new Date(Number(events[id].end));
    var datetimeFormat = "YYYY-MM-DD HH:mm:ss";
    $(".modal").modal("hide");
    $("#modal-event-location").html(events[id].location.replace(/\n/g, "<br />"));
    $("#modal-event-description").html(events[id].description.replace(/\n/g, "<br />"));
    $("#modal-event-start").text(startDate.toLocaleString());
    $("#modal-event-end").text(endDate.toLocaleString());

    var $calendar = $("#modal-event-calendar").find(".atc_event");
    $calendar.find(".atc_date_start").html(moment(startDate).format(datetimeFormat));
    $calendar.find(".atc_date_end").html(moment(endDate).format(datetimeFormat));
    $calendar.find(".atc_title").html(events[id].title);
    $calendar.find(".atc_description").html(events[id].description);
    $calendar.find(".atc_location").html(events[id].location);
    addtocalendar.load();
    $("#modal-event-info").modal("show");
}

$(document).ready(function() {
    $.get("post/get_schedule.php", {
        "from": 0,
        "to": Number.MAX_SAFE_INTEGER
    }, function(data) {
        events = data.result;
    }, "json");
    $(".modal").modal({
        "show": false
    });
    calendar = $("#calendar").calendar({
        "events_source": "post/get_schedule.php",
        "tmpl_path": "templates/calendar/",
        "tmpl_cache": false,
        "view": "month",
        "format12": true,
        "time_start": "09:00",
        "merge_holidays": true,
        "onAfterViewLoad": onCalendarViewLoad
    });
    $("button[data-calendar-nav]").on("click", onCalendarNavigate);
});
