jQuery(document).ready(function() {
    var proweb_aboutpage = prowebLiteWelcomeScreenCustomizerObject.aboutpage;
    var proweb_nr_actions_required = prowebLiteWelcomeScreenCustomizerObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof proweb_aboutpage !== 'undefined') && (typeof proweb_nr_actions_required !== 'undefined') && (proweb_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + proweb_aboutpage + '"><span class="proweb-actions-count">' + proweb_nr_actions_required + '</span></a>');
    }

    /* Upsell in Customizer (Link to Welcome page) */
    if ( !jQuery( ".proweb-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section proweb-upsells">');
    }
    if (typeof proweb_aboutpage !== 'undefined') {
        jQuery('.proweb-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="' + proweb_aboutpage + '" class="button" target="_blank">{themeinfo}</a>'.replace('{themeinfo}', prowebLiteWelcomeScreenCustomizerObject.themeinfo));
    }
    if ( !jQuery( ".proweb-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('</li>');
    }
});