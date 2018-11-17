var xhr = new XMLHttpRequest();
xhr.open("GET", "php/fantastic/encode-fantastic.php");
xhr.responseType = "json";

var Reponse = class Reponse {
    constructor(nom_user, text_content, project_title) {
        this.nom_user = nom_user;
        this.text_content = text_content;
        this.project_title = project_title;
        this.remplirProject();
    }

    remplirProject() {
        document.getElementById('projectsdatas').insertAdjacentHTML('beforeend', `<ul class="list-group"><li class="list-group-item data-title">${this.project_title}</li><li class="list-group-item data-content">${this.text_content}</li><li class="list-group-item data-user">${this.nom_user}</li></ul>`)
    }

    /* remplir() {
        document.querySelector('body').insertAdjacentHTML('beforeend', `<section class="produitForm"><p>${this.nom_user}</p><p>${this.text_content}</p><p>${this.project_title}</p><p>${this.this.nom_produit}</p></section>`)
    } */
}   

xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        content = this.response;
        console.log(this.response);
        for (let content of this.response) {
            new Reponse(content.nom_user, content.text_content, content.project_title);
        }
    }
};
xhr.send();


/* function redirect() {
    window.location = "fantastic.html";
} */