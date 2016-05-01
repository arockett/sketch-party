/**
 * Created by Aaron Beckett on 4/30/2016.
 */
function QuoteFinder(sel) {
    var that = this;

    var quotes = $(sel + ' .quote-block');

    refreshQuotes();
    $(sel + ' #refresh').click(function(event) {
        event.preventDefault();
        refreshQuotes();
    });

    function refreshQuotes() {
        $.ajax({
            url: "post/home.php",
            data: {refresh_quotes: true},
            method: "POST",
            success: function(data) {
                var json = parse_json(data);
                if(json.ok) {
                    for(var i=0; i<json.quotes.length; i++) {
                        setQuote($(quotes[i]), json.quotes[i]);
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

    function setQuote(div, quote) {
        $(div).find(".quote").text(quote.quote);
        $(div).find(".source").text(quote.source);
        $(div).hide().css('visibility', 'visible').fadeIn(1000);
    }
}