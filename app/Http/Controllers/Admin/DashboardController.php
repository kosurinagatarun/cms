<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance and apply middleware.
     */
    public function __construct()
    {
        // Ensures that only authenticated admins can access the methods in this controller
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role !== 'admin') {
                return redirect('/home')->with('error', 'You do not have permission to access the admin dashboard.');
            }
            return $next($request);
        });
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    // In your DashboardController.php

    public function index()
    {
        $totalUsers = User::count();
        $adminCount = User::where('role', 'admin')->count();
        $editorCount = User::where('role', 'editor')->count();

        // Pass the counts to the view
        return view('admin.dashboard', compact('totalUsers', 'adminCount', 'editorCount'));
    }


}
