<?php

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

$countries = [   
                 'New York, NY'         =>      '8,175,133', 
                 'Los Angeles, CA'      =>      '3,792,621', 
                 'Chicago, IL'         =>      '2,695,598', 
                 'Houston, TX'         =>      '2,100,263', 
                 'Philadelphia, PA'    =>      '1,526,006', 
                 'Phoenix, AZ'         =>      '1,445,632', 
                 'San Antonio, TX'      =>      '1,327,407', 
                 'San Diego, CA'        =>      '1,307,402', 
                 'Dallas, TX'          =>      '1,197,816', 
                 'San Jose, CA'         =>      '945,942'
];

echo "<table border='4'>
        <tr>
            <th>Location</th>
            <th>Population</th>
        </tr>
    ";
foreach($countries as $key => $value) {
    echo '<tr>
            <td>'.$key.'</td>
            <td>'.$value.'</td>
          </tr>
        ';
}

echo '</table>';