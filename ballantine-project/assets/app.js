import { rank } from "./stage_rank/rank";

// JAVASCRIPT

// Variables / paramètres de fonctions
// Todo si possibles éviter les doublons de noms de variables et nommer différemment les paramètres des functions et les attributs associés pour bien voir ce qui fait référence à un paramètre et une variable

// Objets
// Todo si besoin stocker les clefs dans des constantes, ex : const clef = 'firstName', hero[clef] = beaulieu

// Conditions
// Todo si besoin stocker les conditions dans des constantes : const condition = pays === 'FR' && age >= 18

// this : fait référence à l'objet dans lequel il est contenu ?

// fonctions
// Todo si besoin fonctions fléchées simples sans return - ex : const somme = (a, b) => a + b;
// Todo si besoin fonctions en callback dans d'autres fonctions. passer la fonction en paramètre d'une autre fonction (sans les parenthèses)
// Todo si besoin cumuler le passage de méthodes sur une variable quand c'est possible et passer à la ligne avant chaque point pour plus de clarté



const app = {
  init: () => {
    rank.getRank();
  },
};
document.addEventListener("DOMContentLoaded", app.init);
