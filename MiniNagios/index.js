import { Serveur } from './src/Serveur.js';


// 1. Création des équipements (initialement débranchés)
const srvWeb = new Serveur("SRV-WEB", "192.168.1.10", "AA:BB:CC:00:01", "Debian 12");
const srvBdd = new Serveur("SRV-DB", "192.168.1.20", "AA:BB:CC:00:02", "Ubuntu 24");



// 4. Test avant allumage
console.log("\n--- État Initial ---");
console.log(srvWeb.afficherStatut()); // Doit afficher "🔴 Débranché"

