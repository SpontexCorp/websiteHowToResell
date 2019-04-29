jQuery(document).ready(function() {

	/* If there are required actions, add an icon with the number of required actions in the About Proweb page -> Actions required tab */
    var proweb_nr_actions_required = prowebLiteWelcomeScreenObject.nr_actions_required;

    if ( (typeof proweb_nr_actions_required !== 'undefined') && (proweb_nr_actions_required != '0') ) {
        jQuery('li.proweb-w-red-tab a').append('<span class="proweb-actions-count">' + proweb_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".proweb-dismiss-required-action").click(function(){

        var id= jQuery(this).attr('id');
        console.log(id);
        jQuery.ajax({
            type       : "GET",
            data       : { action: 'proweb_dismiss_required_action',dismiss_id : id },
            dataType   : "html",
            url        : prowebLiteWelcomeScreenObject.ajaxurl,
            beforeSend : function(data,settings){
				jQuery('.proweb-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + prowebLiteWelcomeScreenObject.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>');
            },
            success    : function(data){
				jQuery("#temp_load").remove(); /* Remove loading gif */
                jQuery('#'+ data).parent().remove(); /* Remove required action box */

                var proweb_actions_count = jQuery('.proweb-actions-count').text(); /* Decrease or remove the counter for required actions */
                if( typeof proweb_actions_count !== 'undefined' ) {
                    if( proweb_actions_count == '1' ) {
                        jQuery('.proweb-actions-count').remove();
                        jQuery('.proweb-tab-pane#actions_required').append('<p>' + prowebLiteWelcomeScreenObject.no_required_actions_text + '</p>');
                    }
                    else {
                        jQuery('.proweb-actions-count').text(parseInt(proweb_actions_count) - 1);
                    }
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });

	/* Tabs in welcome page */
	function proweb_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".proweb-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}

	var proweb_actions_anchor = location.hash;

	if( (typeof proweb_actions_anchor !== 'undefined') && (proweb_actions_anchor != '') ) {
		proweb_welcome_page_tabs('a[href="'+ proweb_actions_anchor +'"]');
	}

    jQuery(".proweb-nav-tabs a").click(function(event) {
        event.preventDefault();
		proweb_welcome_page_tabs(this);
    });

		/* Tab Content height matches admin menu height for scrolling purpouses */
	 $tab = jQuery('.proweb-tab-content > div');
	 $admin_menu_height = jQuery('#adminmenu').height();
	 if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
	 {
		 $newheight = $admin_menu_height - 180;
		 $tab.css('min-height',$newheight);
	 }

});
