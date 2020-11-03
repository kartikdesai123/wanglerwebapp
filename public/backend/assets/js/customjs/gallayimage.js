var Gallayimage = function () {

    var list = function () {
        var dataArr = {};
        var columnWidth = {"width": "10%", "targets": 0};
        var arrList = {
            'tableID': '#gallay-table',
            'ajaxURL': baseurl + "gallay-ajaxAction",
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


        var form = $('#add-gallery');
        var rules = {
            gallayimage: {required: true}
        };

        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });


        $('body').on("click", ".editgallay ", function () {
            var id = $(this).attr("data-id");
            var silderimage = $(this).attr("data-gallayimage");
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "gallay-ajaxAction",
                data: {'action': 'editgallay', 'id': id, 'silderimage': silderimage},
                success: function (data) {

                    $(".editdiv").html(data);
                    handleFormValidate(form, rules, function (form) {
                        handleAjaxFormSubmit(form, true);
                    });
                }
            });

        });

        var form = $('#editgallayform');
        var rules = {
            gallayimage: {required: true}
        };

        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });
    }

    $('body').on("click", ".productstatus", function () {
        var id = $(this).attr("data-id");
        var status = $(this).attr("data-status");

        setTimeout(function () {
            $('.yes-sure-status:visible').attr('data-id', id);
            $('.yes-sure-status:visible').attr('data-status', status);
        }, 500);
    });

    $('body').on('click', '.yes-sure-status', function () {
        var id = $(this).attr('data-id');
        var status = $(this).attr('data-status');
        var data = {status: status, id: id, _token: $('#_token').val()};

        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val(),
            },
            url: baseurl + "gallay-ajaxAction",
            data: {'action': 'chnagestatus', 'data': data},
            success: function (data) {
                handleAjaxResponse(data);
            }
        });
    });


    $('body').on("click", ".deletegallay", function () {
        var id = $(this).attr("data-id");
        var silderimage = $(this).attr("data-gallayimage");
        setTimeout(function () {
            $('.yes-sure:visible').attr('data-id', id);
            $('.yes-sure:visible').attr('data-deletegallay', silderimage);

        }, 500);

    });



    $('body').on('click', '.yes-sure', function () {
        var id = $(this).attr('data-id');
        var gallayimage = $(this).attr('data-deletegallay');
        var data = {id: id, gallayimage: gallayimage, _token: $('#_token').val()};

        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val(),
            },
            url: baseurl + "gallay-ajaxAction",
            data: {'action': 'deleteGallay', 'data': data},
            success: function (data) {
                handleAjaxResponse(data);
            }
        });
    });
    return {
        init: function () {
            list();
        },
    }
}();