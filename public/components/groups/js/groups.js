var modalChangeGroup;

function init() {
    modalChangeGroup = $('#modalChangeGroup');
}

function addGroupChangeModal(id) {

    var oldGroupName = $("#group" + id).html();
    $('#name').val(oldGroupName);
    modalChangeGroup.modal('open');
    $("#modalChangeGroupID").val(id);

}

$(() => {
    init();
});