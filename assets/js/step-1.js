
$(document).ready(function () {
    $.getJSON('/BOE-Importer/assets/data/table-headers.json', function (counties) {
        console.log(counties);
    });
});

(function () {

    $("input[type=submit]").attr("disabled", "disabled");//Submit button is disabled initially
    $("#button1").hide();//Initially Error buttons are hidden
    $("#button2").hide();//Initially Error buttons are hidden
    $("#modal-body").html("");
    /* for import file of BOE filter */
    $(document).on("change", '#import-file', function () {
        var element = $(this);
        var error_messages = [];
        //--------------------------------------------------
        startLoader(element);
        var input = document.getElementById('import-file');
        file = input.files[0];
        if (notCSV(file)) {
            stopLoader(element);
            errorsDetected($(element).parent().parent().find(".message"), 1);
            error_messages.push("File must be a CSV file");
            alert("File must be a CSV file");
            $(element).val('');
            console.log(error_messages);
            $("input[type=submit]").attr("disabled", "disabled");
            $("#button1").show();//Show the errors button if the file is not CSV file
                            $("#button1").click( function(){//View errors button
                                $("#modal-body").html("");//Empty the popup window before adding other errors
                                // popup error messages when the errors button is clicked
                                if(error_messages.length){//Check if there are any errors in the array
                                    for( i=0; i< error_messages.length; i+=1){
                                        var row = error_messages[i];//take each row
                                        $("#modal-body").append($('<p></p>').text((i+1)+". "+row));// add row by row to Popup window to display
                                            
                                    }
                                    
                                }

                            });
        }
        else {
            var file_data = $(element).prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            $.ajax({
                url: '/BOE-Importer/assets/php/upload-import.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {
                    var headers = JSON.parse(response);
                    $.getJSON('/BOE-Importer/assets/data/table-headers.json', function (headers_template) {
                        var import_headers = headers_template["import"];
                        if (checkSizes(headers, import_headers)) {
                            var header_errors = checkEachHeader(headers, import_headers);
                            if (header_errors["errors"] == 0) {
                                stopLoader(element);
                                readyState($(element).parent().parent().find(".message"));
                                submitReady($(element).parent().parent().find(".message"));
                            }
                            else {
                                error_messages = error_messages.concat(header_errors["error_messages"]);
                                stopLoader(element);
                                errorsDetected($(element).parent().parent().find(".message"), header_errors["errors"]);
                                $(element).val('');
                                submitReady($(element).parent().parent().find(".message"));
                            }
                        }
                        else {
                            stopLoader(element);
                            errorsDetected($(element).parent().parent().find(".message"), 1);
                            $(element).val('');
                            error_messages.push("Files have different header amounts");
                            submitReady($(element).parent().parent().find(".message"));
                        }
                        console.log(error_messages);
                        if($(element).parent().parent().find(".message").hasClass("not-ready")){
                            $("#button1").show();//Show the errors button when there are any errors
                            $("#button1").click( function(){
                                $("#modal-body").html("");//Clear the popup window before adding new errors to the window
                                if(error_messages.length){//Check if there are any errors
                                    for( i=0; i< error_messages.length; i+=1){
                                        var row = error_messages[i];//Select each row to display
                                        $("#modal-body").append($('<p></p>').text((i+1)+". "+row));// add errors to the window body
                                            
                                    }
                                    
                                }
                        });
                    }
                    else{
                        $("#button1").hide();//Hide the errors button if there are no errors
                    }
                    });
                }
            });
        }
    });

    /* for import file of BOE filter */
    $(document).on("change", '#verified-file', function () {
        var element = $(this);
        var error_messages = [];
        //--------------------------------------------------
        startLoader(element);
        var input = document.getElementById('verified-file');
        file = input.files[0];
        if (notCSV(file)) {
            stopLoader(element);
            errorsDetected($(element).parent().parent().find(".message"), 1);
            error_messages.push("Must be a .csv File");
            alert("File must be a CSV file");
            $(element).val('');
            console.log(error_messages);
            $("input[type=submit]").attr("disabled", "disabled");
            $("#button1").show();//Show the errors button when there are any errors
                            $("#button1").click( function(){
                                $("#modal-body").html("");//Clear the popup window before adding new errors to the window
                                if(error_messages.length){//Check if there are any errors
                                    for( i=0; i< error_messages.length; i+=1){
                                        var row = error_messages[i];//Select each row to display
                                        $("#modal-body").append($('<p></p>').text((i+1)+". "+row));// add errors to the window body
                                            
                                    }
                                    
                                }
                            });
        }
        else {
            var file_data = $(element).prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            $.ajax({
                url: '/BOE-Importer/assets/php/upload-verified.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {
                    var headers = JSON.parse(response);
                    $.getJSON('/BOE-Importer/assets/data/table-headers.json', function (headers_template) {
                        var import_headers = headers_template["verified"];
                        if (checkSizes(headers, import_headers)) {
                            var header_errors = checkEachHeader(headers, import_headers);
                            if (header_errors["errors"] == 0) {
                                stopLoader(element);
                                readyState($(element).parent().parent().find(".message"));
                                submitReady($(element).parent().parent().find(".message"));
                               
                                    
                        }
                            else {
                                error_messages = error_messages.concat(header_errors["error_messages"]);
                                stopLoader(element);
                                errorsDetected($(element).parent().parent().find(".message"), header_errors["errors"]);
                                $(element).val('');
                                submitReady($(element).parent().parent().find(".message"));
                            }
                        }
                        else {
                            stopLoader(element);
                            errorsDetected($(element).parent().parent().find(".message"), 1);
                            $(element).val('');
                            error_messages.push("Files have different header amounts");
                            submitReady($(element).parent().parent().find(".message"));
                        }
                        console.log(error_messages);
                        if($(element).parent().parent().find(".message").hasClass("not-ready")){
                            $("#button2").show();//Show the errors button when there are any errors
                            $("#button2").click( function(){//Check if there are any errors
                                $("#modal-body").html("");//Clear the popup window before adding new errors to the window
                                if(error_messages.length){
                                    for( i=0; i< error_messages.length; i+=1){
                                        var row = error_messages[i];//Select each row to display
                                        $("#modal-body").append($('<p></p>').text((i+1)+". "+row));// add errors to the window body
                                            
                                    }
                                }
                        });
                    }
                    else{
                        $("#button2").hide();//Hide the errors button if there are no errors
                    }
                    });
                }
            });
        }
    });
})();

