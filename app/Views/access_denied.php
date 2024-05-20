<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('/assets/img/bg.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: #ecf0f1;
            font-family: 'Arial', sans-serif;
            overflow: hidden;
        }

        .container {
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 0.5em;
        }

        p {
            font-size: 1.5rem;
        }

        .btn {
            margin-top: 1em;
            padding: 0.5em 1em;
            border: none;
            background: #e74c3c;
            color: #ecf0f1;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        .btn:hover {
            background: #c0392b;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>403 Forbidden - Access Denied</h1>
        <p>Anda Tidak Dapat Akses Ke halaman ini.</p>
        <button class="btn" onclick="goBack()">Kembali</button>
    </div>
    <script>
        function goBack() {
            window.location.href = '/';
        }
    </script>
</body>

</html>