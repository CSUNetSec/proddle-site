function addHeaderColumns(table, headerColumns) {
    var tr = table.insertRow();
    for (var i=0; i<headerColumns.length; i++) {
        var th = document.createElement('th');
        th.appendChild(document.createTextNode(headerColumns[i]));
        tr.appendChild(th);
    }
}

function formatDate(date) {
    return date.getUTCFullYear() + 
        '.' + (date.getUTCMonth() < 9 ? '0' + (date.getUTCMonth() + 1) : (date.getUTCMonth() + 1)) +
        '.' + (date.getUTCDate() < 10 ? '0' + date.getUTCDate() : date.getUTCDate()) +
        ' ' + (date.getUTCHours() < 10 ? '0' + date.getUTCHours() : date.getUTCHours()) +
        ':' + (date.getUTCMinutes() < 10 ? '0' + date.getUTCMinutes() : date.getUTCMinutes()) +
        ':' + (date.getUTCSeconds() < 10 ? '0' + date.getUTCSeconds() : date.getUTCSeconds()) +
        ' UTC';
}
