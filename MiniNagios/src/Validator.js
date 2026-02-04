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

    static isMacValid(mac) {
        // Format AA:BB:CC:DD:EE:FF
        const regex = /^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/;
        return regex.test(mac);
    }
}