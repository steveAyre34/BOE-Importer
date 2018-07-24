<?php include 'C:/xampp/htdocs/BOE-Importer/assets/php/database.php'; ?>
<?php include 'C:/xampp/htdocs/BOE-Importer/assets/php/import-queries.php'; ?>
<?php include 'C:/xampp/htdocs/BOE-Importer/assets/php/verified-queries.php'; ?>

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
                <label><b>*</b>County</label>
                <select class="selectpicker" data-live-search="true" id="locality-dropdown" name="locality" required></select>
            </div>
            <div class="centered-div display-table">
                <div class="centered-div display-table-row">
                    <div class="display-table-cell padding-30px">
                        <label><b>*</b>Raw File</label>
                    </div>
                    <div class="display-table-cell">
                        <input id="import-file" type="file" name= "import" required>
                    </div>
                    <div class="display-table-cell">
                        <img class="loading-img" src="/BOE-Importer/assets/images/loading.gif">
                        <p class="message">&nbsp</p>
                    </div>
                    <div class= "errorcheck">
                        <button class="btn-danger" id="button1" type="button">View Errors </button>
                    </div>
                </div>
                <div class="centered-div display-table-row">
                    <div class="display-table-cell">
                        <label><b>*</b>Verified File</label>
                    </div>
                    <div class="display-table-cell">
                        <input id="verified-file" type="file" name= "verified" required>
                    </div>
                    <div class="display-table-cell">
                        <img class="loading-img" src="/BOE-Importer/assets/images/loading.gif">
                        <p class="message"></p>
                    </div>
                    <div class= "errorcheck">
                        <button class="btn-danger" id="button2" type="button">View Errors </button>
                    </div>
                </div>
                <div class="display-table-cell">
                        <br/><input type="submit" id="submit" name="submit" value="Submit" />
                </div>
            </div>
        </div>
   </form>
</body>


    <!-- Latest compiled JavaScript -->
    <script src="/BOE-Importer/assets/js/step-1.js"></script>
    <script src="/BOE-Importer/assets/js/step-2.js"></script>
    <script src="/BOE-Importer/assets/js/step-3.js"></script>