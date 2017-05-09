'use strict';

function inverseSelected() {
    $('.dim-select').each(function(){
        $(this).prop("checked", !$(this).prop('checked'));
    });
}

function refreshIframe(element) {
    var the_id = element.attr('id');
    var selector = $('#iframe-' + the_id);
    var iframe_src = selector.attr('src');
    selector.attr('src', iframe_src);
}

$(document).ready(function () {
    /**
     *  DO NOT ADD LOGIC IN DOCUMENT READY
     */
    $('.inverse-select').click(function(e){
        e.preventDefault();
        inverseSelected();
    });
    $('.refresh-iframe').click(function(e){
        e.preventDefault();
        refreshIframe($(this));
    });
});
