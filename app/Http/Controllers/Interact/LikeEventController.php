<?php

namespace App\Http\Controllers\Interact;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\LikeEvent;
use Illuminate\Support\Facades\Auth;

class LikeEventController extends Controller
{
    public function likeEvent(Event $event)
    {
        $like_events = LikeEvent::all();
        foreach ($like_events as $item){
            if ($item->user_id == Auth::user()->id && $item->like == 1 && $item->event_id == $event->id){
                $item->update([
                    'like' => false
                ]);
                $event->update([
                    'count_like' => $event->decrement('count_like')
                ]);
                return back();
            }elseif ($item->user_id == Auth::user()->id && $item->like == 0 && $item->event_id == $event->id){
                $item->update([
                    'like' => true
                ]);
                $event->update([
                    'count_like' => $event->increment('view_count')
                ]);
                return back();
            }

        }

        LikeEvent::create([
            'user_id' => Auth::user()->id,
            'event_id' => $event->id,
            'like' => true
        ]);
        $event->update([
            'count_like' => $event->increment('view_count')
        ]);

        return back();
    }
}
