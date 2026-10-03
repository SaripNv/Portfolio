<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'percentage',
        'icon',
        'category', // Tambahkan category
    ];
    
    // Accessor untuk mendapatkan URL icon
    public function getIconUrlAttribute()
    {
        return $this->icon ? asset('storage/' . $this->icon) : null;
    }
    
    // Helper untuk cek apakah ada icon
    public function hasIcon()
    {
        return !is_null($this->icon) && Storage::disk('public')->exists($this->icon);
    }
    
    // Accessor untuk label kategori
    public function getCategoryLabelAttribute()
    {
        return $this->category === 'technical' ? '💻 Teknis & Programming' : '📊 Administrasi & Perkantoran';
    }
    
    // Scope untuk filter
    public function scopeTechnical($query)
    {
        return $query->where('category', 'technical');
    }
    
    public function scopeAdministrative($query)
    {
        return $query->where('category', 'administrative');
    }
}