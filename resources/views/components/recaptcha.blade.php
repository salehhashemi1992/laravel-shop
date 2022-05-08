@section('script')
    <script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
@endsection

<div class="row mb-3">
    <div class="col-md-6 offset-md-4">
        <div
            class="g-recaptcha @error('g-recaptcha-response') is-invalid @enderror"
            data-sitekey="{{$site_key}}"></div>
        @error('g-recaptcha-response')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>
