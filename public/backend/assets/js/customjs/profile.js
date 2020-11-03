var Profile = function () {
    
    var profileedit = function(){
        var form = $('#userprofile');
        var rules = {
            firstname: {required: true},
            lastname: {required: true},
            email: {required: true,email:true},
        };

        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form,true);
        }); 
    }
    
	var colorchange = function(){
        var form = $('#colorchange');
        var rules = {
            headercolor: {required: true},
            footercolor: {required: true},
           
        };

        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form,true);
        }); 
    }
	
    var chpassword = function(){
        var form = $('#changepassword');
        var rules = {
            oldpassword: {required: true},
            newpassword: {required: true},
            confirmpassword: {required: true,equalTo:"#newpassword"},
        };

        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form,true);
        }); 
    }

    return {
        init: function () {
            profileedit();
			colorchange();
        },
        changepassword:function(){
            chpassword();
        },
    }
}();