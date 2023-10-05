<?php  
    require 'connection.php';

    function getD($conn) { 
        $query = "SELECT * FROM dorms";
        $res = $conn->query($query);
        $records = array();
        while($row = $res->fetch_assoc()) {
            array_push($records, $row);
        }
        return json_encode($records);
    }


    function addD($conn, $name, $type, $date) {
        $query = 
            "INSERT INTO logbook
            SET
                `name` = '$name',
                `type` = '$type',
                `date` = '$date'";

        if($conn->query($query)) {
            return "inserted";
        } else {
            return "failed";
        }
    }
