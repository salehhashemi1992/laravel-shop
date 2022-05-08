@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                       فعال سازی شماره موبایل
                    </div>

                    <div class="card-body">
                        <form method="post">
                            @csrf
                            <div class="form form-group mb-3">
                                <label for="token" class="form-label @error('token') is-invalid @enderror">توکن</label>
                                <input type="text" name="token" id="token" class="form-control"
                                       placeholder="لطفا توکن ارسال شده به موبایل تان را وارد کنید...">
                                @error('token')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <button class="btn btn-primary">
                                   بررسی
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
