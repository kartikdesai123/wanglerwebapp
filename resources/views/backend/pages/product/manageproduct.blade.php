@extends('backend.layout.app')
@section('content')
<div class="row">
    <!-- customar project  start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center m-l-0">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 text-right" style="margin-bottom: 10px">
                        <button class="btn btn-success btn-sm btn-round has-ripple featurebtn" data-toggle="modal" data-target="#featuremodel"><i class="feather icon-check"></i> Make Feature Product</button>
                        <button class="btn btn-danger btn-sm btn-round has-ripple addproductmodel" data-toggle="modal" data-target="#addproductmodel"><i class="feather icon-plus"></i> Add New Product</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-xl">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Sr.No</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Product Image</th>
                                <th class="text-center">Product Category</th>
                                <th class="text-center">Product Price</th>
                                <th class="text-center">Feature Product</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @if(count($productlist) > 0)
                                @for($i = 0 ; $i < count($productlist) ; $i++)
                                <tr>
                                    <td class="text-center">{{ $i+1 }}</td>
                                    <td class="text-center">{{ $productlist[$i]->name }}</td>
                                    <td class="text-center"><img src="{{ url('public/images/product/'.$productlist[$i]->image) }}" alt="contact-img" title="contact-img" class="rounded mr-3" height="48"></td>
                                    <td class="text-center">{{ $productlist[$i]->category }}</td>
                                    <td class="text-center">{{ $productlist[$i]->price }}</td>
                                    
                                    @if($productlist[$i]->feature == "Yes")
                                        <td class="text-center">
                                            <input type="checkbox" class="form-check-input feature" data-id="{{ $productlist[$i]->id }}" checked="checked">
                                        </td>
                                    @else
                                        <td class="text-center">
                                            <input type="checkbox" class="form-check-input feature" data-id="{{ $productlist[$i]->id }}" >
                                        </td>
                                    @endif
                                        
                                        
                                    @if($productlist[$i]->status == "active")
                                        <td class="text-center">
                                            <a data-toggle="modal" data-target="#statusmodel" class="btn btn-icon btn-outline-primary productstatus" data-id="{{ $productlist[$i]->id }}" data-status="deactive"><i class="feather icon-check" ></i></a>
                                        </td>
                                    @else
                                        <td class="text-center">
                                            <a data-toggle="modal" data-target="#statusmodel" class="btn btn-icon btn-outline-primary productstatus" data-id="{{ $productlist[$i]->id }}" data-status="active"><i class="feather icon-x-circle" data-id="'.$row["id"].'"></i></a>
                                        </td>
                                    @endif
            
                                    <td class="text-center">
                                            <a href="" data-toggle="modal" data-target="#viewmodel" class="btn btn-icon btn-outline-primary viewproduct" data-id="{{ $productlist[$i]->id }}"><i class="feather icon-eye"></i></a>
                                            <a href="" data-toggle="modal" data-target="#editmodel" class="btn btn-icon btn-outline-success editproduct" data-id="{{ $productlist[$i]->id }}"><i class="feather icon-edit" ></i></a>
                                            <a href="" data-toggle="modal" data-target="#deletemodel" class="btn btn-icon btn-outline-danger deleteproduct" data-id="{{ $productlist[$i]->id }}" ><i class="feather icon-trash-2" ></i></a>
                                    </td>
                                </tr>
                               
                               @endfor
                            @else
                                <tr>
                                    <td class="text-center" colspan="7"> No Product Found</td>
                                </tr>
                            @endif
                               
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Product Feature model --> 
<div id="featuremodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="featuremodel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Feature Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure to make selected product feature ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn  btn-primary yes-sure-feature">Yes Make Feature Product</button>
            </div>
        </div>
    </div>
</div> 

<!--Product Feature model --> 
<div id="statusmodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="featuremodel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Product Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure to change product status ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn  btn-primary yes-sure-status">Yes Change Product's status</button>
            </div>
        </div>
    </div>
</div> 


<!--View Product model --> 
<div id="viewmodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="viewmodel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body viewproductappend">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> 


<!--Edit Product model --> 
<div id="editmodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editmodel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <form id="editproductform" name="editproductform" method="post" action="{{ route("edit-product")}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="editdiv">

                        

                    </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn  btn-primary">Edit Product</button>
            </div>
            </form>
        </div>
    </div>
</div> 
<!--Add Product model --> 
<div id="addproductmodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addproductmodel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <form id="addproduct" name="addproductform" method="post" action="{{ route("add-product")}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Product Name </label>
                                <input type="text" class="form-control productname" name="productname"   placeholder="Enter your first name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Product Category</label>
                                <select class="form-control select2 productcategory" name="productcategory">
                                    <option value=""> Select Product Category </option>
                                    @for($i = 0 ; $i < count($category) ; $i++)
                                         <option value="{{ $category[$i]->id }}"> {{ $category[$i]->category }} </option>
                                    @endfor
                                </select>
                            </div>
                        </div>


                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Product Size</label>
                                <input type="text" class="form-control productprice" name="productsize[]"  placeholder="Product Size 1">
                                <input type="text" class="form-control productprice" name="productsize[]"  placeholder="Product Size 2">
                                <input type="text" class="form-control productprice" name="productsize[]"  placeholder="Product Size 3">
                                <input type="text" class="form-control productprice" name="productsize[]"  placeholder="Product Size 4">
                                <input type="text" class="form-control productprice" name="productsize[]"  placeholder="Product Size 5">
                                <input type="text" class="form-control productprice" name="productsize[]"  placeholder="Product Size 6">
                                <input type="text" class="form-control productprice" name="productsize[]"  placeholder="Product Size 7">
                                <input type="text" class="form-control productprice" name="productsize[]"  placeholder="Product Size 8">
                                <input type="text" class="form-control productprice" name="productsize[]"  placeholder="Product Size 9">
                                <input type="text" class="form-control productprice" name="productsize[]"  placeholder="Product Size 10">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Product Price</label>
                                <input type="text" class="form-control productprice" name="productprice[]"  placeholder="Product Price 1">
                                <input type="text" class="form-control productprice" name="productprice[]"  placeholder="Product Price 2">
                                <input type="text" class="form-control productprice" name="productprice[]"  placeholder="Product Price 3">
                                <input type="text" class="form-control productprice" name="productprice[]"  placeholder="Product Price 4">
                                <input type="text" class="form-control productprice" name="productprice[]"  placeholder="Product Price 5">
                                <input type="text" class="form-control productprice" name="productprice[]"  placeholder="Product Price 6">
                                <input type="text" class="form-control productprice" name="productprice[]"  placeholder="Product Price 7">
                                <input type="text" class="form-control productprice" name="productprice[]"  placeholder="Product Price 8">
                                <input type="text" class="form-control productprice" name="productprice[]"  placeholder="Product Price 9">
                                <input type="text" class="form-control productprice" name="productprice[]"  placeholder="Product Price 10">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Product Image</label>
                                <div>
                                    <input type="file" class="validation-file form-control productimage" name="productimage"><br>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Product Description</label>
                                <textarea class="form-control productdescription" name="productdescription"  placeholder="Product Description"></textarea> 
                            </div>
                        </div>
                    </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn  btn-primary">Add Product</button>
            </div>
            </form>
        </div>
    </div>
</div> 
@endsection