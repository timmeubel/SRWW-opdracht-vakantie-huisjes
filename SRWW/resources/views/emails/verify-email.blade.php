<!DOCTYPE html>
<html>
<head>
    <title>Verifieer je e-mailadres</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2>Welkom {{ $userName }}!</h2>
        
        <p>Bedankt voor je registratie. Om je account volledig te activeren, moet je je e-mailadres verifiëren.</p>
        
        <p>Klik op de link hieronder om je e-mailadres te bevestigen:</p>
        
        <p style="margin: 20px 0;">
            <a href="{{ $verificationUrl }}" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">
                E-mailadres verifiëren
            </a>
        </p>
        
        <p>Of kopieer deze link in je browser:</p>
        <p style="word-break: break-all; background-color: #f0f0f0; padding: 10px; border-radius: 5px;">
            {{ $verificationUrl }}
        </p>
        
        <p>Deze link is 24 uur geldig.</p>
        
        <p>Met vriendelijke groet,<br>Het team</p>
    </div>
</body>
</html>
