<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Controllers\Controller;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AddressesController extends Controller
{

    /**
     * Display a listing of the addresses.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $addresses = Address::with('creator', 'service')->paginate(25);

        return view('addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new address.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name', 'id')->all();
        $services = Service::pluck('name', 'id')->all();

        return view('addresses.create', compact('creators', 'services'));
    }

    /**
     * Store a new address in the storage.
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
            Address::create($data);

            return redirect()->route('addresses.address.index')
                ->with('success_message', 'Address was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified address.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $address = Address::with('creator', 'service')->findOrFail($id);

        return view('addresses.show', compact('address'));
    }

    /**
     * Show the form for editing the specified address.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $address = Address::findOrFail($id);
        $creators = User::pluck('name', 'id')->all();
        $services = Service::pluck('name', 'id')->all();

        return view('addresses.edit', compact('address', 'creators', 'services'));
    }

    /**
     * Update the specified address in the storage.
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

            $address = Address::findOrFail($id);
            $address->update($data);

            return redirect()->route('addresses.address.index')
                ->with('success_message', 'Address was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified address from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $address = Address::findOrFail($id);
            $address->delete();

            return redirect()->route('addresses.address.index')
                ->with('success_message', 'Address was successfully deleted.');
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
            'address' => 'string|min:1|nullable',
            'state' => 'string|min:1|nullable',
            'district' => 'string|min:1|nullable',
            'pin' => 'string|min:1|nullable',
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
        $data = $request->only(['address', 'state', 'district', 'pin', 'created_by', 'service_id']);

        return $data;
    }
}
