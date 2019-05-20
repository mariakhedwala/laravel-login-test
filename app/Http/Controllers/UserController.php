<?php

namespace App\Http\Controllers;

use App\User;
use App\Job;
use App\Country;
use App\City;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $users = $user->getUsers();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, Job $job, Country $country, City $city)
    {
        return view('user.create', compact('user', 'job', 'country', 'city'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'max:255'],
                'email' => ['required', 'email'],
                'job' => ['nullable', 'string'],
                'city' => ['nullable', 'string'],
                'country' => ['nullable', 'string'],
                'password' => ['required', 'confirmed', 'min:8', 'max:60'],
                'password_confirmation' => ['required', 'min:8'],
            ]);

            if ($validated) {
                $createUser = new User;
                $createUser = $createUser->createUsers($validated);

                if ($createUser) {
                    $request->session()->flash('success', 'Contact created');
                    return redirect('users');
                } else {
                    $request->session()->flash('danger', 'Contact creation failed');
                    return redirect()->route('users.create');
                }
            } else {
                return redirect()->route('users.create')->with('error');
            }

            return redirect('users');

        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '1062') {
                return redirect()->back()->withErrors(['email' => 'Email ID already exist']);
            } else {
                return redirect()->back()->with('error');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error');
        }
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Job $job, Country $country, City $city)
    {
        return view('user.create', compact('user', 'job', 'country', 'city'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'max:255'],
                'email' => ['required', 'email', "unique:users,email,$user->id"],
                'job' => ['nullable', 'string'],
                'city' => ['nullable', 'string'],
                'country' => ['nullable', 'string'],
                'password' => ['required', 'confirmed', 'min:8', 'max:60'],
                'password_confirmation' => ['required', 'min:8'],
            ]);

            if ($validated) {
                $updateUser = $user->editUser($validated);

                if ($updateUser == true) {
                    $request->session()->flash('success', 'Contact updated');
                    return redirect('users');
                } else {
                    $request->session()->flash('danger', 'Contact update failed');
                    return redirect('users');
                }
            } else {
                return redirect()->route('users.create')->with('error');
            }

            return redirect('users');

        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '1062') {
                return redirect()->back()->withErrors(['email' => 'Email ID already exist']);
            } else {
                return redirect()->back()->with('error');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error');
        }
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $delete = $user->delete();

        if ($delete) {
            $request->session()->flash('success', 'Contact deleted');
            return redirect('users');
        } else {
            $request->session()->flash('danger', 'Contact delete failed');
            return redirect('users');
        }

        return redirect('users');
    }
}
