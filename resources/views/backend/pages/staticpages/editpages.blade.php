@extends('backend.layout.app')
@section('content')
<br>@foreach($result as $value)
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
                                        <h5>Edit Page</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="editpagesform" action="#!" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Page Title</label>
                                                        <input type="text" class="form-control" name="pagetitle" value="{{ $value->title }}"  placeholder="Enter page title">
                                                        <input type="hidden" name="id" value="{{ $value->id }}">
                                                    </div>
                                                </div>
<!--                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        
                                                        <img src="{{ url('public/images/page_image/'.$value['image'] ) }}" alt="page_image" title="contact-img" class="rounded mr-4" height="100" />
                                                        <label class="form-label">Page Image</label>
                                                        <input type="file" class="form-control" name="pageimage"  placeholder="Enter page title">
                                                    </div>
                                                </div>-->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Page Content</label>
                                                        <textarea name="pagecontent" id="pagecontent" class="form-control">{{ $value->content }}</textarea>
                                                    </div>
                                                </div>
                                                
                                               
                                            </div>
                                            <button type="submit" class="btn  btn-primary">Edit Pages</button>
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
 @endforeach
@endsection