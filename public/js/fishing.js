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