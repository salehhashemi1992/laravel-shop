<?php $base = env('MAIN_PANEL_ASSETS_DIR') ?>


@component('admin.layouts.content', ['title' => 'لیست دسته بندی ها'])
    <div class="card">
        <div class="card-body">
            <div class="mb-5 d-flex justify-content-between">
                @can('create-user')
                    <div class="p-2">
                        <a href="{{route('admin.categories.create')}}" class="btn btn-primary">دسته بندی جدید</a>
                    </div>
                @endcan
            </div>

            <section class="row">
                <!-- /.card-header -->
                    @include('admin.layouts.categories-group' , ['categories' => $categories])
            </section>
        </div>
        <div class="card-footer">
            {{ $categories->appends(['search' => request('search')])->render() }}
        </div>
    </div>

@endcomponent
