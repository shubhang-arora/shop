/**
 * Created by Sahil on 30-05-2016.
 */
$(document).on('click','.fileUp', function (e) {
    e.stopImmediatePropagation();
    e.preventDefault();
    $('#actualFile').click();
});
$(document).on('change','#actualFile', function (e) {
    $('.fileUp').val('Uploaded');
});
$('.fileUp').mouseenter(function (e) {
    if($('.fileUp').val()=='Uploaded'){
        $('.fileUp').val('Upload New');
    }
});
$('.fileUp').mouseleave(function (e) {
    if($('.fileUp').val()=='Upload New'){
        $('.fileUp').val('Uploaded');
    }
});