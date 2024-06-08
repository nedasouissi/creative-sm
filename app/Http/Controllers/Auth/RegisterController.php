<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
        return view('espace_intranet.auth.register');
    }
    public function registerTeacher(Request $request)
    {

        $validator = $this->teacher_validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $user = $this->create_teacher($request->all());

        return redirect()->route('login')->with('success', 'Teacher registered successfully. Please login.');
    }
    protected function teacher_validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
        ]);
    }
    protected function create_teacher(array $data)
    {
        // Handle the file upload
        $filePath = '';
        if (isset($data['avatar'])) {
            $file = $data['avatar'];
            try {
                // Store the file and get the path
                $filePath = $file->store('avatars', 'public');
            } catch (\Exception $e) {
                // Handle exception during file upload
                return redirect()->back()->with('error', 'Failed to upload avatar: ' . $e->getMessage())->withInput();
            }
        } else {

            // Handle the case where the file is not present or invalid (if needed)
            $filePath = null;
        }
        // dd($filePath);
        // Create and return the user record
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'avatar' => $filePath, // Ensure the file path is stored
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'is_active' => false, // Default to inactive; activation logic should be handled separately
            'birthdate' => $data['birthdate'],
        ]);
    }
    protected function parent_validator(array $data)
    {
        return Validator::make($data, [
            'father_name' => ['required', 'string', 'max:255'],
            'father_last_name' => ['required', 'string', 'max:255'],
            'father_job' => ['required', 'string', 'max:255'],
            'father_phone' => ['required', 'numeric'],
            'mother_name' => ['required', 'string', 'max:255'],
            'mother_last_name' => ['required', 'string', 'max:255'],
            'mother_job' => ['required', 'string', 'max:255'],
            'mother_phone' => ['required', 'numeric'],
            'student_name' => ['required', 'string', 'max:255'],
            'student_last_name' => ['required', 'string', 'max:255'],
            'student_phone' => ['required', 'numeric'],
            'student_grade' => ['required', 'string', 'max:255'],
            'student_birthdate' => ['required', 'date'],
            'student_avatar' => ['nullable', 'image', 'max:2048'], // Assuming avatar is an image file
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function registerParent(Request $request)
    {
        // Validate the incoming data for parent registration
        $validator = $this->parent_validator($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        // Create the parent user record
        $user = $this->create_parent_user($request->all());

        // Check if user creation was successful
        if ($user) {
            // Create the parent record with the associated user ID
            $parent = $this->create_parent($request->all(), $user->id);

            // Redirect the user to the login page with a success message
            return redirect()->route('login')->with('success', 'Parent registered successfully. Please login.');
        } else {
            // If user creation fails, redirect back with an error message
            return redirect()->back()->with('error', 'Failed to register parent. Please try again.');
        }
    }
    protected function create_parent(array $data, $user_id)
    {
        Log::info($data);
        // Handle the file upload
        $filePath = '';
        if (isset($data['student_avatar'])) {
            $file = $data['student_avatar'];
            try {
                // Store the file and get the path
                $filePath = $file->store('avatars', 'public');
            } catch (\Exception $e) {
                // Handle exception during file upload
                return redirect()->back()->with('error', 'Failed to upload avatar: ' . $e->getMessage())->withInput();
            }
        } else {

            // Handle the case where the file is not present or invalid (if needed)
            $filePath = null;
        }
        return Student::create([
            'user_id' => $user_id, // Assign the user ID
            'father_name' => $data['father_name'],
            'father_last_name' => $data['father_last_name'],
            'father_job' => $data['father_job'],
            'father_phone' => $data['father_phone'],
            'mother_name' => $data['mother_name'],
            'mother_last_name' => $data['mother_last_name'],
            'mother_job' => $data['mother_job'],
            'mother_phone' => $data['mother_phone'],
            'student_name' => $data['student_name'],
            'student_last_name' => $data['student_last_name'],
            'student_phone' => $data['student_phone'],
            'student_grade' => $data['student_grade'],
            'student_birthdate' => $data['student_birthdate'],
            'student_avatar' => $filePath,
            'email' => $data['email'],
            'password' => $data['password'],
            'is_active' => false,
        ]);
    }
    protected function create_parent_user(array $data)
    {
        $filePath = '';
        if (isset($data['student_avatar'])) {
            $file = $data['student_avatar'];
            try {
                // Store the file and get the path
                $filePath = $file->store('avatars', 'public');
            } catch (\Exception $e) {
                // Handle exception during file upload
                return redirect()->back()->with('error', 'Failed to upload avatar: ' . $e->getMessage())->withInput();
            }
        } else {
            // Handle the case where the file is not present or invalid (if needed)
            $filePath = null;
        }
        return User::create([
            'name' => $data['student_name'],
            'last_name' => $data['student_last_name'],
            'email' => $data['email'],
            'avatar' => $filePath,
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'birthdate' => ['required', 'date'],
            'is_active' => false,
        ]);
    }
    public function random()
    {
        // Define a list of possible names
        $names = ['sasi', 'bon amor', 'amor', 'Mohamed', 'zouiten', 'cristo', 'Eve', 'Frank', 'JR', 'Henry', 'Liam', 'Noah', 'William', 'James', 'Logan', 'Benjamin', 'Mason', 'Elijah', 'Oliver', 'Jacob'];
        // Get a random index from the list of names
        $randomIndex = array_rand($names);
        // Return the randomly selected name
        return $names[$randomIndex];
    }
    public function random_last()
    {
        // Define a list of possible names
        $names = ['sasi', 'bon amor', 'amor', 'Mohamed', 'zouiten', 'cristo', 'Eve', 'Frank', 'JR', 'Henry', 'Liam', 'Noah', 'William', 'James', 'Logan', 'Benjamin', 'Mason', 'Elijah', 'Oliver', 'Jacob'];
        // Get a random index from the list of names
        $randomIndex = array_rand($names);
        // Return the randomly selected name
        return $names[$randomIndex];
    }
    public function random_phone()
    {
        // Generate a random 8-digit number
        $phoneNumber = mt_rand(10000000, 99999999);
        return $phoneNumber;
    }
    public function createStudents()
    {
        try {
            // Use a loop to create 10 teachers
            for ($i = 600; $i < 710; $i++) {
                // Create a new teacher using the factory
                Log::info('Creating  user...');
                $user = User::create([
                    'name' => $this->random(), // Example: Teacher 1, Teacher 2, ...
                    'last_name' => $this->random_last(), // Example: Teacher 1, Teacher 2, ...
                    'email' => 'parent-' . ( $i) . '@gmail.com', // Example: teacher1@example.com, teacher2@example.com, ...
                    'password' => Hash::make('password'), // Set a default password for all teachers
                    'role' => 'teacher', // Set the role to 'teacher'
                    'birthdate' => now()->subYears(rand(22, 65))->subMonths(rand(0, 11))->subDays(rand(0, 30)), // Random birthdate between 22 and 65 years ago
                    'avatar' => 'avatars/JwEVj9NEYiSdcoZPE71QcN7QAIMZgNa3s69RV61x.jpg', // Optional avatar path
                    'is_active' => false, // Set all teachers as active
                ]);
                Log::info($user);
                // Create a student associated with the user
                $student = Student::create([
                    'user_id' => $user->id, // Assign the user ID
                    'father_name' => $this->random(),
                    'father_last_name' => $this->random_last(),
                    'father_job' => 'father_job',
                    'father_phone' => $this->random_phone(),
                    'mother_name' => $this->random(),
                    'mother_last_name' => $this->random_last(),
                    'mother_job' => 'mother_job',
                    'mother_phone' => $this->random_phone(),
                    'student_name' => $user->name,
                    'student_last_name' => $user->last_name,
                    'student_phone' => $this->random_phone(),
                    'student_grade' => 'nine',
                    'student_birthdate' => now()->subYears(rand(22, 65))->subMonths(rand(0, 11))->subDays(rand(0, 30)),
                    'student_avatar' => 'avatars/JwEVj9NEYiSdcoZPE71QcN7QAIMZgNa3s69RV61x.jpg',
                    'email' => $user->email,
                    'password' => $user->password,
                    'is_active' => false,
                ]);
                Log::info($student);

            }
        } catch (\Exception $e) {
            Log::error('Error creating teachers: ' . $e->getMessage());
            return redirect()->back()->json('error', 'An error occurred while creating teachers.');
        }

    }
    public function createTeachers()
    {
        try {
            // Use a loop to create 10 teachers
            for ($i = 30; $i < 40; $i++) {
                // Create a new teacher using the factory
                Log::info('Creating teachers...');
                User::create([
                    'name' => $this->random() . ($i + 1), // Example: Teacher 1, Teacher 2, ...
                    'last_name' => $this->random_last() . ($i + 1), // Example: Teacher 1, Teacher 2, ...
                    'email' => 'teacher' . ($i + 1) . '@gmail.com', // Example: teacher1@example.com, teacher2@example.com, ...
                    'password' => Hash::make('password'), // Set a default password for all teachers
                    'role' => 'teacher', // Set the role to 'teacher'
                    'birthdate' => now()->subYears(rand(22, 65))->subMonths(rand(0, 11))->subDays(rand(0, 30)), // Random birthdate between 22 and 65 years ago
                    'avatar' => null, // Optional avatar path
                    'is_active' => true, // Set all teachers as active
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Error creating teachers: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while creating teachers.');
        }

    }
    protected function createParentUser(array $data)
    {
        // Create and return the parent user record
    }

    protected function createParent(array $data, $userId)
    {
        // Create and return the parent record associated with the user ID
    }
}
