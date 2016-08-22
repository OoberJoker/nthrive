<?php
ini_set("allow_url_fopen", 1);

$year = $_POST["years"];
    foreach ($_POST as $key => $value) {
	if($key != "years"){
		$country[] =  $key;
	}
    }
$counter=0;
 foreach($country as $specificCountry){
                $populationData =  file_get_contents("http://api.population.io/1.0/population/$year/$specificCountry/");
		$populationObj = json_decode($populationData);


		$lifeExpectancyData = file_get_contents("http://api.population.io:80/1.0/life-expectancy/total/male/$specificCountry/$year-01-01/");


                $lifeExpectancyObj = json_decode($lifeExpectancyData);


		foreach($populationObj as $i){
		        $totalPopulation += $i->total;
		}

		foreach($lifeExpectancyObj as $key=>$value){
			if($key=="total_life_expectancy"){
				 $lifeExp[] = $value;
			}
		}
		$myArray[] = array(
				"country" => $specificCountry,
				"lifeExp" => $lifeExp[$counter],
				"population" => $totalPopulation
		);

		$totalPopulation=null;
		$counter++;
		echo "<br>";



        }
$jsonArray = json_encode($myArray);

$myfile = fopen("myjson.json","w") or die("Unable to open json file for writing");
fwrite($myfile,$jsonArray);
header( 'Location: http://ec2-54-213-52-202.us-west-2.compute.amazonaws.com/nthrive/population.php' ) ;



?>
