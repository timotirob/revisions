import { Equipement } from './Equipement.js';

export class Serveur extends Equipement {
    constructor(hostname, ip, mac, os) {
        // 1. Appel au parent obligatoire
        super(hostname, ip, mac);
        // 2. Spécifique au serveur
        this.os = os;
    }

    // REDÉFINITION (Override)
    afficherStatut() {
        // On récupère l'affichage du parent et on complète
        return `${super.afficherStatut()} | OS : ${this.os}`;
    }
}