/**
 * Created by Sahil on 23-12-2015.
 */
var state = $('#state');
var cities = $('#city');
var zipcodes = $('#zipcode');


state.change(function (e) {
    getCity($(this).val());
});

function getCity(stateID, callback) {

    cities.empty();
    $.ajax(
        {
            url: '/states/cities',
            method: 'get',
            data: {'id': stateID, '_token': $('[name=_token]').attr('content')},
            success: function (data) {
                $.each(data, function (key, value) {
                    cities.append($("<option></option>").attr("value", key).text(value));
                });
                getZipcode(Object.keys(data)[0]);
            }
        }
    );
}

cities.change(function (e) {
    getZipcode($(this).val());
});

function getZipcode(cityID) {

    zipcodes.empty();
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

