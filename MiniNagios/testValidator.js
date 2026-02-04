import {Validator} from "./src/Validator.js";

const ipOk = "192.168.0.1"

const ipPasOk = "Ceci n'est pas une IP"

console.log(Validator.isIpValid(ipOk))

console.log(Validator.isIpValid(ipPasOk))

const macOk = "00:11:AA:FF:12:24"
const macPasOk = "Ceci n'est pas une adresse MAC"

console.log(Validator.isMacValid(macOk))
console.log(Validator.isMacValid(macPasOk))