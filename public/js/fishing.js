import Item from '/../modules/Item.js';
import Fish from '/../modules/Fish.js';
import Junk from '/../modules/Junk.js';
import FishingRod from '/../modules/FishingRod.js';
import Bait from '/../modules/Bait.js';

// Szükséges html elemek eltárolása változóban:
let exp_bar = document.getElementByClassName("exp_bar");
let fishing_level = document.getElementByClassName("fishing_level");
let fishing_button = document.getElementById("fishing_button"); 
let fish_rod = document.getElementByClassName("fish_rod");
let bait = document.getElementByClassName("bait");

// Segédváltozók:
let fishingExp = 28000; //"<?php echo $_SESSION['fishing_exp']; ?>";
let fishingLevel = 0;
let expBarSegments = 0;
let expGainedCurrentLevel = 0;
let currentFishingRod = "";
let currentBait = "";

// Ha fel van szerelve a horgászbot és a csali akkor kattintásra elindul a pecázás:
fishing_button.addEventListener('click', function() {
    fishingProcedure();
});

// Itt zajlik le a pecázás az elejétől a végéig (csali bedobásától a hal kifogásáig):
function fishingProcedure() {
	serverMessage("gray", "msg_class", "Csali bedobva...");
	isCurrentlyFishing(true);
	let fishLevel = decidingHookedFishLevel(fishingLevel, currentBait);
	waitingForFish(fishLevel);
	serverMessage("gray", "msg_class", "Valami horogra akadt...");
    catchingFish(currentFishingRod, fishLevel);
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
	
	// Megegyező csali és pecázási szintél halak horogra akadása kisebbtől nagyobb szintűig: (37%, 29%, 22%, 8%, 4%)
	let rnd = Math.floor(Math.random() * 1001);
	let lvlDiff = bait.getLevel - fishingLevel;
	let fishLevel = 0; 

	// Kisebb szintű csalinál esélyek változása szintkülönbségekként (+3%, +2%, +1%, -4%, -2%) -- vice versa
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

	sleep(rnd * 1000);
}

// Hal kifogása:
function catchingFish(fishingRod, fishLevel) {
	 // Horogra akadt halak kifogási esélyei a legkissebtől a legnagyobb szintűig (90%, 70%, 50%, 20%, 10%)

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
	
	// Pecabot szintentként +5%:
	if (rnd <= (catchChance + fishingRodLevel * 5)) {
		// let fishName = "valami"; - Adatbázisból lekéri a hal nevét, ahol egyezik az itteni fishLevel-el a szint
		// addPlusOneItem(fishLevel);
		// displayItems();
		serverMessage("green", "msg_class", fish.getName + " kifogva!");
		fish.increaseAmount();
		gainFishingExp(fishLevel);
	} else {
		serverMessage("gray", "msg_class", "Couldn't catch the fish...");
	}
}

// Exp szerzése hal szintje alapján:
function gainFishingExp(fishLevel) {
	
	// Szükséges exp kövi szinthez: mindig 2x annyi, mint az előzőhöz, első szint: 1000 (kb. 1 óra); uccsó: 512000
	let expToGain = 0;

	if (fishLevel + 2 == fishingLevel) {
		expToGain = 20;
	} else if (fishLevel + 1 == fishingLevel) {
		expToGain = 30;
	} else if (fishLevel == fishingLevel) {
		expToGain = 50;
	} else if (fishLevel - 1 == fishingLevel) {
		expToGain = 150;
	} else {
		expToGain = 350;
	}

	fishingExp += expToGain;
	displayExpBarAndLevel(fishingExp);
}

// Exp bar megjelenítése és fishing level beállítása:
function displayExpBarAndLevel(fishingExp) {
	
	let min = 0;
	let max = 1000;
	let diff = 1000;
	fishingLevel = 1;

	// 511000 a maximum elérhető exp
	if (!(fishingExp > 511000)) {
		while(fishingExp > max) {
			min = max;
			max += max * 2; // Az exp bar intervalluma mindig az előző kétszerese
			diff = max - min;
			fishingLevel++;
		}
	} else {
		fishingLevel = 10;
		diff = 1;
	}

	expBarSegments = diff;
	expGainedCurrentLvl = fishingExp - min;
	exp_bar.innerHTML = "Segments: " + diff.toString() + " Exp to next level: " + max.toString() + "/" + expGainedCurrentLvl.toString();
	fishing_level.innerHTML = "Pecázási szint: " + fishingLevel.toString();;
}

// Szerver üzenetek a felhasználó számára:
function serverMessage(color, cssClassName, message) {
	htmlElement = document.getElementByClassName(cssClassName);
	htmlElement.style.color = color;
	htmlElement.innerHTML = message.toString();
}

// Itemek számának megjelenítése:
function displayItems() {
	fish_rod.innerHTML = currentFishingRod.getLevel();
	bait.innerHTML = currentBait.getLevel();
}

// Oldal betöltésekor:
document.onload = function() {
	displayExpBarAndLevel(fishingExp);
	currentFishingRod = new FishingRod(fishingLevel);
	currentBait = new FishingRod(fishingLevel);
	displayItems();
}