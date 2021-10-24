@extends('layouts.auth.auth')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-end" style="padding-top: 90px;">
        <div class="col-md-5">
            <div class="auth-card">
                <div class="auth-card-title">
                    Masuk
                </div>
                <div class="auth-card-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf @method('POST')
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <span>Belum punya akun? <a href="{{ route('daftar') }}">Daftar</a></span>
                        <div class="form-group pt-3">
                            <button class="btn btn-primary" style="width: 100% !important">Login</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection