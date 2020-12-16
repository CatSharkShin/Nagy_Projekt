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
?>