$(document).ready(function () {

    var CommentReply = (function () {
        var _handlers = {};
        return {
            setHandlers: function (handlers) {
                _handlers.form = handlers.form;
                _handlers.comment = handlers.comment;
            },
            setCommentFactory: function (commentFactory) {
                new commentFactory(_handlers).execute();
            },
            setAjaxFactory: function (ajaxFactory) {
                new ajaxFactory(_handlers).execute();
            }
        }
    }());

    var CommentFormHandler = function (set) {
        this.domElem = set.domElem;
        this.closeBtn = set.closeBtn;
        this.hiddenInput = set.hiddenInput;
    };

    CommentFormHandler.prototype.toggleVisibility = function (wrap) {
        var self = this;
        return function (visibility) {
            if (wrap == 'wrap') {
                self.domElem.parent()[visibility]();
                return self;
            }
            self.domElem[visibility]();
            return self;
        };
    };

    CommentFormHandler.prototype.setValueFromInput = function (targetEvent) {
        targetEvent.next(this.domElem)
            .find(this.hiddenInput.elemStr)
            .val(targetEvent.data()[this.hiddenInput.data]);
        return this;
    };

    CommentFormHandler.prototype.showUnderComment = function (targetEvent) {
        this.domElem.clone()
            .insertAfter(targetEvent)
            .prepend(this.closeBtn);
        return this;
    };

    var CommentHandler = function (set) {
        this.domList = set.domList;
        this.replyBtns = this.domList.find(set.replyBtns);
    };

    CommentHandler.prototype.removeAllForms = function (form) {
        this.domList.find('form').remove();
        return this;
    };

    function CommentFactory(handlers) {
        this.comment = handlers.comment;
        this.form = handlers.form;
    }

    CommentFactory.prototype.execute = function () {
        var self = this;

        this.comment.replyBtns.click(function (e) {
            e.preventDefault();
            self.answerFormShow($(this));

            self.form.closeBtn.click(function (e) {
                e.preventDefault();
                self.answerFormRemove();
            });

        });
    };

    CommentFactory.prototype.answerFormShow = function (target) {
        this.form.toggleVisibility('wrap')('hide');
        this.comment.removeAllForms()
            .replyBtns.show();
        this.form.showUnderComment(target)
            .setValueFromInput(target);
        target.hide()
    };

    CommentFactory.prototype.answerFormRemove = function () {
        this.comment.removeAllForms()
            .replyBtns.show();
        this.form.toggleVisibility('wrap')('show');
    };

    function CommentAjaxFactory(handlers){
        this.form = handlers.form;
    }

    CommentAjaxFactory.prototype.execute = function () {
        console.log(this.form.domElem.find(':submit'));
    };



    CommentReply.setHandlers({
        form: new CommentFormHandler({
            domElem: $('form'),
            closeBtn: $('<a>',
                {
                    href: '#',
                    class: 'close-form',
                    text: 'Закрыть'
                }),
            hiddenInput: {
                elemStr: ':input[type=hidden]#comment_parent',
                data: 'comment_id'
            }
        }),
        comment: new CommentHandler({
            domList: $('.media'),
            replyBtns: $('a.reply')
        })
    });

    CommentReply.setCommentFactory(CommentFactory);

    CommentReply.setAjaxFactory(CommentAjaxFactory);

});//endReady