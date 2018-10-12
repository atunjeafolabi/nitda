<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class InternationalTertiaryInstitutionRecord extends Model
{
    public $table = 'international_tertiary_institution_record';
    
    public $fillable = ['country_of_institution', 'course_of_study', 'degree_type','start_date', 'end_date', 'tertiary_institution', 'grade', 'country_id', 'degree_path'];
    
    public static function add($requestArray, $applicant, $file){

        $tertiary_institution_record = new InternationalTertiaryInstitutionRecord();
        $tertiary_institution_record->fill($requestArray);
        $tertiary_institution_record->applicant()->associate($applicant);  

        if($tertiary_institution_record->save()){
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
    
    public function degree()
    {
        return $this->belongsTo('App\Degree', 'degree_type');
    }
}
