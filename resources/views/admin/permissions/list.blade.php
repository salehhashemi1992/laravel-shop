<?php $base = env('MAIN_PANEL_ASSETS_DIR') ?>


@component('admin.layouts.content', ['title' => 'دسترسی ها'])
    <div class="card">
        <div class="card-body">
            <div class="mb-5 d-flex justify-content-between">
                <div class="p-2">
                    <a href="{{route('admin.permissions.create')}}" class="btn btn-primary">دسترسی جدید</a>
                </div>
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
                            <th scope="col">نام</th>
                            <th scope="col">توضیح</th>
                            <th scope="col">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>

                                <td>{{$permission->name}}</td>
                                <td>{{$permission->label}}</td>
                                <td><span class="badge bg-success">فعال</span></td>
                                <td>
                                    <a href="{{route('admin.permissions.edit', $permission->id)}}"
                                       class="btn btn-primary btn-sm">ویرایش</a>
                                    <form class="d-inline" action="{{route('admin.permissions.destroy', $permission->id)}}"
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
            {{ $permissions->render() }}
        </div>
    </div>

@endcomponent
