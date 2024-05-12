<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Member;
use App\Models\Designation;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('admin.members.index', compact('members'));
    }

    public function create()
    {
        $designations = Designation::all();
        return view('admin.members.create', compact('designations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // Add validation rules for each field
            'name' => 'required|string',
            'designation_id' => 'required|exists:designations,id',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:2048', // Assuming a max file size of 2MB
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        // Handle file upload if photo is provided
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/photos');
            $photoUrl = Storage::url($photoPath);
        } else {
            $photoUrl = null;
        }

        // Create member
        $member = Member::create([
            'name' => $request->input('name'),
            'designation_id' => $request->input('designation_id'),
            'description' => $request->input('description'),
            'photo' => $photoUrl,
            'facebook_url' => $request->input('facebook_url'),
            'twitter_url' => $request->input('twitter_url'),
            'instagram_url' => $request->input('instagram_url'),
            'linkedin_url' => $request->input('linkedin_url'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('admin.members.index')->with('success', 'Member added successfully');
    }
    public function show(Member $member)
    {
        return view('admin.members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        $designations = Designation::all();
        return view('admin.members.edit', compact('member', 'designations'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            // Add validation rules for each field
            'name' => 'required|string',
            'designation_id' => 'required|exists:designations,id',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:2048', // Assuming a max file size of 2MB
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        // Handle file upload if photo is provided
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/photos');
            $photoUrl = Storage::url($photoPath);
        } else {
            $photoUrl = $member->photo;
        }

        // Update member
        $member->update([
            'name' => $request->input('name'),
            'designation_id' => $request->input('designation_id'),
            'description' => $request->input('description'),
            'photo' => $photoUrl,
            'facebook_url' => $request->input('facebook_url'),
            'twitter_url' => $request->input('twitter_url'),
            'instagram_url' => $request->input('instagram_url'),
            'linkedin_url' => $request->input('linkedin_url'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('admin.members.index')->with('success', 'Member updated successfully');
    }

    public function destroy(Member $member)
    {
        // Delete member's photo if exists
        if ($member->photo) {
            Storage::delete($member->photo);
        }

        $member->delete();

        return redirect()->route('admin.members.index')->with('success', 'Member deleted successfully');
    }
}
