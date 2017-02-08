<?php

/** 
 * Modify your answer to Exercise 3 to use for() instead of while() .
 */

echo "<table border='1'>";
echo "<tr><th>Фаренгейт</th><th>Цельсій</th></tr>";
for ($startFTemperature = -50; $startFTemperature <= 50; $startFTemperature += 5) {
  $celsius = 5 / 9 * ($startFTemperature - 32);
  print "<tr><td>$startFTemperature F</td><td>".round($celsius, 2). " C </td></tr>";
}
echo "</table>";