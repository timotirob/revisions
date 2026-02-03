import { Equipement } from './Equipement.js';

export class Routeur extends Equipement {
    constructor(hostname, ip, mac, nbPorts) {
        super(hostname, ip, mac);
        this.nbPorts = nbPorts;
    }

    afficherStatut() {
        return `${super.afficherStatut()} | Ports : ${this.nbPorts}`;
    }
}