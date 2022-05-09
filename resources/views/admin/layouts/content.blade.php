@extends('admin.master')

@section('content')
    <div class="page-heading">
        <h3>{{$title}}</h3>
    </div>
    <div class="page-content">
        {{ $slot }}
    </div>
@endsection
