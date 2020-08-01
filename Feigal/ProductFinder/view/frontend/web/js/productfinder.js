define([
    "jquery",
    "jquery/ui"
], function($){
    "use strict";

    function main(config, element) {
        var $element = $(element);
        var AjaxUrl = config.AjaxUrl;
         
        var dataForm = $('#prod-finder-form');
        dataForm.mage('validation', {});
         
        $(document).on('click','.submit',function() {
             
            if (dataForm.valid()){
                event.preventDefault();
                var param = dataForm.serialize();
                alert(param);
                    $.ajax({
                        context:'#product-results',
                        showLoader: true,
                        url: AjaxUrl,
                        data: param,
                        type: "POST"
                    }).done(function (data) {
                        //$('.note').html(data);
                        $('.note').html('%1');
                        $('#prod-finder-form').reset();
                        //$('#produt-results').html(data.output);

                        return true;
                    });
                }
            });
    };
return main;
     
     
});