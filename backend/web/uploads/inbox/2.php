<?php ?>

<!DOCTYPE html>
<html>
<head>
	<title>matritsa</title>
	<style type="text/css">
		table{
			border-collapse: collapse;
		}
		td{
			width:35px;
			text-align: center;
		}
		.result{
			margin: 10px;
			float: left;
		}
	</style>
</head>
<body>
	<form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="GET">
		<h4>1-matritsa</h4>
		<?php
		for ($i=0; $i < 4; $i++) { 
			for ($j=0; $j < 4; $j++) {
				$name='a';
				$name=$name.$i.$j; 
				echo "<input name='".$name."' size='6' value='".$_GET[$name]."'>";
			}
			echo "<br>";
		}
		?>
 		<h4>2-matritsa</h4>
		<?php
		for ($i=0; $i < 4; $i++) { 
			for ($j=0; $j < 4; $j++) {
				$name='b';
				$name=$name.$i.$j; 
				echo "<input name='".$name."' size='6' value='".$_GET[$name]."'>";
			}
			echo "<br>";
		}
		?>

		<input type="submit" name="ok" value="Hisobla">

	</form>

		<?php if(isset($_GET['ok']))
		{

			for ($i=0; $i <4 ; $i++) { 
				for ($j=0; $j < 4; $j++) { 
						$n1="a".$i.$j; 
						$n2="b".$i.$j; 
						$a[$i][$j]=$_GET["$n1"];	
						$b[$i][$j]=$_GET["$n2"];	
				}
			}

			$add="<div class='result'><h5>Yigindi:</h1><table border='1'>";
			$mult="<div class='result'><h5>Ko'paytma:</h5><table border='1'>";

			for($i=0;$i<4;$i++)
			{
				$add.="<tr>";$mult.="<tr>";
				for ($j=0; $j < 4; $j++) { 
					$add.="<td>".($a[$i][$j]+$b[$i][$j])."</td>";
					$m=0;
						for ($k=0; $k < 4; $k++) { 
							$m=$m+$a[$i][$k]*$b[$k][$j];
						}
					$mult.="<td>".$m."</td>";
					}
				$add.="</tr>";$mult.="</tr>";
			}
			$add.="</table></div>";$mult.="</teble></div>";
			echo $add;
			echo $mult;
		}
		?>
</body>
</html>