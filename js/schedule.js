var calendar, events;

function onCalendarNavigate() {
    calendar.navigate($(this).data("calendar-nav"));
}

function onCalendarViewLoad(view) {
    $("#label-month").text(this.getTitle());
}

function onEventOpen(id) {
    if (!events[id]) {
        console.log(id);
        return;
    }
    $(".modal").modal("hide");
    $("#modal-event-location").html(events[id].location.replace(/\n/g, "<br />"));
    $("#modal-event-description").html(events[id].description.replace(/\n/g, "<br />"));
    $("#modal-event-start").text(getDateString(Number(events[id].start)));
    $("#modal-event-end").text(getDateString(Number(events[id].end)));
    $("#modal-event-info").modal("show");
}

$(document).ready(function() {
    $.get("post/get/schedule.php", {
        "from": 0,
        "to": Number.MAX_SAFE_INTEGER
    }, function(data) {
        events = data.result;
    }, "json");
    $(".modal").modal({
        "show": false
    });
    calendar = $("#calendar").calendar({
        "events_source": "post/get/schedule.php",
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
