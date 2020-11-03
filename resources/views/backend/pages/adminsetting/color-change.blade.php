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
                                        <h5>Edit Color</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="colorchange" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Header Color</label>
                                                        <input type="color" class="form-control" name="headercolor" value="{{ $getdetails[0]->headercolor }}" placeholder="Enter Header color">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Footer Color </label>
                                                        <input type="color" class="form-control" name="footercolor" value="{{ $getdetails[0]->footercolor }}" placeholder="Enter Footer color">
                                                    </div>
                                                </div>
                                                
                                                <input type="text" class="form-control hidden" name="editid" value="{{ $getdetails[0]->id }}" placeholder="Email">
                                                            
                                                
                                            </div>
                                            <button type="submit" class="btn  btn-primary">Edit Color</button>
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