<?php

define('DB_HOST', '127.0.0.1');

define('DB_NAME', 'national_parks_db');

define('DB_USER', 'parks_user');

define('DB_PASS', 'codeup');

require_once('db_connect.php');

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$parks = [
	[
		'name' => 'Acadia',
		'location' => 'Maine',
		'date_established' => '1919-02-26',
		'area_in_acres' => '47389.67',
		'description' => 'Covering most of Mount Desert Island and other coastal islands, Acadia features the tallest mountain on the Atlantic coast of the United States, granite peaks, ocean shoreline, woodlands, and lakes. There are freshwater, estuary, forest, and intertidal habitats.'
	], [
		'name' => 'Arches',
		'location' => 'Utah',
		'date_established' => '1971-11-12',
		'area_in_acres' => '76518.98',
		'description' => 'This site features more than 2,000 natural sandstone arches, including the famous Delicate Arch. In a desert climate, millions of years of erosion have led to these structures, and the arid ground has life-sustaining soil crust and potholes, which serve as natural water-collecting basins. Other geologic formations are stone columns, spires, fins, and towers.'
	], [
		'name' => 'Badlands',
		'location' => 'South Dakota',
		'date_established' => '1978-11-10', 
		'area_in_acres' => '242755.94',
		'description' => 'The Badlands are a collection of buttes, pinnacles, spires, and grass prairies. It has the richest fossil beds in the world, from the Oligocene epoch, and the wildlife includes bison, bighorn sheep, black-footed ferrets, and swift foxes.'

	], [
		'name' => 'Big Bend',
		'location' => 'Texas',
		'date_established' => '1944-06-12',
		'area_in_acres' => '801163.21',
		'description' => 'Named for the prominent bend in the Rio Grande along the US–Mexico border, this park encompasses a large and remote part of the Chihuahuan Desert. Its main attraction is backcountry recreation in the arid Chisos Mountains and in canyons along the river. A wide variety of Cretaceous and Tertiary fossils as well as cultural artifacts of Native Americans also exist within its borders'
	], [
		'name' => 'Biscayne',
		'location' => 'Florida', 
		'date_established' => '1980-06-28', 
		'area_in_acres' => '172924.07 ',
		'description' => 'Located in Biscayne Bay, this park at the north end of the Florida Keys has four interrelated marine ecosystems: mangrove forest, the Bay, the Keys, and coral reefs. Threatened animals include the West Indian Manatee, American crocodile, various sea turtles, and peregrine falcon.'
	], [
		'name' => 'Glacier',
		'location' => 'Montana',
		'date_established' => '1910-05-11', 
		'area_in_acres' => '1013572.41',
		'description' => 'The U.S. half of Waterton-Glacier International Peace Park, this park hosts 26 glaciers and 130 named lakes beneath a stunning canopy of Rocky Mountain peaks. There are historic hotels and a landmark road in this region of rapidly receding glaciers. The local mountains, formed by an overthrust, expose the best-preserved sedimentary fossils from the Proterozoic era in the world.'
	], [
		'name' => 'Glacier Bay',  
		'location' => 'Alaska', 
		'date_established' => '1980-12-02', 
		'area_in_acres' => '3224840.31',
		'description' => 'Glacier Bay has numerous tidewater glaciers, mountains, fjords, and a temperate rainforest, and is home to large populations of grizzly bears, mountain goats, whales, seals, and eagles. When discovered in 1794 by George Vancouver, the entire bay was covered in ice, but the glaciers have since receded more than 65 miles (105 km).'
	], [
		'name' => 'Grand Canyon',
		 'location' => 'Arizona', 
		 'date_established' => '1919-02-26', 
		 'area_in_acres' => '1217403.32',
		 'description' => 'The Grand Canyon, carved by the mighty Colorado River, is 277 miles (446 km) long, up to 1 mile (1.6 km) deep, and up to 15 miles (24 km) wide. Millions of years of erosion have exposed the colorful layers of the Colorado Plateau in countless mesas and canyon walls, visible from both the north and south rims, or from a number of trails that descend into the canyon itself.'
	], [
		'name' => 'Grand Teton',  
		'location' => 'Wyoming', 
		'date_established' => '1929-02-26', 
		'area_in_acres' => '309994.66',
		'description' => 'Grand Teton is the tallest mountain in the Teton Range. The historic Jackson Hole and reflective piedmont lakes teem with unique wildlife and contrast with the dramatic mountains, which rise abruptly from the sage-covered valley below.'
	], [
		'name' => 'Great Basin',  
		'location' => 'Nevada', 
		'date_established' => '1986-10-27', 
		'area_in_acres' => '77180.00 ',
		'description' => 'Based around Wheeler Peak, the Great Basin has 5,000-year-old bristlecone pines, glacial moraines, and the limestone Lehman Caves. It has some of the darkest night skies in the country, and there are animal species including the Townsend big-eared bat, pronghorn, and Bonneville cutthroat trout.'
	]
];

$stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description)
	VALUES (:name, :location, :date_established, :area_in_acres, :description)');

foreach ($parks as $park) {
    $stmt->bindValue(':name', $park['name'], PDO::PARAM_STR);
    $stmt->bindValue(':location',  $park['location'], PDO::PARAM_STR);
    $stmt->bindValue(':date_established', $park['date_established'], PDO::PARAM_STR);
    $stmt->bindValue(':area_in_acres', $park['area_in_acres'], PDO::PARAM_STR);
    $stmt->bindValue(':description', $park['description'], PDO::PARAM_STR);

    $stmt->execute();

}

