<?php
$extra_css = [
    "https://cdn.jsdelivr.net/bootstrap.calendar/0.2.4/css/calendar.min.css",
    "https://addtocalendar.com/atc/1.5/atc-style-blue.css"
];
$extra_js = [
    "https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js",
    "https://cdn.jsdelivr.net/bootstrap.calendar/0.2.4/js/calendar.min.js",
    "http://addtocalendar.com/atc/1.5/atc.min.js",
    "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.min.js"
];
require_once(__DIR__ . "/inc/header.php");
?>
<div class="row">
    <div class="pull-right">
        <div class="btn-group">
            <button class="btn btn-primary" data-calendar-nav="prev"><< Previous</button>
            <button class="btn btn-default" data-calendar-nav="today">This Month</button>
            <button class="btn btn-primary" data-calendar-nav="next">Next >></button>
        </div>
    </div>
    <h3 id="label-month"></h3>
</div>
<hr>
<div class="row">
    <div id="calendar"></div>
</div>
<div id="modal-event-info" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h3>Meeting Information</h3>
            </div>
            <div class="modal-body">
                <h4>Location</h4>
                <span id="modal-event-location"></span>
                <h4>Time</h4>
                Start: <span id="modal-event-start"></span>
                <br />
                End: <span id="modal-event-end"></span>
                <h4>Description</h4>
                <span id="modal-event-description"></span>
                <h4>Add to Calendar</h4>
                <span id="modal-event-calendar" class="addtocalendar atc-style-blue">
                    <var class="atc_event">
                        <var class="atc_date_start"></var>
                        <var class="atc_date_end"></var>
                        <var class="atc_timezone">America/Indiana/Indianapolis</var>
                        <var class="atc_title"></var>
                        <var class="atc_description"></var>
                        <var class="atc_location"></var>
                        <var class="atc_organizer">CS Club @ IUPUI</var>
                        <var class="atc_organizer_email">csclub@iupui.edu</var>
                    </var>
                </span>
            </div>
        </div>
    </div>
</div>
<?php
require_once(__DIR__ . "/inc/footer.php");
?>
