import { Validator } from '../src/Validator.js';

describe('Tests du Validator IP', () => {

    test('Une IP correcte doit retourner true', () => {
        expect(Validator.isIpValid('192.168.1.1')).toBe(true);
    });

    test('Une IP incorrecte (texte) doit retourner false', () => {
        expect(Validator.isIpValid('patate')).toBe(false);
    });

    test('Une IP incorrecte (trop longue) doit retourner false', () => {
        expect(Validator.isIpValid('999.999.999.9999')).toBe(false); // Regex simplifiée accepte 999, améliorez la regex en exercice !
    });
});

describe('Tests du Validator MAC', () => {

    test('Une addresse MAC correcte doit retourner true', () => {
        // A COMPLETER
    });

    test('Une addresse MAC incorrecte (texte) doit retourner false', () => {
        // A COMPLETER
    });


});