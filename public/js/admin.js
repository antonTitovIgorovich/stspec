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

    /*  
        use admin-dialog.js,
        from delete records in admin panel
    */

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

    
    /*
       We write down the hidden names of the images to be deleted; 
       
       input type="hidden" value="image1%image2%image3"; 
    */ 


    (function () {
        // <input type="checkbox" data-id="img-name" class="select-to-delete">

        $('.select-to-delete').change(function () {
            var inputHidden = $('#input-hidden');
            
            $(this).each(function () {

                var imageName = String($(this).data().name);

                if ($(this).is(':checked') && isNotContainsSubStr(imageName, inputHidden.val())) {
                    inputHidden.val(inputHidden.val() + imageName + '%');
                }
                else {
                    var res = inputHidden.val().replace(imageName + '%', "");
                    inputHidden.val(res);
                }

            });

        });

        function isNotContainsSubStr(subStr, string) {
            return string.indexOf(subStr) === -1;
        }

    })();

});