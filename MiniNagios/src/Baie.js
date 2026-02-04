// On importe la dépendance
import { Equipement } from './Equipement.js';

export class Baie {
    // En JS, les propriétés peuvent être déclarées ici (champs publics) ou directement dans le constructeur
    // Le '#' devant un nom de variable le rend PRIVE (Encapsulation stricte)
    #nom;

    constructor(nom) {
        this.#nom = nom;
        this.equipements = []
    }

    ajouterEquipement(equipement){
        this.equipements.push(equipement)
    }

    toutAllumer(){
        this.equipements.forEach((equipement) => {
            //console.log(equipement.afficherStatut())
            equipement.carte.plug()
        })
    }

    listerContenu() {
        let contenu = ""
        this.equipements.forEach((equipement) => {
            contenu += equipement.afficherStatut() + '\n'
            //console.log(equipement.afficherStatut())
        })
        return contenu
    }
}