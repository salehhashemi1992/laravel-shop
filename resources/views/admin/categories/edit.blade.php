<?php $base = env('MAIN_PANEL_ASSETS_DIR') ?>


@component('admin.layouts.content', ['title' => 'ویرایش دسته بندی'])
    <div class="card">
        <div class="card-body">
            <div class="card-content col-lg-6">
                @include('admin.layouts.errors-list')
                <div class="card-body">
                    <form class="form form-horizontal" method="post" action="{{route('admin.categories.update', $category->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name">نام</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            <input type="text" name="name" required class="form-control" placeholder="نام دسته بندی..." value="{{old('name', $category->name)}}"
                                                   id="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="parent_id">دسته مرتبط</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            <select class="choices form-select" name="parent_id" id="parent_id">
                                                @foreach(\App\Models\Category::all() as $category)
                                                    <option value="{{$category->id}}" {{$category->id === $category->parent_id ? 'selected' : ''}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">ویرایش دسته بندی</button>
                                    <a href="{{route('admin.categories.index')}}" type="reset" class="btn btn-light-secondary me-1 mb-1">لغو</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endcomponent
