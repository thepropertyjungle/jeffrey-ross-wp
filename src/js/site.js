/*
    ATTENTION
    =========
    This file can be used for theme specific JavaScript functions
    and importing plugins.
*/

import "../js/plugins/lazy-load-html";

$(document).ready(function () {
    // Toggle visibility based on the selected radio button
    $('input[name="propertyType"]').on('change', function () {
        if ($('#ltteRadio').is(':checked')) {
            $('#ltteContent').show();
            $('#stampContent').hide();
        } else if ($('#stampRadio').is(':checked')) {
            $('#ltteContent').hide();
            $('#stampContent').show();
        }
    });
});
