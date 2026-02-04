import { Serveur } from './src/Serveur.js';
import { Routeur } from './src/Routeur.js';
import { Baie } from './src/Baie.js';


// 1. Création des équipements (initialement débranchés)
const srvWeb = new Serveur("SRV-WEB", "192.168.1.10", "AA:BB:CC:00:01", "Debian 12");
const srvBdd = new Serveur("SRV-DB", "192.168.1.20", "AA:BB:CC:00:02", "Ubuntu 24");
const switchCore = new Routeur("SW-CORE", "192.168.1.254", "AA:BB:CC:DD:EE", 48);
const unebaie = new  Baie("SR-COCO");


// 4. Test avant allumage
console.log("\n--- État Initial ---");
console.log(srvWeb.afficherStatut()); // Doit afficher "🔴 Débranché"

// 4. Test avant allumage
console.log("\n--- État Initial Routeur---");
console.log(switchCore.afficherStatut()); // Doit afficher "🔴 Débranché"

unebaie.ajouterEquipement(srvBdd);
unebaie.ajouterEquipement(srvWeb);
unebaie.ajouterEquipement(switchCore);
unebaie.toutAllumer();

console.log( unebaie.listerContenu() );