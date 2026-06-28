<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial, Helvetica, sans-serif; color: #1b262c; background: #f4f6f9; padding: 24px;">
    <div style="max-width: 560px; margin: 0 auto; background: #ffffff; border-radius: 8px; padding: 28px; border-top: 4px solid #c79a2b;">
        <h2 style="color: #1f2733; margin-top: 0;">New Contact Inquiry</h2>
        <p style="color: #777; margin-top: -8px;">Submitted via the YQL DNA Portal public website</p>

        <table style="width: 100%; margin-top: 16px;">
            <tr>
                <td style="padding: 6px 0; font-weight: 600; width: 110px; vertical-align: top;">Name</td>
                <td style="padding: 6px 0;">{{ $name }}</td>
            </tr>
            <tr>
                <td style="padding: 6px 0; font-weight: 600; vertical-align: top;">Phone</td>
                <td style="padding: 6px 0;">{{ $phone ?: 'Not provided' }}</td>
            </tr>
            <tr>
                <td style="padding: 6px 0; font-weight: 600; vertical-align: top;">Email</td>
                <td style="padding: 6px 0;"><a href="mailto:{{ $email }}">{{ $email }}</a></td>
            </tr>
        </table>

        <p style="font-weight: 600; margin-top: 18px; margin-bottom: 6px;">Message</p>
        <p style="white-space: pre-wrap; background: #f4f6f9; padding: 12px 14px; border-radius: 6px;">{{ $messageBody }}</p>

        <hr style="border: none; border-top: 1px solid #d8dee4; margin: 24px 0 12px;">
        <small style="color: #999;">Reply directly to this email to respond to {{ $name }}.</small>
    </div>
</body>
</html>
