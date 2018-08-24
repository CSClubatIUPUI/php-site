        </div> <!-- #container -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
        <?php
        $version = get_current_commit_hash();
        $cache = "?cacheVersion=$version";
        if (isset($extra_js)):
        ?>
            <?php foreach ($extra_js as $js_url): ?>
                <script src="<?=$js_url . $cache?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>
        <script src="js/global.js<?=$cache?>"></script>
        <?php
        // $pageName is defined in /inc/header.php
        $script_name = "js/" . strtolower($original_page_name) . ".js";
        if (file_exists(__DIR__ . "/../$script_name")): ?>
            <script src="<?=$script_name . $cache?>"></script>
        <?php endif; ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124577380-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-124577380-1');
        </script>
    </body>
</html>
