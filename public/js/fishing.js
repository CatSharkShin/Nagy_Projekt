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