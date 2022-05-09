<?php $base = env('MAIN_PANEL_ASSETS_DIR') ?>


@component('admin.layouts.content', ['title' => 'لیست کاربران'])
    <div class="card">
        <div class="card-body">
            <div class="mb-5">
                <a href="{{route('admin.users.create')}}" class="btn btn-primary">کاربر جدید</a>
            </div>
            <section class="row">
                <div class="table-responsive">
                    <table class="table mb-4 table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">آی دی کاربر</th>
                            <th scope="col">نام کاربر</th>
                            <th scope="col">ایمیل</th>
                            <th scope="col">وضعیت ایمیل</th>
                            <th scope="col">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>

                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                @if($user->email_verified_at)
                                    <td><span class="badge bg-success">فعال</span></td>
                                @else
                                    <td><span class="badge bg-danger">غیرفعال</span></td>

                                @endif
                                <td>
                                    <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-primary btn-sm">ویرایش</a>
                                    <form class="d-inline" action="{{route('admin.users.destroy', $user->id)}}"
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
            {{ $users->render() }}
        </div>
    </div>

@endcomponent
