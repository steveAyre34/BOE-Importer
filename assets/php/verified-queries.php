<?php
//Run the queries only when the submit box is clicked

   if(isset($_POST['submit'])){

    $selected_val = $_POST['locality'];  // Storing Selected Value In Variable
    $file_name = $_POST['verified'];
    $verified = '_verified.csv';//String values
    $verified2 ='_verified';//String values
    $fileName = substr($file_name, 0, -13);
    $selectedVal = strtolower($selected_val);
    // echo "The file selecetd to import is $fileName " ;
    // echo "The county selected is $selectedVal";
     
    /*Queries to import verified file data*/
       
    //Drop the existing table for verified file data to create new table with the same name
    if ($fileName == $selectedVal) {
            $query2 = "DROP TABLE IF EXISTS `$selected_val$verified2`";
            $result2 = $mysqli->query($query2) or die($mysqli->error.__LINE__);
    
    //Create new table with the name of the table as <county>_verified
        
             $query5 ="CREATE TABLE `$selected_val$verified2` (
                `voter_id` varchar(100) NOT NULL,
                `full_name` varchar(150) NOT NULL,
                `address1` varchar(150) NOT NULL,
                `address2` varchar(150) NOT NULL,
                `city` varchar(100) NOT NULL,
                `state` varchar(50) NOT NULL,
                `zip` varchar(20) NOT NULL,
                `zip4` varchar(10) NOT NULL,
                `crrt` varchar(20) NOT NULL,
                `dp3` varchar(10) NOT NULL,
                `foreign_city` varchar(150) NOT NULL,
                `foreign_pc` varchar(30) NOT NULL,
                `foreign_country` varchar(150) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

        $result5 = $mysqli->query($query5) or die($mysqli->error.__LINE__);
    
    //Load the data from the file located in the assets/data/verified table 
    //with the name <county>_verified to the table that we created in the database

        $query6 = "LOAD DATA LOCAL INFILE 'C:/xampp/htdocs/BOE-Importer/assets/data/verified/$selected_val$verified' 
        INTO TABLE `$selected_val$verified2` 
        FIELDS TERMINATED BY ',' 
        LINES TERMINATED BY '\n'
        IGNORE 1 ROWS";
        $result6 = $mysqli->query($query6) or die($mysqli->error.__LINE__);

        header("Location: /BOE-Importer/assets/php/success.php");
    }else{
        echo '<script language="javascript">';
        echo 'alert("County name is not matching with the Verified file selected")';  //not showing an alert box.
        echo '</script>';
    }
   }
?>