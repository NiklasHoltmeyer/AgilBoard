var modalChangeAcceptanceCriteria;

function openAcceptanceCriteriaChangeModal(id) {
    var acceptancecriteria = $("#acceptancecriteria" + id + "> td");

    var precondition = $(acceptancecriteria[0]).html();
    var action = $(acceptancecriteria[1]).html();
    var result = $(acceptancecriteria[2]).html();

    $('#precondition').val(precondition);
    $('#action').val(action);
    $('#result').val(result);
    $('#modalChangeAcceptanceCriteriaID').val(id);

    modalChangeAcceptanceCriteria.modal('open');

}

function formatTime(minutes) {
    var result = "";

    var x = (a, b) => {
        var tmp = Math.floor(minutes / a);
        if (tmp > 0) {
            result += tmp + "" + b + " ";
            minutes -= a * tmp;
        }
    }
    x(10080, 'w');
    x(1440, 'd');
    x(60, 'h');
    x(1, 'm');

    result = (result.localeCompare('')) ? result : "0";

    return result;
}

function initIssueInfoModal() {
    var unformatedTimeSpend = $("#timeSpend").html();
    var unformatedEstimatedTime = $("#estimatedTime").html();
    $("#timeSpend").html(formatTime(unformatedTimeSpend));
    $("#estimatedTime").html(formatTime(unformatedEstimatedTime));


    $("#issueInfoModalTrigger").on('click', () => {
        var t = $('#issueInfoModal').css({ 'transform': 'translateX(-105%) !important' });
    });

    $(".sidenav-overlay").on('click', () => {
        $('.sidenav-overlay').each((index, element) => {
            $(this).css({ 'opacity': '0' });
        });
    });

    $('.tooltipped').tooltip();
}

function init() {
    $('#issueInfoModal').sidenav({ edge: 'right' });
    $('textarea').ckeditor();

    $('.datepicker').datepicker({
        'container': '#datepickerContainer',
        'format': 'dd.mm.yyyy'
    });

    modalChangeAcceptanceCriteria = $('#modalChangeAcceptanceCriteria');
    reOpenModalsOnErrors();

    initIssueInfoModal();
}


$(() => {
    init();
});