<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Http\Controllers\Controller;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class EnquiriesController extends Controller
{

    /**
     * Display a listing of the enquiries.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $enquiries = Enquiry::with('creator', 'service')->paginate(25);

        return view('enquiries.index', compact('enquiries'));
    }

    /**
     * Show the form for creating a new enquiry.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name', 'id')->all();
        $services = Service::pluck('name', 'id')->all();

        return view('enquiries.create', compact('creators', 'services'));
    }

    /**
     * Store a new enquiry in the storage.
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
            Enquiry::create($data);

            return redirect()->route('enquiries.enquiry.index')
                ->with('success_message', 'Enquiry was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified enquiry.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $enquiry = Enquiry::with('creator', 'service')->findOrFail($id);

        return view('enquiries.show', compact('enquiry'));
    }

    /**
     * Show the form for editing the specified enquiry.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $creators = User::pluck('name', 'id')->all();
        $services = Service::pluck('name', 'id')->all();

        return view('enquiries.edit', compact('enquiry', 'creators', 'services'));
    }

    /**
     * Update the specified enquiry in the storage.
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

            $enquiry = Enquiry::findOrFail($id);
            $enquiry->update($data);

            return redirect()->route('enquiries.enquiry.index')
                ->with('success_message', 'Enquiry was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified enquiry from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $enquiry = Enquiry::findOrFail($id);
            $enquiry->delete();

            return redirect()->route('enquiries.enquiry.index')
                ->with('success_message', 'Enquiry was successfully deleted.');
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
        $data = $request->only(['name', 'created_by', 'service_id']);

        return $data;
    }
}
