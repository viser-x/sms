<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Message;
use App\Models\MessageHistory;
use App\Models\MessageInfo;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function singleMessage()
    {
        $messages = Group::where('created_by', auth()->user()->id)->get();
        $members = GroupMember::whereHas('group', function ($item) {
            $item->where('created_by', auth()->user()->id);
        })->get();
        return view('admin.service.single-message', compact('messages', 'members'));
        return redirect(route('message.info'));
    }

    public function groupMembers($id)
    {
        // return 'hello';
        return $messages = GroupMember::where('group_id', $id)->get();
        return view('admin.service.single-message', compact('messages'));
    }

    public function multipleMessage()
    {
        $messages = Group::where('created_by', auth()->user()->id)->get();
        return view('admin.service.multiple-message', compact('messages',));
    }

    public function messageInfo()
    {
        $receivers = MessageInfo::with(['receivers.group'])->whereHas('message', function ($item) {
            $item->where('sender_id', auth()->user()->id);
        })->get();
        $receivers->transform(function ($item) {
            return [
                'group'   => $item->receivers->group->group_name ?? null,
                'name'    => $item->receivers->contact_name ?? null,
                'number'  => $item->number ?? $item->receivers->contact_number ?? null,
                'message' => $item->message->message,
                'status'  => $item->message->status,
            ];
        });
        // return $receivers;
        return view('admin.service.message-info', compact('receivers'));
    }

    public function messageHistory()
    {
        $messages = Message::get();
        return view('admin.service.message-history', compact('messages'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'message' => 'required',
            // 'number' => 'required'
        ]);
        // return $request->all();
        $message = Message::create([
            'message'         => $request->message,
            'sms_count'       => ceil(strlen($request->message) / 80),
            'total_count'     => ceil(strlen($request->message) / 80) * 1,
            'total_receiver'  => 1,
            'sender_id'       => auth()->user()->id ?? null,
            'draft'           => false,
            'status'          => 'pending',
        ]);        
        MessageHistory::create([
            'user_id'    => $request->group_member_id ?? null,
            'number'     => $request->number ?? null,
            'message_id' => $message->id,
        ]);
        MessageInfo::create([
            'group_member_id' => $request->group_member_id,
            'number'          => $request->number ?? null,
            'message_id'      => $message->id
        ]);
        return back()->with('msg', 'Sent Successfully');
        return redirect(route('message.info'))->with('msg', 'Sent Successfully');
    }
}
