<?php

namespace App\Http\Controllers\Applicant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\OLevelRecord;
use App\Country;
use App\Degree;
use App\Grade;
use App\Course;
use App\TertiaryInstitution;
use App\TertiaryInstitutionRecord;
use App\InternationalTertiaryInstitutionRecord;

class AcademicRecordsController extends Controller
{
    public function index(){
        $applicant = Auth::guard('applicant')->user();
        
        $oLevelRecords = OLevelRecord::where(['applicants_id' => $applicant->id])->get();
        $localTertiaryRecords = TertiaryInstitutionRecord::where(['applicants_id' => $applicant->id])->get();
        $internationalTertiaryRecords = InternationalTertiaryInstitutionRecord::where(['applicants_id' => $applicant->id])->get();
        
        $countries = Country::all();
        $tertiary_institutions = TertiaryInstitution::all();
        $degrees = Degree::all();
        $grades = Grade::all();
        $courses = Course::all();

        return view('applicant.academic-records.index')->with([ 'olevel_records' => $oLevelRecords, 'countries' => $countries, 
                                                                'tertiary_institutions' => $tertiary_institutions, 'degrees' => $degrees,
                                                                'grades' => $grades, 'courses' => $courses,
                                                                'localTertiaryRecords' => $localTertiaryRecords, 
                                                                'internationalTertiaryRecords' => $internationalTertiaryRecords]);
    }
    
    public function addOlevel(Request $request) {

        $validator = Validator::make($request->all(), [
                            'certificate_type' => 'required',
                            'date_issued' => 'required',      //TODO: date
                            'certificate_path' => 'required|image|max:400|mimes:jpeg,jpg'
                        ]);
                
        if($validator->fails()){
            $response = ['errors' => $validator->errors()];
        }else{
            $requestArray = $request->all();
            $file = $request->file('certificate_path');

            $applicant = Auth::guard('applicant')->user();
            
            $response = OLevelRecord::add($requestArray, $applicant, $file);
        }
        
        return response()->json($response);
    }
    
    public function deleteOlevel(Request $request, $olevel_record_id) {
        $olevel_record = OLevelRecord::find($olevel_record_id);

        if($olevel_record){
            $olevel_record->delete();
            //delete file from disk
            Storage::delete($olevel_record->certificate_path);
            
            session()->flash('success-msg', 'OLevel Record Successfully Deleted');
        }
        
        return redirect()->back();
    }

    public function addTertiaryInfo(Request $request) {

        if(isset($request->international) && $request->international == 1){
            $response = $this->addInternationalInstitutionRecord($request);
        }else{
            $response = $this->addLocalInstitutionRecord($request);
        }
        return response()->json($response);
    }

    public function addInternationalInstitutionRecord($request) {
        
        $validator = Validator::make($request->all(), [
                            'country' => 'required',
                            'name_of_institution' => 'required',
                            'course_of_study' => 'required',
                            'degree_type' => 'required',
                            'start_date' => 'required',      //TODO: date
                            'end_date' => 'required',
                            'degree_path' => 'required|image|max:400',
                            'grade' => 'required'
                        ]);

        if($validator->fails()){
            return ['errors' => $validator->errors()];
        }else{
            $requestArray = $request->all();
            $destination_folder = 'TertiaryInstitutionDocuments';
            $file = $request->file('degree_path');
            $path = $file->store($destination_folder);
            
            $mappedRequestArray = $this->mapFormInputsToDB($requestArray, $path);
            
            $applicant = Auth::guard('applicant')->user();

            return InternationalTertiaryInstitutionRecord::add($mappedRequestArray, $applicant, $file);
        }
    }
    
    public function addLocalInstitutionRecord($request) {

        $customErrorMsg = ['degree_path.required'=>'Degree is required', 'degree_path.image'=>'Degree must be JPG'];

        $validator = Validator::make($request->all(), [
                            'country' => 'required|numeric',
                            'name_of_institution' => 'required',
                            'course_of_study' => 'required',
                            'degree_type' => 'required',
                            'degree_path' => 'required|image|max:400',  //TODO: only JPG
                            'start_date' => 'required',      //TODO: date
                            'end_date' => 'required',
                            'grade' => 'required'
                        ], $customErrorMsg);

        if($validator->fails()){
            return ['errors' => $validator->errors()];
        }else{
            $requestArray = $request->all();
            
            $file = $request->file('degree_path');
            $destination_folder = 'TertiaryInstitutionDocuments';   //TODO: make $destination_folder a config variable
            $path = $file->store($destination_folder); 
            
            $mappedRequestArray = $this->mapFormInputsToDB($requestArray, $path);
            
            $applicant = Auth::guard('applicant')->user();  

            return TertiaryInstitutionRecord::add($mappedRequestArray, $applicant, $file);
        } 
    }
    
    public function mapFormInputsToDB($requestArray, $path) {
        //map form request input fields to match database fields 
        $requestArray['tertiary_institution']       = $requestArray['name_of_institution'];
        $requestArray['grade_id']                   = $requestArray['grade'];
        $requestArray['courses_id']                 = $requestArray['course_of_study'];
        $requestArray['country_id']                 = $requestArray['country'];
        $requestArray['degree_path']                = $path;
        
//        //unset variables not needed for database storage
//        unset($requestArray['name_of_institution']);
//        unset($requestArray['grade']);
//        unset($requestArray['course_of_study']);
//        unset($requestArray['country']);
               
        return $requestArray;
    }
    
    public function deleteTertiaryInfo(Request $request, $id) {
//var_dump($request->intl);exit;
        if($request->intl == 'yes'){
           $record =  InternationalTertiaryInstitutionRecord::find($id);
        }else{
            $record = TertiaryInstitutionRecord::find($id);
        }
        
        if($record){
            $record->delete();
            Storage::delete($record->degree_path);      //delete file
            session()->flash('success-msg', 'Tertiary Institution Record Successfully Deleted');
        }
        
        return redirect()->back();
    }
}
