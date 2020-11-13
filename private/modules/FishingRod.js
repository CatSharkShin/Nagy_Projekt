import Item from '/Item.js';

// (!)FONTOS, hogy ugyanabból a szintű pecabotból egyszerre csak egy lehet a játékosnál
// VAGY: egyesével kerülnek be a leltárba, mert mindegyiknek más a durability-je

export default class FishingRod extends Item {
	constructor(rod_name) {
		// SQL lekérdezéssel megnézi, hogy van-e ilyen nevű pecabot az adatbázisban (Pecabot 1, Pecabot 2, ...) .
		// Ha igen, akkor létrehoz egy példányt az adatbázisban megtalálható, adott pecabothoz tartozó értékekkel:
		/*
			if (van a pecabotok táblában ilyen név) {
				super(rod_name);
				this.level = db_ben_ugyanez_a_rod_level;
				this.durability = db_ben_ugyanez_a_rod_durability;
			} else {
				exception: Nincs ilyen nevű pecabot a táblában...
			}
		*/
	}

	function getLevel() {
		return this.level;
	}

	// Ez a tartósság, hogy még mennyit lehet a bottal pecázni
	function getDurability() {
		return this.durability;
	}
}