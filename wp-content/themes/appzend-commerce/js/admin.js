jQuery(document).ready(function ($) {
    /**
     * Header Menu Call Button
     * Enable Related Fields
     * @since 1.0.0
     */
     wp.customize('appzend_call_button', function (setting) {
        var hideShow = function (control) {
            
            var visibility = function () {
                if ('enable' === setting.get() ) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };
        wp.customize.control('appzend-call-button-text', hideShow);
        wp.customize.control('appzend-call-phone-text', hideShow);
        wp.customize.control('appzend-call-phone-icon', hideShow);
    });
});