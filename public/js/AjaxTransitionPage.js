import {changeContent} from "../../app/lib/helpersFunctions.js";

let intervalIDhomePage;
const backgroundImages = [
    `${images_url}ModelageAccueil.jpg`,
    `${images_url}epilation1.jpg`,
    `${images_url}soinsDuCorpsAccueil.png`,
    `${images_url}lithotherapie3.jpg`,
    `${images_url}cartomancieAccueil.jpg`
];
const titles = [
    'MODELAGES',
    'EPILATIONS',
    'SOINS DU CORPS',
    'LITHOTHERAPIE',
    'CARTOMANCIE'
];
const texts = [
    'Modelage réaliser avec de l\'huile bio, pour un moment d\'évasion physique et psychique. Idéal pour ceux qui recherche un abandon, une détente, un anti-stress mais aussi pour les sportif afin de récupérer d\'une fatigue musculaire. ',
    'Une épilation en douceur avec la cire au miel. Retrouvez une peau lisse et soyeuse.',
    'De la tête aux pieds découvrez une diversité de soins avec des produits bio, naturel et Français.Pour un instant d\'évasion,revitalisant et de détente.',
    'La lithothérapie ou soin par les pierres permet d\'harmoniser les énergies des chakras.Leurs harmonisation permet de ressentir un sentiment de profond bien être et d\'apaisement.En alignant vos chakras, vous allez équilibrer l\'énergie globale de votre corps en douceur corps',
    'Mettre en lumière nos interrogations, nos blocages, nos peurs à l\'aide des cartes afin de vous guider et d\'illuminer le chemin de votre vie.',
]

document.addEventListener("DOMContentLoaded", function() {
    //au chargement de la page on control si on se trouve sur la page d'accueil et si c'est le cas on masque le footer avec display = none
    if (isHomePage) {
        let footer = document.querySelector('footer');
        footer.style.display = 'none';
        //changer le contenu toute les 10 secondes (titres,background et text)
        changeContent(backgroundImages,titles,texts);
        //on stock le setInterval dans une variable pour pouvoir l'arrêter plus tard au changement de page pour éviter les bugs
        intervalIDhomePage = setInterval(()=>{
            changeContent(backgroundImages,titles,texts);
        },10000); 
        //on ajoute un ecouteur d'évènement au clic sur le bouton > de l'accueil
        let next = document.querySelector("#accueil-suivant");
        next.addEventListener("click",()=>{
            clearInterval(intervalIDhomePage);
            changeContent(backgroundImages,titles,texts);
            intervalIDhomePage = setInterval(()=>{
                changeContent(backgroundImages,titles,texts);
            },10000);
        });

    }
    else{
        document.body.removeAttribute("style");       
    }
    
    //sélection des liens du menu de navigation
    let links = document.querySelectorAll("a.nav-link");
    links.forEach(link => {
        link.addEventListener("click", function(event) {
            event.preventDefault();
            let href = this.getAttribute("href");
            //au clic d'un des liens de navigation on met la variable isHomePage à jour
            isHomePage = href === '/'|| href === '/accueil';
            let currentPage = document.querySelector("main");
            // Ajoute la classe de dissolution à la page actuelle
            currentPage.classList.add("fade-out");
            setTimeout(()=>{
                // Charge la nouvelle page avec AJAX
                fetch(href)
                .then(response => response.text())
                .then(data => {
                    // Créer un nouvel élément div pour stocker temporairement le contenu de la nouvelle page
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = data;
                    // Extrait le contenu de la vue (excluant le header et le footer) pour éviter les doublons
                    const newContent = tempDiv.querySelector('#main-content').innerHTML;

                    // Remplace le contenu de la balise <main> par le contenu de la nouvelle page
                    currentPage.innerHTML = newContent;
                    currentPage.classList.replace("fade-out","fade-in");

                    // Met à jour le titre de l'onglet de page
                    const newTitle = tempDiv.querySelector('#page-title').innerText;
                    document.getElementById('page-title').innerText = newTitle; 
                    
                    // Défiler jusqu'au début de la nouvelle page
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth',
                    });
                    
                    // Mettre à jour l'URL sans recharger la page
                    history.pushState(null, '', href);

                    // Vérifie si vous êtes sur la page d'accueil et masquer le footer si nécessaire et changer le background du body
                    const footer = document.querySelector("footer");
                    const body = document.querySelector("body");
                    if(isHomePage){ 
                        clearInterval(intervalIDhomePage);  
                        footer.style.display = "none";
                        //changer le contenu toute les 10 secondes (titres,background et text)
                        changeContent(backgroundImages,titles,texts);
                        intervalIDhomePage = setInterval(()=>{
                            changeContent(backgroundImages,titles,texts);
                        },10000);

                        //on ajoute un ecouteur d'évènement au clic sur le bouton > de l'accueil
                        const next = document.querySelector("#accueil-suivant");
                        next.addEventListener("click",()=>{
                            clearInterval(intervalIDhomePage);
                            changeContent(backgroundImages,titles,texts);
                            intervalIDhomePage = setInterval(()=>{
                                changeContent(backgroundImages,titles,texts);
                            },10000);
                        });
                    }
                    else{
                        clearInterval(intervalIDhomePage);
                        footer.style.display = "block";
                        document.body.removeAttribute("style");
                    }

                })
                .catch(error => console.error('Erreur lors du chargement de la page :', error));
            },1000);
            
        });
    });
});


