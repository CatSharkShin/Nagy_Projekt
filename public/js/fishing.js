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