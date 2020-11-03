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
                        <div class="card user-card user-card-1">
                            <div class="card-body pt-0">
                                <div class="user-about-block text-center">
                                    <div class="row align-items-end">
                                        <div class="col"></div>
                                        <div class="col">
                                            @if( $getdetails[0]->profileimage ==  '' || $getdetails[0]->profileimage == null )
                                                                <img class="img-radius img-fluid wid-100" src="{{ url('public/images/profileimages/images.png') }}" alt="User image">&nbsp;&nbsp;
                                                            @else
                                                                <img class="img-radius img-fluid wid-100" src="{{ url('public/images/profileimages/'.$getdetails[0]->profileimage) }}" alt="User image">&nbsp;&nbsp;
                                                            @endif
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h6 class="mb-1 mt-3">{{ $getdetails[0]->fname }} {{ $getdetails[0]->lname }}</h6>
                                    <p class="mb-1 text-muted text-capitalize">{{ $getdetails[0]->usertype }}</p>
                                    <p class="mb-1">{{ $getdetails[0]->email }}</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12">
                        <div class="row">
                            <!-- [ Form Validation ] start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Edit Profile</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="userprofile" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">First Name</label>
                                                        <input type="text" class="form-control" name="firstname" value="{{ $getdetails[0]->fname }}" placeholder="Enter your first name">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Last Name </label>
                                                        <input type="text" class="form-control" name="lastname" value="{{ $getdetails[0]->lname }}" placeholder="Enter your last name">
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <input type="text" class="form-control" name="email" value="{{ $getdetails[0]->email }}" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Profile Image</label>
                                                        <div><br>
                                                            <input type="text" class="form-control hidden" name="oldimage" value="{{ $getdetails[0]->profileimage }}" placeholder="Email">
                                                            <input type="text" class="form-control hidden" name="editid" value="{{ $getdetails[0]->id }}" placeholder="Email">
                                                            
                                                            @if( $getdetails[0]->profileimage ==  '' || $getdetails[0]->profileimage == null )
                                                                <img class="img-radius img-fluid wid-100" src="{{ url('public/images/profileimages/images.png') }}" alt="User image">&nbsp;&nbsp;
                                                            @else
                                                                <img class="img-radius img-fluid wid-100" src="{{ url('public/images/profileimages/'.$getdetails[0]->profileimage) }}" alt="User image">&nbsp;&nbsp;
                                                            @endif
                                                            <input type="file" class="validation-file" name="profileimage">
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