<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Contact::paginate(config('pagination.count'));
        return view('back.messages.index', get_defined_vars());
    }

    public function show(Contact $message)
    {
        return view('back.messages.show', get_defined_vars());
    }


    public function destroy(Contact $message)
    {
        $message->delete();
        return to_route('back.messages.index')->with('success', __('keywords.message_deleted_successfully'));
    }
}
