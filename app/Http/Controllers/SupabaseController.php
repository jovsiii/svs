<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupabaseController extends Controller
{
    /**
     * Example using Laravel's built-in database connection to Supabase
     */
    public function usingLaravelDB()
    {
        // This uses the database connection configured in config/database.php
        // Make sure to set DB_CONNECTION=supabase in your .env
        
        $examples = DB::table('examples')->get();
        
        return response()->json([
            'message' => 'Data retrieved using Laravel DB',
            'data' => $examples
        ]);
    }

    /**
     * Example using the Supabase REST API client
     */
    public function usingSupabaseClient()
    {
        $supabase = app('supabase');
        
        // Using the REST API client
        $response = $supabase->client()
            ->from('examples')
            ->select('*')
            ->get();
        
        return response()->json([
            'message' => 'Data retrieved using Supabase REST API',
            'data' => $response->json()
        ]);
    }

    /**
     * Example of inserting data using Supabase client
     */
    public function insertExample(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $supabase = app('supabase');
        
        $response = $supabase->client()
            ->from('examples')
            ->insert([
                'name' => $request->name,
                'description' => $request->description,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        
        return response()->json([
            'message' => 'Data inserted successfully',
            'data' => $response->json()
        ]);
    }

    /**
     * Example of Supabase authentication
     */
    public function authExample(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $supabase = app('supabase');
        
        // Sign in example
        $response = $supabase->auth()->signIn(
            $request->email,
            $request->password
        );
        
        return response()->json([
            'message' => 'Authentication attempt',
            'data' => $response->json()
        ]);
    }

    /**
     * Test connection to Supabase
     */
    public function testConnection()
    {
        try {
            // Test Laravel DB connection
            $laravelConnection = DB::connection('supabase')->getPdo();
            
            // Test Supabase API
            $supabase = app('supabase');
            $apiTest = $supabase->client()->from('examples')->select('count')->get();
            
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully connected to Supabase',
                'laravel_db' => 'Connected',
                'supabase_api' => $apiTest->status() === 200 ? 'Connected' : 'Failed'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to connect to Supabase: ' . $e->getMessage()
            ], 500);
        }
    }
}
