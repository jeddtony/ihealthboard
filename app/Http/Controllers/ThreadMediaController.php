<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\Thread;
use App\ThreadMedia;
use Illuminate\Http\Request;

class ThreadMediaController extends Controller
{
    //

    public function multipleUpload( $files, $thread_id) {
        if (!empty($files)) {
            $filesCount = count($files);

            $uploadCount = 0;

            foreach ($files as $file) {
                $rules = array('file' => 'required'); // This requires that the file follows the required extension
                $validator = Validator::make(array('file' => $file), $rules);
//                dd($validator);
                if ($validator->passes()) {
//                    dd("HEY THE VALIDATOR PASSES");
                    $destinationPath = 'photos'; // THIS IS TO THE PHOTOS DIRECTORY IN THE PUBLIC FOLDER
                    $filename = $file->getClientOriginalName();
                    $upload_success = $file->move($destinationPath, $filename);
                    $uploadCount++;

                    // SAVING INTO THE DATABASE
                    $extension = $file->getClientOriginalExtension();
                    $entry = new ThreadMedia();
                    $entry->mime = $file->getClientMimeType();
                    $entry->original_filename = $filename;
                    $entry->filename = $file->getFilename() . '.' . $extension;
                    $entry->user_id = auth()->id();
                    $entry->thread_id = $thread_id;
                    $entry->save();
                }
                else{
                    dd("Bros the validation failed");
                }
            }
            if ($uploadCount == $filesCount) {
                Session::flash('success', 'Upload Successful');
            }
        }
    }
}
