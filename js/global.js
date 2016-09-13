function getDateString(timestamp) {
    var date = new Date(timestamp);
    return date.toLocaleString();
}

$(document).ready(function() {
    $.material.init();
});
