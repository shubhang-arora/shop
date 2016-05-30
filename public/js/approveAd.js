var box,add,id,amount=0;
$(document).on('click','.add', function (e) {
    add = $(this).hasClass('add');
    id = $(this).attr("id");
    box = $(this).parent().parent();
    id = parseInt(id);
    amount=$('#amount').val();
    if ( amount!= '') {
        amount=parseFloat(amount);
        ajaxCall();
    }

});

$(document).on('click','.remove', function (e) {
    amount=0;
    add = $(this).hasClass('add');
    id = $(this).attr("id");
    box = $(this).parent().parent();
    id = parseInt(id);
    ajaxCall();
});


function ajaxCall(){
    $.ajax({
        url: '/admin/approve/advertisement',
        type: "post",
        data: {'id': id, 'add': add,'type':'do','amount':amount ,'_token': $('[name=_token]').attr('content')},
        success: function (data) {
            data=JSON.parse(data);
            var alert='';
            if(data==1){
                alert = '<div class="alert alert-success"><a href="#" class="close" name = '+id+' id="undo" data-dismiss="alert" aria-label="close">Undo</a><strong>Approved</strong> Advertisement!</div>';
                box.slideUp();
                box.parent().prepend(alert);
                box.parent().find('.alert-message').delay(7000).slideUp();
            }
            else if(data==0){
                alert = '<div class="alert alert-danger"><a href="#" class="close"  name = '+id+' id="undo" data-dismiss="alert" aria-label="close">Undo</a><strong>Deleted</strong> Advertisement!</div>';
                box.slideUp();
                box.parent().prepend(alert);
                box.parent().find('.alert-message').delay(7000).slideUp();
            }
            else if(data.error!=undefined){
                alert = '<br><div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="glyphicon glyphicon-remove"></i></a>'+data.error+'</div>';
                box.parent().append(alert);
                box.parent().find('.alert-message').delay(7000).slideUp();
            }
        }
    })
}

$(document).on('click','#undo', function () {
    $.ajax({
        url: '/admin/approve/advertisement',
        type: "post",
        data: {'id': id, 'add': add,'type':'undo' , '_token': $('[name=_token]').attr('content')},
        success: function (data) {
            box.slideDown();
        }
    })

});