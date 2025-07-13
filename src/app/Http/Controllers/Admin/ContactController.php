<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        // 入力値のバリデーション（全て任意項目としてチェック）
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'gender' => 'nullable|in:1,2,3,all',
            'category_id' => 'nullable|in:1,2,3,4,5',
            'date' => 'nullable|date',
        ]);
        $query = Contact::query();

        // 名前検索（姓・名・フルネーム部分一致）
        if ($request->filled('name')) {
            $name = $request->input('name');
            $query->where(function ($q) use ($name) {
                $q->where('last_name', 'like', "%{$name}%")
                ->orWhere('first_name', 'like', "%{$name}%")
                ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ["%{$name}%"]);
            });
        }
        // メールアドレス検索
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }
        // 性別検索
        if ($request->filled('gender') && $request->input('gender') !== 'all') {
            $query->where('gender', $request->input('gender'));
        }
        // お問い合わせ種別
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }
        // 日付検索（created_at のみ日付で絞る）
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }
        // ページネーション（7件ずつ）＋検索条件の保持
        $contacts = $query->orderBy('created_at', 'desc')
        ->paginate(7)
        ->appends($request->all());
        
        return view('admin.contacts.index', compact('contacts'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        
        /*
        return redirect()->route('admin.contacts.index')->with('success', '削除しました');
        */
        return redirect()->back()->with('success', '削除しました');
    }
}