<?php include 'C:/xampp/htdocs/BOE-Importer/assets/php/database.php'; ?>

<?php
   if(isset($_POST['submit'])){
    $selected_val = $_POST['locality'];  // Storing Selected Value In Variable
    $import = '_import.csv';
    $verified = '_verified.csv';
    $import2 ='_import';
    $verified2 ='_verified';

    $query1 = "DROP TABLE IF EXISTS `$selected_val$import2`";
    $result1 = $mysqli->query($query1) or die($mysqli->error.__LINE__);
    $query2 = "DROP TABLE IF EXISTS `$$selected_val$verified2`";
    $result2 = $mysqli->query($query2) or die($mysqli->error.__LINE__);
    //Queries

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

             $query4 = "LOAD DATA LOCAL INFILE 'C:/xampp/htdocs/BOE-Importer/assets/data/import/$selected_val$import'
             INTO TABLE `$selected_val$import2` 
             FIELDS TERMINATED BY ',' 
             LINES TERMINATED BY '\n'
             IGNORE 1 ROWS";
            $result4 = $mysqli->query($query4) or die($mysqli->error.__LINE__);

        //Verified queries
        
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

        $query6 = "LOAD DATA LOCAL INFILE 'C:/xampp/htdocs/BOE-Importer/assets/data/verified/$selected_val$verified' 
        INTO TABLE `$selected_val$verified2` 
        FIELDS TERMINATED BY ',' 
        LINES TERMINATED BY '\n'
        IGNORE 1 ROWS";
   $result6 = $mysqli->query($query6) or die($mysqli->error.__LINE__);
    }
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Importer - BOE Filter</title>
  <link rel="stylesheet" type="text/css" href="/BOE-Importer/assets/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>

</head>

<body class="background-grey">
<form method="post" id="cpa-form" class="forms">
        <div id="step1" class="centered-div">
            <div class="centered-div width-50 margin-bottom-10px">
                <label>County</label>
                <select id="locality-dropdown" name="locality"></select>
            </div>
            <div class="centered-div display-table">
                <div class="centered-div display-table-row">
                    <div class="display-table-cell padding-30px">
                        <label>Raw File</label>
                    </div>
                    <div class="display-table-cell">
                        <input id="import-file" type="file" name= "import" required>
                    </div>
                    <div class="display-table-cell">
                        <img class="loading-img" src="/BOE-Importer/assets/images/loading.gif">
                        <p class="message"></p>
                    </div>
                </div>
                <div class="centered-div display-table-row">
                    <div class="display-table-cell">
                        <label>Verified File</label>
                    </div>
                    <div class="display-table-cell">
                        <input id="verified-file" type="file" name= "verified" required>
                    </div>
                    <div class="display-table-cell">
                        <img class="loading-img" src="/BOE-Importer/assets/images/loading.gif">
                        <p class="message"></p>
                    </div>
                </div>
                <div class="display-table-cell">
                        <br/><input type="submit" id="submit" name="submit" value="submit" />
                </div>
            </div>
        </div>
   </form>
</body>


    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <script src="/BOE-Importer/assets/js/step-1.js"></script>
    <script src="/BOE-Importer/assets/js/step-2.js"></script>