
/*Showing the list of counties Using JQuery */

let dropdown = $('#locality-dropdown');

dropdown.empty();

dropdown.append('<option value="" disabled>Choose County</option>');
dropdown.prop('selectedIndex', 0);

const url = '/BOE-Importer/assets/data/location.json';

// Populate dropdown with list of counties
$.getJSON(url, function (data) {
  $.each(data, function (key, entry) {
    dropdown.append($('<option></option>').text(entry).attr('value', entry));
  })
});

// $(document).ready(function() {
//   dropdown.change(function() { 
  // if ($('#locality-dropdown :selected').text() != 'Choose County'){
                
  // }
  // else{
  //   $("#cpa-form").submit(function(e){
  //       e.preventDefault();
  //       alert("Please select a county");
  //     });
  //   }
//   });
// });

// $("#locality-dropdown").attr("selectedIndex") == 0 || 
