<?php
$table = '';
if (isset($_GET['delimiter'])) {
    $table = "<table border=\"1\" cellpadding=\"0\"><tr><td>Name</td><td>Age</td></tr>";

    $delimiter = $_GET['delimiter'];
    if(isset($_GET['names']) && isset($_GET['ages'])) {
        $names = $_GET['names'];
        $ages = $_GET['ages'];

        $namesArr = explode($delimiter, $names);
        $agesArr = explode($delimiter, $ages);

        $counter = 0;
        $items = 5;

            for ($i = $counter; $i < count($namesArr); $i++) {
                $counter++;

                if(intval($agesArr[$i]) >= 18) {
                    $row = "<tr><td>{$namesArr[$i]}</td><td>{$agesArr[$i]}</td></tr>";
                    $table .= $row;
                }
                if($counter === $items && count($namesArr) > 5) {
                    $table .= "<tr><td><a href='?counter=".$counter."'>Next</a></td></tr>";
                    $items += 5;
                    break;
                }
            }
        if(isset($_GET['counter'])) {
            $table .= "<tr><td><a href='?previous=".$counter."'>Previous</a></td></tr>";
            for ($i = $counter + 1; $i < count($namesArr); $i++) {
                $counter++;

                if(intval($agesArr[$i]) >= 18) {
                    $row = "<tr><td>{$namesArr[$i]}</td><td>{$agesArr[$i]}</td></tr>";
                    $table .= $row;
                }
                if($counter === $items) {
                    $table .= "<tr><td><a href='?counter=".$counter."'>Next</a></td></tr>";
                    break;
                }
            }
        }



    }
}


include("studentsInfoFrontEnd.php");
