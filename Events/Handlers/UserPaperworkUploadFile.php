<?php

namespace Modules\Ipaperwork\Events\Handlers;

class UserPaperworkUploadFile
{
   
    private $setting;

    public function __construct()
    {
       
        $this->setting = app('Modules\Setting\Contracts\Setting');
    }

    public function handle($event)
    {

        $model = $event->userpaperwork;
        $data = $event->data;

        // Save File
        if(isset($data["pfile"]) && $data["pfile"]->isValid()){
            $folderBase = "user-".$model->user_id;
            $filePath = $this->saveFile($data["pfile"],$model->id,$folderBase);
            if ($filePath != null) {
                $options['pfile'] = $filePath;
                $model->options = $options;
                $model->save();
            }
        }

    }

    public function saveFile($pfile, $idPaperwork, $folderBase)
    {
  
        $disk = 'publicmedia';
  
        $fileName = $pfile->getClientOriginalName();
        $fileSize = $pfile->getSize();
        $fileExt = $pfile->getClientOriginalExtension();
        
        $allowedextensions = config('asgard.ipaperwork.config.files.formats');
        if (!in_array(strtoupper($fileExt), $allowedextensions)) {
            throw new \Exception('Error Extension File', 204);
        }
  
        $maxsize = (int)config('asgard.ipaperwork.config.files.maxsize.value');
        if($fileSize>$maxsize){
          throw new \Exception('Error Size File', 204);
        }
  
        //$name = str_slug(str_replace('.' . $extension, '', $fileName), '-');
        //$namefile = $name . '.' . $extension;
        $namefile = $idPaperwork .'.'.$fileExt;
  
        $destination_path = 'assets/ipaperwork/paperworks/'.$folderBase.'/' . $namefile;
  
        \Storage::disk($disk)->put($destination_path, \File::get($pfile));
        return $destination_path;
    }

    

}
