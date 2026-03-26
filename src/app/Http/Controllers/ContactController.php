<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('content')->get();
        return view('contacts.index', compact('categories'));
    }

    private function buildTel(array $data): string
    {
        return $data['tel1'] . '-' . $data['tel2'] . '-' . $data['tel3'];
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only([
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel1',
            'tel2',
            'tel3',
            'address',
            'building',
            'detail'
        ]);
        session($contact); //画面戻る用にsessionに保存

        $contact['tel'] = $this->buildTel($contact);
        $category = Category::find($request->category_id);

        return view('contacts.confirm', compact('contact', 'category'));
    }

    public function store(Request $request)
    {
        $tel = $this->buildTel([
            'tel1' => session('tel1'),
            'tel2' => session('tel2'),
            'tel3' => session('tel3'),
        ]);

        Contact::create([
            'category_id' => session('category_id'),
            'first_name' => session('first_name'),
            'last_name' => session('last_name'),
            'gender' => session('gender'),
            'email' => session('email'),
            'tel' => $tel,
            'address' => session('address'),
            'building' => session('building'),
            'detail' => session('detail'),
        ]);
        session()->forget([
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel1',
            'tel2',
            'tel3',
            'address',
            'building',
            'detail'
        ]);
        return view('contacts.thanks');
    }
}
