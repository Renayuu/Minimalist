<?php

function getData() {
	$query = MySQL::getInstance()->query("SELECT * FROM Item ORDER BY Date_Last_Worn ASC");
    return $query->fetchALL();
}

// function filterItemType() {
// 	if (in_array("tankTops", $opts)) {
// 		$query_tanktop = MySQL::getInstance()->query("SELECT * FROM Item WHERE Type = 'Tank Tops' ORDER BY Date_Last_Worn ASC");
//     	return $query->fetchALL();
// 	}
	
// }

// function getClosetFilters() {
// 	var filters = [];
// 	$checkboxes.each(function(){
// 		if(this.checked){
// 		filters.push(this.name);
//     	}
// 	});
//   return filters;
// }

// var $checkboxes = $("input:checkbox");

// $checkboxes.on("change", function(){
// 	var filters = getClosetFilters();
// 		filterItemType();
// });

?>