$(document).ready(function() {
    $(".resource-container").on("click", function() {
        var url = $(this).find(".resource-url").html();
        window.location.replace(url);
    });
});
