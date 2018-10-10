function _init() {
    loadModal();
    reOpenModalsOnErrors();
}

function loadModal() {
    $('.modal').modal();
}

function reOpenModalsOnErrors() {
    var errors = $(".invalid-feedback");
    if (errors.length > 0) {
        $.each(errors, (index, value) => {
            var obj = $(value).first();
            var targetID = obj.attr('targetID');
            if (targetID) {
                $('#' + targetID).show();
            } else {
                var parentModalID = obj.attr('parentmodal');
                $("#" + parentModalID).modal('open');
            }
        });
    }
}


$(() => {
    _init();
});