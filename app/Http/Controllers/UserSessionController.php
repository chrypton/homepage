<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class UserSessionController extends Controller
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
		return Inertia::render('Homepage/Login');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request): RedirectResponse
	{
		$request->validate([
			'username' => ['required', 'string'],
			'password' => ['required', 'string']
		]);
		
		if(Auth::attempt($request->only(['username', 'password']), $request->boolean('remember'))){
			return to_route('index');
		}

		return back();
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Request $request): RedirectResponse
	{
		Auth::logout();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return to_route('users.login');
	}
}
