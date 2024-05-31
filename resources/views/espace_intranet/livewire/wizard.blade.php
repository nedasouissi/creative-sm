 <div xmlns:wire="http://www.w3.org/1999/xhtml" xmlns:wire="http://www.w3.org/1999/xhtml"
     xmlns:wire="http://www.w3.org/1999/xhtml" xmlns:wire="http://www.w3.org/1999/xhtml">
     <form wire:submit.prevent="register" enctype="multipart/form-data" >
        {{--step one--}}
         @if ($currentstep == 1)
         <div class="step-one">
             <div class="card">
                 <div class="card-header bg-secondary text-white"> Parents Details </div>
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-6">
                             <!-- Father's Information -->
                             <div class="form-group">
                                 <label for="">Father Name</label>
                                 <input type="text" class="form-control" placeholder="" wire:model="father_name">
                                 <span class="text-danger">@error('father_name'){{$message}}@enderror</span>
                             </div>
                             <div class="form-group">
                                 <label for="">Father Last name</label>
                                 <input type="text" class="form-control" placeholder="" wire:model="father_last_name">
                                 <span class="text-danger">@error('father_last_name'){{ $message }}@enderror</span>
                             </div>
                             <div class="form-group">
                                 <label for="">Father Job</label>
                                 <input type="text" class="form-control" placeholder="" wire:model="father_job">
                                 <span class="text-danger">@error('father_job'){{ $message }}@enderror</span>
                             </div>
                             <div class="form-group">
                                 <label for="">Father Phone Number</label>
                                 <input type="number" class="form-control" placeholder="" wire:model="father_phone">
                                 <span class="text-danger">@error('father_phone'){{ $message }}@enderror</span>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <!-- Mother's Information -->
                             <div class="form-group">
                                 <label for="">Mother Name</label>
                                 <input type="text" class="form-control" placeholder="" wire:model="mother_name">
                                 <span class="text-danger">@error('mother_name'){{$message}}@enderror</span>
                             </div>
                             <div class="form-group">
                                 <label for="">Mother Last name</label>
                                 <input type="text" class="form-control" placeholder="" wire:model="mother_last_name">
                                 <span class="text-danger">@error('mother_last_name'){{ $message }}@enderror</span>
                             </div>
                             <div class="form-group">
                                 <label for="">Mother Job</label>
                                 <input type="text" class="form-control" placeholder="" wire:model="mother_job">
                                 <span class="text-danger">@error('mother_job'){{ $message }}@enderror</span>
                             </div>
                             <div class="form-group">
                                 <label for="">Mother Phone Number</label>
                                 <input type="number" class="form-control" placeholder="" wire:model="mother_phone">
                                 <span class="text-danger">@error('mother_phone'){{ $message }}@enderror</span>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         @endif

        {{--step two--}}
         @if ($currentstep == 2)
         <div class="step-two">
             <div class="card">
                 <div class="card-header bg-secondary text-white"> Student Details </div>
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-6">
                             <!-- Student's Information -->
                             <div class="form-group">
                                 <label for="">Student Name</label>
                                 <input type="text" class="form-control" placeholder="" wire:model="student_name">
                                 <span class="text-danger">@error('student_name'){{$message}}@enderror</span>
                             </div>
                             <div class="form-group">
                                 <label for="">Student Last name</label>
                                 <input type="text" class="form-control" placeholder="" wire:model="student_last_name">
                                 <span class="text-danger">@error('student_last_name'){{ $message }}@enderror</span>
                             </div>

                             <div class="form-group">
                                 <label for="">Student Phone Number</label>
                                 <input type="number" class="form-control" placeholder="" wire:model="student_phone">
                                 <span class="text-danger">@error('student_phone'){{ $message }}@enderror</span>
                             </div>
                         </div>
                         <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="">Student Grade</label>
                                     <select class="form-control" wire:model="student_grade">
                                         <option value="" selected>Select grade</option>
                                         <option value="seven">7th grade</option>
                                         <option value="eight">8th grade</option>
                                         <option value="nine">9th grade</option>
                                     </select>
                                     <span class="text-danger">@error('student grade'){{ $message }}@enderror</span>
                                 </div>
                             <div class="form-group">
                                 <label for="">Student Birthdate</label>
                                 <input type="date" class="form-control" placeholder="" wire:model="birthdate">
                                 <span class="text-danger">@error('birthdate'){{ $message }}@enderror</span>
                             </div>

                             <div class="form-group">
                                 <label for="avatar"> Avatar</label>
                                 <input type="file" class="form-control-file" id="avatar" wire:model="avatar">
                                 <span class="text-danger">@error('avatar'){{ $message }}@enderror</span>
                             </div>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
         @endif

         {{--step three--}}
         @if ($currentstep == 3)
         <div class="step-three">
             <div class="card">
                 <div class="card-header bg-secondary text-white"> Email and Password </div>
                 <div class="card-body">
                     @if ($successMessage)
                         <div class="alert alert-success">{{ $successMessage }}</div>
                     @endif
                     <div class="row">
                         <div class="col-md-6">
                             <!-- auth -->
                             <div class="form-group">
                                 <label for="">Parent Email</label>
                                 <input type="email" class="form-control" placeholder="" wire:model="parent_email">
                                 <span class="text-danger">@error('parent_email'){{$message}}@enderror</span>
                             </div>
                             <div class="form-group">
                                 <label for="">Password</label>
                                 <input type="password" class="form-control" placeholder="" wire:model="password">
                                 <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                             </div>
                             <div class="form-group">
                                 <label for="passwordConfirmation">Confirm Password</label>
                                 <input type="password" class="form-control" placeholder="" wire:model="passwordConfirmation">
                                 <span class="text-danger">@error('passwordConfirmation'){{ $message }}@enderror</span>
                             </div>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
         @endif


         <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

             @if ($currentstep == 1)
                 <div></div>
             @endif

             @if ($currentstep == 2 || $currentstep == 3 )
                 <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Back</button>
             @endif

             @if ($currentstep == 1 || $currentstep == 2 )
                 <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>
             @endif

             @if ($currentstep == 3)
                 <button type="submit" class="btn btn-md btn-primary">Submit</button>
             @endif



         </div>

     </form>
 </div>
