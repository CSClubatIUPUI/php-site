function loadTable(postArgs, $tbody) {
    $.post("post.php", postArgs, function(data) {
        if (typeof(data) == "string") {
            console.log("Error fetching data.");
            $tbody.html(data);
            return;
        }
        $tbody.html("");
        for (var i in data) {
            var $row = $(document.createElement("tr"));
            for (var k in data[i]) {
                $row.append("<td>" + data[i][k] + "</td>");
            }
            $tbody.append($row);
        }
        console.log("Loaded " + postArgs.action + ".");
    });
}
