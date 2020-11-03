var Contactus = function () {

    var init = function () {

        var form = $('#contact_form');
        var rules = {
            first_name: {required: true},
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });
    }

    return{
        init: function () {
            init();
        },
    }
}();