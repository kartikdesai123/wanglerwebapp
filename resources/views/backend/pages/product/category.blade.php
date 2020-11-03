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
                    <div class="col-sm-6 text-right">
                        
                        <button class="btn btn-danger btn-sm btn-round has-ripple" data-toggle="modal" data-target="#addproductmodel"><i class="feather icon-plus"></i> Add New Category</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="category-table" class="table mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Sr.No</th>
                                <th class="text-center">Category Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Edit Product model --> 
<div id="editmodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editmodel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <form id="editcategory-form" method="post" action="{{ route("edit-category")}}">
                    {{ csrf_field() }}
                    <div class="row">
                        <input type="text" class="form-control hidden" id="editcategoryid" name="editcategoryid"   placeholder="Enter your first name">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">category</label>
                                <input type="text" class="form-control" id="editcategory" name="category"   placeholder="Enter your first name">
                            </div>
                        </div>
                    </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn  btn-primary">Edit Category</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <form id="addcategory" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Category</label>
                                <input type="text" class="form-control" name="category"   placeholder="Enter your Category">
                            </div>
                        </div>

                    </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn  btn-primary">Add Category</button>
            </div>
            </form>
        </div>
    </div>
</div> 
@endsection