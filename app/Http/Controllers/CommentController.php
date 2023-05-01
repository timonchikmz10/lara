<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $request, Product $product)
    {
        Comment::create([
            'product_id' => $product->id,
            'user_id' => Auth::user()->id,
            'text' => $request->text,
            'email' => Auth::user()->email,
            'mark' => $request->rating,
        ]);
        return redirect()->back();
    }
    public function update(Request $request, Product $product ){
        Comment::where('product_id', $product->id)->where('user_id', Auth::user()->id)->update([
            'text' => $request->text,
            'mark' => $request->rating,
        ]);
        return redirect()->back();
    }
}
