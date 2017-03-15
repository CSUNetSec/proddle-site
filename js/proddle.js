var COLOR = {
    BLUE: 0,
    GREEN: 1,
    RED: 2,
};

function addHeaderColumns(table, headerColumns) {
    var thead = document.createElement('thead');
    table.appendChild(thead);
    var tr = thead.insertRow();
    for (var i=0; i<headerColumns.length; i++) {
        tr.insertCell().appendChild(document.createTextNode(headerColumns[i]));
    }
}

function raiseAlert(node, content) {
    alert(content);
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

function addMarker(name, ipAddress, latitude, longitude, color, markerInfo, markers) {
    //check if name is already in marker info
    if (markerInfo.has(name)) {
        var information = markerInfo.get(name);

        //check if coordinates are already in information
        for (var [coordinates, ipAddresses] of information) {
            if (coordinates.latitude == latitude && coordinates.longitude == longitude) {

                //check if ip address is already in store
                for (var i=0; i<ipAddresses.length; i++) {
                    if (ipAddresses[i] == ipAddress) {
                        return;
                    }
                }

                ipAddresses.push(ipAddress);
                return;
            }
        }

        var ipAddresses = [];
        ipAddresses.push(ipAddress);
        information.set({'latitude':latitude,'longitude':longitude,'color':color}, ipAddresses);
    } else {
        var ipAddresses = [];
        ipAddresses.push(ipAddress);
        var information = new Map();
        information.set({'latitude':latitude,'longitude':longitude,'color':color}, ipAddresses);
        markerInfo.set(name, information);
    }
}

function plotMarkers(markerInfo, markers) {
    for (var [name, information] of markerInfo) {
        for (var [coordinates, ipAddresses] of information) {
            var image = '../images/';
            switch (coordinates.color) {
                case COLOR.BLUE:
                    image += 'blue';
                    break;
                case COLOR.GREEN:
                    image += 'green';
                    break;
                case COLOR.RED:
                    image += 'red';
                    break;
            }
            image += '-icons/letter_' + name.toLowerCase()[0] + '.png';

            //create marker
            var marker = new google.maps.Marker({
                position: {lat: coordinates.latitude, lng: coordinates.longitude},
                //label: name.toUpperCase()[0],
                map: map,
                icon: image,
                clickable: true
            });

            addListener(marker, name, coordinates, ipAddresses);
            markers.push(marker);
        }
    }
}

function addListener(marker, name, coordinates, ipAddresses) {
    google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent('<div id=content>' +
            '<strong>Name: ' + name + '</strong>' +
            '<br>Coordinates: (' + coordinates.latitude + ', ' + coordinates.longitude + ')' +
            '<br>Ip Address: ' + ipAddresses +
            '</div>');
        infoWindow.open(map, marker);
    });
}
