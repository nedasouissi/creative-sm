<?php

namespace App\Http\Livewire;
use App\Models\StudentParent;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class Wizard extends Component
{
    use WithFileUploads;
    public $currentstep = 1;
    public $totalsteps = 3;
    public $father_name , $father_last_name,$father_phone,$father_job,
        $parent_email,$mother_name , $mother_last_name,$mother_phone ,$mother_job,$password ,
        $student_name ,$student_last_name,$student_grade,$student_phone,$birthdate,$avatar ;
    public $passwordConfirmation;
    public $successMessage;
// initializing component state : ensuring the first step is displayed when page is loaded
    public function mount(){
        $this->currentstep = 1;
    }
    public function render()
    {
        return view('livewire.wizard');
    }

    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
        $this->currentstep++;
        if($this->currentstep > $this->totalsteps){
            $this->currentstep = $this->totalsteps ;
        }
    }
    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentstep--;
        if($this->currentstep <1 ){
            $this->currentstep = 1 ;
        }
    }

    public function validateData()
    {
        if ($this->currentstep == 1) {
            $this->validate([
                'father_name' => ['required', 'string','regex:/^[a-zA-Z\s]+$/', 'max:255'],
                'father_last_name' => ['required', 'string','regex:/^[a-zA-Z\s]+$/','max:255'],
                'father_phone' => ['required', 'integer'],
                'father_job' => ['required', 'string','regex:/^[a-zA-Z\s]+$/', 'max:255'],
                'mother_name' => ['required', 'string','regex:/^[a-zA-Z\s]+$/', 'max:255'],
                'mother_last_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/','max:255'],
                'mother_phone' => ['required', 'integer'],
                'mother_job' => ['required', 'string','regex:/^[a-zA-Z\s]+$/', 'max:255'],

            ]);
        } elseif ($this->currentstep == 2) {
            $this->validate([
                'student_name' => ['required', 'string','regex:/^[a-zA-Z\s]+$/', 'max:255'],
                'student_last_name' => ['required', 'string','regex:/^[a-zA-Z\s]+$/', 'max:255'],
                'student_phone' => ['required', 'integer'],
                'student_grade' => ['required', 'string', 'max:255'],
                'birthdate' => ['required', 'date', 'before_or_equal:2013-12-31'],
                'avatar' => ['required', 'image', 'max:1024'],
            ]);
                  // upload and store the avatar
        $this->avatar = $this->avatar->store('avatars','public');
        }
    }
        public function register(){
            $this->resetErrorBag();
            logger()->info('Father Phone:', ['phone' => $this->father_phone]);
            if ($this->currentstep==3){
                $this->validate([
                    'parent_email' => ['required', 'email', Rule::unique('student_parent', 'parent_email')],
                    'password' => 'required|min:8',
                    'passwordConfirmation' => 'required|same:password'
                ]);
            }
            $this->successMessage = 'Registered successfully. Please verify your email.';
           // $hashedPassword =

            $parent = StudentParent::create([
                'father_name' => $this->father_name,
                'father_last_name' => $this->father_last_name,
                'father_phone' => $this->father_phone,
                'father_job' => $this->father_job,
                'mother_name' => $this->mother_name,
                'mother_last_name' => $this->mother_last_name,
                'mother_phone' => $this->mother_phone,
                'mother_job' => $this->mother_job,
                'parent_email' => $this->parent_email,
                'password' => Hash::make($this->password),
                'status'=>0,
            ]);
            $student = Student::create([
                'student_name' => $this->student_name,
                'student_last_name' => $this->student_last_name,
                'student_phone' => $this->student_phone,
                'student_grade' => $this->student_grade,
                'birthdate' => $this->birthdate,
                'avatar' => $this->avatar,
                'student_parent_id' => $parent->id,
            ]);

            $parent->sendEmailVerificationNotification();

            dd('after',$parent->sendEmailVerificationNotification());
            $this->clearForm();
        }

    public function clearForm(){
         $this->father_name ='';
            $this->father_last_name ='';
          $this->father_phone ='';
            $this->father_job ='';
            $this->mother_name ='';
            $this->mother_last_name ='';
            $this->mother_phone ='';
           $this->mother_job ='';
        $this->parent_email ='';
         $this->student_name ='';
          $this->student_last_name ='';
       $this->student_phone ='';
           $this->student_grade ='';
            $this->birthdate ='';
             $this->avatar ='';
             $this->password ='';
             $this->passwordConfirmation ='';
    }
}

