<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"> 
                    <h1 class="m-0 text-dark">Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('chef.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center" x-data="{ imagePreview: '{{ auth()->user()->avatar_url }}' }">
                                <input wire:model="image" type="file" class="d-none" x-ref="image" x-on:change="
                                        reader = new FileReader();
                                        reader.onload = (event) => {
                                            imagePreview = event.target.result;
                                            document.getElementById('profileImage').src = `${imagePreview}`;
                                        };
                                        reader.readAsDataURL($refs.image.files[0]);
                                    "/>
                                <img x-on:click="$refs.image.click()" class="profile-user-img img-circle" x-bind:src="imagePreview" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>
                            <p class="text-muted text-center">Chef</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card" x-data="{ currentTab: $persist('chefProfile') }">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills" wire:ignore>
                                <li @click.prevent="currentTab = 'chefProfile'" class="nav-item"><a class="nav-link" :class="currentTab === 'chefProfile' ? 'active' : ''" href="#chefProfile" data-toggle="tab"><i class="fa fa-user mr-1"></i> Edit Profile</a></li>
                                <li @click.prevent="currentTab = 'chefProfileInfo'" class="nav-item"><a class="nav-link" :class="currentTab === 'chefProfileInfo' ? 'active' : ''" href="#chefProfileInfo" data-toggle="tab"><i class="fa fa-info-circle mr-1"></i> User Info</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane" :class="currentTab === 'chefProfile' ? 'active' : ''" id="chefProfile" wire:ignore.self>
                                    <form wire:submit.prevent="updateProfile" class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input wire:model.defer="state.name" type="text" class="form-control @error('name') is-invalid @enderror" id="inputname" placeholder="name">
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputemail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input wire:model.defer="state.email" type="email" class="form-control @error('email') is-invalid @enderror" id="inputemail" placeholder="email" disabled>
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-save mr-1"></i> Save Changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane" :class="currentTab === 'chefProfileInfo' ? 'active' : ''" id="chefProfileInfo" wire:ignore.self>
                                    <form wire:submit.prevent="updateInfo" class="form-horizontal">
                                        <div class="form-group">
                                            <label for="address">Address:</label>
                                            <input wire:model.defer="state.address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Your address"/>
                                            
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile">Contact Number:</label>
                                            <input wire:model.defer="state.mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" id="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus placeholder="Your mobile"/>
                                        
                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="bio">About me:</label>
                                            <textarea wire:model.defer="state.bio" type="text" class="form-control @error('bio') is-invalid @enderror" name="bio" id="bio" value="{{ old('bio') }}" autocomplete="bio" autofocus placeholder="Your Bio"></textarea>
                                        
                                            @error('bio')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <button type="submit" class="btn btn-success ml-2"><i class="fa fa-save mr-1"></i> Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>