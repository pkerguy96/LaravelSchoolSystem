<?php

namespace App\Http\Controllers\Backend;

use App\Models\Is_read;
use App\Models\notifications;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GlobalNotificationController extends Controller
{
    public function NotificationPage()
    {
        $data = notifications::latest()->get();
        return view('admin.notification.view_notifications', compact('data'));
    }
    public function WriteNotification()
    {
        return view('admin.notification.write_notifications');
    }
    public function SubmitNotification(request $request)
    {
        $id = auth()->user()->id;
        notifications::create([
            'user_id' => $id,
            'notification_msg' => $request->notification_msg,
        ]);
        $notification = array(
            'message' => 'Notification Ajoute successement',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.notification')->with($notification);
    }
    public function NotificationViewAjax()
    {
        $id = auth()->user()->id;
        $is_it_read = is_read::where('user_id', $id)->pluck('notification_id')->all();
        $data = notifications::whereNotIn('id', $is_it_read)->orderby('id', 'desc')->get();
        //$msg_content = $data->notification_msg;
        return response()->json(array(
            'data' => $data,

        ));
    }
    public function viewednotifi()
    {
        $id = auth()->user()->id;
        // notifications::where('is_read', 0)->update(['is_read' => 1]);
        $data = notifications::latest()->get();
        $data2 = is_read::latest()->get();
        foreach ($data as $row) {
            $isfound = false;
            foreach ($data2 as $row2) {
                if ($row2->notification_id == $row->id && $row2->user_id == $id) {
                    $isfound = true;
                }
            }
            if (!$isfound) {
                is_read::insert([
                    'user_id' => $id,
                    'notification_id' => $row->id,
                    'is_read' => 1,

                ]);
            }
        }
    }
    public function viewallnotifications()
    {
        $data = notifications::latest()->get();
        return view('etudiants.view_notifications', compact('data'));
    }
}
