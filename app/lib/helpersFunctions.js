export let currentIndex = 0;
export let isFirstChange = true; // Variable pour suivre le premier changement de contenu

export function changeContent(backgroundImages, titles, texts) {
    if (!isFirstChange) {
        // Ajoute la classe fade-out au body pour le fondu sortant
        document.body.classList.add("fade-out");

        setTimeout(() => {
            // Change le contenu
            document.body.style.background = `url('${backgroundImages[currentIndex]}')center/cover no-repeat`;
            document.querySelector('.title-accueil').innerText = titles[currentIndex];
            document.querySelector('.text-accueil').innerText = texts[currentIndex];
            currentIndex = (currentIndex + 1) % backgroundImages.length;

            // on remplace la classe fade-out par la classe fade-in pour le fondu entrant
            document.body.classList.replace("fade-out","fade-in");
            
        }, 1000); // Ajoutez un délai pour permettre le fondu sortant avant le changement de contenu
    } else {
        // Change le contenu sans fondu pour la première fois
        document.body.style.background = `url('${backgroundImages[currentIndex]}')center/cover no-repeat`;
        document.querySelector('.title-accueil').innerText = titles[currentIndex];
        document.querySelector('.text-accueil').innerText = texts[currentIndex];
        currentIndex = (currentIndex + 1) % backgroundImages.length;

        isFirstChange = false; // Met à jour la variable isFirstChange après le premier changement de contenu
    }
}
