<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class UhastnikiController extends Controller
{
    public function index()
    {
        $uhastniki = uhastniki::where('status', 'confirmed')->get();
        return view('uhastniki.index', compact('uhastniki'));
    }
    
    public function create()
    {
        return view('uhastniki.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nickname' => 'required|string|max:255',
            'age' => 'required|integer',
            'breed' => 'required|string',
            'color' => 'required|string',
        ]);
    
        uhastniki::create([
            'user_id' => auth()->id(),
            'nickname' => $request->nickname,
            'age' => $request->age,
            'breed' => $request->breed,
            'color' => $request->color,
        ]);
    
        return redirect()->route('uhastniki.index')->with('success', 'Участник успешно заявлен!');
    }
    
    public function show()
    {
        $uhastniki = auth()->user()->uhastniki;
        return view('uhastniki.show', compact('uhastniki'));
    }
    
    public function confirm($id)
    {
        $participant = uhastniki::findOrFail($id);
        $participant->status = 'confirmed';
        $participant->save();
    
        return redirect()->route('uhastniki.show')->with('success', 'Участник подтверждён!');
    }
    
    public function unconfirm($id)
    {
        $uhastniki = uhastniki::findOrFail($id);
        $uhastniki->status = 'submitted';
        $uhastniki->save();
        return redirect()->route('uhastniki.show')->with('success', 'Подтверждение участника отменено!');
    }
    }
