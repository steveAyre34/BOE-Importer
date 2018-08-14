 $("#submit").click( function(){
    var optionSelected = $("select option:selected", this);
    var valueSelected = this.value;
    if(valueSelected =="Choose County"){
        alert("Please select a county");
  }
});



// var exists = false; 
// $('select  option').each(function(){
//   if (this.value == 'Choose County') {
//     exists = true;
//   }
// });