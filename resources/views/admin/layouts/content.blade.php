@extends('admin.master')

@section('content')
    <div class="page-heading">
        <h3>{{$title}}</h3>
    </div>
    <div class="page-content">
        {{ $slot }}
    </div>
@endsection

@section('scripts')
    <?php $base = env('MAIN_PANEL_ASSETS_DIR') ?>
    <script src="{{$base}}/theme/vendors/choices.js/choices.min.js"></script>
@endsection

