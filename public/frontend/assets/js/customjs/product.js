var Product = function () {

    var list = function () {
        $("body").on("change", ".category", function () {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: base_url + "product-ajaxAction",
                data: {'action': 'getProduct', 'id': id},
                success: function (data) {
                    var output = JSON.parse(data);
                    var subcategoryhtml = '';
                    for (var i = 0; i < output.length; i++) {
                        var temp_html = "";
                        temp_html = '<div class="product1 post7" style="margin: 10px">'+
                            '<figure class="p-img"><img src="' + base_url + "public/images/product/" + output[i].image + '" name="productimage"></figure>'+
                            '<h1 class="p-head">' + output[i].name.substr(0, 17) + '</h1>'+
                            '<p class="p-info">' + output[i].description.substr(0, 17) + ' $' + output[i].price + '</p>'+
                            '<p class="click"><img src="' + base_url + 'public/frontend/assets/images/small-leaf.png" alt="" /><a href="'+ base_url + "productdetails/"+ output[i].id +'">Click Here for more</a></p>'+
                        '</div>';
                        subcategoryhtml = subcategoryhtml + temp_html;
                    }
                    $(".productlist").html(subcategoryhtml);
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