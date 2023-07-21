function previous() {
    const widthSlider = document.querySelector('.slider').offsetWidth;
    document.querySelector('.slider_content').scrollLeft -= widthSlider;
}

function next() {
    const widthSlider = document.querySelector('.slider').offsetWidth;
    document.querySelector('.slider_content').scrollLeft += widthSlider;
}

var sidenav = document.getElementById("mySidenav");
var openBtn = document.getElementById("openBtn");
var closeBtn = document.getElementById("closeBtn");

openBtn.onclick = openNav;
closeBtn.onclick = closeNav;

$(document).ready(function() {
  // Fonction pour cacher tous les champs de cellule
  function cacherChampsCellule() {
      $('.cellule-fields').hide();
  }

  // Cacher tous les champs de cellule sauf ceux de la cellule 1 au chargement de la page
  cacherChampsCellule();
  $('.cellule1-fields').show(); // Afficher les champs de la cellule 1 par défaut

  // Cacher ou afficher les champs de cellule en fonction du choix sélectionné dans le champ select
  $('#type-select').change(function() {
      // Cacher tous les champs de cellule
      cacherChampsCellule();

      // Récupérer la valeur sélectionnée dans le champ select
      var selectedOption = $(this).val();

      // Afficher les champs de cellule correspondants à l'option sélectionnée
      $('.cellule' + selectedOption + '-fields').show();
  });
});