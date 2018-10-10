$(() => {

    $(document).on("click", "#uploadAvatarButtonWrapper", function() {
        $("#avatarUploadField").click();
    });

    $(document).on("change", "#avatarUploadField", function() {
        var error = false;
        $('input[type=file][data-max-size]').each(function() {
            if (typeof this.files[0] !== 'undefined') {
                var maxSize = parseInt($(this).attr('max-size'), 10),
                    size = this.files[0].size;
                error = maxSize > size;
                return error;
            }
        });

        if (error) {
            alert("max-file-size exceeded");
        } else {
            $("#avatarUploadSubmit").click();
        }
    });

    $('textarea').ckeditor();

    init();

});