<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileAdminRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function profile(): View
    {
        return view('admin.profile.index');
    }

    public function edit(): View
    {
        return view('admin.profile.edit');
    }

    public function update(UpdateProfileAdminRequest $request): RedirectResponse
    {
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = time() . '.' . $image->getClientOriginalName();

            $image->move(public_path('upload/admin_images'), $file_name);
        }

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'profile_image' => $file_name ?? null,
        ]);

        return redirect()->route('admin.profile');
    }
}
