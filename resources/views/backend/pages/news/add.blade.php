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
                                        <h5>Add News</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="addnewsform" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">News Title</label>
                                                        <input type="text" class="form-control" name="newstitle"  placeholder="Enter page title">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">News Image</label>
                                                        <input type="file" class="form-control" name="newsimage"  placeholder="Enter page title">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Page Content</label>
                                                        <textarea name="pagecontent" id="pagecontent" name="pagecontent" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                                <button type="submit" class="btn  btn-primary">Add Page</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection