<?php

require_once('db.php');

if (empty($_GET)) {
    $query = mysqli_query($conn, "SELECT * FROM session");

    $result = array();
    while ($row = mysqli_fetch_array($query)) {
        array_push($result, array(
        	'npm' => $row['npm'],
            'nama' => $row['nama'],
            'username' => $row['username'],
            'id' => $row['id'],                        
            'prodi' => $row['prodi'],
            'email' => $row['email'],
            'telp' => $row['telp'],
            'pass' => $row['pass'],
            'image' => $row['image'],
            'barcode' => $row['barcode']
        ));
    }

    echo json_encode(
        array('array' => $result)
    );
} else {
    $query = mysqli_query($conn, "SELECT * FROM session WHERE id=" . $_GET['id']);
    $result = array();
    while ($row = $query->fetch_assoc()) {
        $result = array(
            'npm' => $row['npm'],
            'nama' => $row['nama'],
            'username' => $row['username'],
            'id' => $row['id'],                        
            'prodi' => $row['prodi'],
            'email' => $row['email'],
            'telp' => $row['telp'],
            'pass' => $row['pass'],
            'image' => $row['image'],
            'barcode' => $row['barcode']
        );
    }
    echo json_encode(
        $result
    );
}
