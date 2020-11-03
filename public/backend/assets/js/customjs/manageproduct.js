var Manageproduct = function () {
    
    var manageproductlist = function(){
            $('body').on("click",".addproductmodel",function(){
                $(".productname").val('');
                $(".productcategory").val('');
                $(".productimage").val('');
                $(".productprice").val('');
                $(".productdescription").val('');
                $(".form-control").removeClass('is-invalid');
            });
            var form = $('#addproduct');
            var rules = {
                productname: {required: true},
                productcategory: {required: true},
                productdescription: {required: true},
                productprice: {required: true},
                productimage: {required: true},
            };

            handleFormValidate(form, rules, function (form) {
                handleAjaxFormSubmit(form, true);
            });
        
            var dataArr = {};
            var columnWidth = {"width": "10%", "targets": 0};

            var arrList = {
                'tableID': '#product-table',
                'ajaxURL': baseurl + "manageproduct-ajaxAction",
                'ajaxAction': 'getproductdatatable',
                'postData': dataArr,
                'hideColumnList': [],
                'noSearchApply': [0],
                'noSortingApply': [0,1],
                'defaultSortColumn': 0,
                'defaultSortOrder': 'desc',
                'setColumnWidth': columnWidth
            };
            getDataTable(arrList);
            
            $('body').on("click",".viewproduct ",function(){
                var id = $(this).attr("data-id");
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                    },
                    url: baseurl + "manageproduct-ajaxAction",
                    data: {'action': 'viewproduct', 'id': id},
                    success: function(data) {
                        var output = JSON.parse(data);
                        var html ='<p class="mb-0">Product Name : '+  output.name+'</p><br>'+
                                '<p class="mb-0">Product Category : '+  output.category+'</p><br>'+
                                '<p class="mb-0">Product Image  : <img src="'+ baseurl+'public/images/product/'+ output.image +'" alt="contact-img" title="contact-img" class="rounded mr-4" height="48" /></p><br>'+
                                '<p class="mb-0">Product Description : '+  output.name+'</p><br>'+
                                '<p class="mb-0">Product Price : '+  output.price+'</p><br>'+
                                '<p class="mb-0">Product Status : '+  output.status+'</p><br>'+
                                '<p class="mb-0">Product Feature : '+  output.feature+'</p><br>';
                        $(".viewproductappend").html(html);
                    }
                });

            });
            
            $('body').on("click",".editproduct ",function(){
                var id = $(this).attr("data-id");
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                    },
                    url: baseurl + "manageproduct-ajaxAction",
                    data: {'action': 'editproduct', 'id': id},
                    success: function(data) {
                       alert();
                        $(".editdiv").html(data);
                        var form = $('#editproductform');
                        var rules = {

                            productname: {required: true},
                            productcategory: {required: true},
                            productdescription: {required: true},
                            productprice: {required: true},
                        };

                        handleFormValidate(form, rules, function (form) {
                            handleAjaxFormSubmit(form, true);
                        });
                    }
                });

            });
            
            var form = $('#editproductform');
            var rules = {
                
                productname: {required: true},
                productcategory: {required: true},
                productdescription: {required: true},
                productprice: {required: true},
            };

            handleFormValidate(form, rules, function (form) {
                handleAjaxFormSubmit(form, true);
            });
        
        
        
            
            $('body').on("click",".featurebtn",function(){
                var featureProduct = [];
                $.each($(".feature:checked"), function(){
                    featureProduct.push($(this).attr('data-id'));
                });
                setTimeout(function() {
                    $('.yes-sure-feature:visible').attr('data-featureid', featureProduct);
                }, 500);
            });
            
             $('body').on('click', '.yes-sure-feature', function() {
                var featureid = $(this).attr('data-featureid');                
                var data = {featureid:featureid , _token: $('#_token').val()};                
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                    },
                    url: baseurl + "manageproduct-ajaxAction",
                    data: {'action': 'chnagefeature', 'data': data},
                    success: function(data) {
                        handleAjaxResponse(data);
                    }
                });
            });
            
            
            $('body').on("click",".productstatus",function(){
                var id = $(this).attr("data-id");
                var status = $(this).attr("data-status");
                
                setTimeout(function() {
                    $('.yes-sure-status:visible').attr('data-id', id);
                    $('.yes-sure-status:visible').attr('data-status', status);
                }, 500);

            });
            
            $('body').on('click', '.yes-sure-status', function() {
                var id = $(this).attr('data-id');
                var status = $(this).attr('data-status');
                
                var data = {status:status,id: id, _token: $('#_token').val()};
                
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                    },
                    url: baseurl + "manageproduct-ajaxAction",
                    data: {'action': 'chnagestatus', 'data': data},
                    success: function(data) {
                        handleAjaxResponse(data);
                    }
                });
            });
            
            
            $('body').on("click",".deleteproduct",function(){
                var id = $(this).attr("data-id");
                
                setTimeout(function() {
                    $('.yes-sure:visible').attr('data-id', id);

                }, 500);

            });

            $('body').on('click', '.yes-sure', function() {
                var id = $(this).attr('data-id');
                
                var data = {id: id, _token: $('#_token').val()};
                
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                    },
                    url: baseurl + "manageproduct-ajaxAction",
                    data: {'action': 'deleteProduct', 'data': data},
                    success: function(data) {
                        handleAjaxResponse(data);
                    }
                });
            });


    }
    var categorylist = function(){
        
        $('body').on("click",".btndelete",function(){
            var id = $(this).attr("data-id");
            setTimeout(function() {
                $('.yes-sure:visible').attr('data-id', id);
                
            }, 500);
            
        });
        
        $('body').on('click', '.yes-sure', function() {
            var id = $(this).attr('data-id');
            var data = {id: id, _token: $('#_token').val()};
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "manageproduct-ajaxAction",
                data: {'action': 'deleteCategory', 'data': data},
                success: function(data) {
                    handleAjaxResponse(data);
                }
            });
        });
      
        
        $('body').on("click",".btnedit",function(){
            var id = $(this).attr("data-id");
            var category = $(this).attr("data-category");
            $("#editcategoryid").val(id);
            $("#editcategory").val(category);
            
        });
        var form = $('#addcategory');
        var rules = {
            category: {required: true},
        };

        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        }); 
        
        
        var form = $('#editcategory-form');
        var rules = {
            category: {required: true},
        };

        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form, true);
        }); 
        
        
        var dataArr = {};
        var columnWidth = {"width": "10%", "targets": 0};

         var arrList = {
             'tableID': '#category-table',
             'ajaxURL': baseurl + "manageproduct-ajaxAction",
             'ajaxAction': 'getcategorydatatable',
             'postData': dataArr,
             'hideColumnList': [],
             'noSearchApply': [0],
             'noSortingApply': [0,1],
             'defaultSortColumn': 0,
             'defaultSortOrder': 'desc',
             'setColumnWidth': columnWidth
         };
         getDataTable(arrList);
    }

    return {
        init: function () {
            manageproductlist();
        },
        category: function () {
            categorylist();
        }
    }
}();