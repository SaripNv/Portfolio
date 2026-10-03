<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    public function index()
    {
        // Urutkan berdasarkan kategori dan persentase
        $skills = Skill::orderBy('category')->orderBy('percentage', 'desc')->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
            'category' => 'required|in:technical,administrative', 
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
        ]);
        
        $data = $request->only(['name', 'percentage', 'category']); 
        
        // Upload icon jika ada
        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('skills', 'public');
            $data['icon'] = $path;
        }
        
        Skill::create($data);
        
        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil ditambahkan!');
    }

    public function show(Skill $skill)
    {
        return view('admin.skills.show', compact('skill'));
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

public function update(Request $request, Skill $skill)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'percentage' => 'required|integer|min:0|max:100',
        'category' => 'required|in:technical,administrative',
        'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
    ]);
    
    $data = $request->only(['name', 'percentage', 'category']);
    
    // Handle icon removal
    if ($request->has('remove_icon') && $request->remove_icon == '1') {
        if ($skill->icon && Storage::disk('public')->exists($skill->icon)) {
            Storage::disk('public')->delete($skill->icon);
        }
        $data['icon'] = null;
    }
    
    // Upload icon baru
    if ($request->hasFile('icon')) {
        // Hapus icon lama jika ada
        if ($skill->icon && Storage::disk('public')->exists($skill->icon)) {
            Storage::disk('public')->delete($skill->icon);
        }
        
        $path = $request->file('icon')->store('skills', 'public');
        $data['icon'] = $path;
    }
    
    $skill->update($data);
    
    return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil diperbarui!');
}

    public function destroy(Skill $skill)
    {
        // Hapus file icon jika ada
        if ($skill->icon && Storage::disk('public')->exists($skill->icon)) {
            Storage::disk('public')->delete($skill->icon);
        }
        
        $skill->delete();
        
        return redirect()->route('admin.skills.index')->with('success', 'Skill berhasil dihapus!');
    }
}