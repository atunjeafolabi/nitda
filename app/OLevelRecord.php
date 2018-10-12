<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class OLevelRecord extends Model
{
    public $table = 'o_level_record';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'certificate_type', 'certificate_path', 'date_issued',
    ];
    
    /**
     * Adds new Olevel record into the database
     * @param array $requestArray
     * @param type $applicant
     * @param type $file
     * @return int
     */
    public static function add($requestArray, $applicant, $file){
        
        $destination_folder = 'O-Level';
        /**
         * Generates unique name for uploaded file and saves it locally to storage/app/public/O-Level
         * $var file object
         */
        $path = $file->store($destination_folder);

        $requestArray['certificate_path'] = $path;

        $oLevelRecord = new OLevelRecord();
        $oLevelRecord->fill($requestArray);
        $oLevelRecord->applicant()->associate($applicant);    

        if($oLevelRecord->save()){
           return 1;   //i.e record successfully created
        }else{
            //delete uploaded file from disk if record wasn't saved to database
            Storage::delete($path);
            return 0;      //Unable to create record
        }  
    }
    
    public function applicant()
    {
        return $this->belongsTo('App\Applicant', 'applicants_id');
    }
}
