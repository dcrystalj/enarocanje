
$(document).ready(function() {
   //calendar
	$('.activate').click(function(e) {
		e.preventDefault();
      var click = $(this);
      $('spanfrom').text('Activate service from: ')
      $('#event-dialog').modal({
         backdrop: 'static',
         keyboard: true,
         show: true,
      });
      $('#event-dialog a.b_cancel').click(function() {
         $('#event-dialog').modal('hide');
      });
      $('#event-dialog a.b_save').click(function() {

         click.find('#hiddendate').val($('#efrom').val()+ "");
         $('#event-dialog').modal('hide');
         click.submit();
      });
      $('#event-dialog').on('hide', function() {
         $('#event-dialog').off('click');
      });	   	 				
   });

   $('.deactivate').click(function(e) {
      
      e.preventDefault();
      var clickd = $(this);

      $('spanfrom').text('Activate service from: ')
      $('#event-dialog').modal({
         backdrop: 'static',
         keyboard: true,
         show: true,
      });
      $('#event-dialog a.b_cancel').click(function() {
         $('#event-dialog').modal('hide');
      });
      $('#event-dialog a.b_save').click(function() {
         
         clickd.find('#hiddendate').val($('#efrom').val()+ "");
         $('#event-dialog').modal('hide');
         clickd.submit();
      });
      $('#event-dialog').on('hide', function() {
         $('#event-dialog').off('click');
      });                     
   });

   //password hint
   $('#password').pstrength();


   
   
});
//set geolocation
function getLocation()
{
   if (navigator.geolocation)
   {
      navigator.geolocation.getCurrentPosition(showPosition);
   }
}

function showPosition(position)
{
   $('#latitude').text(position.coords.latitude);
   $('#longitude').text(position.coords.longitude); 
}