/*==========================================*/
/*===========LOADING GIF FUNCTIONS==========*/
/*==========================================*/

/* Start loader */
function startLoader(input_element) {
    $(input_element).parent().parent().find(".loading-img").show();
}

/* Stop loader */
function stopLoader(input_element) {
    $(input_element).parent().parent().find(".loading-img").hide();
}

/*==========================================*/
/*=========== ERROR CHECKS =================*/
/*==========================================*/

/* Checks if file is not a CSV file */
function notCSV(file) {
    return file["type"] != "application/vnd.ms-excel";
}

/* Check to make sure same number of columns in file */
function checkSizes(headers, headers_template) {
    return headers.length == headers_template.length
}

/* check each header if it matches template */
function checkEachHeader(headers, headers_template) {
    var errors = 0;
    var error_messages = [];
    for (var i = 0; i < headers.length; i++) {
        if (headers[i].toUpperCase() != headers_template[i].toUpperCase()) {
            error_messages.push("\"" + headers[i] + "\" does not match column header \"" + headers_template[i] + "\"");
            errors++;
        }
    }

    return {
        errors: errors,
        error_messages: error_messages
    };
}

/* Errors detected text */
function errorsDetected(element, errors) {
    $(element).removeClass("ready");
    $(element).parent().parent().find(".message").addClass("not-ready");
    $(element).parent().parent().find(".message").text("Not Ready");
}

/*==============================================*/
/*============READY STATE=======================*/
/*==============================================*/

function readyState(element) {
    $(element).removeClass("not-ready");
    $(element).addClass("ready");
    $(element).text("Ready");
    
}
/* This function is to enable or disable the submit button accordingly */
function submitReady(element){   
            if($(element).hasClass("not-ready")){
                $("input[type=submit]").attr("disabled", "disabled");   
            }else if($(element).hasClass("ready")){
                $("#submit").removeAttr("disabled");
            }
}

