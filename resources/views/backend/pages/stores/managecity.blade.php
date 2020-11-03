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
                        <button class="btn btn-danger btn-sm btn-round has-ripple" data-toggle="modal" data-target="#addproductmodel"><i class="feather icon-plus"></i> Add New City</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="report-table" class="table mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Sr.No</th>
                                <th class="text-center">City Name</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit City</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <form id="editcityform"  method="post" action="{{ route('editcity') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="editdiv">


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn  btn-primary">Edit City</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div> 
<!--Add Product model --> 
<div id="addproductmodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addproductmodel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New City</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <form  id="addmanagecity" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">City Name </label>
                                <input type="text" class="form-control" name="cityname"   placeholder="Enter your city name">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn  btn-primary">Add City</button>
            </div>
            </form>
        </div>
    </div>
</div> 
@endsection