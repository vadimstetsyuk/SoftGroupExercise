<?php

    /**
 * Without running it through the PHP engine, figure out what this program prints:
    $age = 12;
    $shoe_size = 13;

    if ($age > $shoe_size) {
        print "Message 1.";
    } elseif (($shoe_size++) && ($age > 20)) {
        print "Message 2.";
    } else {
        print "Message 3.";
    }
    print "Age: $age. Shoe Size: $shoe_size";
 */

 echo 'Очікуваний результат: <br> Message 3.Age: 12. Shoe Size: 14';