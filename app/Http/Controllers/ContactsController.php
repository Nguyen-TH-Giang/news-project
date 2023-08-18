<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('id', 'DESC')->filter(request(['search']))->paginate(10)->withQueryString();

        foreach ($contacts as $contact) {
            if ($contact['status'] == Constants::OPEN) {
                $contact['status'] = 'Open';
            } else if ($contact['status'] == Constants::PENDING) {
                $contact['status'] = 'Pending';
            } else if ($contact['status'] == Constants::RESOLVED) {
                $contact['status'] = 'Resolved';
            }
        }

        return view('admin.contacts.index', [
            'contacts' => $contacts
        ]);
    }

    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', [
            'contact' => $contact
        ]);
    }

    public function update(Contact $contact)
    {
        $attributes = request()->validate([
            'status' => ['in:' . Constants::OPEN . ',' . Constants::PENDING . ',' . Constants::RESOLVED]
        ]);

        if (isset($attributes['status'])) {
            $contact->update($attributes);
        }

        return redirect()->route('admin.contacts.index')->with('success', 'Contact updated!');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted!');
    }
}
