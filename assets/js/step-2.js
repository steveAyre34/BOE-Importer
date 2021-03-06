
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