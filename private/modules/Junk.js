import Item from '/Item.js';

// Old boot, tin can, stb.

export default class Junk extends Item {
	constructor(junk_name) {
		// SQL lekérdezéssel megnézi, hogy van-e ilyen nevű kacat az adatbázisban
		// Ha igen, akkor létrehoz egy példányt az adatbázisban megtalálható, adott nevű kacathoz tartozó értékekkel:
		/*
			if (van a kacatok táblában ilyen név) {
				super(junk_name);
				this.exp = db_ben_ugyanez_a_junk_exp;
			} else {
				exception: Nincs ilyen nevű kacat a táblában...
			}
		*/
	}

	function getExp() {
		return this.exp;
	}
}