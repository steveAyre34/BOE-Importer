
/*Showing the list of counties Using JQuery */

let dropdown = $('#locality-dropdown');

dropdown.empty();

dropdown.append('<option value="default" selected="true" disabled>Choose County</option>');
dropdown.prop('selectedIndex', 0);

const url = '/BOE-Importer/assets/data/location.json';

// Populate dropdown with list of provinces
$.getJSON(url, function (data) {
  $.each(data, function (key, entry) {
    dropdown.append($('<option></option>').text(entry).attr('value', entry));
  })
});

// function countySubmit(){
  // $("select.county").change(function(){
  //     var selectedCounty = $(".county option:selected").val();
  //     $('#submit').click(function () {
  //       if ($("#locality-dropdown")[0].selectedIndex <= 0) {
  //         alert("There is no option selected");
  //     }
  //       else{
  //         alert("You have selected the county - " + selectedCounty);
  //       }
  //     });
  // });
// }