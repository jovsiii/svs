<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class SupabaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('supabase', function ($app) {
            return new class {
                private $url;
                private $key;
                private $dbUrl;

                public function __construct()
                {
                    $this->url = env('SUPABASE_URL');
                    $this->key = env('SUPABASE_ANON_KEY');
                    $this->dbUrl = env('SUPABASE_DB_URL');
                }

                public function auth()
                {
                    return new class($this->url, $this->key) {
                        private $url;
                        private $key;

                        public function __construct($url, $key)
                        {
                            $this->url = $url;
                            $this->key = $key;
                        }

                        public function signUp($email, $password)
                        {
                            return Http::withHeaders([
                                'apikey' => $this->key,
                                'Content-Type' => 'application/json',
                            ])->post("{$this->url}/auth/v1/signup", [
                                'email' => $email,
                                'password' => $password,
                            ]);
                        }

                        public function signIn($email, $password)
                        {
                            return Http::withHeaders([
                                'apikey' => $this->key,
                                'Content-Type' => 'application/json',
                            ])->post("{$this->url}/auth/v1/token?grant_type=password", [
                                'email' => $email,
                                'password' => $password,
                            ]);
                        }

                        public function signOut($accessToken)
                        {
                            return Http::withHeaders([
                                'apikey' => $this->key,
                                'Authorization' => "Bearer {$accessToken}",
                            ])->post("{$this->url}/auth/v1/logout");
                        }

                        public function getUser($accessToken)
                        {
                            return Http::withHeaders([
                                'apikey' => $this->key,
                                'Authorization' => "Bearer {$accessToken}",
                            ])->get("{$this->url}/auth/v1/user");
                        }
                    };
                }

                public function client()
                {
                    return new class($this->url, $this->key) {
                        private $url;
                        private $key;

                        public function __construct($url, $key)
                        {
                            $this->url = $url;
                            $this->key = $key;
                        }

                        public function from($table)
                        {
                            return new class($this->url, $this->key, $table) {
                                private $url;
                                private $key;
                                private $table;

                                public function __construct($url, $key, $table)
                                {
                                    $this->url = $url;
                                    $this->key = $key;
                                    $this->table = $table;
                                }

                                public function select($columns = '*')
                                {
                                    return new class($this->url, $this->key, $this->table, $columns) {
                                        private $url;
                                        private $key;
                                        private $table;
                                        private $columns;
                                        private $wheres = [];

                                        public function __construct($url, $key, $table, $columns)
                                        {
                                            $this->url = $url;
                                            $this->key = $key;
                                            $this->table = $table;
                                            $this->columns = $columns;
                                        }

                                        public function where($column, $operator, $value = null)
                                        {
                                            if ($value === null) {
                                                $value = $operator;
                                                $operator = 'eq';
                                            }

                                            $this->wheres[] = "{$column}={$operator}.{$value}";
                                            return $this;
                                        }

                                        public function get()
                                        {
                                            $query = "{$this->url}/rest/v1/{$this->table}?select={$this->columns}";
                                            
                                            if (!empty($this->wheres)) {
                                                $query .= '&' . implode('&', $this->wheres);
                                            }

                                            return Http::withHeaders([
                                                'apikey' => $this->key,
                                                'Authorization' => "Bearer {$this->key}",
                                            ])->get($query);
                                        }

                                        public function insert($data)
                                        {
                                            return Http::withHeaders([
                                                'apikey' => $this->key,
                                                'Authorization' => "Bearer {$this->key}",
                                                'Content-Type' => 'application/json',
                                                'Prefer' => 'return=representation',
                                            ])->post("{$this->url}/rest/v1/{$this->table}", $data);
                                        }

                                        public function update($data)
                                        {
                                            $query = "{$this->url}/rest/v1/{$this->table}";
                                            
                                            if (!empty($this->wheres)) {
                                                $query .= '?' . implode('&', $this->wheres);
                                            }

                                            return Http::withHeaders([
                                                'apikey' => $this->key,
                                                'Authorization' => "Bearer {$this->key}",
                                                'Content-Type' => 'application/json',
                                                'Prefer' => 'return=representation',
                                            ])->patch($query, $data);
                                        }

                                        public function delete()
                                        {
                                            $query = "{$this->url}/rest/v1/{$this->table}";
                                            
                                            if (!empty($this->wheres)) {
                                                $query .= '?' . implode('&', $this->wheres);
                                            }

                                            return Http::withHeaders([
                                                'apikey' => $this->key,
                                                'Authorization' => "Bearer {$this->key}",
                                            ])->delete($query);
                                        }
                                    };
                                }
                            };
                        }
                    };
                }
            };
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
