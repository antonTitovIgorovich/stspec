function AdminDialog(property) {
    this.startBtn = property.startBtn;
    this.uri = property.uri;
}

AdminDialog.prototype.getExecutor = function () {
    return new AdminDialogExecutor();
};

AdminDialog.prototype.getDomManipulator = function () {
    return new AdminDialogDomManipulator();
};

AdminDialog.prototype.execute = function () {
    var executor = this.getExecutor();
    executor.triggerAnClickEvent.call(this);
    executor.sendAjax.call(this);
};

function AdminDialogExecutor() {
    this.triggerAnClickEvent = function () {
        var defaultUri = this.uri,
            domManipulator = this.getDomManipulator();

        $(this.startBtn).click(function (e) {
            e.preventDefault();
            var data = $(this).data();
            
            domManipulator.fillTitle(data);
            domManipulator.setHrefFromLink(data, defaultUri);
        })
    };

    this.sendAjax = function () {
        var domManipulator = this.getDomManipulator();

        $('.modal-alright').click(function (e) {
            // use bootstrap-3 "Modal.js"
            $('#modal').modal('hide');
            e.preventDefault();
            var href = $(this).attr('href'),
                token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: href,
                type: 'post',
                data: {_method: 'delete', _token: token},
                success: function (data) {
                    domManipulator.deleteTableColumn(data.id);
                },
                error: function () {
                    console.error('Admin-dialog.js ajax error');
                }
            }); //end ajax;
        }); // end click
    }; // end sendAjax
}

function AdminDialogDomManipulator() {
    this.bodyOfWindow = $('.modal-body');
    this.confirmLink = $('.modal-alright');
}

AdminDialogDomManipulator.prototype.fillTitle = function (targetData) {
    this.bodyOfWindow.empty().html("<h3>" + targetData.title + "</h3>");
};

AdminDialogDomManipulator.prototype.setHrefFromLink = function (targetData, defaultUri) {
    this.confirmLink.attr('href', defaultUri + "/" + targetData.id);
};

AdminDialogDomManipulator.prototype.deleteTableColumn = function (id) {
    var resultObject = $('table').find('tr').filter(function (i) {
        return i !== 0 && $(this).data().id == id;
    });
    resultObject.html('<h4>Запись удалена!</h4>').css({color: 'green'});
    setTimeout(function () {
        resultObject.remove();
    }, 2500);
};












