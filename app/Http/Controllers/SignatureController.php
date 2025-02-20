<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Signature;

class SignatureController extends Controller
{
    public function showForm()
    {
        return view('signature.form');
    }

    public function generateSignature(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'signature' => 'required|string',
        ]);

        // Simpan tanda tangan ke database
        $signature = Signature::create([
            'name' => $request->name,
            'signature_data' => $request->signature,
        ]);

        // Buat URL QR Code yang akan menuju halaman tanda tangan digital
        $signatureUrl = route('signature.view', ['id' => $signature->id]);
        $qrCode = QrCode::size(200)->generate($signatureUrl);

        return view('signature.result', compact('qrCode', 'signatureUrl'));
    }

    public function viewSignature($id)
    {
        $signature = Signature::findOrFail($id);
        return view('signature.view', compact('signature'));
    }
}
