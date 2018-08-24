<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PHP Regnemaskine</title>
	<link rel="stylesheet" href="minstyle.css">
</head>
<body>
	<?php 

	// Resultatet som vi skal udskrive i senere, er tom som default.
	$result = "";
	class regnemaskine
	{

		// de to værdier
		var $a;
		var $b;

		// funktion med switch som definerer regnearterne
		function tjekregneart($regneart)
		{
			switch($regneart)
			{
				case '+':
				return $this->a + $this->b;
				break;

				case '-':
				return $this->a - $this->b;
				break;

				case '*':
				return $this->a * $this->b;
				break;

				case '/':
				return $this->a / $this->b;
				break;

				// Hvis der ikke er indtastet noget udskrives dette.
				default:
				return "Kunne ikke finde noget indtastet data!";
			}   
		}

		// $c er resultatet der skal udskrives
		function resultat($a, $b, $c)
		{
			$this->a = $a;
			$this->b = $b;
			return $this->tjekregneart($c);
		}
	}

	// Når der bliver trykket på knappen. Dataen fra mine inputs (n1, n2 og regnarten op) bliver udregnet og udskrevet.
	$udregn = new regnemaskine();
	if(isset($_POST['submit']))
	{   
		$result = $udregn->resultat($_POST['n1'],$_POST['n2'],$_POST['op']);
	}
	?>


	<!-- Form med table og input felterne. Cases fra switch er fx defineret i dropdown option. -->
	<form method="post">
		<table align="center">
			<h1 align="center">Simpel regnemaskine</h1>
			<br>
			<tr>
				<td>Indtast 1. tal</td>
				<td><input type="text" name="n1"></td>
			</tr>
			<tr>
				<td>Vælg regneart</td>
				<td><select name="op">
					<option value="+">+</option>
					<option value="-">-</option>
					<option value="*">*</option>
					<option value="/">/</option>
				</select></td>
			</tr>
			<tr>
				<td>Indtast 2. tal</td>
				<td><input type="text" name="n2"></td>
			</tr>



			<tr>
				<td></td>
				<td><input class="submit" type="submit" name="submit" value="         =         "></td>
			</tr>

			<tr><td></td>
				<td style="font-size: 22px"><br><strong><?php echo $result; ?><strong></td>
				</tr>

			</table>
		</form>
	</body>
	</html>
