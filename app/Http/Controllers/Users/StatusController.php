<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Users\User;
use Illuminate\Http\RedirectResponse;
use function redirect;

class StatusController extends Controller
{
    public function update($id): RedirectResponse
    {
        $user = User::find($id);

        if ($user->status == 'enable'){
            $user->status = 'disable';
        }else{
            $user->status = 'enable';
        }
        $user->save();
        return redirect()->route('users.index');
    }
}
