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
                                       
                                    </div>
                                    <div class="card-body">
                                          <form id="changepassword" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <input type="text" class="form-control hidden" name="editid" value="{{ $userId }}" placeholder="Email">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Old Password</label>
                                                        <input type="password" class="form-control" name="oldpassword"  placeholder="Enter your old password">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">New Password</label>
                                                        <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Enter your new passwprd">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Confirm Password</label>
                                                        <input type="password" class="form-control" name="confirmpassword"  placeholder="Enter your confirm passwprd">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn  btn-primary">Change Password</button>
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