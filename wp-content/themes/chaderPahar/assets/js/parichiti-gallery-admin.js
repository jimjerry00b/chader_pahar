jQuery(function ($) {
    var $container = $('#pgallery-images');
    var $idsInput  = $('#pgallery-ids');

    // Make sortable
    $container.sortable({
        placeholder: 'pgallery-item ui-sortable-placeholder',
        tolerance:   'pointer',
        update:      updateIds
    });

    // Add images button
    $('#pgallery-add').on('click', function (e) {
        e.preventDefault();

        var frame = wp.media({
            title:    'গ্যালারিতে ছবি যুক্ত করুন',
            button:   { text: 'যুক্ত করুন' },
            multiple: true,
            library:  { type: 'image' }
        });

        frame.on('select', function () {
            var attachments = frame.state().get('selection').toJSON();
            $.each(attachments, function (i, att) {
                var thumb = att.sizes && att.sizes.thumbnail
                    ? att.sizes.thumbnail.url
                    : att.url;
                var $item = $(
                    '<div class="pgallery-item" data-id="' + att.id + '">' +
                        '<img src="' + thumb + '" alt="">' +
                        '<button type="button" class="pgallery-remove" title="Remove">&times;</button>' +
                    '</div>'
                );
                $container.append($item);
            });
            updateIds();
        });

        frame.open();
    });

    // Remove image
    $container.on('click', '.pgallery-remove', function (e) {
        e.preventDefault();
        $(this).closest('.pgallery-item').remove();
        updateIds();
    });

    function updateIds() {
        var ids = [];
        $container.find('.pgallery-item').each(function () {
            ids.push($(this).data('id'));
        });
        $idsInput.val(ids.join(','));
    }
});
