<?php
  namespace App\Helpers;

use App\Models\TemporaryFileUploadHelpdesk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

  class UploadFileHelper
  {
      public static function uploadFile(Request $request){
        $image = $request->file('file');
        $userRole = Auth::user()->getRoleNames()[0];
        $imageName = Carbon::now()->format('H:i:s.u').'.'.$image->extension();
        $imageName = !file_exists($imageName) ?? Carbon::now()->format('H:i:s.u').'.'.$image->extension();
        $path = public_path("$userRole/$request->folder/".date('Y')."/".date('m')."/".date('d'));
        !is_dir($path) && mkdir($path, 0777, true);
        $image->move($path, $imageName);

        TemporaryFileUploadHelpdesk::create([
            'folder' => $request->folder,
            'url' => asset("$userRole/$request->folder/$imageName".date('Y')."/".date('m')."/".date('d')),
            'filename' => $imageName,
            'token' => $request->random_text
        ]);
        return $path;
  }
