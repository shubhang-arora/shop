var box;
$(document).on('click','.add-remove', function (e) {
    var add = $(this).hasClass('add');
    var id = $(this).attr("id");
    box = $(this).parent().parent();
    id = parseInt(id);
    $.ajax({
        url: '/add-shop',
        type: "post",
        data: {'id': id, 'add': add, '_token': $('[name=_token]').attr('content')},
        success: function (data) {
            var alert='';
            if(data==1){
                alert = '<div class="alert alert-success"><a href="#" class="close" name = '+id+' id="undo" data-dismiss="alert" aria-label="close">Undo</a><strong>Added</strong> Shop!</div>';
            }
            else{
                alert = '<div class="alert alert-danger"><a href="#" class="close"  name = '+id+' id="undo" data-dismiss="alert" aria-label="close">Undo</a><strong>Deleted</strong> Shop!</div>';
            }
            box.slideUp();
            box.parent().prepend(alert);
            box.parent().find('.alert-message').delay(7000).slideUp();
        }
    })
});

$(document).on('click','#undo', function () {
    $.ajax({
        url: '/add-shop',
        type: "post",
        data: {'id': id, 'add': add, '_token': $('[name=_token]').attr('content')},
        success: function (data) {
            box.slideDown();
        }
    })

});