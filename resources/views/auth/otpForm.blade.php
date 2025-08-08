<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Verify OTP</h1>
    <form action="{{ route('verify.index') }}" method="post">
        @csrf
        <div>
            <label for="">OTP</label>
            <input type="text" name="otp_code">
        </div>
        <div>
            <button type="submit">Verify</button>
        </div>
        <div>
            <a href="{{ route('logout') }}">LOGOUT</a>
        </div>
    </form>
</body>

</html>
