<?php
    echo '<h1>First task</h1>';

	echo '<h4>The errors in this code are: </h4>';
    echo '<ul>
            <li>Space between \'<\?\' and \'php\' in line 1. Must be \'<\?php\', because this construction does not interpret as php code.</li>
            <li>The second single-quote character (\') is interpreted as the closing of the print statement in line 3.</li>
            <li>Double \'??>\' at end of the code. Must be \'?>\' or at all without it, because it contains only PHP code.</li>
         </ul>';

	/**
	*  function to find out a total cost for meal
	*  $hamburgers - amount of hamburgers
	*  $chocolateMilkShake - amount of chocolate milkshake
	*  $cola - amount of cola
	*/
	echo '<h1>Second task</h1>'	;

	function totalCost($hamburgers, $chocolateMilkShake, $cola){
		$partCost = $hamburgers * 4.95 + $chocolateMilkShake * 1.95 + $cola * 0.85;
		$preTaxTip = $partCost * 0.16;
		$salesTaxRate = ($partCost + $preTaxTip) * 0.075;
		$totalCost = $partCost + $preTaxTip + $salesTaxRate;
		
		echo <<<TABLE
		<table>
			<thead>
				<th>Product</th>
				<th>Quantity</th>
				<th>Price</th>
			<thead>

			<tr>
				<td>Humburger</td>
				<td>{$hamburgers}</td>
				<td>4.95</td>
			</tr>

			<tr>
				<td>Chocolate milkshake</td>
				<td>{$chocolateMilkShake}</td>
				<td>1.95</td>
			</tr>

			<tr>
				<td>Cola</td>
				<td>{$cola}</td>
				<td>0.85</td>
			</tr>

		</table>
        <h3>Pre-tax tip: {$preTaxTip}</h3>
        <h3>Sales tax rate: {$salesTaxRate}</h3>
		<h2>#Total: {$totalCost}</h2>
TABLE;

		return $totalCost;

		
	}
	totalCost(2, 1, 1);


    echo '<h1>Third task</h1>';
	/**
	*  Prints out my first and last name and their lenghts
	*/
	
	$firstName = "Vadim";
	$lastName = "Stetsyuk";
	echo $firstName . ' ' . $lastName . '<br>'	;
	echo mb_strlen($firstName) . ' ' . mb_strlen($lastName) . '<br>';


    echo '<h1>Fourth task</h1>';
	/**
	* Program that uses the increment operator ( ++ ) and the combined multiplication operator ( *= )
	*/
	
	$pow = 1;
	for ($i = 1; $i <= 5; $i++) {
		$pow *= 2;
		echo $pow . ' ';
	}