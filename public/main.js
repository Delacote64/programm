// Slider de la page Intro
//les propriété scrollLeft permettent de déplacer le contenu vers la gauche, ici le -= va à gauche tandis que le += à droite elle permet de modifier la valeur de scrollLeft.

function previous() {
    const widthSlider = document.querySelector('.slider').offsetWidth;
    document.querySelector('.slider_content').scrollLeft -= widthSlider;
}

function next() {
    const widthSlider = document.querySelector('.slider').offsetWidth;
    document.querySelector('.slider_content').scrollLeft += widthSlider;
}

// Page session -> afficher le bon formualire selon le select
document.addEventListener("DOMContentLoaded", function() {
    // Récupérez les éléments div correspondant à chaque type d'exercice
    const musculationDiv = document.querySelector(".togg1");
    const cardioDiv = document.querySelector(".togg2");
    const abdominauxDiv = document.querySelector(".togg3");

    // Ajoutez un gestionnaire d'événements "click" à chaque élément
    musculationDiv.addEventListener("click", function() {
        affiche_ncDIV("Musculation");
    });

    cardioDiv.addEventListener("click", function() {
        affiche_ncDIV("Cardio");
    });

    abdominauxDiv.addEventListener("click", function() {
        affiche_ncDIV("Abdominaux");
    });
});

function affiche_ncDIV(value) {
    let MusculationType = document.getElementById("MusculationType");
    let CardioType = document.getElementById("CardioType");
    let AbdominauxType = document.getElementById("AbdominauxType");

    if (value === "Musculation") {
        MusculationType.style.display = "block";
        CardioType.style.display = "none";
        AbdominauxType.style.display = "none";
    } else if (value === "Cardio") {
        MusculationType.style.display = "none";
        CardioType.style.display = "block";
        AbdominauxType.style.display = "none";
    } else if (value === "Abdominaux") {
        MusculationType.style.display = "none";
        CardioType.style.display = "none";
        AbdominauxType.style.display = "block";
    }
}


function togglePectorauxDiv() {
    var clickPectorauxDiv = document.querySelector('.click-pectoraux');

    if (clickPectorauxDiv.style.display === "none" || clickPectorauxDiv.style.display === "") {
        clickPectorauxDiv.style.display = "block";
    } else {
        clickPectorauxDiv.style.display = "none";
    }
}

function closePectorauxDiv() {
    var clickPectorauxDiv = document.querySelector('.click-pectoraux');
    clickPectorauxDiv.style.display = "none";
}


function toggleAbdominauxDiv() {
    var clickAbdominauxDiv = document.querySelector('.click-abdominaux');

    if (clickAbdominauxDiv.style.display === "none" || clickAbdominauxDiv.style.display === "") {
        clickAbdominauxDiv.style.display = "block";
    } else {
        clickAbdominauxDiv.style.display = "none";
    }
}

function closeAbdominauxDiv() {
    var clickAbdominauxDiv = document.querySelector('.click-abdominaux');
    clickAbdominauxDiv.style.display = "none";
}

function toggleEpauleDiv() {
    var clickEpauleDiv = document.querySelector('.click-epaule');

    if (clickEpauleDiv.style.display === "none" || clickEpauleDiv.style.display === "") {
        clickEpauleDiv.style.display = "block";
    } else {
        clickEpauleDiv.style.display = "none";
    }
}

function closeEpauleDiv() {
    var clickEpauleDiv = document.querySelector('.click-epaule');
    clickEpauleDiv.style.display = "none";
}

function toggleBicepsDiv() {
    var clickBicepsDiv = document.querySelector('.click-biceps');

    if (clickBicepsDiv.style.display === "none" || clickBicepsDiv.style.display === "") {
        clickBicepsDiv.style.display = "block";
    } else {
        clickBicepsDiv.style.display = "none";
    }
}

function closeBicepsDiv() {
    var clickBicepsDiv = document.querySelector('.click-biceps');
    clickBicepsDiv.style.display = "none";
}

function toggleBicepsBrachialDiv() {
    var clickBicepsBrachialDiv = document.querySelector('.click-biceps-brachial');

    if (clickBicepsBrachialDiv.style.display === "none" || clickBicepsBrachialDiv.style.display === "") {
        clickBicepsBrachialDiv.style.display = "block";
    } else {
        clickBicepsBrachialDiv.style.display = "none";
    }
}

function closeBicepsBrachialDiv() {
var clickBicepsBrachialDiv = document.querySelector('.click-biceps-brachial');
    clickBicepsBrachialDiv.style.display = "none";
}

function toggleQuadricepsDiv() {
    var clickBicepsBrachialsDiv = document.querySelector('.click-quadriceps');

    if (clickBicepsBrachialsDiv.style.display === "none" || clickBicepsBrachialsDiv.style.display === "") {
        clickBicepsBrachialsDiv.style.display = "block";
    } else {
        clickBicepsBrachialsDiv.style.display = "none";
    }
}

function closeQuadricepsDiv() {
    var clickBicepsBrachialsDiv = document.querySelector('.click-quadriceps');
    clickBicepsBrachialsDiv.style.display = "none";
}

function togglePoignetDiv() {
    var clickPoignetDiv = document.querySelector('.click-poignet');

    if (clickPoignetDiv.style.display === "none" || clickPoignetDiv.style.display === "") {
        clickPoignetDiv.style.display = "block";
    } else {
        clickPoignetDiv.style.display = "none";
    }
}

function closePoignetDiv() {
    var clickPoignetDiv = document.querySelector('.click-poignet');
    clickPoignetDiv.style.display = "none";
}

//au clcik des div Muscu, Cardio ou Abdo agrandir la div et la rétraissir au click d'une autre
function toggleSize(element) {
    const toggles = document.querySelectorAll('.type-seance-icon div');

    toggles.forEach(toggle => {
        toggle.classList.remove("active");
    });

    element.classList.add("active");
}
