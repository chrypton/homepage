<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(): Response
	{
		return Inertia::render('Homepage/Register');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request): RedirectResponse
	{
		$request->validate([
			'name' => ['required', 'string'],
			'username' => ['required', 'string', 'min:4', Rule::Unique('users', 'username')],
			'email' => ['required', 'string', 'email', 'max:255', Rule::Unique('users', 'email')],
			'password' => ['required', 'confirmed', 'string', 'min:6']
		]);

		$user = User::create([
			'name' => $request->name,
			'username' => $request->username,
			'email' => $request->email,
			'password' => Hash::make($request->password)
		]);

		Auth::login($user);

		return to_route('index');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(User $user)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(User $user)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, User $user)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(User $user)
	{
		//
	}
}
