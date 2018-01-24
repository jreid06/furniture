<?php
    include 'scripts/dbconnect.php';
    $id = bin2hex(random_bytes(20));
    $user_address = new Address($id, 'Mr.', 'jason', 'reid', '0207675464', '39 testing road', 'n/a', 'n/a', 'london', 'sw3 56g', 'United Kingdom');

    echo $user_address->title;
    echo "<br>";
    echo $user_address->fullname();

    $arr = array();

    array_push($arr, $user_address);

    echo "<br>";
    echo "<br>";
    var_dump($arr);

    $id = bin2hex(random_bytes(20));
    echo "<br>";
    echo "<br>";

    echo "Random id: " . bin2hex(random_bytes(20)) . "<br>";
    echo "Random id: " . bin2hex(random_bytes(20)) . "<br>";
    echo "Random id: " . bin2hex(random_bytes(20)) . "<br>";
    echo "Random id: " . bin2hex(random_bytes(20)) . "<br>";
    echo "Random id: " . bin2hex(random_bytes(20)) . "<br>";
    echo "Random id: " . bin2hex(random_bytes(20)) . "<br>";
    echo "Random id: " . bin2hex(random_bytes(20)) . "<br>";



 ?>
