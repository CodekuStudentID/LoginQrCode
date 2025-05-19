<!-- resources/views/show-qr.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>QR Code Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm text-center">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">QR Code untuk Login</h1>

    <div id="qrcode" class="mx-auto mb-6" style="width: 200px; height: 200px;">{!! $qr !!}</div>

    <p class="text-gray-600 mb-4">Gunakan aplikasi scanner QR di perangkat Anda untuk login.</p>

    <button 
      onclick="window.print()" 
      class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition">
      Cetak QR Code
    </button>
  </div>

  <script>
    // Ambil data QR code dari backend (variabel blade)
    const qrData = @json($qr);

    // // Generate QR Code di elemen #qrcode
    // new QRCode(document.getElementById("qrcode"), {
    //   text: qrData,
    //   width: 200,
    //   height: 200,
    //   correctLevel : QRCode.CorrectLevel.H
    // });
  </script>

</body>
</html>
