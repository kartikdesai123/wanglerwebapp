var Pages = function () {

    var pageslist = function () {

        var dataArr = {};
        var columnWidth = {"width": "10%", "targets": 0};

        var arrList = {
            'tableID': '#pagedatatable',
            'ajaxURL': baseurl + "page-ajaxAction",
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

        $('body').on("click", ".deletepage", function () {
            var id = $(this).attr("data-id");
            var image = $(this).attr("data-pageimage");
            setTimeout(function () {
                $('.yes-sure:visible').attr('data-id', id);
                $('.yes-sure:visible').attr('data-pageimage', image);

            }, 500);

        });

        $('body').on('click', '.yes-sure', function () {
            var id = $(this).attr('data-id');
            var image = $(this).attr('data-pageimage');
            var data = {id: id, image: image, _token: $('#_token').val()};

            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "page-ajaxAction",
                data: {'action': 'deletepage', 'data': data},
                success: function (data) {
                    handleAjaxResponse(data);
                }
            });
        });

        $('body').on("click", ".pagestatus", function () {
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
                url: baseurl + "page-ajaxAction",
                data: {'action': 'chnagestatus', 'data': data},
                success: function (data) {
                    handleAjaxResponse(data);
                }
            });
        });
    }
    var addpage = function () {
        CKEDITOR.replace('pagecontent');

        for (var i in CKEDITOR.instances) {

            CKEDITOR.instances[i].on('change', function () {
                CKEDITOR.instances[i].updateElement()
            });

        }

        var form = $('#addpagesform');
        var rules = {
            pagetitle: {required: true},
            pageimage: {required: true},
            pagecontent: {required: true},
        };

        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });
    }
    var editpage = function () {
        CKEDITOR.replace('pagecontent');

        for (var i in CKEDITOR.instances) {

            CKEDITOR.instances[i].on('change', function () {
                CKEDITOR.instances[i].updateElement()
            });

        }

        var form = $('#editpagesform');
        var rules = {
            pagetitle: {required: true},
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });
    }
    return {
        init: function () {
            pageslist();
        },
        add: function () {
            addpage();
        },
        edit: function () {
            editpage();
        },
    }
}();