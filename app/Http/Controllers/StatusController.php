<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id)
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
