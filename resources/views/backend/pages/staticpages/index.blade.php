@extends('backend.layout.app')
@section('content')
<div class="row">
    <!-- customar project  start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">{{ csrf_field() }}
                <div class="row align-items-center m-l-0">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('addpages') }}"><button class="btn btn-danger btn-sm btn-round has-ripple" ><i class="feather icon-plus"></i> Add Pages</button></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="pagedatatable" class="table mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Sr.No</th>
                                <th class="text-center">Pages Title</th>
                                <!--<th class="text-center">News Image</th>-->
                                <th class="text-center">Created Date</th>
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
<div id="statusmodel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="featuremodel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Page Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure to change Page Status ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn  btn-primary yes-sure-status">Yes Change Page Status</button>
            </div>
        </div>
    </div>
</div> 
@endsection