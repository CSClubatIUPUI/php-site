<?php
$WORKDIR = realpath(dirname(__FILE__)) . "/";
?>
<?php require_once("inc/header.php"); ?>
<body>
    <?php require_once("inc/navbar.php"); ?>
    <div class="container">
        <div class="page-header text-center">
            <h1>Computer Science Club</h1>
            <h2>IUPUI</h2>
        </div>
        <div class="row-fluid lead text-center">
            This page is a <span class="strike">good</span> excellent place to find information on the meeting schedule and club officers.
        </div>
        <hr />
        <div class="row-fluid span8 text-center">
            <h3>Chat</h3>
            <p>We now have a chat server! It's still in development, but it's ready to go for now! The source can be found at <a href="https://github.com/Tiin57/iuchat">the webmaster's GitHub</a>.</p>
            <p>Except it's sort of not ready yet.</p>
        </div>
        <hr />
        <div class="row-fluid span8 text-center">
            <h3>Meetings</h3>
            <p>Come to one of our meetings and take part in events like the Hackathon, CS Day, and more!</p>
            <button data-target="meetings" class="btn btn-lg btn-info modal-href">Meetings Schedule</button>
        </div>
        <hr />
        <div class="row-fluid span8 text-center">
            <h3>Notifications</h3>
            <p>You can opt to receive emails from club officers about events and news involving the club.</p>
            <button data-target="notifications" class="btn btn-lg btn-info modal-href">Sign Up</button>
        </div>
        <hr />
        <div class="row-fluid span8 text-center">
            <h3>Officers</h3>
            <p>Information about our club officers and how to contact them.</p>
            <button data-target="officers" class="btn btn-lg btn-info modal-href">View Officers</button>
        </div>
    </div>
</body>
</html>
