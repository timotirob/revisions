export class Validator {
    /**
     * Valide une IP (Regex simplifiée pour l'exemple)
     * @param {string} ip
     * @returns {boolean}
     */
    static isIpValid(ip) {
        const regex = /^(?:[0-9]{1,3}\.){3}[0-9]{1,3}$/;
        return regex.test(ip);
    }

    /**
     * Valide une adresse MAC (Regex simplifiée pour l'exemple)
     * @param {string} mac
     * @returns {boolean}
     */
    static isMacValid(mac) {
        // Format AA:BB:CC:DD:EE:FF
        const regex = /^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/;
        return regex.test(mac);
    }

    static isNomValid (nom) {
        const regex = /^\w+/
        return regex.test(nom)
    }

    /**
     * Valide qu'un nombre de ports est compris entre 4 et 48
     * @param {int} nombreDePorts
     * @returns {boolean}
     */
    static isNbPortsValid(nombreDePorts) {
        return (nombreDePorts >= 4 && nombreDePorts <=48) ? true : false ;
    }
}