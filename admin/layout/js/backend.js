//hide placeholder on focus and show it on blur//
$(function(){
    'use strict';
    $('[placeholder]').focus(function() {
        $(this).attr('data-place', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
    }).blur(function() {
        $(this).attr('placeholder', $(this).attr('data-place'));
        $(this).attr('data-place', '');
    });
//Add asterisk to required fields//
    $('input').each(function() {
        if ($(this).attr('required') === 'required') {
            $(this).after('<span class="asterisk">*</span>');
        }
    });
});
