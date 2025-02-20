@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4 rounded-4 text-center" style="max-width: 500px; width: 100%;">
        <h3 class="fw-bold mb-3 text-primary">Buat Tanda Tangan Digital</h3>

        <form action="{{ route('signature.generate') }}" method="POST">
            @csrf

            <!-- Input Nama -->
            <div class="mb-3 text-start">
                <label for="name" class="form-label fw-semibold">Nama:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama Anda" required>
            </div>

            <!-- Tanda Tangan -->
            <div class="mb-3 text-start">
                <label class="form-label fw-semibold">Tanda Tangan:</label>
                <div class="border rounded-3 bg-light p-2 d-flex justify-content-center">
                    <canvas id="signature-pad" width="400" height="200" style="border:1px solid #000;"></canvas>
                </div>
                <input type="hidden" name="signature" id="signature-data">
                <div class="mt-2 text-center">
                    <button type="button" id="clear-signature" class="btn btn-danger btn-sm">Hapus</button>
                </div>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary w-100 mt-3" onclick="saveSignature()">Generate QR Code</button>
        </form>
    </div>
</div>

<!-- Script Tanda Tangan -->
<script>
    var canvas = document.getElementById("signature-pad");
    var ctx = canvas.getContext("2d");
    var isDrawing = false;

    // Atur ketebalan garis tanda tangan
    ctx.lineWidth = 2;
    ctx.lineJoin = "round";
    ctx.lineCap = "round";

    canvas.addEventListener("mousedown", function (e) {
        isDrawing = true;
        ctx.beginPath();
        ctx.moveTo(e.offsetX, e.offsetY);
    });

    canvas.addEventListener("mousemove", function (e) {
        if (isDrawing) {
            ctx.lineTo(e.offsetX, e.offsetY);
            ctx.stroke();
        }
    });

    canvas.addEventListener("mouseup", function () {
        isDrawing = false;
    });

    // Tombol Hapus Tanda Tangan
    document.getElementById("clear-signature").addEventListener("click", function () {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    });

    // Simpan Tanda Tangan dalam Format Base64
    function saveSignature() {
        var signatureData = canvas.toDataURL("image/png");
        document.getElementById("signature-data").value = signatureData;
    }
</script>
@endsection
