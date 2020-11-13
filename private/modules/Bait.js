import Item from '/Item.js';

export default class Bait extends Item {
	constructor(bait_name) {
		// SQL lekérdezéssel megnézi, hogy van-e ilyen nevű csali az adatbázisban (Csali 1, Csali 2, ...).
		// Ha igen, akkor létrehoz egy példányt az adatbázisban megtalálható, adott nevű csalihoz tartozó értékekkel:
		/*
			if (van a csalik táblában ilyen név) {
				super(bait_name);
				this.level = db_ben_ugyanez_a_bait_level;
			} else {
				exception: Nincs ilyen nevű csali a táblában...
			}
		*/
	}

	function getLevel() {
		return this.level;
	}
}