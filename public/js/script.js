const navbarToggle = document.querySelector('.navbar-toggle');
const navbarMenu = document.querySelector('nav ul');

navbarToggle.addEventListener('click', () => {
    navbarMenu.classList.toggle('active');
    navbarToggle.classList.toggle('active');
});

/* -------------------- Carousel Avis -------------------- */
// Variables globales
let compteur = 0 // Compteur qui permettra de savoir sur quelle slide nous sommes
let timer, elements, slides, slideWidth

window.onload = () => {
    // On récupère le conteneur principal du diaporama
    const diapo = document.querySelector(".diapo")

    // On récupère le conteneur de tous les éléments
    elements = document.querySelector(".elements")

    // On récupère un tableau contenant la liste des diapos
    slides = Array.from(elements.children)

    // On calcule la largeur visible du diaporama
    slideWidth = diapo.getBoundingClientRect().width

    // On récupère les deux flèches
    let next = document.querySelector("#nav-droite")
    let prev = document.querySelector("#nav-gauche")

    // On met en place les écouteurs d'évènements sur les flèches
    next.addEventListener("click", slideNext)
    prev.addEventListener("click", slidePrev)

    // Automatiser le diaporama
    timer = setInterval(slideNext, 4000)

    // Gérer le survol de la souris
    diapo.addEventListener("mouseover", stopTimer)
    diapo.addEventListener("mouseout", startTimer)

    // Mise en oeuvre du "responsive"
    window.addEventListener("resize", () => {
        slideWidth = diapo.getBoundingClientRect().width
        slideNext()
    })
}
/**
 * Cette fonction fait défiler le diaporama vers la droite
 */
function slideNext(){
    // On incrémente le compteur
    compteur++

    // Si on dépasse la fin du diaporama, on "rembobine"
    if(compteur == slides.length){
        compteur = 0
    }

    // On calcule la valeur du décalage
    let decal = -slideWidth * compteur
    elements.style.transform = `translateX(${decal}px)`
}

/**
 * Cette fonction fait défiler le diaporama vers la gauche
 */
function slidePrev(){
    // On décrémente le compteur
    compteur--

    // Si on dépasse le début du diaporama, on repart à la fin
    if(compteur < 0){
        compteur = slides.length - 1
    }

    // On calcule la valeur du décalage
    let decal = -slideWidth * compteur
    elements.style.transform = `translateX(${decal}px)`
}

/**
 * On stoppe le défilement
 */
function stopTimer(){
    clearInterval(timer)
}

/**
 * On redémarre le défilement
 */
function startTimer(){
    timer = setInterval(slideNext, 4000)
}

/*-------------------------------------------------*/

/*-----------------------Page accessibilité - Filtre de la Map-----------------------*/

const FilterToggle = document.querySelector('.FilterIcon');
const FilterMenu = document.querySelector('.FilterMap');
const CloseFilter = document.querySelector('.CloseFilter');

FilterToggle.addEventListener('click', () => {
    FilterMenu.style.display = 'flex';
    FilterToggle.style.display = 'none';
});
CloseFilter.addEventListener('click', () => {
    FilterToggle.style.display = 'block';
    FilterMenu.style.display = 'none';
});


/*-----------------------Page accessibilité - test - endroit sur la Map-----------------------*/

const LocationToggle = document.querySelector('.LocationBtn');
const LocationMenu = document.querySelector('.Location');

LocationToggle.addEventListener('click', () => {
    LocationMenu.classList.toggle('activeLocation');
});

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
