<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TertiaryInstitutionRecord extends Model
{
    public $table = 'tertiary_institution_record';
    
    public $fillable = ['degree_type', 'start_date', 'end_date', 'applicants_id', 'tertiary_institution', 'grade_id', 'courses_id', 'degree_id', 'degree_path'];
    
    /**
     * Add new Local Tertiary Institution to the database
     * @param type $requestArray
     * @param type $applicant
     * @param type $file
     */
    public static function add($requestArray, $applicant, $file){    

        $tertiary_institution_record = new TertiaryInstitutionRecord();
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
    
    public function tertiaryInstitution()
    {
        return $this->belongsTo('App\TertiaryInstitution', 'tertiary_institution');
    }
    
    public function degree()
    {
        return $this->belongsTo('App\Degree', 'degree_type');
    }
    
    public function course()
    {
        return $this->belongsTo('App\Course', 'courses_id');
    }
    
    public function grade()
    {
        return $this->belongsTo('App\Grade', 'grade_id');
    }
}
