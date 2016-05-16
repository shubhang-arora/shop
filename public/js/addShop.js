$("").click(function()
{   var id = $(this).attr("id");

    $.ajax({
        url : '/add-shop',
        type: "post",
        data: {'id':$(this).attr("id"),'_token': $('input[name=_token]').val()},
        success: function(data){

        }
    })
});

