
<div>
    <form  action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="modal-teacher" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h3 class="font-weight-bolder text-info text-gradient">Add New Teacher</h3>
                            </div>
                            <div class="card">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Father's Information -->
                                            <div class="form-group">
                                                <label for=""> Name</label>
                                                <input type="text" class="form-control" placeholder=""name="name">
                                                <span class="text-danger">@error('name'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for=""> Last name</label>
                                                <input type="text" class="form-control" placeholder="" name="last_name" >
                                                <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="">Phone Number</label>
                                                <input type="number" class="form-control" placeholder="" name="teacher_phone">
                                                <span class="text-danger">@error('teacher_phone'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label for=""> Birthdate</label>
                                                <input type="date" class="form-control" placeholder="" name="teacher_birthdate" >
                                                <span class="text-danger">@error('teacher_birthdate'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-round bg-gradient-info btn-lg  mt-4 mb-0" >ADD</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
