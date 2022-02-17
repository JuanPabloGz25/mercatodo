<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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
