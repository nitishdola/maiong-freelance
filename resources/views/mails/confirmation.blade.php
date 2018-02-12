Hi {{ $name }}
<p> Your registration is completed. Please click on the link below to verify your email account </p>

{{ route('user.email_confirm', $email_confirmation_code)}}