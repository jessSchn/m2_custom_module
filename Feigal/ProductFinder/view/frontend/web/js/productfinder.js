/*
 * PartFinder Controller
 * Created by Jessica Feigal <mrs.feigal@gmail.com>
 * Date: 7/29/2020
 * Example: https://www.codextblog.com/magento-2/make-ajax-call-magento-2-module/
 */

define([
    "jquery",
    "jquery/ui"
], function ($) {
    "use strict";

    function main(config, element) {
        var $element = $(element);
        var AjaxUrl = config.AjaxUrl;

        var dataForm = $('#prod-finder-form');
        dataForm.mage('validation', {});

        $(document).on('click', '.submit', function () {

            if (dataForm.valid()) {
                event.preventDefault();
                let param = dataForm.serialize();

                $.ajax({
                    context: '#product-results',
                    showLoader: true,
                    url: AjaxUrl,
                    data: param,
                    type: "POST"
                }).done(function (data) {
                    $('#product-results').html(data.output);

                    return true;
                });
            }
        });
    };

    return main;
});