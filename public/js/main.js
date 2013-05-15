
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
   //menu bug
   $('.nav-collapse').addClass('collapse');
   //password hint
   $('#password').pstrength();
   //datepicker
   $('#datetimepicker').datetimepicker({
      language: 'pt-BR',
      pickSeconds: false,
   });
   $('#datetimepicker1').datetimepicker({
      language: 'pt-BR',
      pickSeconds: false,
   });
   $('#datetimepicker2').datetimepicker({
      language: 'pt-BR',
      pickSeconds: false,
      pickDate: false,
      maskInput:false,
   });
});



var domains = ["gmail.com","hotmail.com","yahoo.com","live.com"];

function checkEmail(e, formName){
   var email = document.getElementById("email").value;
   
   e.preventDefault();
   if (validateEmail(email)){
      checkMostUsed(email,formName);
   }
   else {
      alert("{{Lang::get('validation.email',array('attribute'=>'"+email+"'))}}");
   }
}

function validateEmail(email) {
   var re = /\S+@\S+\.\S+/;
   return re.test(email);
} 

function checkMostUsed(email, formName) {
   var domain = email.split("@")[1];
   var name = email.split("@")[0];
   var min = 30;
   var temp = 0;
   var index = -1;
   //alert(domain);
   for (var i=0; i<domains.length;i++){
      if(domain == domains[i]){     
         index=-1;
         break;
      }
      temp = levenshtein(domain,domains[i]);
      if(temp<min && temp<4) {
         min = temp;
         index = i;
      }
   }
   if(index >= 0) {

      
         var correctedEmail=name+"@"+domains[index];
         bootbox.dialog('You entered '+email+'. Perhaps you wanted to enter '+correctedEmail+'?\nClick Yes to select the corrected email, click No to keep yours.', [{
             "label" : "Yes",
             "class" : "btn-success",
             "callback": function() {
                 document.getElementById("email").value=correctedEmail;
                 $(formName).submit();
             }
         }, {
             "label" : "No",
             "class" : "btn-primary",
             "callback": function() {
                 $(formName).submit();
             }
         },]);
   }
   else {
      $(formName).submit();
   }

}

function levenshtein (s1, s2) {
  // http://kevin.vanzonneveld.net
  // +            original by: Carlos R. L. Rodrigues (http://www.jsfromhell.com)
  // +            bugfixed by: Onno Marsman
  // +             revised by: Andrea Giammarchi (http://webreflection.blogspot.com)
  // + reimplemented by: Brett Zamir (http://brett-zamir.me)
  // + reimplemented by: Alexander M Beedie
  // *                example 1: levenshtein('Kevin van Zonneveld', 'Kevin van Sommeveld');
  // *                returns 1: 3
  if (s1 == s2) {
    return 0;
  }

  var s1_len = s1.length;
  var s2_len = s2.length;
  if (s1_len === 0) {
    return s2_len;
  }
  if (s2_len === 0) {
    return s1_len;
  }

  // BEGIN STATIC
  var split = false;
  try {
    split = !('0')[0];
  } catch (e) {
    split = true; // Earlier IE may not support access by string index
  }
  // END STATIC
  if (split) {
    s1 = s1.split('');
    s2 = s2.split('');
  }

  var v0 = new Array(s1_len + 1);
  var v1 = new Array(s1_len + 1);

  var s1_idx = 0,
    s2_idx = 0,
    cost = 0;
  for (s1_idx = 0; s1_idx < s1_len + 1; s1_idx++) {
    v0[s1_idx] = s1_idx;
  }
  var char_s1 = '',
    char_s2 = '';
  for (s2_idx = 1; s2_idx <= s2_len; s2_idx++) {
    v1[0] = s2_idx;
    char_s2 = s2[s2_idx - 1];
    for (s1_idx = 0; s1_idx < s1_len; s1_idx++) {
      char_s1 = s1[s1_idx];
      cost = (char_s1 == char_s2) ? 0 : 1;
      var m_min = v0[s1_idx + 1] + 1;
      var b = v1[s1_idx] + 1;
      var c = v0[s1_idx] + cost;
      if (b < m_min) {
        m_min = b;
      }
      if (c < m_min) {
        m_min = c;
      }
      v1[s1_idx + 1] = m_min;
    }
    var v_tmp = v0;
    v0 = v1;
    v1 = v_tmp;
  }
  return v0[s1_len];
}  