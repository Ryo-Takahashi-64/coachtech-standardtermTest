<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ClientRequest;


class ContactController extends Controller
{
    public function welcome()
    {
        return view('/');
    }

    public function contact()
    {
        return view('contact');
    }
    public function confirm(ClientRequest $request)
    {
        $lastname = $request->lastname;
        $firstname = $request->firstname;
        $fullname = $lastname . "　" . $firstname;
        $gender = $request->gender;
        $email = $request->email;
        $postcode = $request->postcode;
        $address = $request->address;
        $building = $request->building;
        $opinion = $request->opinion;
        return view('confirm',
            compact('lastname','firstname','fullname','gender','email'
                ,'postcode','address','building','opinion'));
    }

    public function thanks(Request $request)
    {
        $form = [
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'email' => $request->email,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building' => $request->building,
            'opinion' => $request->opinion,
        ];
        Contact::create($form);
        return view('thanks');
    }

    public function fix(Request $request)
    {
        $lastname = $request->lastname;
        $firstname = $request->firstname;
        $gender = $request->gender;
        $email = $request->email;
        $postcode = $request->postcode;
        $address = $request->address;
        $building = $request->building;
        $opinion = $request->opinion;
        return view('contact',
            compact('lastname','firstname','gender','email'
                ,'postcode','address','building','opinion'));
    }

    public function search(Request $request)
    {
        $query = Contact::query();

        $searchName = $request->input('name');
        $searchGender = $request->input('gender');
        $searchCreatedFrom = $request->input('created_from');
        $searchCreatedTo = $request->input('created_to');
        $searchEmail = $request->input('email');

        if ($request->has('name') && $searchName != '') {
            $query->where('fullname', 'like', '%' . $searchName . '%')->get();
        }

        if ($searchGender != '0') {
            $query->where('gender', $searchGender)->get();
        }

        if ($request->has('created_from') && $searchCreatedFrom != '') {
            $query->whereDate('created_at', '>=', $searchCreatedFrom)->get();
        }

        if ($request->has('created_to') && $searchCreatedTo != '') {
            $query->whereDate('created_at', '<=', $searchCreatedTo)->get();
        }

        if ($request->has('email') && $searchEmail != '') {
            $query->where('email', 'like', '%' . $searchEmail . '%')->get();
        }

        $items =$query->paginate(10);

        return view('management',['items' => $items,
            'searchName' => $searchName,
            'searchGender' => $searchGender,
            'searchCreatedFrom' => $searchCreatedFrom,
            'searchCreatedTo' => $searchCreatedTo,
            'searchEmail' => $searchEmail,
        ]);
    }

    public function reset()
    {
        return redirect('/search');
    }

    public function delete(Request $request)
    {
        Contact::where('id', $request->id)->delete();
        return redirect('/search');
    }
}
