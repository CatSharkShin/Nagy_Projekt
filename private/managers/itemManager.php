<?php 
require_once "database.php";
function itemEdit($item_id, $item_name, $description, $buy, $sell,$image) {
	require_once DATABASE_CONTROLLER;
	if(empty($record)) {
		$query = "UPDATE items SET item_name = :item_name,  description = :description, buy = :buy, sell = :sell, image = :image WHERE item_id = :item_id";
		$params = [
			":item_id" => $item_id,
			":item_name" => $item_name,
			":description" => $description,
			":buy" => $buy,
			":sell" => $sell,
			":image" => $image,
		];
		return executeDML($query,$params);
	} 
	return false;
}
function delItem($item_id){
	require_once DATABASE_CONTROLLER;
	$query = "DELETE FROM items WHERE item_id = :item_id";
	$params = [ ':item_id' => $item_id];
	return executeDML($query,$params);
}
function getItems(){
	require_once DATABASE_CONTROLLER;
	$query = "SELECT * FROM inventory JOIN items ON inventory.item_id = items.item_id";
	return getList($query);
}
function generateInventory($refresh_id,$items){
	foreach($items as $item){
		echo '<span>
				<img src="'.PATH_SVGS.$item['image'].'.svg" id="'.$item['item_id'].'" onclick="sellItem(
				`'.$refresh_id.'`,this.id);">
					'.$item['amount'].'
			</span>';
	}
}
?>