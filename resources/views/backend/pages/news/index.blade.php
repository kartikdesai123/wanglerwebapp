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
                        <a href="{{ route('addnews') }}"><button class="btn btn-danger btn-sm btn-round has-ripple" ><i class="feather icon-plus"></i> Add News</button></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="newsdatatable" class="table mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Sr.No</th>
                                <th class="text-center">News Title</th>
                                <th class="text-center">News Image</th>
                                <th class="text-center">News Description</th>
                                <th class="text-center">Status</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <form id="validation-form123" action="#!">
                    {{ csrf_field() }}
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <div><br>
                                    <img src="{{ url('public/backend/assets/images/product/prod-1.jpg') }}" alt="contact-img" title="contact-img" class="rounded mr-4" height="100" /><br>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Silder Image</label>
                                <div><br>
                                    <input type="file" class="validation-file" name="validation-file">
                                </div>
                            </div>
                        </div>


                    </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn  btn-primary">Edit Silder</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Add New Silder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="validation-form123" action="#!">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Silder Image</label>
                                <div><br>
                                    <input type="file" class="validation-file" name="validation-file"><br>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn  btn-primary">Add Silder</button>
            </div>
            </form>
        </div>
    </div>
</div> 
<div id="statusmodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="featuremodel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">News Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure to change News Status ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn  btn-primary yes-sure-status">Yes Change News Status</button>
            </div>
        </div>
    </div>
</div> 
@endsection