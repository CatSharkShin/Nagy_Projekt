import Item from '/Item.js';

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
}