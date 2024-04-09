<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewsModel;

class AdminReviewsController extends Controller
{
    public function show_all_reviews()
    {
        $reviews = new ReviewsModel();
        $reviews = $reviews->all();
        return view('admin.adminhome', ['reviews' => $reviews]);
    }
    public function edit_review($id)
    {
        $reviews = new ReviewsModel();
        return view('admin.admin-review-edit', ['data' => $reviews->find($id)]);
    }


    public function review_edit_submit($id, Request $request)
    {
        $valid = $request->validate([
            'name' => 'required | min:3',
            'massage' => 'required | min:10',
        ]);

        $review = ReviewsModel::find($id);
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->massage = $request->input('massage');

        $review->save();

        return redirect()->route('home-reviews', $id);
    }

    public function delete_review($id)
    {
        ReviewsModel::find($id)->delete();
        return redirect()->route('home-reviews');
    }
}
