"use strict"
document.addEventListener("DOMContentLoaded", ()=> { 
    if(isLoginPage){
        //on fait apparaitre l'interface de connexion
        document.body.classList.replace("opacity-0","fade-in");

        if(document.querySelector("#forgotPassword")){
            //on ajoute un écouteur d'évènement sur le lien mot de passe oublié
            const forgotLink = document.querySelector("#forgotPassword");
            forgotLink.addEventListener("click",event=>{
                event.preventDefault();
                const href = event.target.getAttribute("href");
                const currentPage = document.querySelector("main");
                currentPage.classList.add("fade-out");
                setTimeout(()=>{
                    fetch(href)
                    .then(response=>response.text())
                    .then(data=>{
                        const tempDiv = document.createElement("div");
                        tempDiv.innerHTML = data;
                        const newContent = tempDiv.querySelector("main").innerHTML;
                        currentPage.innerHTML = newContent;
                        currentPage.classList.replace("fade-out","fade-in");
                        const newTitle = tempDiv.querySelector('#page-title').innerText;
                        document.getElementById('page-title').innerText = newTitle;
                        history.pushState(null, '', href);
                        isLoginPage = false;
                    })
                },1000)
            })
        }
        
        if(document.querySelector("#passwordResetForm")){
            const resetForm = document.querySelector("#passwordResetForm");
            const successChanged ="votre nouveau mot de passe à été mis à jour !";
            resetForm.addEventListener("submit",event=>{
                event.preventDefault();
                const formData = new FormData(event.target);
                
                fetch("/admin/reinitialisation-mot-de-passe",{
                    method: "POST",
                    body: formData
                })
                .then(response=>response.text())
                .then(data=>{
                    
                    const tempDiv = document.createElement("div");
                    tempDiv.innerHTML = data;
                    const newContent = tempDiv.querySelector("main");
                    if(newContent.innerHTML){
                            document.querySelector("#main-loginContent").innerHTML = newContent.innerHTML; 
                            setTimeout(()=>{
                                if(document.querySelector("#errorMessage").innerHTML === successChanged ){
                                    window.location.href = "/admin";
                                }
                            },3000)
                    }
                })
            })
        }

        if(document.querySelector("#formConnexion")){
            //on ajoute un ecouteur d'évènement submit au formulaire et on prévient son comportement par défaut de soumission avec preventDefault()
            document.querySelector("#formConnexion").addEventListener("submit",event=>{
                event.preventDefault();
                // on créer une instance de la class formData qui prend les donnée du formulaire en paramètre
                const formData = new FormData(event.target)
                
                fetch("/admin",{
                    method: "POST",
                    body: formData
                })
                .then(response=>response.text())
                .then(data=>{
                    //on créer une constante tempDiv qui contient une div dans le dom virtuel et on y insert les données retourner par la requête (ici la view approprié)
                    const tempDiv = document.createElement("div");
                    tempDiv.innerHTML = data;
                    //on créer 2 constantes qui vont stockés respectivement le nouveau menu et le nouveau contenu de page
                    const newHeader = tempDiv.querySelector("#dashboard-header");
                    const newContent = tempDiv.querySelector("#main-dashboardContent");
                    //si le nouveau header et contenu existe fait la transition de fondu fade-out on attend 1s avec setTimeout le temps de la transition et on met à jour le contenu de la page, le titre de l'onglet de page et l'url avec history.pushState
                    if(newHeader && newContent){
                        document.body.classList.replace("fade-in","fade-out");
                        setTimeout(()=>{
                            document.getElementById("login-header").innerHTML = newHeader.innerHTML;
                            document.getElementById("main-loginContent").innerHTML = newContent.innerHTML;
                            document.body.classList.replace("fade-out","fade-in");
                            const newTitle = tempDiv.querySelector('#page-title').innerText;
                            document.getElementById('page-title').innerText = newTitle;
                            history.pushState(null,'','/back-office');  
                            window.scrollTo({
                                top:0,
                                behavior:"smooth",
                            })
                            isLoginPage = false;  
                        },1000)
                    }  
                    //sinon si la requête échoue (mot de passe incorrect ou champs non remplis on affiche un message d'erreur au niveau de l'interface de connexion)
                    else{
                        const buttonConnexion = document.querySelector("#btnConnexion");
                        const error = tempDiv.querySelector("#errorMessage");
                        const errorMessage = document.querySelector("#errorMessage");
                        if(error){
                            errorMessage?errorMessage.remove():'';
                            buttonConnexion.insertAdjacentElement('beforebegin',error);
                        }  
                    }
                })
                //gestion des erreurs si la ressources n'est pas trouvée 
                .catch (error=>{
                    if (error.status === 404) {
                        console.error('Ressource non trouvée:', error.message);
                      } else if (error.status === 403) {
                        console.error('Accès refusé:', error.message);
                      } else {
                        console.error('Une erreur s\'est produite:', error);
                      }
                })  
            })    
        }
    }
    else{
        document.body.classList.replace("opacity-0","fade-in");
        const links = document.querySelectorAll("a.nav-link");
        links.forEach(link => {
            link.addEventListener("click",(event)=>{
                event.preventDefault();
                const href = link.getAttribute("href");
                isLoginPage = href === '/admin';
                const currentContent = document.querySelector("main");
                const currentHeader = document.querySelector("header");
                document.body.classList.replace("fade-in","fade-out");
                setTimeout(()=>{
                    fetch(href)
                    .then(response=>response.text())
                    .then(data=>{
                        const tempDiv = document.createElement("div");
                        tempDiv.innerHTML = data;
                        const newContent = tempDiv.querySelector("main").innerHTML;
                        const newHeader = tempDiv.querySelector("header").innerHTML;
                        currentContent.innerHTML = newContent;
                        currentHeader.innerHTML = newHeader;
                        document.body.classList.replace("fade-out","fade-in");
                        const newTitle = tempDiv.querySelector('#page-title').innerText;
                        document.getElementById('page-title').innerText = newTitle;
                        history.pushState(null, '', href);
                    })
                },1000)
                })
            });
    }  
})

