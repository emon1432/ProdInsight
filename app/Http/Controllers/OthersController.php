<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OthersController extends Controller
{
    public function migrate()
    {
        $userId = Auth::user()->id ?? 1;
        Artisan::call('migrate:fresh --seed');
        Auth::loginUsingId($userId);
        notify()->success('Database migration has been completed successfully.');
        return redirect('/dashboard');
    }

    public function clear()
    {
        Artisan::call('optimize:clear');
        notify()->success('Cache has been cleared successfully.');
        return redirect('/dashboard');
    }

    public function composer()
    {
        exec('composer update');
        exec('composer dump-autoload');
        notify()->success('Composer update has been completed successfully.');
        return redirect('/dashboard');
    }

    public function iseed()
    {
        $tables = DB::select('SHOW TABLES');
        $prevent_tables = ['failed_jobs', 'migrations', 'password_reset_tokens', 'personal_access_tokens', 'sessions'];
        foreach ($tables as $table) {
            $table_name = 'Tables_in_' . env('DB_DATABASE');
            $table_name = $table->$table_name;
            if (!in_array($table_name, $prevent_tables))
                Artisan::call('iseed ' . $table_name . ' --force');
        }
        notify()->success('Database seed has been created successfully.');
        return redirect('/dashboard');
    }
}
