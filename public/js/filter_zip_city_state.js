/**
 * Created by Sahil on 23-12-2015.
 */
var state = $('#state');
var cities = $('#city');
var zipcodes = $('#zipcode');


state.change(function (e) {
    getCity($(this).val());
});

function getCity(stateID) {
    cities.empty();

    if (stateID != -1) {
        $('#shopRegister').find('input[type="submit"]').removeAttr('disabled');

        $.ajax(
            {
                url: '/states/cities',
                method: 'get',
                data: {'id': stateID, '_token': $('[name=_token]').attr('content')},
                success: function (data) {
                    var flag = false;
                    $.each(data, function (key, value) {
                        if (!flag)
                            getZipcode(key);
                        cities.append($("<option></option>").attr("value", key).text(value));
                    });
                }
            }
        );
    }
    else {
        cities.append($("<option></option>").attr("value", -1).text('No Cities'));
        $('#shopRegister').find('input[type="submit"]').removeAttr('disabled','disabled');
    }

}

cities.change(function (e) {
    getZipcode($(this).val());
});

function getZipcode(cityID) {
    zipcodes.empty();
    if (cityID != -1) {
        $('#shopRegister').find('input[type="submit"]').removeAttr('disabled');
        $.ajax(
            {
                url: '/states/cities/zipcodes',
                method: 'get',
                data: {'id': cityID, '_token': $('[name=_token]').attr('content')},
                success: function (data) {
                    $.each(data, function (key, value) {
                        zipcodes.append($("<option></option>").attr("value", key).text(value));
                    });
                }
            }
        );
    }
    else {
        zipcodes.append($("<option></option>").attr("value", -1).text('No Zipcodes'));
        $('#shopRegister').find('input[type="submit"]').attr('disabled','disabled');
    }
}

