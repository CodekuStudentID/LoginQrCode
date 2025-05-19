<!-- resources/views/login-qr.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login QR Code</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Tailwind CDN -->
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    @if(session('error'))
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
        {{ session('error') }}
    </div>
@endif


    <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-md text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Login dengan QR Code</h2>
        <p class="text-sm text-gray-600 mb-6">Arahkan QR Code Anda ke kamera untuk login secara otomatis</p>

        <div id="reader" class="mx-auto rounded-md overflow-hidden shadow-md border border-gray-300" style="width: 300px; height: 300px;"></div>

        <form method="POST" action="{{ route('login.qr') }}" id="qrForm" class="hidden">
            @csrf
            <input type="hidden" name="qr_token" id="qr_token">
        </form>

        <p class="mt-6 text-sm text-gray-500">Pastikan kamera Anda aktif dan izinkan akses kamera jika diminta.</p>
    </div>

    <script>
    let scanned = false;

    function onScanSuccess(decodedText) {
        if (scanned) return; // Hindari multiple submit
        scanned = true;

        console.log("Hasil scan: ", decodedText); // Debug hasil scan
        
        document.getElementById('qr_token').value = decodedText;
        document.getElementById('qrForm').submit();
    }

    const html5QrCode = new Html5Qrcode("reader");
    html5QrCode.start(
        { facingMode: "environment" },
        { fps: 10, qrbox: { width: 250, height: 250 } },
        onScanSuccess
    ).catch(err => {
        alert("Gagal memulai kamera: " + err);
    });
</script>

</body>
</html>
