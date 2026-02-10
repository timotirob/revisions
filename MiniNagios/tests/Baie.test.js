import { Baie } from '../src/Baie.js';
import { Serveur } from '../src/Serveur.js';

describe('Logique Métier : Baie de Brassage', () => {

    test('On peut ajouter un équipement s\'il y a de la place', () => {
        // On initialise une baie avec une capacité de 10
        const rack = new Baie("TestRack", 10);
        const srv = new Serveur("Srv1", "1.1.1.1", "AA:BB:CC:00:00:01", "Linux");

        rack.ajouterEquipement(srv);

        // Assertion : Le tableau doit contenir 1 élément
        expect(rack.equipements.length).toBe(1);
    });

    test('La baie doit refuser l\'ajout si elle est pleine', () => {
        // 1. Préparation : Une baie minuscule (Capacité 1)
        const rack = new Baie("TinyRack", 1);
        const srv1 = new Serveur("Srv1", "1.1.1.1", "AA:BB:CC:00:00:01", "Linux");
        const srv2 = new Serveur("Srv2", "2.2.2.2", "AA:BB:CC:00:00:02", "Windows");

        // 2. On la remplit au maximum
        rack.ajouterEquipement(srv1);

        // 3. Vérification : L'ajout du 2ème doit lancer une erreur
        // Note : Avec Jest, pour tester une erreur, on met l'action dans une fonction anonyme () => ...
        expect(() => {
            rack.ajouterEquipement(srv2);
        }).toThrow("est pleine");
    });
});