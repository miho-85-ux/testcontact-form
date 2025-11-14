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
        $categories = Category::all();
        $contact = new Contact(); 
        return view('index', compact('contact', 'categories'));
    }
    
    public function confirm(ContactRequest $request)
    {
        if ($request->input('action') === 'back'){
            return redirect('/')->withInput();
        }

        $data = $request->validated();
        $data['tel'] = $request->tel1. '-'. $request->tel2. '-'. $request->tel3;
        $data['gender_text'] = ['1' => '男性', '2' => '女性', '3' => 'その他'][$data['gender']];
        $data['category_name'] = Category::find($data['category_id'])->content;

        return view('confirm', compact('data'));
    }

    public function store(Request $request)
    {
        if ($request->input('action') === 'back') {
        return redirect('/')->withInput();
        }

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
        return redirect('/thanks');
    }

}
