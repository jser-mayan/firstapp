<?php 

	function fbnq($n){
	    if($n <= 0){
	        return 0;
	    }
	    $array[1] = $array[2] = 1;
	    for($i=3;$i<=$n;$i++){
	        $array[$i] = $array[$i-1] + $array[$i-2]; 
	    }
	    return $array;
	}

	if(isset($_POST['num'])){
		$num = $_POST['num'];
	    $file  = "fibonacci_$num.txt";
 		$content = implode(",", fbnq($num));
		file_put_contents($file, $content);
	}

	$sum = 0;
	if(isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c']) && isset($_POST['nums'])){

		$total = ($_POST['a'] + $_POST['b']) * $_POST['c'];
		$avgs = $_POST['a'] + $_POST['b'] + $_POST['c'];
		$nums = $_POST['nums'];
		$files  = "fibonacci_$nums.txt";
		$res = explode(',',file_get_contents($files));
		foreach ($res as $key => $value) {
			$sum += $value;
		}
		$total = $total + $sum;
		$avg = ($avgs + $sum) / (count($res)+3);
		$avg =  round($avg,2);
		file_put_contents('result.txt', $avg);

		echo "Total Sum: $total<br>
		Average: $avg";

	}else{
		echo "
			<form action='result.php' method='POST'>
			  <p>A: <input type='text' name='a' /></p>
			  <p>B: <input type='text' name='b' /></p>
			  <p>C: <input type='text' name='c' /></p>
			  <input type='hidden' name='nums' value=$num />
			  <input type='submit' value='Submit' style='background-color: #6495ED' />
			</form>
		";
	}
	
?>
