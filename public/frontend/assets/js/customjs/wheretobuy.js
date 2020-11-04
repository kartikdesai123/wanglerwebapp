var Wheretobuy = function () {

    var list = function () {
        
        $("body").on("change",".store",function(){
            var id = $(this).val();
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: base_url + "retailstores-ajaxAction",
                data: {'action': 'getseller', 'id': id},
                success: function (data) {
                    var output = JSON.parse(data);
                    console.log(output);
                    var address = "";
                    
                        for (var i = 0; i < output.length; i++) {
                            address += "<h1>"+output[i].sellername+"</h1><p><strong>Address</strong>:"+ output[i].selleraddress +"</p><p><strong>Phone:</strong> "+ output[i].sellerphoneno +"</p><br/>";
                        }
   
                    $(".news_data").html(address);
                }
            });
        });
        
        
        
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
                    var address = "";
                    var temp_html = '<option value="">Select Store</option>';
//                    var subcategoryhtml = 
                    //if(output.length > 0){
                        console.log(output);
                        for (var i = 0; i < output.length; i++) {
                            temp_html += '<option value="' + output[i].id + '">' + output[i].sellername + '</option>';
    //                        subcategoryhtml = subcategoryhtml + temp_html;

                            address += "<h1>"+output[i].sellername+"</h1><p><strong>Address</strong>:"+ output[i].selleraddress +"</p><p><strong>Phone:</strong> "+ output[i].sellerphoneno +"</p><br/>";
                        }
                    //}
                    
                    $(".store").html(temp_html);
                    $(".news_data").html(address);
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