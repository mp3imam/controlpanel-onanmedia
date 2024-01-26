<?php
  namespace App\Helpers;

use App\Models\TemporaryFileUploadHelpdesk;
use Carbon\Carbon;
use Illuminate\Http\Request;

  class UploadFileHelper
  {
      public static function uploadFile(Request $request){
        $image = $request->file('file');
        $folderDate = date('Y')."/".date('m')."/".date('d');
        $rand = rand(1000,9999);
        $imageName = Carbon::now()->format('H:i:s')."_$rand.".$image->extension();
        $path = public_path("$request->folder_role/$request->folder/".$folderDate);
        !is_dir($path) && mkdir($path, 0777, true);
        $image->move($path, $imageName);

        TemporaryFileUploadHelpdesk::create([
            'folder' => $request->folder,
            'url' => asset("$request->folder/$request->folder_role/$folderDate/$imageName"),
            'filename' => $imageName,
            'token' => $request->random_text
        ]);
        return $path;
    }
}
