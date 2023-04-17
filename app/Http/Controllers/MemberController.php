<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupMember;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function addMember()
    {
        $groups = Group::where('created_by', auth()->user()->id)->get();
        return view('admin.groupmember.add-member', compact('groups'));
    }

    public function manageMember()
    {
        $members = GroupMember::whereHas('group', function ($item) {
            $item->where('created_by', auth()->user()->id);
        })->get();
        info($members);
        return view('admin.groupmember.manage-member', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'group_id'       => 'required',
            'contact_name'   => 'required|max:20',
            'contact_number' => 'required|max:15',
        ]);
        $members = GroupMember::create([
            'group_id'       => $request->group_id,
            'contact_name'   => $request->contact_name,
            'contact_number' => $request->contact_number,
        ]);
        // $request->session()->flash('msg', 'Contact Successfully Added');
        return redirect(route('manage.member'))->with('msg', 'Contact Successfully Added');
    }

    public function editMember($id)
    {
        $members = GroupMember::findOrFail($id);
        info($members);
        return view('admin.groupmember.edit-member', compact('members'));
    }


    public function updateMember(Request $request)
    {

        $request->validate([
            'contact_name'   => 'required|max:20',
            'contact_number' => 'required|max:15',
        ]);
        $members = GroupMember::find($request->id);
        $members->update([
            'contact_name'   => $request->contact_name,
            'contact_number' => $request->contact_number
        ]);
        // $request->session()->flash('msg', 'Contact Successfully Updated');
        return redirect(route('manage.member'))->with('msg', 'Contact Successfully Updated');
    }

    public function deleteMember($id)
    {
        $members = GroupMember::findOrFail($id);
        $members->delete();
        return redirect(route('manage.member'))->with('msg', 'Delete Successfully');
    }

    public function search(Request $request)
    {
        // return $request->all();
        if ($request->search) {

            $searchContacts = GroupMember::with('group')->where('contact_name', 'LIKE', '%' . $request->search . '%')->paginate();
            return view('admin.search.search', compact('searchContacts'));
        } else {

            return redirect()->back()->with('msg', 'No Result Found!');
        }
    }
}
