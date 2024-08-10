<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function verified_credentials(){
        $credential = Certificate::all();
        return view('/admin/verified-credentials', compact('credential'));
    }

    public function uploadCertificate(Request $request)
    {
        $request->validate([
            'certificate_id' => 'required|unique:certificates',
            'name' => 'required',
            'description' => 'required',
            'file' => 'required|mimes:pdf,jpg,png|max:2048',
        ]);

        $path = $request->file('file')->store('certificates', 'public');

        Certificate::create([
            'certificate_id' => $request->certificate_id,
            'name' => $request->name,
            'description' => $request->description,
            'file_path' => $path,
        ]);

        return redirect()->back()->with('success', 'Certificate uploaded successfully.');
    }


    public function edit($id)
    {
        $certificate = Certificate::findOrFail($id);
        return view('admin.edit', compact('certificate'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'certificate_id' => 'required|unique:certificates,certificate_id,' . $id,
            'name' => 'required',
            'description' => 'required',
            'file' => 'nullable|mimes:pdf,jpg,png|max:2048',
        ]);

        $certificate = Certificate::findOrFail($id);

        if ($request->hasFile('file')) {
            // Delete old file
            Storage::disk('public')->delete($certificate->file_path);

            // Store new file
            $path = $request->file('file')->store('certificates', 'public');
            $certificate->file_path = $path;
        }

        $certificate->certificate_id = $request->certificate_id;
        $certificate->name = $request->name;
        $certificate->description = $request->description;
        $certificate->save();

        return redirect()->route('verified.credentials')->with('success', 'Certificate updated successfully.');
    }

    public function destroy($id)
    {
        $certificate = Certificate::findOrFail($id);
        Storage::disk('public')->delete($certificate->file_path);
        $certificate->delete();

        return redirect()->back()->with('success', 'Certificate deleted successfully.');
    }
}
