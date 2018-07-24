<?php
//Run the queries only when the submit box is clicked

   if(isset($_POST['submit'])){
    $selected_val = $_POST['locality'];  // Storing Selected Value In Variable
    $file_name = $_POST['import'];
    $import = '_import.csv';//String values
    $import2 ='_import';//String values
    $fileName = substr($file_name, 0, -11);
    $selectedVal = strtolower($selected_val);
//     echo "The file selecetd to import is $fileName " ;
//     echo "The county selected is $selectedVal";
    /*Queries to import Import file data*/
    
    //Drop the existing table for import file data to create new table with the same name
    if ($fileName == $selectedVal) {
            $query1 = "DROP TABLE IF EXISTS `$selected_val$import2`";
            $result1 = $mysqli->query($query1) or die($mysqli->error.__LINE__);

    //Create new table with the name of the table as county_import

            $query3 ="CREATE TABLE `$selected_val$import2` (
                `voter_id` varchar(15) NOT NULL,
                `first_name` varchar(15) DEFAULT NULL,
                `middle_name` varchar(15) DEFAULT NULL,
                `last_name` varchar(20) DEFAULT NULL,
                `suffix` varchar(4) DEFAULT NULL,
                `street_no` varchar(8) DEFAULT NULL,
                `half_code` varchar(5) DEFAULT NULL,
                `street_name` varchar(30) DEFAULT NULL,
                `apt_no` varchar(12) DEFAULT NULL,
                `address2` varchar(40) DEFAULT NULL,
                `address3` varchar(40) DEFAULT NULL,
                `city` varchar(25) DEFAULT NULL,
                `state` char(2) DEFAULT NULL,
                `zip` char(5) DEFAULT NULL,
                `zip4` char(4) DEFAULT NULL,
                `file_created` varchar(15) DEFAULT NULL,
                `dob` datetime DEFAULT NULL,
                `sex` char(1) DEFAULT NULL,
                `eye_color` varchar(3) DEFAULT NULL,
                `height_ft` char(1) DEFAULT NULL,
                `height_in` varchar(2) DEFAULT NULL,
                `area_code` char(3) DEFAULT NULL,
                `telephone` varchar(8) DEFAULT NULL,
                `reg_datetime` datetime DEFAULT NULL,
                `reg_source` varchar(10) DEFAULT NULL,
                `motor_id` varchar(20) DEFAULT NULL,
                `party` varchar(3) DEFAULT NULL,
                `town` varchar(3) DEFAULT NULL,
                `ward` varchar(3) DEFAULT NULL,
                `district` varchar(3) DEFAULT NULL,
                `cong_district` varchar(3) DEFAULT NULL,
                `sen_district` varchar(3) DEFAULT NULL,
                `leg_district` varchar(3) DEFAULT NULL,
                `school_district` varchar(3) DEFAULT NULL,
                `asm_district` varchar(3) DEFAULT NULL,
                `village` varchar(3) DEFAULT NULL,
                `fire_district` varchar(3) DEFAULT NULL,
                `user1` varchar(3) DEFAULT NULL,
                `user2` varchar(3) DEFAULT NULL,
                `user3` varchar(3) DEFAULT NULL,
                `user4` varchar(3) DEFAULT NULL,
                `voter_status` varchar(1) DEFAULT NULL,
                `reason` varchar(10) DEFAULT NULL,
                `absentee` char(1) DEFAULT NULL,
                `m_address1` varchar(40) DEFAULT NULL,
                `m_address2` varchar(40) DEFAULT NULL,
                `m_address3` varchar(40) DEFAULT NULL,
                `m_address4` varchar(40) DEFAULT NULL,
                `m_city` varchar(25) DEFAULT NULL,
                `m_state` char(2) DEFAULT NULL,
                `m_zip` char(5) DEFAULT NULL,
                `m_zip4` char(4) DEFAULT NULL,
                `abs_election` varchar(4) DEFAULT NULL,
                `abs_code` varchar(3) DEFAULT NULL,
                `abs_application` datetime DEFAULT NULL,
                `abs_address1` varchar(40) DEFAULT NULL,
                `abs_address2` varchar(40) DEFAULT NULL,
                `abs_address3` varchar(40) DEFAULT NULL,
                `abs_address4` varchar(40) DEFAULT NULL,
                `abs_city` varchar(25) DEFAULT NULL,
                `abs_state` char(2) DEFAULT NULL,
                `abs_zip` char(5) DEFAULT NULL,
                `abs_zip4` char(4) DEFAULT NULL,
                `abs_ballot_issued` datetime DEFAULT NULL,
                `abs_ballot_received` datetime DEFAULT NULL,
                `abs_ballot_reissued` datetime DEFAULT NULL,
                `abs_ballot_rereceived` datetime DEFAULT NULL,
                `abs_expire` datetime DEFAULT NULL,
                `abs_eligible` char(1) DEFAULT NULL,
                `abs_reason` varchar(40) DEFAULT NULL,
                `history1` varchar(4) DEFAULT NULL,
                `history2` varchar(4) DEFAULT NULL,
                `history3` varchar(4) DEFAULT NULL,
                `history4` varchar(4) DEFAULT NULL,
                `history5` varchar(4) DEFAULT NULL,
                `history6` varchar(4) DEFAULT NULL,
                `history7` varchar(4) DEFAULT NULL,
                `history8` varchar(4) DEFAULT NULL,
                `history9` varchar(4) DEFAULT NULL,
                `history10` varchar(4) DEFAULT NULL,
                `history11` varchar(4) DEFAULT NULL,
                `history12` varchar(4) DEFAULT NULL
            ) ENGINE=MyISAM DEFAULT CHARSET=latin1";

             $result3 = $mysqli->query($query3) or die($mysqli->error.__LINE__);

    //Indexes for table
             $query ="ALTER TABLE `$selected_val$import2`
             ADD PRIMARY KEY (`voter_id`),
             ADD KEY `voter_index` (`first_name`,`middle_name`,`last_name`,`suffix`,`street_no`,`half_code`,`street_name`,`apt_no`,`zip`,`zip4`)"; 
             $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    //Set Time zones

    // $query = "SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO'";
    // $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    // $query = "SET time_zone = '+00:00'";
    // $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    //Load the data from the file located in the assets/data/import table 
    //with the name <county>_import to the table that we created in the database
    
             $query4 = "LOAD DATA LOCAL INFILE 'C:/xampp/htdocs/BOE-Importer/assets/data/import/$selected_val$import'
             INTO TABLE `$selected_val$import2` 
             FIELDS TERMINATED BY ',' 
             LINES TERMINATED BY '\n'
             IGNORE 1 ROWS";
            $result4 = $mysqli->query($query4) or die($mysqli->error.__LINE__);
         
    }else{
        echo '<script language="javascript">';
        echo 'alert("County name is not matching with the Raw file selected")';  //not showing an alert box.
        echo '</script>';
       
}
}
?>