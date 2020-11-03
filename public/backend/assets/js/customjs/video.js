var Video = function () {

    var list = function () {

        var dataArr = {};
        var columnWidth = {"width": "10%", "targets": 0};

        var arrList = {
            'tableID': '#video-table',
            'ajaxURL': baseurl + "video-ajaxAction",
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

        var form = $('#addvideoform');
        var rules = {
            gridRadios: {required: true},
            title: {required: true},
            videoname: {required: true},
            embedcode: {required: true}
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        });


        $('#report-table').DataTable({
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ]
        });



        $('body').on("change", ".uploadtype", function () {
            var val = $(this).val();
            if (val == "Manually") {
                var changehtml = '<div class="form-group">' +
                        '<label class="form-label">Add Video</label>' +
                        '<div><br>' +
                        '<input type="file" class="validation-file" name="validation-file" accept="video/*"><br>' +
                        '</div>' +
                        '</div>';
            } else {
                var changehtml = '<div class="form-group">' +
                        '<label class="form-label">Embed Code</label>' +
                        '<input type="text" class="form-control" name="embedcode"  placeholder="Enter embed code">' +
                        '</div>';
            }
            $(".changehtml").html(changehtml);
        });

        $('body').on("click", ".deletevideo", function () {
            var id = $(this).attr("data-id");
            var video = $(this).attr("data-video");
            setTimeout(function () {
                $('.yes-sure:visible').attr('data-id', id);
                $('.yes-sure:visible').attr('data-video', video);

            }, 500);

        });

        $('body').on('click', '.yes-sure', function () {
            var id = $(this).attr('data-id');
            var video = $(this).attr('data-video');
            var data = {id: id, video: video, _token: $('#_token').val()};

            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "video-ajaxAction",
                data: {'action': 'deletevideo', 'data': data},
                success: function (data) {
                    handleAjaxResponse(data);
                }
            });
        });

    }

    return {
        init: function () {
            list();
        },
    }
}();