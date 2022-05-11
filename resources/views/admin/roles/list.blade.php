<?php $base = env('MAIN_PANEL_ASSETS_DIR') ?>


@component('admin.layouts.content', ['title' => 'نقش ها'])
    <div class="card">
        <div class="card-body">
            <div class="mb-5 d-flex justify-content-between">
                <div class="p-2">
                    <a href="{{route('admin.roles.create')}}" class="btn btn-primary">نقش جدید</a>
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
                        @foreach($roles as $role)
                            <tr>

                                <td>{{$role->name}}</td>
                                <td>{{$role->label}}</td>
                                <td><span class="badge bg-success">فعال</span></td>
                                <td>
                                    <a href="{{route('admin.roles.edit', $role->id)}}"
                                       class="btn btn-primary btn-sm">ویرایش</a>
                                    <form class="d-inline" action="{{route('admin.roles.destroy', $role->id)}}"
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
            {{ $roles->render() }}
        </div>
    </div>

@endcomponent
