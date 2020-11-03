var Wheretobuy = function () {

    var list = function () {
        $("body").on("change", ".selectcity", function () {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: base_url + "retailstores-ajaxAction",
                data: {'action': 'getstore', 'id': id},
                success: function (data) {
                    var output = JSON.parse(data);
                    var subcategoryhtml = '<option value="">Select Store</option>';
                    for (var i = 0; i < 1; i++) {
                        var temp_html = "";
                        temp_html = '<option value="' + output.id + '">' + output.sellername + '</option>';
                        subcategoryhtml = subcategoryhtml + temp_html;
                    }

                    $(".store").html(subcategoryhtml);
//                        handleAjaxResponse(data);
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