<?php $base = env('MAIN_PANEL_ASSETS_DIR') ?>


@component('admin.layouts.content', ['title' => 'لیست کاربران'])
    <div class="card">
        <div class="card-body">
            <div class="mb-5 d-flex justify-content-between">
                <div class="p-2">
                    <a href="{{route('admin.users.create')}}" class="btn btn-primary">کاربر جدید</a>
                </div>
                <div class="p-2">
                    <form>
                        <div class="input-group">
                            <div class="checkbox text-end mx-4 p-2">
                                <input type="checkbox" name="just_moderator" id="just_moderator"
                                       class="form-check-input "
                                       @if(!is_null(request('just_moderator'))) checked @endif>
                                <label for="just_moderator">فقط مدیران</label>
                            </div>
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
                                    @can('edit', $user)
                                        <a href="{{route('admin.users.edit', $user->id)}}"
                                           class="btn btn-primary btn-sm">ویرایش</a>
                                        <form class="d-inline" action="{{route('admin.users.destroy', $user->id)}}"
                                              method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                        </form>
                                    @endcan
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
