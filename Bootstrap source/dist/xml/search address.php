<?php

if(!empty($_GET['searchaddress'])){
	$searchaddress = $_GET['searchaddress']; 
	$searchaddress_final = str_replace(' ', '%20', $searchaddress);
}
else {
	$searchaddress = '18111 Nordhoff St. Northridge CA'; 
	$searchaddress_final = '18111%20Nordhoff%20St.%20Northridge%20CA'; 
}

// function rand_color() {
//     return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
// }
// <body style="background-color: <?php echo rand_color();

?>