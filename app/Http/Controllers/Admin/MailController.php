<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mail;

class MailController extends Controller
{
    public function index()
    {
        $mails = Mail::orderByDesc("id")->paginate(15);
        return view("admin.pages.mail.inbox",compact("mails"));
    }
}
