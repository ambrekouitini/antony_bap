"use strict"
const searchInput = document.querySelector(".search_input");
const searchBtn = document.querySelector(".search_btn");

let map, searchManager;

window.onload = function() {
    getMap();
};

function addCircle(center, radius){
    // Create a Circle
    var circle = new Microsoft.Maps.Circle(center, radius, {
        fillColor: new Microsoft.Maps.Color(200, 0, 255, 0),
        strokeColor: new Microsoft.Maps.Color(200, 0, 0, 255),
        strokeThickness: 2
    });
    map.entities.push(circle);
}


function addPoints() {
    // Create a Pushpin for the first point
    var point1 = new Microsoft.Maps.Location(48.7593059, 2.302425);
    var pin1 = new Microsoft.Maps.Pushpin(point1, {
      title: 'Ville',
      subTitle: 'Seattle',
      color: 'red'
    });
    map.entities.push(pin1);
  
    // Create a Pushpin for the second point
    var point2 = new Microsoft.Maps.Location(48.8223979, 2.2757083);
    var pin2 = new Microsoft.Maps.Pushpin(point2, {
      title: 'Rue maison',
      subTitle: 'Issy-Les-Moulineaux',
      color: 'blue'
    });
    map.entities.push(pin2);
  }
  

function getMap(){
    map = new Microsoft.Maps.Map('#map', {
        // You need your key.
    credentials: 'AptZrQ6EyTPTvtnG8P3Hmfcmg_uBwhxKOqArcahqPrmwrT3PS_nrZTMn33Ehnw4R',
    });
    addPoints();
};

function geocodeQuery(query){
    if (!searchManager) {
        Microsoft.Maps.loadModule('Microsoft.Maps.Search', function () {
            searchManager = new Microsoft.Maps.Search.SearchManager(map);
            geocodeQuery(query);
        });
    } else {
        let searchRequest = {
            where: query,
            callback: function (r) {
                if (r && r.results && r.results.length > 0) {
                    var pin = new Microsoft.Maps.Pushpin(r.results[0].location);
                    map.entities.push(pin);

                    map.setView({ bounds: r.results[0].bestView });
                };
            },
            errorCallback: function (e) {
                alert("No results found.");
            }
        };
        searchManager.geocode(searchRequest);
    };
};
