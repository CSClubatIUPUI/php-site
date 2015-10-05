var data, term;

function onTerminalToggle() {
	var text = this.getAttribute("terminal-text");
	if (text) {
		term.echo(text);
	} else {
		term.exec(this.getAttribute("id"));
	}
}

handlers = {
	"add-email": function(term, args) {
		// term.echo("The mailing list function is currently unavailable. Go to https://mailman.cs.iupui.edu/mailman/listinfo/csclub to sign up.");
		if (args.length === 0) {
			term.echo("Usage: add-email <email> [name]");
			return;
		}
		term.pause();
		var email = args.splice(0, 1);
		$.post("mailinglist.php", {
			"name": args.join(" "),
			"email": email
		}, function(code) {
			console.log(code);
			term.resume();
		});
	}, "get-meetings": function(term, args) {
		for (var i in data.meetings) {
			var m = data.meetings[i];
			term.echo(m.date + " @ " + m.time + ", " + m.location);
		}
	}, "get-members": function(term, args) {
		var lead = 0;
		var foll = 0;
		for (var ix in data.members) {
			var len = data.members[ix].position.length;
			if (len > lead) {
				lead = len;
			}
			len = data.members[ix].name.length;
			if (len > foll) {
				foll = len;
			}
		}
		lead += 3;
		foll += 2;
		for (var i in data.members) {
			var m = data.members[i];
			pos = m.position + (" ".repeat(lead - m.position.length));
			name = m.name + (" ".repeat(foll - m.name.length));
			term.echo(pos + name + m.email);
		}
	}, "help": function(term, args) {
		for (var i in data.help) {
			term.echo(i + ": " + data.help[i]);
		}
	}, "request": function(term, args) {
		if (args.length === 0) {
			term.echo("Usage: request <text>");
			return;
		}
		term.echo("Sending request...");
		term.pause();
		$.post("add-request.php", {
			text: args.join(" ")
		}, function(data) {
			term.echo("Request sent. The officers will decide whether to implement it or not.");
			term.resume();
		});
	}, "view-requests": function(term, args) {
		term.echo("Warning: This command requires an officer login!");
		term.echo("Attempting to fetch requests.");
		term.pause();
		$.ajax({
			url: "requests.json?cache=" + Math.random(),
			success: function(data) {
				if (data.length == 0) {
					term.echo("No requests were found.");
				} else {
					for (var i in data) {
						term.echo(i + ") " + data[i]); // TODO: Modify once more data is added.
					}
				}
				term.resume();
			}, error: function() {
				term.echo("Unauthorized access.");
				term.resume();
			}
		});
	}, "clear-requests": function(term, args) {
		term.echo("Warning: This command requires an officer login!");
		term.pause();
		$.ajax({
			url: "clear-requests.php",
			success: function(data) {
				term.echo("Cleared all requests.");
				term.resume();
			}, error: function() {
				term.echo("Unauthorized access.");
				term.resume();
			}
		});
	}, "go-chat": function(term, args) {
		window.open("chat");
	}
};

window.addEventListener("load", function() {
	term = $("#terminal").terminal(function(command, term) {
		var args = command.split(" ");
		var cmd = args.splice(0, 1).toString().toLowerCase();
		var x = handlers[cmd];
		if (x) {
			x(term, args);
		}
	}, {
		greetings: null
	});
	var btns = document.getElementsByClassName("terminal-toggle");
	for (var i in btns) {
		btns[i].onclick = onTerminalToggle;
	}
	$.getJSON("data.json?cache=" + Math.random(), function(dta) {
		data = dta;
	});
});
