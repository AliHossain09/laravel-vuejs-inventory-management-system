<h1>Forgot Password</h1>

<p>You can click the below link reset password:</p>
{{-- <a href="{{ route('password.forgot.likn', ['token' => $token]) }}">Forgot Password</a> --}}
<a href="{{ route('password.forgot.likn', ['token' => $token]) }}?token={{ $token }}&email={{ $email }}">
    Forgot Password
</a>
