try {

    $(":file").filestyle(
        {
            buttonText: "Выбрать",
            icon: false,
            buttonName: "btn-primary",
            buttonBefore: true
        }
    );

    CKEDITOR.replace('editor', {
        language: 'ru'
    });

} catch (e) {
}

$(document).ready(function () {

    var adminDialog = new AdminDialog({
        startBtn: '.dialog-btn',
        uri: $('.modal-alright').attr('href') + '/service'
    });

    adminDialog.execute();


});