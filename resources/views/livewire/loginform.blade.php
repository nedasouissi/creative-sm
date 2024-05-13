<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <form wire:submit.prevent="login">
        <div class="step-one">
            <div class="card">
                <div class="card-header bg-secondary text-white">Login</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" wire:model="email" />
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" wire:model="password" />
                                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-md btn-primary">Login</button>
                </div>
            </div>
        </div>
    </form>
</div>
