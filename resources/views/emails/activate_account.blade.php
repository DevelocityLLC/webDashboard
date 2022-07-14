Hello, {{ $data['name'] }}
<br><br>
Welcome to Devlocity Tasks
<br>
Please click the below link to verify your email and activate your account!
<br><br>
<a href="{{ route('activate_account', $data['activation_code']) }}">Click Here!</a>

<br><br>
Thank you!