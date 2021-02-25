<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hootlex\Friendships\Traits\Friendable;
use Illuminate\Http\Request;

class UserController extends Controller
{
//    public function friends($user)
//    {
//        $user = User::find($user);
//        $friends=$user->getAllFriendships();
//        $friends=($friends->pluck('id')->toArray());
//
//
//        return view('pages.user.friends',[
//            'friends'=>$friends
//        ]);
//    }
//    public function friend_request($sender, $friend){
//        if($sender!=$friend){
//            $user = User::find($sender);
//            $recipient = User::find($friend);
//            $user->befriend($recipient);
//        }
//    }
}
