<?php $base = env('MAIN_PANEL_ASSETS_DIR') ?>


@component('admin.layouts.content', ['title' => 'ایجاد نقش جدید'])
    <div class="card">
        <div class="card-body">
            <div class="card-content col-lg-6">
                @include('admin.layouts.errors-list')
                <div class="card-body">
                    <form class="form form-horizontal" method="post" action="{{route('admin.roles.store')}}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name">نام</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="name" required class="form-control"
                                                   placeholder="نام نقش..."
                                                   id="name">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="label">توضیح</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="label" name="label" required class="form-control"
                                                   placeholder="توضیح نقش..."
                                                   id="label">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="permissions">دسترسی های این نقش</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <select class="form-control" name="permissions[]" id="permissions" multiple>
                                                @foreach(\App\Models\Permission::all() as $permission)
                                                    <option value="{{$permission->id}}">{{$permission->name}} - {{$permission->label}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">ثبت نقش</button>
                                    <a href="{{route('admin.roles.index')}}" type="reset"
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