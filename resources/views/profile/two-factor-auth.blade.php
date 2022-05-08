@extends('profile.layout')

@section('profile.body')
    <h3>احراز هویت دو مرحله ای</h3>
    <?php debugbar()->debug($_POST); ?>
    <form method="post">
        @csrf
        <div class="mb-3">
            <label for="type" class="form-label">نوع</label>
            <select class="form-select" name="type">
                @foreach(config('twofactor.types') as $key=> $name)
                    <option
                        value="{{$key}}" {{old('type') == $key || auth()->user()->hasTwoFactorAuth($key) ? 'selected' : ''}}>{{$name}}</option>
                @endforeach
            </select>
        </div>
        @error('type')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
        <div class="form form-group mb-3">
            <label for="phone_number" class="form-label @error('phone_number') is-invalid @enderror">شماره تلفن</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control"
                   value="{{old('phone_number') ?? auth()->user()->phone_number}}"
                   placeholder="لطفا شماره موبایل خود را وارد کنید...">
            @error('phone_number')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <button class="btn btn-primary">
                به روزرسانی
            </button>
        </div>
    </form>

@endsection
