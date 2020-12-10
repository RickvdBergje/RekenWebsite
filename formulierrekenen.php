<html>
	<head>
		<title>Formulier</title>
		<style>
		body{
		background-color:#9FAC8A;
		}
		.form{
			width: 400px;
			height:400px;
			margin-left: 450px;
			margin-top: 170px;
			padding-left: 50px;
			}
		#rekenmachine{
			width: 600px;
			height:50px;
			margin-left: 0px;
			}
		</style>
	</head>
<body>
<?php
if(!isset($_POST['submit']) && !isset($_POST['bereken'])||isset($_POST['volgende']))
{
?>
<form class="form" name="groep" action="" method="post">    
<p> <h2>in welke klas zit jij:</h2>
	<input type="radio" name="groep" value="4"> groep 4<br />
	<input type="radio" name="groep" value="5"> groep 5<br />
	<input type="radio" name="groep" value="6"> groep 6  
				</p>
<br />
	<input type="submit" name="submit" value="verstuur"/>
	</form>
<?php
}
if(isset($_POST['bereken']))
{
			$antwoord = $_POST["antwoord"];
			$uitkomst = $_POST["uitkomst"];
			$uitkomst = round($uitkomst, 2);
?>
	<form class="form" name="bereken" action="" method="post">
	
<?php
			if ($antwoord == $uitkomst){
			echo "<h1>goed gedaan</h1>";
			}
			else {
			echo"<h1>goed geprobeerd</h1>";	
			}
?>
	<h1>jouw antwoord is <?php echo $antwoord ;?><br /> het antwoord is <?php echo $uitkomst;?></h1>
	<input type="submit" name="volgende" value="volgende opdracht"/>
	</form>
<?php
}
if(isset($_POST['submit']))
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
	
		$operator2 = 1;
	$getal3 =rand (1,4);
	if ($getal3 == 1){
		$operator2 = "+";
		$uitkomst=$getal1 + $getal2;
	}
	elseif ($getal3 == 2){
		$operator2 = "-";
		$uitkomst=$getal1 - $getal2;
	}
	elseif ($getal3 == 3){
		$operator2 = "*";
		$uitkomst=$getal1 * $getal2;
	}
	else {
		$operator2 = "/";
		$uitkomst=$getal1 / $getal2;
		
	}
?>
<?php
$operand_a = $operand_b = $result = NULL;
if(isset($_POST["execute"]))
{
    $operand_a = $_POST["operand_a"];
    $operand_b = $_POST["operand_b"];
    switch ($_POST["operator"]) 
    {
        case "addition":
            $result = $_POST["operand_a"] + $_POST["operand_b"];
            break;
        case "subtraction":
            $result = $_POST["operand_a"] - $_POST["operand_b"];
            break;
        case "multiplication":
            $result = $_POST["operand_a"] * $_POST["operand_b"];
            break;
        case "division":
            $result = $_POST["operand_a"] / $_POST["operand_b"];
            break;
    }
}
?>
<form id="rekenmachine" method="post" action="">
<input type="text" name="operand_a" value="<?php echo $operand_a; ?>">
<select name="operator">
<option value="addition" <?php if(isset($_POST["operator"]) && $_POST["operator"]=="addition"){echo "selected";} ?>>+</option>
<option value="subtraction" <?php if(isset($_POST["operator"]) && $_POST["operator"]=="subtraction"){echo "selected";} ?>>-</option>
<option value="multiplication" <?php if(isset($_POST["operator"]) && $_POST["operator"]=="multiplication"){echo "selected";} ?>>*</option>
<option value="division" <?php if(isset($_POST["operator"]) && $_POST["operator"]=="division"){echo "selected";} ?>>/</option>
</select>
<input type="text" name="operand_b" value="<?php echo $operand_b; ?>">
<input type="submit" name="execute" value="=">
<input type="text" name="result" value="<?php echo $result; ?>">
</form>
		<form class="form" name="bereken" action="" method="post">
		
		<h2>
<?php
	echo "jij zit in groep ";
		echo $groep . " ";

		if ($operator2 == "/"){
		echo "<br />";
		echo "rond af op 2 decimalen";
		}
		echo "<br />";
		echo $getal1;
		echo $operator2;
		echo $getal2;
		echo "="
?>
<form  method="post" name="execute" action="">
	<input type="text" name="antwoord" size="15"/>
	<input type="hidden" name="getal1" value="<?php echo $getal1; ?>">
	<input type="hidden" name="getal2" value="<?php echo $getal2; ?>">
	<input type="hidden" name="operator2" value="<?php echo $operator2; ?>">
	<input type="hidden" name="uitkomst" value="<?php echo $uitkomst; ?>">
	<input type="submit" name="bereken" value="Verstuur je antwoord"/>
	</h2>
</form>
</form>
<?php
}
?>
</body>
</html>