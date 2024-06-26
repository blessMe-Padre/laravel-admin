<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ReviewsModel;

class MainController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }

    public function reviews()
    {
        $reviews = new ReviewsModel();
        $reviews = $reviews->orderBy('name')->paginate(6);
        return view('reviews', ['reviews' => $reviews]);
    }

    public function review($id)
    {
        $reviews = new ReviewsModel();
        return view('review', ['data' => $reviews->find($id)]);
    }

    public function reviews_check(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required | min:3',
            'massage' => 'required | min:10',
        ]);

        $review = new ReviewsModel();
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->massage = $request->input('massage');

        $review->save();

        return redirect()->route('reviews')->with('success', 'Отзыв был успешно добавлен');
    }

}
