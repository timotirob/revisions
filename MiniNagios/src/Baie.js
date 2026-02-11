// On importe la dépendance
import { Equipement } from './Equipement.js';

export class Baie {
    // En JS, les propriétés peuvent être déclarées ici (champs publics) ou directement dans le constructeur
    // Le '#' devant un nom de variable le rend PRIVE (Encapsulation stricte)
    #nom;
    #capaciteMaximale;

    constructor(nom, capacitemax = 42) {
        this.#nom = nom;
        this.equipements = []
        this.#capaciteMaximale = capacitemax;


    }

    ajouterEquipement(equipement){
        if (!this.estPleine())
            this.equipements.push(equipement)
        else throw new Error("est pleine");
    }

    estPleine() {
        // TODO : Retourner true si le nombre d'équipements atteint la capacité max
        return this.equipements.length >= this.#capaciteMaximale;
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