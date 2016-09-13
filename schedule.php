<?php
$extra_css = [
    "https://cdn.jsdelivr.net/bootstrap.calendar/0.2.4/css/calendar.min.css"
];
$extra_js = [
    "https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js",
    "https://cdn.jsdelivr.net/bootstrap.calendar/0.2.4/js/calendar.min.js"
];
require_once(__DIR__ . "/inc/header.php");
$db = get_database();
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
            </div>
        </div>
    </div>
</div>
<?php
require_once(__DIR__ . "/inc/footer.php");
?>
