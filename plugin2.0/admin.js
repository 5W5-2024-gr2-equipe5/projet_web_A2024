jQuery(document).ready(function($) {
    $('.icon-banner-slider-upload').on('click', function(e) {
        e.preventDefault();
        var button = $(this);
        var inputId = button.data('input-id');
        var customUploader = wp.media({
            title: 'Select Image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        }).on('select', function() {
            var attachment = customUploader.state().get('selection').first().toJSON();
            $('#' + inputId).val(attachment.url);
        }).open();
    });
});