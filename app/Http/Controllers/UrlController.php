<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UrlController extends Controller
{
    public function index()
    {
        return view('urls.index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'original_url' => 'url|required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // すでに登録済みの original_url を使い回す
        $existing = Url::where('original_url', $request->original_url)->first();
        if ($existing) {
            return response()->json(['short_url' => url($existing->short_url)]);
        }

        // 重複しない short_url を生成
        do {
            $short_url = Url::generateShortUrl($request->original_url);
        } while (Url::where('short_url', $short_url)->exists());

        $url = new Url();

        $url->original_url = $request->original_url;
        $url->short_url = $short_url;
        $expirationDays = (int) config('app.url_expiration_days'); //intを使うことで文字列を数字に変換している
        $url->expired_at = Carbon::now()->addDays($expirationDays);
        $url->save();

        return response()->json(['short_url' => url($short_url)]);
    }

    public function redirect($short_url)
    {
        $url = Url::where('short_url', $short_url)->first();


        if (!$url || $url->expired_at->isPast()) {
            // abort(404);

            return response()->view('errors.404', [], 404);
        }


        return redirect($url->original_url);
    }
}
