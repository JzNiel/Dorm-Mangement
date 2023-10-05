<?php  
    require 'connection.php';

    function get($conn) { 
        $query = "SELECT * FROM students";
        $res = $conn->query($query);
        $records = array();
        while($row = $res->fetch_assoc()) {
            array_push($records, $row);
        }
        return json_encode($records);
    }

function gett($conn) { 
        $query = "SELECT * FROM students";
        $res = $conn->query($query);
        $records = array();
        while($row = $res->fetch_assoc()) {
            array_push($records, $row);
        }
        return json_encode($records);
    }


    function update($conn, $name,  $point, $id) {
        $query = 
            "UPDATE students
            SET
                `name` = '$name',
                `point` = '$point'
            WHERE
                `id` = '$id'";
        if($conn->query($query)) {
            return "updated";
        } else {
            return "failed";
        }
    }

    function get_id($conn, $id) {
        $query = "SELECT * FROM students
            WHERE `id` = '$id'";
        $res = $conn->query($query);
        $records = array();
        while($row = $res->fetch_assoc()) {
            array_push($records, $row);
        }
        return json_encode($records);
    }


    function a($conn, $name, $course_section, $sem) {
        $query = 
            "INSERT INTO student_info
            SET
                `name` = '$name',
                `course_section` = '$course_section',
                `sem` = '$sem'";

        if($conn->query($query)) {
            return "inserted";
        } else {
            return "failed";
        }
    }

    function aad($conn, $point) {
        $query = 
            "INSERT INTO students
            SET
                
                `point` = '$point'";

        if($conn->query($query)) {
            return "inserted";
        } else {
            return "failed";
        }
    }

    function add($conn, $value, $date) {
        $query = 
            "INSERT INTO students
            SET
                
                `value` = '$value',
                `date` = '$date'";

        if($conn->query($query)) {
            return "inserted";
        } else {
            return "failed";
        }
    }