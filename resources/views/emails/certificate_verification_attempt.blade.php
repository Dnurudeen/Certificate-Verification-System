<!-- resources/views/emails/certificate_verification_attempt.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Certificate Verification Attempt</title>
</head>
<body>
    <h1>Certificate Verification Attempt</h1>
    <p>A certificate verification was attempted.</p>
    <p><strong>Certificate ID:</strong> {{ $certificate ? $certificate->certificate_id : 'N/A' }}</p>
    <p><strong>Name:</strong> {{ $certificate ? $certificate->name : 'N/A' }}</p>
    <p><strong>Status:</strong> {{ $status }}</p>
</body>
</html>
