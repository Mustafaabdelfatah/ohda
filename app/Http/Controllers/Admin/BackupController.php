<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Storage;
use Artisan;

class BackupController extends Controller
{
    // display backup index page
    public function index()
    {
        $disk = Storage::disk(config('backup.backup.destination.disks.local'));
        $files = $disk->files(config('backup.backup.name'));
        $backups = [];
        // make an array of backup files, with their filesize and creation date
        foreach ($files as $k => $f) {
            // only take the zip files into account
            if (substr($f, -4) == '.zip' && $disk->exists($f)) {
                // $time = ;

                $backups[] = [
                    'file_path' => $f,
                    'file_date' => 'date : '. substr($f, 8,10) .'| time: '.str_replace('-', ':', substr($f, 19,8)),
                    'file_name' => str_replace(config('laravel-backup.backup.name') . 'Laravel/', '', $f),
                    'file_size' => $disk->size($f),
                    // 'last_modified' => $disk->lastModified($f),

                ];
            }
        }

        // reverse the backups, so the newest one would be on top
        $backups = array_reverse($backups);
        return view("dashboard.pages.settings.backup")->with(compact('backups'));
    }

    // display backup index page
    public function backup_now()
    {

        // return 's';
        ini_set('max_execution_time', '0');
        try {
           // start the backup process
           Artisan::call('backup:run');
           // $output = Artisan::output();
           // log the results
           // Log::info("Backpack\BackupManager -- new backup started from admin interface \r\n" . $output);
           // return the results as a response to the ajax call
        //    notify()->success('New backup created');
           return redirect()->back();
       } catch (Exception $e) {
           dd($e->getMessage());
           // return redirect()->back();
       }
       session()->flash('success', 'تم عمل نسخه احتياطيه بنجاح');


    }


    // download backup file
    public function download($name)
    {
        // get backup file
        $fileBackup = storage_path('app/Laravel/'.$name);
        // return download
        return response()->download($fileBackup);

    }

    // display backup index page
    public function delete_backup($name)
    {
        // get backup file
        $fileBackup = storage_path('app/Laravel/'.$name);
        File::delete($fileBackup);
        session()->flash('success', 'تم حذف النسخه احتياطيه بنجاح');
        return back();

    }

}
