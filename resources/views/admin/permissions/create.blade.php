<?php $base = env('MAIN_PANEL_ASSETS_DIR') ?>


@component('admin.layouts.content', ['title' => 'ایجاد دسترسی جدید'])
    <div class="card">
        <div class="card-body">
            <div class="card-content col-lg-6">
                @include('admin.layouts.errors-list')
                <div class="card-body">
                    <form class="form form-horizontal" method="post" action="{{route('admin.permissions.store')}}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name">نام</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="name" required class="form-control" placeholder="نام دسترسی..."
                                                   id="name">
                                            <div class="form-control-icon">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="label">توضیح</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="label" name="label" required class="form-control" placeholder="توضیح دسترسی..."
                                                   id="label">
                                            <div class="form-control-icon">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">ثبت دسترسی</button>
                                    <a href="{{route('admin.permissions.index')}}" type="reset" class="btn btn-light-secondary me-1 mb-1">لغو</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endcomponent
