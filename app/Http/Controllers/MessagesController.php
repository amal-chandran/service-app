<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class MessagesController extends Controller
{

    /**
     * Display a listing of the messages.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $messages = Message::with('enquiry', 'creator')->paginate(25);

        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new message.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $enquiries = Enquiry::pluck('name', 'id')->all();
        $creators = User::pluck('name', 'id')->all();

        return view('messages.create', compact('enquiries', 'creators'));
    }

    /**
     * Store a new message in the storage.
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
            Message::create($data);

            return redirect()->route('messages.message.index')
                ->with('success_message', 'Message was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified message.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $message = Message::with('enquiry', 'creator')->findOrFail($id);

        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified message.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $message = Message::findOrFail($id);
        $enquiries = Enquiry::pluck('name', 'id')->all();
        $creators = User::pluck('name', 'id')->all();

        return view('messages.edit', compact('message', 'enquiries', 'creators'));
    }

    /**
     * Update the specified message in the storage.
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

            $message = Message::findOrFail($id);
            $message->update($data);

            return redirect()->route('messages.message.index')
                ->with('success_message', 'Message was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified message from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $message = Message::findOrFail($id);
            $message->delete();

            return redirect()->route('messages.message.index')
                ->with('success_message', 'Message was successfully deleted.');
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
            'message_body' => 'numeric|nullable',
            'enquiry_id' => 'nullable',
            'created_by' => 'nullable',
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
        $data = $request->only(['message_body', 'enquiry_id', 'created_by']);

        return $data;
    }
}
