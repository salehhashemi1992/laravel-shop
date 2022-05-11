<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function create(User $user)
    {
        return view('admin.users.permissions', compact('user'));
    }

    public function manage(Request $request, User $user)
    {
        $data = $request->validate([
            'permissions' => ['required', 'array'],
            'roles' => ['required', 'array'],
        ]);

        $user->permissions()->sync($data['permissions']);
        $user->roles()->sync($data['roles']);

        alert()->success('به روزرسانی ها با موفقیت ایجاد شد');

        return redirect(route('admin.users.index'));
    }
}
