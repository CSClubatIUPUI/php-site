$(function() {
    $(".modal-href").each(function(i, href) {
        var $href = $(href);
        $href.click(function() {
            var target = this.getAttribute("data-target");
            $("#modal-" + target).modal();
        });
    });
});
