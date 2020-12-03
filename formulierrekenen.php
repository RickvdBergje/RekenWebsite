<?php
if (isset($_post{'bereken'}))
	{
		
	}
?>
<html>
	<head>
		<title>Formulier</title>
	</head>
<body>
<div class="wrapper">


 <?php
if(!isset($_POST['submit']))
{
?>
<form name="groep" action="formulierrekenen.php" method="post">
<br />          
<p> in welke klas zit jij:
					<br />
	<input type="radio" name="groep" value="4"> groep 4<br />
	<input type="radio" name="groep" value="5"> groep 5<br />
	<input type="radio" name="groep" value="6"> groep 6  
				</p>
<br />
	<input type="submit" name="submit" value="verstuur"/>
</div>

<?php
}
//versturen van de variabele $groep.(dus 4, 5 of 6)(naar verwerkerrekenen.php)
else
{
	$groep = $_POST["groep"];
	if ($groep == 4){
		$min = 1;
		$max = 50; 
	}
	if ($groep == 5){
		$min = 1;
		$max = 100; 
	}
	if ($groep == 6){
		$min = 1;
		$max = 65500; 
	}
	$getal1 = rand($min,$max);
	$getal2 = rand($min,$max);
	
	$getal3 =rand (1,4);
	if ($getal3 == 1){
		$getal4 ="+";
	}
	elseif ($getal3 == 2){
		$getal4 ="-";
	}
	elseif ($getal3 == 3){
		$getal4 = "X";
	}
	else ($getal3 == 4){
		$getal4 = "/";
	}
	
	echo "jij zit in groep"
	echo $groep . " ";
	echo $getal1 . " ";
	echo $getal4 . " ";
	echo $getal2 . " ";
	$uitkomst=$getal1 + $getal2;
	echo $uitkomst;
?>
<form name="bereken" action="formulierrekenen.php" method="post">

	<input type="text" name="antwoord" size="15"/>
	<br />
	<input type="submit" name="bereken" value="Verstuur je antwoord"/>
</form>
<?php

}
?>
