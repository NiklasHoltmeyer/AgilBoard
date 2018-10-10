var changeUSGModal;
var usgPlaceHolder;

function initModal() {
    changeUSGModal = $('#changeUSGModal');
    usgPlaceHolder = $('#usgIDHidden');
}

function init() {
    initModal();
    hideAllSubmitIssue();
    initDragnDrop();
}

function initDragnDrop() {
    $(".userStory").draggable({
        helper: 'clone'
    });

    $(".usgContentWrapper").droppable({
        accept: '.userStory',
        drop: (ev, ui) => {
            var droppedItem = $(ui.draggable).clone().get();
            var issue = $(droppedItem[0]).find('.issue')
            var issueID = issue.attr('issueID');
            var issueBoardId = issue.attr('boardID');
            var boardID = $(ev.target).attr('boardid');

            if (issueBoardId != boardID) {
                $('#issueid').val(issueID);
                $('#boardid').val(boardID);
                $('#submitChangeBoard').click();
            }
        }
    });
}

function openChangeUSGModal(usgID, oldname) {
    if (usgID != 'null' && usgID != '') {
        usgPlaceHolder.val(usgID);
        $("#name").val(oldname);
        changeUSGModal.modal('open');
    } else {
        alert('Boardpanel.js@addIssueButton.Onclick USG == null');
    }
}


function deleteUSGConfirm() {
    return confirm("Are you sure?");
}

function hideSubmitIssue(id) {
    $("#submitIssue" + id).hide();
}

function toggleSubmitIssue(id) {
    $("#submitIssue" + id).toggle();
}

function hideAllSubmitIssue() {
    $(".submitIssue").hide();
}

$(() => {
    init();
});