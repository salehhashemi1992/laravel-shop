<?php $base = env('MAIN_PANEL_ASSETS_DIR') ?>


@component('admin.layouts.content', ['title' => 'ایجاد دسته بندی جدید'])
    <div class="card">
        <div class="card-body">
            <div class="card-content col-lg-6">
                @include('admin.layouts.errors-list')
                <div class="card-body">
                    <form class="form form-horizontal" method="post" action="{{route('admin.categories.store')}}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name">نام دسته بندی</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="name" required class="form-control"
                                                   placeholder="نام دسته بندی..."
                                                   id="name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(request('parent'))
                                @php
                                    $parent = \App\Models\Category::find(request('parent'))
                                @endphp
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="parent">دسته بندی والد</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" required class="form-control"
                                                       disabled
                                                       value="{{$parent->name}}"
                                                       id="parent">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="parent_id" value="{{$parent->id}}" id="parent_id">
                            @endif

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">ثبت دسته بندی</button>
                                <a href="{{route('admin.categories.index')}}" type="reset"
                                   class="btn btn-light-secondary me-1 mb-1">لغو</a>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

@endcomponent
