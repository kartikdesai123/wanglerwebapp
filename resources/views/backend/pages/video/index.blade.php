@extends('backend.layout.app')
@section('content')
<div class="row">
    <!-- customar project  start -->
    <div class="col-xl-12" >
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center m-l-0">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 text-right">
                        <button class="btn btn-danger btn-sm btn-round has-ripple" data-toggle="modal" data-target="#addproductmodel"><i class="feather icon-plus"></i>Add Video</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="video-table" class="table mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Sr.No</th>
                                <th class="text-center">Video</th>
                                <th class="text-center">Title</th>
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

<!--Add Product model --> 
<div id="addproductmodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addproductmodel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="addvideoform" action="{{ route('admin-video') }}" enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Upload Type</label><br>
                                <input type="radio" name="gridRadios" class="uploadtype" id="gridRadios1" value="Manually" checked="">&nbsp;Manually &nbsp;&nbsp;
                                <input type="radio" name="gridRadios" class="uploadtype"  id="gridRadios" value="Youtube" >&nbsp;Youtube
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title"  placeholder="Enter news title">
                            </div>
                        </div><br>

                        <div class="col-md-12 changehtml">
                            <div class="form-group">
                                <label class="form-label">Add Video</label>
                                <div><br>
                                    <input type="file" class="form-control validation-file" name="videoname" accept="video/*"><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn  btn-primary">Add Video</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
    @endsection