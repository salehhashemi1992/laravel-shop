<link rel="stylesheet" href="">

@component('admin.layouts.content', ['title' => 'ثبت دسترسی'])
    <div class="card">
        <div class="card-body">
            <div class="card-content col-lg-6">
                @include('admin.layouts.errors-list')
                <div class="card-body">
                    <form class="form form-horizontal" method="post" action="{{route('admin.users.permissions.manage', $user->id)}}">
                        @csrf
                        <div class="form-body">
                            <div class="row">

                                <div class="col-md-4">
                                    <label for="roles">نقش ها</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <select class="choices form-select multiple-remove" name="roles[]" id="roles" multiple="multiple">
                                                @foreach(\App\Models\Role::all() as $role)
                                                    <option value="{{$role->id}}" {{in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : ''}}>{{$role->name}} - {{$role->label}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="permissions">دسترسی ها</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <select class="choices form-select multiple-remove" name="permissions[]" id="permissions" multiple="multiple">
                                                @foreach(\App\Models\Permission::all() as $permission)
                                                    <option value="{{$permission->id}}" {{in_array($permission->id, $user->permissions->pluck('id')->toArray()) ? 'selected' : ''}}>{{$permission->name}} - {{$permission->label}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end ">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">ثبت تغییرات</button>
                                    <a href="{{route('admin.users.index')}}" type="reset"
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
