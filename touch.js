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
                function (result) {
                    let newDiv = jQuery(document.createElement('div'));
                    newDiv.html(result.message);
                    newDiv.dialog();
                }
            );

        });
}
