<?php

namespace App\Http\Controllers;
use App\Events\playgroundEvent;
use Illuminate\Http\Request;
use Pusher\Pusher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'recipient_id' => 'required|exists:users,id',
            'message' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        try {

            broadcast(new playgroundEvent(Auth::user(), $request->recipient_id, $request->message))->toOthers();
        } catch (\Exception $e) {
            Log::error('Error sending message: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to send message'], 500);
        }

        return response()->json(['success' => true]);
    }
}
