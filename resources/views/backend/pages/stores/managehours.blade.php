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
                                        <h5>Edit Store Hours</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="storehours" method="post">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Store Hours</label>
                                                        <input type='hidden' class="form-control" name="hours_id" value="{{ $hours[0]['id'] }}">
                                                        <textarea class="form-control" name="store_hours">{{ $hours[0]['hours'] }}</textarea>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <button type="submit" class="btn  btn-primary">Edit Store Hours</button>
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