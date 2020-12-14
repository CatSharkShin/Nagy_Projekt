import Item from '/../modules/Item.js';
import Fish from '/../modules/Fish.js';
import Junk from '/../modules/Junk.js';
import FishingRod from '/../modules/FishingRod.js';
import Bait from '/../modules/Bait.js';

// Ezekhez drag-es eventek kellenének:
let fishingRodEquipped = false;
let baitEquipped = false;
let currentFishingRod = "";
let currentBait = "";

// Szükséges html elemek eltárolása változóban:
let exp_bar = document.getElementByClassName("exp_bar"); // betöltéskor session alapján kiírja
let fishing_level = document.getElementByClassName("fishing_level"); //ez is session, dinamikusan változik majd 
let fishing_button = document.getElementByClassName("fishing_button"); 
let fish_rod_button = document.getElementByClassName("fish_rod_button");
let bait_button = document.getElementByClassName("bait_button");

// Ha fel van szerelve a horgászbot és a csali akkor kattintásra elindul a pecázás:
fishing_button.addEventListener('click', function() {
    if (!fishingRodEquipped || !baitEquipped) {
	   if (!fishingRodEquipped) {
	      serverMessage("red", "msg_class", "Nincs kiválasztva horgászbot!");
	   }
	   if (!baitEquipped) {
	      serverMessage("red", "msg_class", "Nincs kiválasztva csali!");
	   }
	} else {
		fishingProcedure();
	}
});

/* FISHING ROD fel-és leszerelése
DRAG EVENT: ha a fishing_rod_button-ra drag-elünk valamit a leltárból, lefut a következő:
function {
	// Le kéne kérni a drag-elt item image-e alapján, hogy a PECAPOTOK táblában van-e
	let inFishingRodTable = valami
	if (!inFishingRodTable) {
		serverMessage("red", "msg_class", "Ide csak pecabotot tehetsz!");
	} else {
		fishingRodEquipped = true;
	}

	// Ha fel van szerelve valami, arról tájékoztat a serverMessage
	// Ha leveszi a user a pecabotot, akkor: fishingRodEquipped = false;

	// A bedragelt pecabot nevét tároljuk, amit az image alapján szerzünk meg az adatbázisból:
	rod_name = valami
	currentFishingRod = new FishingRod(rod_name);
}
*/

/* BAIT fel-és leszerelése
DRAG EVENT: ha a bait_button-ra drag-elünk valamit a leltárból, lefut a következő:
function {
	// Le kéne kérni a drag-elt item image-e alapján, hogy a CSALIK táblában van-e
	let inBaitTable = valami
	if (!inBaitTable) {
		serverMessage("red", "msg_class", "Ide csak csalit tehetsz!");
	} else {
		baitEquipped = true;
	}

	// Ha fel van szerelve valami, arról tájékoztat a serverMessage
	// Ha leveszi a user a csalit, akkor: baitEquipped = false;

	// A bedragelt csali nevét tároljuk, amit az image alapján szerzünk meg az adatbázisból:
	bait_name = valami
	currentBait = new Bait(bait_name);
}
*/

// Itt zajlik le a pecázás az elejétől a végéig (csali bedobásától a hal kifogásáig):
function fishingProcedure() {
	serverMessage("gray", "msg_class", "Csali bedobva...");
	isCurrentlyFishing(true);
	let fishLevel = decidingHookedFishLevel(fishingLevel, bait);
	waitingForFish(fishLevel);
	serverMessage("gray", "msg_class", "Valami horogra akadt...");
    catchingFish(fishingRod, fishLevel);
    isCurrentlyFishing(false);
}

// Grafikus interface megfelelő megjelenítése attól függően, hogy épp be van-e dobva a csali:
function isCurrentlyFishing(isFishing) {
	if (isFishing) {
	/*
		"Pecabot" dragged eventes buttont egy EVENT NÉLKÜLI sötétebb "Pecabot" buttonra váltja
			(magyarul a pecabot nem cserélhető)
		"Csali" dragged eventes buttont egy EVENT NÉLKÜLI sötétebb "Csali" buttonra váltja
			(csali nem cserélhető)
		"Pecázás" click eventes buttont egy EVENT NÉLKÜLI sötétebb "Kifog" buttonra váltja
			(horogra akadás után lesz kattintható)
	*/
	} else {
	/*
		"Pecabot" draggelhető (be lehet húzni egy szintnek megfelelő pecabotot, de más objektumot nem)
		"Csali" draggelhető (be lehet húzni egy szintnek megfelelő csalit, de más objektumot nem)
		"Kifog" gomb helyett kattintható "Pecázás" gomb
	*/
	}
}

