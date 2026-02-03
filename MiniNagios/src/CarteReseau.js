export class CarteReseau {
    constructor(ip, mac) {
        this.ip = ip;
        this.mac = mac;
        this.isConnected = false; // Par défaut débranché
    }

    plug() {
        this.isConnected = true;
    }

    unplug() {
        this.isConnected = false;
    }

    // Méthode utilitaire pour l'affichage
    toString() {
        // Codes ANSI pour les couleurs
        const VERT = '\x1b[32m';  // Code pour texte vert
        const ROUGE = '\x1b[31m'; // Code pour texte rouge
        const RESET = '\x1b[0m';  // Code pour annuler la couleur

        // On utilise ● (un simple point) mais on le colorie
        const statut = this.isConnected
            ? `${VERT}● Connecté${RESET}`
            : `${ROUGE}● Débranché${RESET}`;

        return `[IP: ${this.ip} | MAC: ${this.mac}] ${statut}`;
    }
}