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

    var dialogMap = {
        service: {
            btn: '.service-dialog-btn',
            uri: 'service'
        },
        blog: {
            btn: '.blog-dialog-btn',
            uri: 'blog'
        },
        stock: {
            btn: '.stock-dialog-btn',
            uri: 'stock'
        }
    };

    for (var item in dialogMap) {
        var btnClass = dialogMap[item]['btn'];
        if ($(btnClass).length > 0) {
            var serviceDialog = new AdminDialog({
                startBtn: btnClass,
                uri: $('.modal-alright').attr('href') + '/' + dialogMap[item]['uri']
            });

            serviceDialog.execute();
        }
    }

    (function () {
        $('.select-to-delete').change(function () {
            var input = $('#input-hidden');
            $(this).each(function () {
                var imageName = String($(this).data().name);
                if ($(this).is(':checked') && isNotContainsSubStr(imageName, input.val())) {
                    input.val(input.val() + imageName + '%');
                }
                else {
                    var res = input.val().replace(imageName + '%', "");
                    input.val(res);
                }
            });
        });

        function isNotContainsSubStr(subStr, string) {
            return string.indexOf(subStr) === -1;
        }

    })();


});