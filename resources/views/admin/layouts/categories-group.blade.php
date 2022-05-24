<ul class="list-group list-group-flush">
    @foreach($categories as $category)
        <li class="list-group-item">
            <div class="d-flex">
                <span class="m-2">{{ $category->name }}</span>
                <div class="actions m-2">
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" id="cate-{{ $category->id }}-delete"
                          method="POST">
                        @csrf
                        @method('delete')
                    </form>
                    <a href="#"
                       onclick="event.preventDefault(); document.getElementById('cate-{{ $category->id }}-delete').submit()"
                       class="badge bg-danger">حذف</a>
                    <a href="{{ route('admin.categories.edit' , $category->id) }}" class="badge bg-primary">ویرایش</a>
                    <a href="{{ route('admin.categories.create') }}?parent={{ $category->id }}" class="badge bg-warning">ثبت
                        زیر دسته</a>
                </div>
            </div>
            @if($category->child->count())
                @include('admin.layouts.categories-group' , ['categories' => $category->child])
            @endif
        </li>
    @endforeach
</ul>
