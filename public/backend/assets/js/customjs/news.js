var News = function () {

    var list = function () {

        var dataArr = {};
        var columnWidth = {"width": "10%", "targets": 0};

        var arrList = {
            'tableID': '#newsdatatable',
            'ajaxURL': baseurl + "news-ajaxAction",
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

        $('body').on("click", ".deletenews", function () {
            var id = $(this).attr("data-id");
            var image = $(this).attr("data-newsimage");
            setTimeout(function () {
                $('.yes-sure:visible').attr('data-id', id);
                $('.yes-sure:visible').attr('data-newsimage', image);

            }, 500);

        });

        $('body').on('click', '.yes-sure', function () {
            var id = $(this).attr('data-id');
            var image = $(this).attr('data-newsimage');
            var data = {id: id, image: image, _token: $('#_token').val()};

            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "news-ajaxAction",
                data: {'action': 'deletenews', 'data': data},
                success: function (data) {
                    handleAjaxResponse(data);
                }
            });
        });

        $('body').on("click", ".newsstatus", function () {
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
                url: baseurl + "news-ajaxAction",
                data: {'action': 'chnagestatus', 'data': data},
                success: function (data) {
                    handleAjaxResponse(data);
                }
            });
        });
    }
    var editnews = function () {
        CKEDITOR.replace('pagecontent');

        for (var i in CKEDITOR.instances) {

            CKEDITOR.instances[i].on('change', function () {
                CKEDITOR.instances[i].updateElement()
            });

        }

        var form = $('#editnewsform');
        var rules = {
            newstitle: {required: true},
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });
    }
    var addnews = function () {
        CKEDITOR.replace('pagecontent');

        for (var i in CKEDITOR.instances) {

            CKEDITOR.instances[i].on('change', function () {
                CKEDITOR.instances[i].updateElement()
            });

        }

        var form = $('#addnewsform');
        var rules = {
            newstitle: {required: true},
            newsimage: {required: true},
            pagecontent: {required: true},
        };

        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });
    }

    return {
        init: function () {
            list();
        },
        add: function () {
            addnews();
        },
        edit: function () {
            editnews();
        },
    }
}();