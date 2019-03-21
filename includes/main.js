//Elementen ophalen.
let keuzeInput = document.getElementById( "keuze" ) ;
let maaltijdReserverenInput = document.getElementById( "maaltijdReserveren" ) ;
let tafelDropdown = document.getElementById( "tafel" );
let afhalenDropdown = document.getElementById( "afhalen" );

//eventlisteners
keuzeInput.addEventListener( "change" , dropDown1) ;
maaltijdReserverenInput.addEventListener( "change", dropDown2) ;

//functie om velden te laten zien op basis van de eerste select.
function dropDown1() {
    let geselecteerdeKeuze = keuzeInput.selectedIndex ;
    switch (geselecteerdeKeuze) {
        case 0:
            tafelDropdown.style.display = "none" ;
            afhalenDropdown.style.display = "none" ;
            break ;
        case 1:
            tafelDropdown.style.display = "block" ;
            afhalenDropdown.style.display = "none" ;
            break ;
        case 2:
            tafelDropdown.style.display = "none" ;
            afhalenDropdown.style.display = "block";
    }
}

//functie om de maaltijd optie te laten zien als de tafelDropdown getoond is.
function dropDown2() {
    let  currentOp = maaltijdReserverenInput.selectedIndex ;
    switch (currentOp) {
        case 1:
            afhalenDropdown.style.display = "block" ;
            break ;
        case 2:
            afhalenDropdown.style.display = "none" ;
    }
}