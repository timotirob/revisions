import express from 'express';
import { Serveur } from './src/Serveur.js';
import { Validator } from './src/Validator.js';
import { Routeur } from './src/Routeur.js';


const app = express();
const port = 3000;

// Middleware pour comprendre le JSON envoyé par les clients
app.use(express.json());

// Notre "Base de données" en mémoire
const parcInformatique = [];

// ROUTE 1 : GET (Lecture)
app.get('/api/equipements', (req, res) => {
    // On transforme nos objets en un format JSON simple pour l'affichage
    const reponse = parcInformatique.map(eq => ({
        hostname: eq.getHostname(),
        details: eq.afficherStatut()
    }));
    res.json(reponse);
});

app.get('/api/equipements/:index', (req, res) => {
    // On transforme nos objets en un format JSON simple pour l'affichage
    const indexequipement = parseInt(req.params.index);
    const equipement = parcInformatique[indexequipement]

    if (!equipement) {

        res.status(404).json({ error: "L'équipement demandé n'existe pas" });
    }

    const indexaffichage = indexequipement+1
    const resultat ={
        id: indexaffichage,
        type: equipement.constructor.name,
        hostname: equipement.getHostname(),
        details: equipement.afficherStatut()
    }
    res.json(resultat);
});

// ROUTE 2 : POST (Création) avec Try/Catch
app.post('/api/serveurs', (req, res) => {
    try {
        const { hostname, ip, mac, os } = req.body;

        // Validation défensive
        if (!Validator.isIpValid(ip)) {
            throw new Error(`L'IP ${ip} est invalide !`);
        }

        const nouveauSrv = new Serveur(hostname, ip, mac, os);
        parcInformatique.push(nouveauSrv);

        res.status(201).json({
            message: "Serveur créé",
            machine: nouveauSrv.afficherStatut()
        });

    } catch (error) {
        // En cas d'erreur, on renvoie une 400 (Bad Request)
        res.status(400).json({ error: error.message });
    }
});

app.post('/api/routeurs', (req, res) => {
    try {
        const { hostname, ip, mac, nbPorts } = req.body;

        // Validation défensive
        // if (!Validator.isIpValid(ip)) {
        //    throw new Error(`L'IP ${ip} est invalide !`);
       //  }

        /*if ( nbPorts >=4 && nbPorts <=48 ) {

            const nouveauRouteur = new Routeur(hostname, ip, mac, nbPorts);
            parcInformatique.push(nouveauRouteur);

            res.status(201).json({
                message: "Routeur créé",
                machine: nouveauRouteur.afficherStatut()
            });
        }
        else {
            res.status(400).json({ error: "Le nombre de ports doit se situer entre 4 et 48" });
        };
*/
        if (!Validator.isNbPortsValid(nbPorts)) {
                throw new Error(`Le nombre de ports  ${nbPorts} est invalide !`);
              }

        const nouveauRouteur = new Routeur(hostname, ip, mac, nbPorts);
        parcInformatique.push(nouveauRouteur);

        res.status(201).json({
            message: "Routeur créé",
            machine: nouveauRouteur.afficherStatut()
        });

    } catch (error) {
        // En cas d'erreur, on renvoie une 400 (Bad Request)
        res.status(400).json({ error: error.message });
    }
});

app.listen(port, () => {
    console.log(`API Mini-Nagios écoute sur http://localhost:${port}`);
});