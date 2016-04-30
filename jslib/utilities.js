/**
 * Created by Aaron Beckett on 4/22/2016.
 */
function parse_json(json) {
    try {
        var data = $.parseJSON(json);
    } catch(err) {
        throw "JSON parse error: " + json;
    }

    return data;
}

function message(sel, msg) {
    $(sel + " #message").html(msg);
    $(sel + " #message").show()
        .delat(2000)
        .fadeOut(1000);
}