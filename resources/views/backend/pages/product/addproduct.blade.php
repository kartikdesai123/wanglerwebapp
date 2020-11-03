@extends('backend.layout.app')
@section('content')
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="tab-content" id="myTabContent">
            <!-- [ user card1 ] start -->
            <div class="tab-pane fade show active" id="user1" role="tabpanel" aria-labelledby="user1-tab">
                <div class="row mb-n4">

                    <div class="col-xl-12 col-md-12">
                        <div class="row">
                            <!-- [ Form Validation ] start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Add Product</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="validation-form123" action="#!">
                                            {{ csrf_field() }}
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Product Name </label>
                                                        <input type="text" class="form-control" name="productname"   placeholder="Enter your first name">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Product Category</label>
                                                        <select class="form-control" name="productcategory">
                                                            <option> Select Product Category </option>
                                                            <option > Category 1 </option>
                                                            <option> Category 2 </option>
                                                            <option> Category 3 </option>
                                                            <option> Category 4 </option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Product Description</label>
                                                        <input type="text" class="form-control" name="productdescription"  placeholder="Product Description">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Product Price</label>
                                                        <input type="text" class="form-control" name="productprice"  placeholder="Product Price">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Product Image</label>
                                                        <div><br>
                                                            <input type="file" class="validation-file" name="validation-file"><br>
                                                            
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <button type="submit" class="btn  btn-primary">Edit Profile</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Form Validation ] end -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection