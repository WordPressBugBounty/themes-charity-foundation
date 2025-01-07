(function($) {
    function resetColorsToDefault() {
        // Define default values for your color settings
        const defaultColors = {
            'background_color': '#ffffff',
            'charity_foundation_primary_color': '#f9c416',
            'charity_foundation_section_bg': '#f8f5ef',
            'charity_foundation_heading_color': '#1d1c1c',
            'charity_foundation_text_color' :'#9f9f9f',
            'charity_foundation_footer_bg': '#1d1c1c',
            'ngo_charity_donation_post_bg': '#ffffff',
        };

        // Iterate over each setting and set it to its default value
        for (let settingId in defaultColors) {
            wp.customize(settingId).set(defaultColors[settingId]);
        }

        // Optionally refresh the preview
        wp.customize.previewer.refresh();
    }

    // Attach reset function to global scope
    window.resetColorsToDefault = resetColorsToDefault;

    $(document).ready(function() {
        $('.color-reset-btn').val('RESET'); // This adds the 'RESET' text inside the button
    });
})(jQuery);