// Itt dől el, mekkora szintű hal akad majd horogra -- utóbbi értékkel tér vissza:
function decidingHookedFishLevel(fishingLevel, bait) {
	/* function műküdése:
	 - Megegyező csali és pecázási szintél halak horogra akadása kisebbtől nagyobb szintűig: (37%, 29%, 22%, 8%, 4%)
	 - Kisebb szintű csalinál esélyek változása szintkülönbségekként (+3%, +2%, +1%, -4%, -2%)
	 - Nagyobb szintű csalinál ugyanígy, csak fordított előjelekkel (-3%, -2%, -1%, +4%, +2%)
	 */

	let rnd = Math.floor(Math.random() * 1001);
	let lvlDiff = bait.getLevel - fishingLevel;
	let fishLevel = 0; 

	if ((630 + lvlDiff * 30) < rnd && rnd < 1000) {
		fishLevel = fishingLevel - 2;
	} else if ((340 + lvlDiff * 50) < rnd && rnd < (630 + lvlDiff * 30)) {
		fishLevel = fishingLevel - 1;
	} else if ((120 + lvlDiff * 60) < rnd && rnd < (340 + lvlDiff * 50)) {
		fishLevel = fishingLevel;
	} else if ((40 + lvlDiff * 20) < rnd && rnd < (120 + lvlDiff * 60)) {
		fishLevel = fishingLevel + 1;
	} else {
		fishLevel = fishingLevel + 2;
	}

	return fishLevel;
}

// Minél nagyobb szintű hal akad majd horogra, annál több mp-et kell rá várni:
function waitingForFish(fishLevel) {
	
	let rnd = 0;

	if (fishLevel < 0) {
		rnd = Math.floor(Math.random() * (9 - 5) ) + 5;
	} else if (fishLevel == 0) {
		rnd = Math.floor(Math.random() * (16 - 10) ) + 10;
	} else {
		rnd = Math.floor(Math.random() * (26 - 18) ) + 18;
	}

	// Varakozik(rnd);
}

// Hal kifogása:
function catchingFish(fishingRod, fishLevel) {
	/* Funkció műküdése:
	 - Horogra akadt halak kifogási esélyei a legkissebtől a legnagyobb szintűig (90%, 70%, 50%, 20%, 10%)
	 - A pecabot rádob még ezekre pecabot-szintenként 5%-ot
	 */

	let rnd = Math.floor(Math.random() * 101);
	let fishingRodLevel = fishingRod.getLevel;
	let catchChance = 0;

	// Kisebb esélytől a nagyobbig (az első ág pl.: 100-90 = 10% esély, a második ág 100-70 = 30% esély...):
	if (fishLevel + 2 == fishingLevel) {
		catchChance = 90;
	} else if (fishLevel + 1 == fishingLevel) {
		catchChance = 70;
	} else if (fishLevel == fishingLevel) {
		catchChance = 50;
	} else if (fishLevel - 1 == fishingLevel) {
		catchChance = 20;
	} else {
		catchChance = 10;
	}
	
	if (rnd <= (catchChance + fishingRodLevel * 5)) {
		// let fishName = "valami"; - Adatbázisból lekéri a hal nevét, ahol egyezik az itteni fishLevel-el a szint
		let fish = new Fish(fishName);
		serverMessage("green", "msg_class", fish.getName + " kifogva!");
		fish.increaseAmount();
		gainFishingExp(fishLevel);
	} else {
		serverMessage("gray", "msg_class", "Couldn't catch the fish...");
	}
}

// Exp szerzése:
function gainExp(fishLevel) {
	// Ez még ki lesz majd kalkulálva hardcode-al (a hal szintje alapján)...
}

// Szerver üzenetek:
function serverMessage(color, cssClassName, message) {
	if (color != "gray" && color != "green" && color != "red") {
		// exception: nem megfelelő szín!
	} else {
		htmlElement = document.getElementByClassName(cssClassName);
		htmlElement.style.color = color;
		// htmlElement-ben feljön az üzenet, majd kifadel
	}
}