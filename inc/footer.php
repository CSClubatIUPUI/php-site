        </div> <!-- #container -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
        <script src="js/global.js"></script>
        <?php
        // $pageName is defined in /inc/header.php
        $script_name = "js/" . strtolower($page_name) . ".js";
        if (file_exists(__DIR__ . "/../$script_name")): ?>
            <script src="<?=$script_name?>"></script>
        <?php endif; ?>
    </body>
</html>
