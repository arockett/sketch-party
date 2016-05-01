/**
 * Created by Aaron Beckett on 5/1/2016.
 */
function Quote(sel) {

    var form = $(sel);

    $(sel + " #add").click(function(event) {
        event.preventDefault();

        var quote_source = form.find("#source").val().trim();
        var quote_text = form.find("#quote").val().trim();

        $.ajax({
            url: "post/quote.php",
            data: {source: quote_source, quote: quote_text},
            method: "POST",
            success: function(data) {
                var json = parse_json(data);
                if(json.ok) {
                    // Successfully saved sketch
                    message(sel, "<p>Quote added</p>");
                    window.setTimeout(function() {
                        window.location.assign("./");
                    }, 1500);
                } else {
                    // Failed to save the sketch
                    message(sel, "<p>" + json.message + "</p>");
                }
            },
            error: function(xhr, status, error) {
                // An error!
                message(sel, "<p>Error: " + error + "</p>");
            }
        });
    });

    $(sel + " #discard").click(function(event) {
        event.preventDefault();
        window.location.assign("./");
    });
}