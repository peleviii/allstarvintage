<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
        }

        .header {
            background: #1a3a6b;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            color: white;
            margin: 0;
            font-size: 20px;
        }

        .header p {
            color: #d4a017;
            margin: 5px 0 0;
            font-size: 13px;
        }

        .content {
            padding: 24px;
            background: #f8f9fa;
        }

        .field {
            background: white;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 12px;
        }

        .field label {
            font-size: 11px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: block;
            margin-bottom: 4px;
        }

        .field p {
            margin: 0;
            font-size: 15px;
            font-weight: 500;
            color: #1a3a6b;
        }

        .footer {
            background: #0f2347;
            padding: 16px;
            text-align: center;
        }

        .footer p {
            color: #94a3b8;
            font-size: 12px;
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>🏐 All Star Vintage Tournament</h1>
        <p>Νέα Δήλωση Συμμετοχής</p>
    </div>
    <div class="content">
        <div class="field">
            <label>Όνομα Ομάδας</label>
            <p>{{ $teamName }}</p>
        </div>
        <div class="field">
            <label>Υπεύθυνος</label>
            <p>{{ $responsible }}</p>
        </div>
        <div class="field">
            <label>Email</label>
            <p>{{ $email }}</p>
        </div>
        <div class="field">
            <label>Τηλέφωνο</label>
            <p>{{ $phone }}</p>
        </div>
        @if($note)
        <div class="field">
            <label>Μήνυμα</label>
            <p>{{ $note }}</p>
        </div>
        @endif
    </div>
    <div class="footer">
        <p>All Star Vintage Tournament — Μαρκόπουλο, 5-7 Ιουνίου 2026</p>
    </div>
</body>

</html>