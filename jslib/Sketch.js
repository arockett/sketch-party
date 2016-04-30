/**
 * Created by Aaron Beckett on 4/24/2016.
 */
function Sketch(sel) {
    var that = this;

    this.sel = sel;

    var form = $(sel);
    var app = $(sel + " #app #canvasDiv");

    $(sel + " #save").click(function(event) {
        event.preventDefault();

        var sketch_title = form.find("#title")[0].value;
        var sketch_url = app.find("#canvas")[0].toDataURL();

        $.ajax({
            url: "post/sketch.php",
            data: {
                title: sketch_title,
                sketch: sketch_url
            },
            method: "POST",
            success: function(data) {
                var json = parse_json(data);
                if(json.ok) {
                    // Successfully saved sketch
                    that.message("<p>Sketch saved</p>");
                    window.setTimeout(function() {
                        window.location.assign("./");
                    }, 1500);
                } else {
                    // Failed to save the sketch
                    that.message("<p>" + json.message + "</p>");
                }
            },
            error: function(xhr, status, error) {
                // An error!
                that.message("<p>Error: " + error + "</p>");
            }
        });
    });

    $(sel + " #discard").click(function(event) {
        event.preventDefault();
        window.location.assign("./");
    });
}

Sketch.prototype.message = function(msg) {
    $(this.sel + " .message").html(msg);
        $(this.sel + " .message").show()
            .delay(2000)
            .fadeOut(1000);
}