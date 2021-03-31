/**
 * Call the plugin with ajax
 *
 */
if (JSINFO) {
    jQuery('#plugin_toucher')
        .show()
        .click(function (e) {
            e.preventDefault();

            // post the data
            jQuery.post(
                DOKU_BASE + 'lib/exe/ajax.php',
                {
                    call: 'plugin_toucher'
                },
                // Display feedback
                // https://api.jqueryui.com/dialog/
                function (result) {
                    let dialogElement = jQuery(document.createElement('div'));
                    dialogElement.html(result.message);

                    dialogElement.dialog({
                        dialogClass: "touch-dialog",
                        closeOnEscape: true,
                        modal: true,
                        open: function() {
                            // close it after 2 seconds (toast)
                            setTimeout(function() {
                                dialogElement.dialog('close');
                                dialogElement.remove();
                            }, 2000);
                        }
                    });

                    // Close it if the user click
                    jQuery(document).bind('click', function () {
                        dialogElement.dialog("close");
                        dialogElement.remove();
                    });

                }
            );

        });
}
