function getQueryName(name) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    if (!(vars && vars.length > 0)) return false;
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] == name) {
            return pair[1];
        }
    }
}