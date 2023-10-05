<?php  
    require 'connection.php';

    function getR($conn) { 
        $query = "SELECT * FROM rooms";
        $res = $conn->query($query);
        $records = array();
        while($row = $res->fetch_assoc()) {
            array_push($records, $row);
        }
        return json_encode($records);
    }


    function addR($conn, $name, $course_section, $sex, $school_year, $address, $dorm, $sem) {
        $query = 
            "INSERT INTO student_info
            SET
                `name` = '$name',
                `course_section` = '$course_section',
                `sex` = '$sex',
                `school_year` = '$school_year',
                `address` = '$address',
                `dorm` = '$dorm',
                `sem` = '$sem'";

        if($conn->query($query)) {
            return "inserted";
        } else {
            return "failed";
        }
    }
