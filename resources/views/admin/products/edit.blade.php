@component('admin.layouts.content', ['title' => 'ویرایش محصول'])
    <div class="card">
        <div class="card-body">
            <div class="card-content col-lg-6">
                @include('admin.layouts.errors-list')
                <div class="card-body">
                    <form class="form form-horizontal" method="post" action="{{route('admin.products.update', $product->id)}}">
                        @method('PATCH')
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="title">نام محصول</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            <input type="text" name="title" value="{{old('title', $product->title)}}" required class="form-control" placeholder="نام محصول..."
                                                   id="title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="description">توضیحات محصول</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            <textarea name="description" id="description" required class="form-control form-text" placeholder="توضیحات محصول را وارد کنید...">{{old('description', $product->description)}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="price">قیمت</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            <input type="number" id="price" name="price" required class="form-control" value="{{old('price', $product->price)}}" placeholder="قیمت را وارد کنید...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="inventory">موجودی</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            <input type="number" id="inventory" name="inventory" required class="form-control" value="{{old('inventory', $product->inventory)}}" placeholder="موجودی را وارد کنید...">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">ویرایش محصول</button>
                                    <a href="{{route('admin.products.index')}}" type="reset" class="btn btn-light-secondary me-1 mb-1">لغو</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endcomponent
