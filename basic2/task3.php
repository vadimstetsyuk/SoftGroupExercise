<?php

/**
 * Use while() to print a table of Fahrenheit and Celsius temperature equivalents from –50 
 * degrees F to 50 degrees F in 5-degree increments. On the Fahrenheit temperature scale, 
 * water freezes at 32 degrees and boils at 212 degrees. On the Celsius scale, water 
 * freezes at 0 degrees and boils at 100 degrees. So, to convert from Fahrenheit to 
 * Celsius, you subtract 32 from the temperature, multiply by 5, and divide by 9. To 
 * convert from Celsius to Fahrenheit, you multiply by 9, divide by 5, and then add 32.
 */
 
$startFTemperature = -50;
$maxFTemperature = 50;
$step = 5;

echo "<table border='1'>";
echo "<tr><th>Фаренгейт</th><th>Цельсій</th></tr>";
while ($startFTemperature <= $maxFTemperature) {
  $celsius = 5 / 9 * ($startFTemperature - 32);
  print "<tr><td>$startFTemperature F</td><td>".round($celsius, 2). " C </td></tr>";
  $startFTemperature += $step;
}
echo "</table>";