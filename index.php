<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Importer - BOE Filter</title>
    <link rel="stylesheet" type="text/css" href="/BOE-Importer/assets/css/style.css">
</head>

<body class="background-grey">
    <div>
        <div id="step1" class="centered-div">
            <h3>Step 1</h3>
            <div class="centered-div width-50 margin-bottom-10px">
                <label>County</label>
                <select class="padding-5px">
                    <option>--Select County--</option>
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                </select>
            </div>
            <div class="centered-div display-table">
                <div class="centered-div display-table-row">
                    <div class="display-table-cell padding-30px">
                        <label>Raw File</label>
                    </div>
                    <div class="display-table-cell">
                        <input id="import-file" type="file">
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
                        <input id="verified-file" type="file">
                    </div>
                    <div class="display-table-cell">
                        <img class="loading-img" src="/BOE-Importer/assets/images/loading.gif">
                        <p class="message"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/BOE-Importer/assets/js/step-1.js"></script>