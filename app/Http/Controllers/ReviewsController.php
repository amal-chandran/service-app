<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Review;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class ReviewsController extends Controller
{

    /**
     * Display a listing of the reviews.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $reviews = Review::with('creator', 'service')->paginate(25);

        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new review.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name', 'id')->all();
        $services = Service::pluck('name', 'id')->all();

        return view('reviews.create', compact('creators', 'services'));
    }

    /**
     * Store a new review in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $this->affirm($request);
        try {
            $data = $this->getData($request);
            $data['created_by'] = Auth::Id();
            Review::create($data);

            return redirect()->route('reviews.review.index')
                ->with('success_message', 'Review was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified review.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $review = Review::with('creator', 'service')->findOrFail($id);

        return view('reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified review.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $creators = User::pluck('name', 'id')->all();
        $services = Service::pluck('name', 'id')->all();

        return view('reviews.edit', compact('review', 'creators', 'services'));
    }

    /**
     * Update the specified review in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

        $this->affirm($request);
        try {
            $data = $this->getData($request);

            $review = Review::findOrFail($id);
            $review->update($data);

            return redirect()->route('reviews.review.index')
                ->with('success_message', 'Review was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified review from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $review = Review::findOrFail($id);
            $review->delete();

            return redirect()->route('reviews.review.index')
                ->with('success_message', 'Review was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Validate the given request with the defined rules.
     *
     * @param  Illuminate\Http\Request  $request
     *
     * @return boolean
     */
    protected function affirm(Request $request)
    {
        $rules = [
            'name' => 'string|min:1|max:255|nullable',
            'description' => 'string|min:1|max:1000|nullable',
            'rating' => 'nullable',
            'created_by' => 'nullable',
            'service_id' => 'nullable',
        ];


        return $this->validate($request, $rules);
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $data = $request->only(['name', 'description', 'rating', 'created_by', 'service_id']);

        return $data;
    }
}
