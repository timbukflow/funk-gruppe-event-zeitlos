$(document).ready(function() {
    // Accordion
    $('.acctitle').click(function() {
        $accCross = $(this).children('.pmcontainer');
        $('.pmcontainer').not($accCross).removeClass('pmrotate');
        $(this).children('.pmcontainer').toggleClass('pmrotate');

        $accordion_content = $(this).children('.acclist');
        $('.acclist').not($accordion_content).slideUp(600);
        $accordion_content.stop(true, false).slideToggle(600);
    });

    // Goto
    $('.goto').click(function() {
        var goto = $($(this).attr('href')).offset().top - 120;
        $("body, html").animate({scrollTop: goto}, 1000);
    });

    // Zusätzliche Felder für die weitere Person anzeigen/ausblenden
    $('input[name="teilnahme"]').change(function() {
        var additionalPersonFields = $('#additionalPersonFields');
        if ($('#checkbox2').is(':checked')) {
            additionalPersonFields.show();
        } else {
            additionalPersonFields.hide();
        }
    });

    // Initialisierung - Zustand beim Laden der Seite prüfen
    if ($('#checkbox2').is(':checked')) {
        $('#additionalPersonFields').show();
    } else {
        $('#additionalPersonFields').hide();
    }
});
