/**
 * Created by Aaron Beckett on 4/30/2016.
 */
function SketchFinder(sel) {
    var that = this;

    var sketches = $(sel + ' .sketch');

    refreshSketches();
    $(sel + ' #refresh').click(function(event) {
        event.preventDefault();
        refreshSketches();
    });

    function refreshSketches() {
        $.ajax({
            url: "post/home.php",
            data: {refresh_sketches: true},
            method: "POST",
            success: function(data) {
                var json = parse_json(data);
                if(json.ok) {
                    for(var i=0; i<json.sketches.length; i++) {
                        setSketch($(sketches[i]), json.sketches[i]);
                    }
                } else {
                    // Failed to load the new sketches
                    message(sel, json.message);
                }
            },
            error: function(xhr, status, error) {
                message(sel, 'Error: ' + error);
            }
        });
    }

    function setSketch(div, sketch) {
        $(div).find(".title").text(sketch.title);
        $(div).find("img").attr("src", sketch.path);
    }
}