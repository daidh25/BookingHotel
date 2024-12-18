<div class="">
    <h2>Dear, {{ $username }}</h2>
    <br>
    <p>There are link and code that help you reset your password!</p>
    <br>
    <p>Code: <strong>{{ $token }}</strong></p>
    <br>
    <a href="{{ route('reset_pass.edit', ['email' => $email]) }}">Reset my password now</a>
    <br>
    <h4>Thank you for using this website</h4>
</div>
