/*
//hide placeholder on focus and show it on blur//
var myInput= document.getElementById("user");
myInput.onfocus = function() {
    'use strict';
    this.setAttribute('data-place',this.getAttribute('placeholder'));
    this.setAttribute('placeholder','');
    console.log("gfhfhfhf");
};
myInput.onblur = function() {
    'use strict';
    this.setAttribute('placeholder',this.getAttribute('data-place'));
    this.setAttribute('data-place','');
}
*/


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
})
