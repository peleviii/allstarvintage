<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Star Vintage Tournament</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Roboto', sans-serif;
            background: #1f3464;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2rem;
        }
        .logo {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            margin-bottom: 2rem;
        }
        .winner {
            background: #d4a017;
            color: white;
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 8px 24px;
            border-radius: 999px;
            margin-bottom: 2rem;
            display: inline-block;
        }
        h1 {
            color: white;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }
        .subtitle {
            color: #6dcaf3;
            font-size: 1rem;
            margin-bottom: 1rem;
        }
        .message {
            color: #b0c4de;
            font-size: 0.95rem;
            line-height: 1.7;
            max-width: 420px;
            margin-bottom: 2rem;
        }
        .see-you {
            color: white;
            font-size: 1.1rem;
            font-weight: 500;
            border: 1px solid rgba(109,202,243,0.4);
            padding: 12px 32px;
            border-radius: 999px;
        }
        .footer {
            margin-top: 3rem;
            color: rgba(255,255,255,0.3);
            font-size: 0.75rem;
        }
    </style>
</head>
<body>
    <img src="{{ asset('images/logo.png') }}" alt="All Star Vintage" class="logo">

    <div class="winner">🥇 Πρωταθλητές: ΕΑΟ Σπάτων</div>

    <h1>All Star Vintage 2026</h1>
    <p class="subtitle">Μαρκόπουλο Αττικής · 5-7 Ιουνίου 2026</p>

    <p class="message">
        Το τουρνουά ολοκληρώθηκε με επιτυχία!<br>
        Ευχαριστούμε όλες τις ομάδες, τους φιλάθλους<br>
        και τους χορηγούς για τη συμμετοχή τους.
    </p>

    <div class="see-you">🏐 Τα λέμε του χρόνου!</div>

    <div class="footer">© 2026 All Star Vintage Tournament</div>
</body>
</html>