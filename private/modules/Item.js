export default class Item {
	constructor(item_name) {
		// SQL lekérdezéssel megnézi, hogy van-e ilyen item típus az adatbázisban (item_name).
		// Ha igen, akkor létrehoz egy példányt az adatbázisban megtalálható, adott itemhez tartozó értékekkel:
		/*
			if (van az items táblában ilyen név) {
				this.item_name = item_name;
				this.buy = db_ben_ugyanez_az_item_buy;
				this.sell = db_ben_ugyanez_az_item_sell;
				this.image = db_ben_ugyanez_az_item_image;
				this.amount = db_ben_ugyanez_az_item_amount;
			} else {
				exception: Nincs ilyen típusú item a táblában...
			}
		*/
	}

	function getName() {
		return this.name;
	}

	function getPurchasePrice() {
		return this.buy;
	}

	function getSellingPrice() {
		return this.sell;
	}

	function getImage() {
		return this.image;
	}

	function increaseAmount(value) {
		// value értékével növeli a táblában az amount értéket, ahol egyezik a name
	}

	function increaseAmount() {
		// 1-el növeli a táblában az amount értéket
	}
}