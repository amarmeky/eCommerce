//hide placeholder on focus and show it on blur//
$(function () {
    'use strict';
    $('[placeholder]').focus(function () {
        $(this).attr('data-place', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
    }).blur(function () {
        $(this).attr('placeholder', $(this).attr('data-place'));
        $(this).attr('data-place', '');
    });
    //Add asterisk to required fields//
    $('input').each(function () {
        if ($(this).attr('required') === 'required') {
            $(this).after('<span class="asterisk">*</span>');
        }
    });
    var passwordField = $('.password');
    $('.show-pass').hover(function () {
        passwordField.attr('type', 'text');
    }, function () {
        passwordField.attr('type', 'password');
    });

    $('.confirm').click(function () {
        return confirm("Are you sure you want to delete this record?");
    })

});
