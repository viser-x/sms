<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupMember;
use App\Models\MessageHistory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalGroups = Group::count();
        $totalContacts = GroupMember::count();
        $totalSmsSent = MessageHistory::count();
        return view('admin.home.dashboard', compact('totalGroups', 'totalContacts', 'totalSmsSent'));
    }
}
