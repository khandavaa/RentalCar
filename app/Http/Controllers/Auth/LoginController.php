<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Oci8\Database\Connection;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle the login process based on NIK.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Validate the NIK field
        $request->validate([
            'nik' => 'required|string',
        ]);

        $nik = $request->nik;

        // Initialize Oracle connection (yajra/oci8)
        $connection = \DB::connection('oracle'); // Ensure you use the correct DB connection

        // Call stored procedure to fetch the name
        $query = "BEGIN
                    SP_GMES0413_Q_V01(:nik, :action, :cursor);
                  END;";

        $cursor = $connection->select($query, [
            'nik' => $nik,
            'action' => 'GET_NAME',
        ]);

        // Extract name from the cursor (assuming the procedure returns DISPLAY_NAME)
        $name = $cursor[0]->DISPLAY_NAME ?? null;

        if ($name) {
            // You may want to create a user session or store the user info here
            // For example, set the authenticated user's NIK (you may want to save the user to the database first)
            Auth::loginUsingId($nik);

            // Redirect to home or dashboard page
            return redirect()->route('home');
        } else {
            // If no name was returned, the NIK is invalid
            return back()->withErrors(['nik' => 'Invalid NIK.']);
        }
    }
}
