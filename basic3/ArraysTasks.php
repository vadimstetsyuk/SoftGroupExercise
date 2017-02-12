<?php

function printAssocArray($array) {
    echo "<table border='4'>
        <tr>
            <th>Location</th>
            <th>Population</th>
        </tr>
    ";

    $total = 0;

    foreach($array as $key => $value) {
        echo '<tr>
                <td>'.$key.'</td>
                <td>'.number_format($value).'</td>
            </tr>
            ';
        $total += (int)$value;
    }
    

    echo '
            <tr>
                <td><b>Total:</b></td>
                <td><b>'.number_format($total).'</b></td>
            </tr>
    </table>';
}

/**
 * The 10 largest American cities (by population) in 2010 were as follows:
 *  New York, NY (8,175,133 people)
 *  Los Angeles, CA (3,792,621)
 *  Chicago, IL (2,695,598)
 *  Houston, TX (2,100,263)
 *  Philadelphia, PA (1,526,006)
 *  Phoenix, AZ (1,445,632)
 *  San Antonio, TX (1,327,407)
 *  San Diego, CA (1,307,402)
 *  Dallas, TX (1,197,816)
 *  San Jose, CA (945,942)
 *
 * Define an array (or arrays) that holds this information about locations and populations. 
 * Print a table of locations and population information that includes the total population in all 10 cities.
 */
echo '<h1>#First task</h1>';

$countries = [   
                 'New York, NY'         =>      '8175133', 
                 'Los Angeles, CA'      =>      '3792621', 
                 'Chicago, IL'          =>      '2695598', 
                 'Houston, TX'          =>      '2100263', 
                 'Philadelphia, PA'     =>      '1526006', 
                 'Phoenix, AZ'          =>      '1445632', 
                 'San Antonio, TX'      =>      '1327407', 
                 'San Diego, CA'        =>      '1307402', 
                 'Dallas, TX'           =>      '1197816', 
                 'San Jose, CA'         =>      '945942'
];

printAssocArray($countries);

/**
 * Modify your solution to the previous exercise so that the rows 
 * in the result table are ordered by population. 
 *
 * Then modify your solution so that the rows are ordered by city name.
 */

echo '<h1>#Second task</h1>';

echo '<h3>Sorted array by population</h3>';
asort($countries);
printAssocArray($countries);

echo '<h3>Sorted array by location</h3>';
ksort($countries);
printAssocArray($countries);


/**
 * Modify your solution to the first exercise so that the table also contains rows that 
 * hold state population totals for each state represented in the list of cities.
 */

echo '<h1>#Third task</h1>';

$countries = [  
                [ 'NY',   'New York',        '8175133'], 
                [ 'CA',   'Los Angeles',     '3792621'], 
                [ 'IL',   'Chicago',         '2695598'], 
                [ 'TX',   'Houston',         '2100263'], 
                [ 'PA',   'Philadelphia',    '1526006'], 
                [ 'AZ',   'Phoenix',         '1445632'], 
                [ 'TX',   'San Antonio',     '1327407'], 
                [ 'CA',   'San Diego',       '1307402'], 
                [ 'TX',   'Dallas',          '1197816'], 
                [ 'CA',   'San Jose',        '945942']
];

$state = [];

foreach($countries as $item) {
    array_key_exists($item[0], $state) ? $state[$item[0]] += (int)$item[2] : $state[$item[0]] = $item[2];
}
printAssocArray($state);