<?php

namespace App\Http\Controllers;
use App\Models\Review;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request){
        $reviews = Review::with('book','user')->orderBy('created_at','DESC');
        
        if(!empty($request->keyword)){
            $reviews->where('review','like','%'.$request->keyword.'%');
        }
        $reviews = $reviews->paginate(5);
        return view('account.reviews.list',[
            'reviews' => $reviews
        ]);
    }

    public function edit($id){
        $review = Review::findOrFail($id);
        return view('account.reviews.edit',[
            'review' => $review
        ]);

    }

    public function updateReview($id, Request $request){
        $review = Review::findOrFail($id);
        $rules = [
            'review' => 'required',
            'status' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('account.reviews.edit', $id)->withInput()->withErrors($validator);
        }

        $review->review = $request->review;
        $review->status = $request->status;
        $review->save();
        session()->flash('success', 'Review update successfully.'); 
        return redirect()->route('account.reviews');    
        
    }

    public function deleteReview(Request $request){
        $id = $request->id;
        $review = Review::find($id);

        if($review == null){
            session()->flash('error', 'Review not found');
            return response()->json([
                'status' => false
            ]);
        } else {
            $review->delete();
            session()->flash('success', 'Review deleted successfully');
            return response()->json([
                'status' => false
            ]);
        }
    }

}
