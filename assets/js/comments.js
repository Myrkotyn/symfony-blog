export default function comments() {
    jQuery(document).ready(function () {
        let form = jQuery('#add-new-comment');
        jQuery(form).submit(function (e) {
            e.preventDefault();

            let authorInput = jQuery(this).find('#comment-author')
            let author = authorInput.val();
            let content = jQuery(this).find('#comment-content').val();
            let entity = jQuery(this).find('#entity').val();
            let objectId = jQuery(this).find('#objectId').val();

            let pattern = /^[A-Z][a-zA-Z]+\s[A-Z][a-zA-Z]+$/;
            if (pattern.test(author)) {
                jQuery.ajax({
                    url: '/comment/add-ajax-comment',
                    method: 'POST',
                    data: {
                        author: author,
                        content: content,
                        entity: entity,
                        objectId: objectId
                    }
                }).done(function (data) {
                    if (data) {
                        renderNewComment(data['author'], data['content'], data['time']);
                        jQuery('.alert-danger').addClass('hide');
                        authorInput.parent().removeClass('has-error');
                    }
                });
            } else {
                authorInput.parent().addClass('has-error');
                jQuery('.alert-danger').removeClass('hide');
            }

            return false;
        });

        function renderNewComment(author, content, time) {
            $(".list-group").append(
                "<li class=\"list-group-item\">\n" +
                "            <div class=\"row\">\n" +
                "                <div class=\"col-md-4\">\n" +
                "                    <b>Author: </b><small>" + author + "</small>\n" +
                "                </div>\n" +
                "                <div class=\"col-md-5\">\n" +
                "                    " + content + "\n" +
                "                </div>\n" +
                "                <div class=\"col-md-3\">\n" +
                "                    <b>Created at: </b> <small>" + time + "</small>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "        </li>"
            );
        }
    });
}
