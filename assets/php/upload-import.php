<?php

    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], '../data/import/' . $_FILES['file']['name']);
        $file = fopen('../data/import/' . $_FILES['file']['name'], "r");
        echo json_encode(fgetcsv($file));
    }

?>