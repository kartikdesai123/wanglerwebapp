var Stores = function () {

    var managecitylist = function () {


        var form = $('#addmanagecity');
        var rules = {
            cityname: {required: true}
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });

        var form = $('#editcityform');
        var rules = {
            cityname: {required: true}
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });

        var dataArr = {};
        var columnWidth = {"width": "10%", "targets": 0};
        var arrList = {
            'tableID': '#report-table',
            'ajaxURL': baseurl + "city-ajaxAction",
            'ajaxAction': 'getdatatable',
            'postData': dataArr,
            'hideColumnList': [],
            'noSearchApply': [0],
            'noSortingApply': [0, 1],
            'defaultSortColumn': 0,
            'defaultSortOrder': 'desc',
            'setColumnWidth': columnWidth
        };
        getDataTable(arrList);

        $('body').on("click", ".editcity ", function () {
            var id = $(this).attr("data-id");
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "city-ajaxAction",
                data: {'action': 'editcity', 'id': id},
                success: function (data) {

                    $(".editdiv").html(data);
                    handleFormValidate(form, rules, function (form) {
                        handleAjaxFormSubmit(form, true);
                    });
                }
            });

        });

        $('body').on("click", ".deletecity", function () {
            var id = $(this).attr("data-id");
            setTimeout(function () {
                $('.yes-sure:visible').attr('data-id', id);
            }, 500);

        });

        $('body').on('click', '.yes-sure', function () {
            var id = $(this).attr('data-id');
            var data = {id: id, _token: $('#_token').val()};

            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "city-ajaxAction",
                data: {'action': 'deletecity', 'data': data},
                success: function (data) {
                    handleAjaxResponse(data);
                }
            });
        });
    }
    var storeslist = function () {

        var form = $('#addseller');
        var rules = {
            sellername: {required: true}
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });

        var form = $('#editsellerform');
        var rules = {
            sellername: {required: true}
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });

        var dataArr = {};
        var columnWidth = {"width": "10%", "targets": 0};
        var arrList = {
            'tableID': '#sellerdatatable',
            'ajaxURL': baseurl + "city-ajaxAction",
            'ajaxAction': 'getdatatableseller',
            'postData': dataArr,
            'hideColumnList': [],
            'noSearchApply': [0],
            'noSortingApply': [0, 1],
            'defaultSortColumn': 0,
            'defaultSortOrder': 'desc',
            'setColumnWidth': columnWidth
        };
        getDataTable(arrList);

        $('body').on("click", ".editseller ", function () {
            var id = $(this).attr("data-id");
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "city-ajaxAction",
                data: {'action': 'editseller', 'id': id},
                success: function (data) {

                    $(".editdiv").html(data);
                    handleFormValidate(form, rules, function (form) {
                        handleAjaxFormSubmit(form, true);
                    });
                }
            });
        });

        $('body').on("click", ".deleteseller", function () {
            var id = $(this).attr("data-id");
            setTimeout(function () {
                $('.yes-sure:visible').attr('data-id', id);
            }, 500);

        });

        $('body').on('click', '.yes-sure', function () {
            var id = $(this).attr('data-id');
            var data = {id: id, _token: $('#_token').val()};

            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "city-ajaxAction",
                data: {'action': 'deleteseller', 'data': data},
                success: function (data) {
                    handleAjaxResponse(data);
                }
            });
        });
    }


    return {
        managecity: function () {
            managecitylist();
        },
        stores: function () {
            storeslist();
        },
    }
}();