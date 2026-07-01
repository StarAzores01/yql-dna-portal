<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial, Helvetica, sans-serif; color: #1b262c; background: #f4f6f9; padding: 24px;">
    <div style="max-width: 560px; margin: 0 auto; background: #ffffff; border-radius: 8px; padding: 28px; border-top: 4px solid #c79a2b;">
        <h2 style="color: #1f2733; margin-top: 0;">Welcome to the YQL DNA Portal</h2>
        <p style="color: #777; margin-top: -8px;">An account has been created for you</p>

        <p>Hello {{ $name }},</p>
        <p>An account has been created for you on the YQL DNA Portal. Use the details below to log in for the first time.</p>

        <table style="width: 100%; margin-top: 16px;">
            <tr>
                <td style="padding: 6px 0; font-weight: 600; width: 140px; vertical-align: top;">Login URL</td>
                <td style="padding: 6px 0;"><a href="{{ $loginUrl }}">{{ $loginUrl }}</a></td>
            </tr>
            <tr>
                <td style="padding: 6px 0; font-weight: 600; vertical-align: top;">Registered Email</td>
                <td style="padding: 6px 0;">{{ $email }}</td>
            </tr>
            <tr>
                <td style="padding: 6px 0; font-weight: 600; vertical-align: top;">Temporary Password</td>
                <td style="padding: 6px 0;"><strong>{{ $temporaryPassword }}</strong></td>
            </tr>
        </table>

        <p style="background: #f4f6f9; padding: 12px 14px; border-radius: 6px; margin-top: 18px;">
            Please log in and change your password immediately after your first login.
        </p>

        <hr style="border: none; border-top: 1px solid #d8dee4; margin: 24px 0 12px;">
        <small style="color: #999;">This is an automated message from the YQL DNA Portal. If you were not expecting this account, please contact your administrator.</small>
    </div>
</body>
</html>
