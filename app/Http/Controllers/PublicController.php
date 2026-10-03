<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Project;
use App\Models\Contact;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $technicalSkills = Skill::where('category', 'technical')->orderBy('percentage', 'desc')->get();
        $administrativeSkills = Skill::where('category', 'administrative')->orderBy('percentage', 'desc')->get();
        $projects = Project::latest()->take(6)->get(); 
        
        return view('public.index', compact('technicalSkills', 'administrativeSkills', 'projects'));
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10', 
        ]);

        Contact::create($request->only('name', 'email', 'message'));

        return redirect()->back()->with('success', 'Pesan Anda telah terkirim! Terima kasih 🙏');
    }

    // Method untuk download CV (opsional)
    public function downloadCV()
    {
        $pathToFile = public_path('cv/saripudin-cv.pdf');
        
        if (file_exists($pathToFile)) {
            return response()->download($pathToFile, 'Saripudin_CV_2026.pdf');
        }
        
        return redirect()->back()->with('error', 'File CV tidak ditemukan.');
    }
}