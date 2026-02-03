import { CarteReseau } from './CarteReseau.js';

export class Equipement {
    // Champ privé (Encapsulation forte ES2022)
    #hostname;

    constructor(hostname, ip, mac) {
        this.#hostname = hostname;

        // COMPOSITION : On instancie la carte DANS l'équipement
        this.carte = new CarteReseau(ip, mac);
    }

    // Getter pour accéder au champ privé
    getHostname() {
        return this.#hostname;
    }

    afficherStatut() {
        return `Machine : ${this.#hostname} | ${this.carte.toString()}`;
    }
}