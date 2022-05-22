<?php $base = env('MAIN_PANEL_ASSETS_DIR') ?>


@component('admin.layouts.content', ['title' => 'لیست محصولات'])
    <div class="card">
        <div class="card-body">
            <div class="mb-5 d-flex justify-content-between">
                @can('create-product')
                    <div class="p-2">
                        <a href="{{route('admin.products.create')}}" class="btn btn-primary">محصول جدید</a>
                    </div>
                @endcan
                <div class="p-2">
                    <form>
                        <div class="input-group">
                            <input name="search" value="{{request('search')}}" type="search"
                                   class="form-control rounded" placeholder="متن مورد نظر" aria-label="Search"
                                   aria-describedby="search-addon"/>
                            <button type="submit" class="btn btn-outline-primary">جست و جو</button>
                        </div>
                    </form>
                </div>
            </div>

            <section class="row">
                <div class="table-responsive">
                    <table class="table mb-4 table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">آی دی محصول</th>
                            <th scope="col">نام محصول</th>
                            <th scope="col">تعداد موجودی</th>
                            <th scope="col">تعداد نظرات</th>
                            <th scope="col">میزان بازدید</th>
                            <th scope="col">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>

                                <td>{{$product->id}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->inventory}}</td>
                                <td>{{$product->comments_count}}</td>
                                <td>{{$product->view_count}}</td>
                                <td>
                                    <a href="{{route('admin.products.edit', $product->id)}}"
                                       class="btn btn-primary btn-sm">ویرایش</a>
                                    <form class="d-inline" action="{{route('admin.products.destroy', $product->id)}}"
                                          method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <div class="card-footer">
            {{ $products->appends(['search' => request('search')])->render() }}
        </div>
    </div>

@endcomponent
