<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset - Seagatecapitalmgmt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding: 10px;
            border-bottom: 3px solid #007bff;
        }

        .header img {
            max-width: 150px;
        }

        .content {
            padding: 20px;
            font-size: 16px;
            color: #333;
        }

        .footer {
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #666;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            text-decoration: none;
            color: white;
            background: #007bff;
            border-radius: 5px;
        }

        .note {
            font-size: 14px;
            color: #666;
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('static/logo.png') }}" alt="Seagatecapitalmgmt">
        </div>
        <div class="content">
            <p>Dear {{ $user->name }},</p>
            <p>We received a request to reset your password for your Seagatecapitalmgmt account.</p>
            <p>Please click the button below to reset your password:</p>

            <a href="{{ $resetUrl }}" class="btn">Reset Password</a>

            <p>If you didn't request this password reset, please ignore this email or contact our support team if you
                have any concerns.</p>

            <div class="note">
                <p><strong>Note:</strong> This password reset link will expire in {{ $expires }} minutes.</p>
                <p>If the button doesn't work, copy and paste this URL into your browser:</p>
                <p><small>{{ $resetUrl }}</small></p>
            </div>

            <p>Best Regards,</p>
            <p><strong>Seagatecapitalmgmt Team</strong></p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Seagatecapitalmgmt. All rights reserved.</p>
        </div>
    </div>
</body>

</html>