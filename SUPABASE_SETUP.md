# Supabase Integration for SVS

This document explains how to configure and use Supabase with your Laravel SVS application.

## Setup Instructions

### 1. Create a Supabase Project

1. Go to [supabase.com](https://supabase.com)
2. Create a new project
3. Note down your project URL and API keys

### 2. Configure Environment Variables

Update your `.env` file with your Supabase credentials:

```env
# Database Configuration (for Laravel's built-in database operations)
DB_CONNECTION=supabase
SUPABASE_DB_HOST=your-project.supabase.co
SUPABASE_DB_PORT=5432
SUPABASE_DB_DATABASE=postgres
SUPABASE_DB_USERNAME=postgres
SUPABASE_DB_PASSWORD=your-password
SUPABASE_DB_URL=postgresql://postgres:your-password@your-project.supabase.co:5432/postgres

# API Configuration (for Supabase REST API and Auth)
SUPABASE_URL=https://your-project.supabase.co
SUPABASE_ANON_KEY=your-supabase-anon-key
SUPABASE_SERVICE_ROLE_KEY=your-supabase-service-role-key
```

### 3. Run Migrations

Create the example table in your Supabase database:

```bash
php artisan migrate
```

### 4. Test the Connection

Visit these routes to test your Supabase integration:

- `GET /supabase/test` - Test database and API connections
- `GET /supabase/laravel` - Test Laravel DB connection
- `GET /supabase/api` - Test Supabase REST API
- `POST /supabase/insert` - Insert data via Supabase API
- `POST /supabase/auth` - Test Supabase authentication

## Usage Examples

### Using Laravel's Database Query Builder

```php
use Illuminate\Support\Facades\DB;

// Get all records
$examples = DB::table('examples')->get();

// Insert record
DB::table('examples')->insert([
    'name' => 'Test',
    'description' => 'Test description',
    'created_at' => now(),
    'updated_at' => now()
]);

// Update record
DB::table('examples')->where('id', 1)->update(['name' => 'Updated']);
```

### Using the Supabase Service

```php
$supabase = app('supabase');

// Get data via REST API
$response = $supabase->client()
    ->from('examples')
    ->select('*')
    ->where('name', 'eq', 'Test')
    ->get();

// Insert data via REST API
$response = $supabase->client()
    ->from('examples')
    ->insert([
        'name' => 'New Item',
        'description' => 'Description',
        'created_at' => now()->toISOString(),
        'updated_at' => now()->toISOString()
    ]);

// Authentication
$authResponse = $supabase->auth()->signIn('email@example.com', 'password');
```

### Authentication Integration

You can integrate Supabase Auth with Laravel's authentication system:

```php
// In your login controller
$supabase = app('supabase');
$response = $supabase->auth()->signIn($request->email, $request->password);

if ($response->successful()) {
    $userData = $response->json();
    // Create or update local user record
    // Log the user into Laravel
}
```

## Migration Considerations

When working with Supabase migrations:

1. Always test migrations on a staging Supabase project first
2. Supabase has some limitations on certain PostgreSQL features
3. Use the `supabase` database connection for migrations

```bash
# Run migrations with Supabase connection
php artisan migrate --database=supabase
```

## Security Notes

1. Never commit your Supabase keys to version control
2. Use the service role key only for server-side operations
3. Use row-level security (RLS) in Supabase for additional protection
4. Consider using Supabase Auth instead of Laravel's built-in auth for better integration

## Troubleshooting

### Connection Issues

1. Verify your Supabase project URL and keys
2. Check that your database password is correct
3. Ensure SSL is properly configured (set to 'require' in database config)

### API Issues

1. Verify your API keys have the correct permissions
2. Check that RLS policies allow the operations you're trying to perform
3. Ensure your tables exist in the Supabase database

### Migration Issues

1. Check that the database connection is working
2. Verify you have the correct permissions on the Supabase database
3. Some PostgreSQL features may not be supported by Supabase

## Next Steps

1. Set up Row Level Security (RLS) policies in Supabase
2. Configure real-time subscriptions if needed
3. Set up Supabase Storage for file uploads
4. Consider using Supabase Edge Functions for serverless logic
