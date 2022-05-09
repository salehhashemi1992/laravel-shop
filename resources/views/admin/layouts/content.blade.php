@extends('admin.master')

@section('content')
    <div class="page-heading">
        <h3>Profile Statistics</h3>
    </div>
    <div class="page-content">
        {{ $slot }}
    </div>
@endsection
