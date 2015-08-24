$(document).ready(function(){
    var map, marker;

    (function drawmap() {

        $.getJSON("points.php", function(data) { 

            var coordinates = data.map(function(e) {
                return new google.maps.LatLng(e.lat, e.lon);
            });

            var path = new google.maps.Polyline({
                path: coordinates,
                strokeColor: "#ff3195", //hot pink!!!
                strokeOpacity: 1.0,
                strokeWeight: 2,
            });

            var mapOptions = {
                center: coordinates[coordinates.length - 1],
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

            path.setMap(map);

            // var emarker = new google.maps.Marker({
            //     position: new google.maps.LatLng(48.135281,11.56758),
            //     map: map,
            //     animation: google.maps.Animation.DROP,
            //     title: "The final destination"
            // });
            var date = new Date(data[data.length-1].time * 1000.0);
            var lastupdate = document.getElementById("lastupdate");
            lastupdate.innerHTML = "Last update: " + date;

	    $.getJSON("tumblr-callback.php", function(data) {
		
		var markers = data.map(function(e) {
		    return  new google.maps.Marker({
			position: new google.maps.LatLng(e.lat, e.lon),
			map: map,
			animation: google.maps.Animation.DROP,
			title: e.title,
			url: e.url,
		    });
		});

		markers.forEach(function(e) {
		    google.maps.event.addListener(e, 'click', function() {
			window.location.href = this.url;
		    });
		});

	    });

        });

    })();

    
});
