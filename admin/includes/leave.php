<?php  
    require 'connection.php';

    function get($conn) { 
        $query = "SELECT * FROM leave_form";
        $res = $conn->query($query);
        $records = array();
        while($row = $res->fetch_assoc()) {
            array_push($records, $row);
        }
        return json_encode($records);
    }


    function add($conn, $name, $letter, $status) {
        $query = 
            "INSERT INTO leave_form
            SET
                `name` = '$name',
                `letter` = '$letter',
                `status` = '$status'";

        if($conn->query($query)) {
            return "inserted";
        } else {
            return "failed";
        }
    }

function get_id($conn, $id) {
        $query = "SELECT * FROM leave_form
            WHERE `id` = '$id'";
        $res = $conn->query($query);
        $records = array();
        while($row = $res->fetch_assoc()) {
            array_push($records, $row);
        }
        return json_encode($records);
    }

    function update($conn, $name, $letter, $status, $id) {
        $query = 
            "UPDATE leave_form
            SET
                `name` = '$name',
                `letter` = '$letter',
                `status` = '$status'
            WHERE
                `id` = '$id'";
        if($conn->query($query)) {
            return "updated";
        } else {
            return "failed";
        }
    }