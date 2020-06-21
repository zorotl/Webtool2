/**
 * Created by mstri on 10.06.2020.
 */
"use strict";

jQuery(document).ready(function ($) {

    $('#lager').change(function (e) {
        let lager = $('#lager').val();

        // $('#lagerortGruppe, #lagerplatzGruppe').hide();
        // if (lager !== "0")
        //     $('#lagerortGruppe').show();

        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/item/get/storage/location',
            type: 'POST',
            data: {lager: lager},
            success: function (result) {
                $('#lagerort').html(result);
            }
        });
    });

    $('#lagerort').change(function (e) {
        let lagerort = $('#lagerort').val();

        // if (lagerort !== "0") {
        //     $('#lagerplatzGruppe').show();
        // } else {
        //     $('#lagerplatzGruppe').hide();
        // }

        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/item/get/storage/place',
            type: 'POST',
            data: {lagerort: lagerort},
            success: function (result) {
                $('#lagerplatz').html(result);
            }
        });
    });

    // $('#lagerplatz').change(function (e) {
    //     let lagerplatz = $('#lagerplatz').val();
    //
    //     if (lagerplatz !== "0") {
    //         $('#restOfForm').show();
    //     } else {
    //         $('#restOfForm').hide();
    //     }
    // });
});
