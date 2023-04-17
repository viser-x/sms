<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupMember;
use Illuminate\Http\Request;
use App\Models\MessageHistory;
use App\Models\MessageInfo;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalGroups = Group::where('created_by', auth()->user()->id)->count();
        $totalContacts = GroupMember::whereHas('group', function ($item) {
            $item->where('created_by', auth()->user()->id);
        })->count();
        $totalSmsSent = MessageHistory::count();
        return view('home', compact('totalGroups', 'totalContacts', 'totalSmsSent'));
    }
}
