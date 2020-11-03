@extends('backend.layout.login')
@section('content')
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <img src="{{ url('public/frontend/assets/images/logo.png') }}" alt="" class="img-fluid mb-4">
                       
                        <h4 class="mb-3 f-w-400">Signin</h4>
                         @if (session('session_error'))
                            <div class="alert alert-danger">
                                {{ session('session_error') }}
                                <div class="pull-right closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                            </div>
                        @endif
                        <form class="" role="form" id="login" method="POST" action="{{ route('admin') }}">
                            {{ csrf_field() }}
                            <div class="form-group mb-3">
                                <label class="floating-label" for="Email">Email address</label>
                                <input type="text" class="form-control" id="Email" name="email" placeholder="">
                            </div>
                            <div class="form-group mb-4">
                                <label class="floating-label" for="Password">Password</label>
                                <input type="password" class="form-control" id="Password" name="password" placeholder="">
                            </div>
                            <button class="btn btn-block btn-primary mb-4">Signin</button>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection