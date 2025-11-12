<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = contact::all();
        $categories = Category::all();
        return view('index', compact('contacts', 'categories'));
    }

    public function store(Request $request){
        $tel = $request->input('tel1'). '-'. $request->input('tel2'). '-'. $request->input('tel3');
        $content = $request->only([
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel',
            'address',
            'building',
            'detail'
        ]);
        $content['tel'] = $tel;
        Contact::create($content);
        return redirect()->route('confirm');
    }
}
