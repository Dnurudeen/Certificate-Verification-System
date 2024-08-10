<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Mail\CertificateVerificationAttempt;
use Illuminate\Support\Facades\Mail;

class CertificateController extends Controller
{
    public function showVerificationForm()
    {
        return view('verify.form');
    }

    public function verifyCertificate(Request $request)
    {
        $request->validate(['certificate_id' => 'required']);

        $certificate = Certificate::where('certificate_id', $request->certificate_id)->first();


        if ($certificate) {
            $status = 'success';
            Mail::to('danijunurdeen@gmail.com')->send(new CertificateVerificationAttempt($certificate, $status));
            return view('verify.result', compact('certificate'));
        } else {
            $status = 'failure';
            Mail::to('danijunurdeen@gmail.com')->send(new CertificateVerificationAttempt(null, $status));
            return redirect()->back()->with('error', 'Certificate not found.');
        }
    }

    public function downloadCertificate($id)
    {
        $certificate = Certificate::findOrFail($id);
        $filePath = storage_path('app/public/' . $certificate->file_path);

        return response()->download($filePath);
    }
}
