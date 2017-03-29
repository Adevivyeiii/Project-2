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

<?php

	$data = json_decode(file_get_contents('https://www.googleapis.com/civicinfo/v2/representatives?key=YOURKEY='.$searchaddress_final));

	// setup blank array
	$jobs = [];
	// loop through each office 
	foreach ($data->offices as $office) {
		// loop through each officialIndices array
    if (isset($office->officialIndices)) {
  		foreach ($office->officialIndices as $officialIndices) {
  			$jobs += [ $officialIndices => $office->name];
  		}
    }
	}
	// print_r($jobs);

// setup count
$i = 0;

// loop through officials
foreach ($data->officials as $person) {
	// print_r($person);	
	echo '<div class="card">';	
	echo '<h3>'.$person->name.'</h3>';
	echo '<h5>'.$jobs[$i].'</h5>';
	echo '<p> Party: '.(isset($person->party)? $person->party :'Not Listed').'</p>';
	echo '</div>';
// add 1 count to $i;
$i++;
}

?>