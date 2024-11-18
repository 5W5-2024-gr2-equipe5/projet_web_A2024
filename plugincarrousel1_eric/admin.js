jQuery(document).ready(function ($) {
    $('.icon-banner-slider-upload').click(function (e) {
        e.preventDefault();
        const inputId = $(this).data('input-id');
        const customUploader = wp.media({
            title: 'Select Icon Image',
            button: { text: 'Use this image' },
            multiple: false
        }).on('select', function () {
            const attachment = customUploader.state().get('selection').first().toJSON();
            $('#' + inputId).val(attachment.url);
        }).open();
    });
});
