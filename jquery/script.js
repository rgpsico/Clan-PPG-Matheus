$(document).ready(function)(){
$( "button.continue" ).html( "Next Step..." )

var hiddenBox = $( "#banner-message" );
$( "#button-container button" ).on( "click", function( event ) {
  hiddenBox.show();
  
  $.ajax({
  url: "/api/getWeather",
  data: {
   zipcode: 97201
  },
  success: function( data ) {
    $( "#weather-temp" ).html( "<strong>" + data + "</strong> degrees" );
  }
});
  
});
