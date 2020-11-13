import Item from '/Item.js';

export default class Fish extends Item {
	constructor(fish_name) {
		// SQL lekérdezéssel megnézi, hogy van-e ilyen nevű halfajta az adatbázisban.
		// Ha igen, akkor létrehoz egy példányt az adatbázisban megtalálható, adott halhoz tartozó értékekkel:
		/*
			if (van a halak táblában ilyen név) {
				super(fish_name);
				this.level = db_ben_ugyanez_a_hal_level;
				this.nutrition = db_ben_ugyanez_a_hal_nutrition;
				this.exp = db_ben_ugyanez_a_hal_exp;
			} else {
				exception: Nincs ilyen fajta hal a táblában...
			}
		*/
	}

	function getLevel() {
		return this.level;
	}

	function getNutrition() {
		return this.level;
	}
}