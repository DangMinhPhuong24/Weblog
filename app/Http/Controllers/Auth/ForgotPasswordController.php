<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ],[
            'email.required' => 'Vui lòng nhập email của bạn',
            'email.exists' => 'Email không tồn tại trong hệ thống',
        ]);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => 'Vui lòng kiểm tra Email của bạn'])
            : back()->withErrors(['email' => 'Lỗi']);
    }
}
