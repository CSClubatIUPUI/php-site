<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#home">Home</a></li>
            <li><a data-target="meetings" class="modal-href" href="#">Meetings</a></li>
            <li><a data-target="notifications" class="modal-href" href="#">Notifications</a></li>
            <li><a data-target="officers" class="modal-href" href="#">Officers</a></li>
        </ul>
    </div>
</nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="js/table.js"></script>
<?php
require_once("${WORKDIR}inc/modal.php");
$data = json_decode(file_get_contents("${WORKDIR}inc/modals.json"));
foreach ($data as $k => $v) {
    echo(buildModal($v));
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="js/navbar.js"></script>
