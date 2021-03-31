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
                    let newDialogElement = jQuery(document.createElement('div'));
                    newDialogElement.html(result.message);

                    newDialogElement.dialog({
                        dialogClass: "touch-dialog",
                        closeOnEscape: true,
                        modal: true
                    });

                    jQuery(document).bind('click', function () {
                        newDialogElement.dialog("close");
                    });

                }
            );

        });
}
