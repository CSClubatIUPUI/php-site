<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>IUPUI CS Club</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Alex Hicks <aldahick@iupui.edu>">
    <link href="lib/bootstrap/bootstrap-386-3.3.2.min.css" rel="stylesheet" />
    <link href="lib/bootstrap/bootstrap-386-theme-3.3.2.min.css" rel="stylesheet" />
    <link href="css/terminal.css" rel="stylesheet" />
    <link href="lib/jquery/jquery.terminal.css" rel="stylesheet" />
</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
    <!--<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">-->
    <!--<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">-->
    <!--<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">-->
    <!--<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">-->
    <!--<link rel="shortcut icon" href="ico/favicon.png">-->
    <!-- There are currently no images in /ico/ -->
    <div class="container">
        <section id="welcome-section">
            <div class="page-header container">
                <h1 class="text-center">Computer Science Club</h1>
                <h2 class="text-center">IUPUI</h2>
            </div>
            <p class="lead">
                The IUPUI Computer Science Club web page is the place to find out when and where meetings are held. It also provides information on club positions, elections, and special events.
            </p>
            <div class="row-fluid">
                <div class="span8">
                    <h2>Meeting Times</h2>
                    <p>
                        Come to one of our scheduled meetings that you can find here. Meetings take place during the Spring and Fall academic semesters. Click here to see what events we are at as well.
                    </p>
                    <p>
                        <button id="get-meetings" class="btn btn-large btn-primary terminal-toggle">Meetings Schedule</button>
                    </p>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span8">
                    <h2 style="color: green;">*** NEW ***</h2>
                    <h2>Chat</h2>
                    <p>
                        We now have a chat server! It's still in development, but it's ready to go for now! The source can be found at <a href="https://github.com/Tiin57/iuchat">the webmaster's GitHub</a>.
                    </p>
                    <p>
                        If you have suggestions, bugs or questions, please post them on the issue tracker <a href="https://github.com/Tiin57/iuchat/issues">here</a>. Thank you!
                    </p>
                    <p>
                        <button id="go-chat" class="btn btn-large terminal-toggle">Chat</button>
                    </p>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span8">
                    <h2>Sign Up and Mailing List</h2>
                    <p>
                        Get notification emails about what we are doing, what we are planning in the future, and breaking news in the CS Club.
                    </p>
                    <p>
                        <button id="add-email" class="btn btn-large terminal-toggle" terminal-text="Please use add-email <email> instead of this button.">Email Sign Up</button>
                        </p>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span8">
                        <h2>Club Positions</h2>
                        <p>Information about our club officers and how to contact them. It also will provide information on how to register, nominate or and/or vote during the elections held every semester.</p>
                        <p><button id="get-members" class="btn btn-large terminal-toggle">Club Officers</button></p>
                    </div>
                </div>
            </div>
        </section>
        <section id="terminal-section">
            <div id="terminal" class="terminal"></div>
        </section>
    </div>
    <script src="lib/jquery/jquery-1.11.3.min.js"></script>
    <script src="lib/jquery/jquery.terminal.min.js"></script>
    <script src="lib/bootstrap/bootstrap-386-3.3.2.min.js"></script>
    <!-- <script src="js/terminal.js"></script> -->
</body>

</html>
