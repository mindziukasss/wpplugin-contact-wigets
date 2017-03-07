jQuery(document).ready(function(){
  var form = jQuery('#ajax-contact');
  var formMessages = jQuery('#form-messages');

  jQuery(form).submit(function(event) {
    event.preventDefault();
    console.log('Contact Form Submitted');
    var formData = jQuery(form).serialize();

    jQuery.ajax({
      type: 'POST',
      url: jQuery(form).attr('action'),
      data: formData
    }).done(function(response){
        jQuery(formMessages).removeClass('error');
        jQuery(formMessages).addClass('success');

        jQuery(formMessages).text(response);

        jQuery('#name').val('');
        jQuery('#email').val('');
        jQuery('#message').val('');


    }).fail(function(data){
        jQuery(formMessages).removeClass('success');
        jQuery(formMessages).addClass('error');

        if(data.responseText !== ''){
          jQuery(formMessages).text(data.responseText);
        } else {
          jQuery(formMessages).text('An error occured');
        }
    });
  });
});