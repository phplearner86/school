@extends('layouts.admin')
@section('links')
  <link rel="stylesheet" href="{{ asset('vendor/parsley/parsley.css') }}">
@endsection

@section('content')
   <div class="row">
   
   @include('errors._list')

       <div class="col-md-8 col-md-offset-2"> @component('partials.admin._panel')
               @slot('heading')
                   <h2><i class="fa fa-pencil"></i> New account</h2>
               @endslot
           
               @slot('body')
                <p class="required__fields">Fields marked with * are required.</p>
                   <form action="{{ route('users.store') }}" method="post"
                    data-parsley-validate=""
                    data-parsley-trigger="keyup"
                    data-parsley-validation-threshold="1"
                   >
                       {{ csrf_field() }}

                       {{-- Role --}}
                       <div class="form-group">
                         <label >Role</label>
                           <p>@foreach ($roles as $role)
                               <input type="checkbox" name="role_id[]" id="{{ $role->name }}" value="{{ $role->id }}"
                                data-parsley-required=""
                                data-parsley-mincheck="1"
                                data-parsley-required-message="The role is required."
                               />{{ ucfirst($role->name) }}
                             @endforeach</p>
                         
                       </div>

                       {{-- First name --}}
                      <div class="form-group">
                           <label for="first_name">First Name <span class="asterisk">*</span></label>
                          <input type="text" name="first_name" id="first_name" placeholder="Enter first name" class="form-control" value="{{ old('first_name') }}" autofocus
                            data-parsley-required=""
                            data-parsley-pattern="/^[a-zA-Z]*$/"
                            data-parsley-maxlength="50"
                            data-parsley-maxlength-message="The first name must be less than 50 characters long."
                            data-parsley-pattern-message="The value is invalid. Only letters are allowed."
                            data-parsley-required-message="The first name is required."
                          />
                      </div>

                      {{-- Last name --}}
                      <div class="form-group">
                           <label for="last_name">Last Name <span class="asterisk">*</span></label>
                          <input type="text" name="last_name" id="last_name" placeholder="Enter last name" class="form-control" value="{{ old('last_name') }}"
                            data-parsley-required=""
                            data-parsley-pattern="/^[a-zA-Z0-9-]*$/"
                            data-parsley-maxlength="50"
                            data-parsley-maxlength-message="The last name must be less than 50 characters long."
                            data-parsley-pattern-message="The value is invalid. Only letters, numbers and dash are allowed."
                            data-parsley-required-message="The last name is required."
                          />
                      </div>

                      {{-- Dato of birth --}}
                      <div class="form-group">
                           <label for="dob">Date of birth<span class="asterisk">*</span></label>
                          <input type="text" name="dob" id="dob" placeholder="yyyy-mm-dd" class="form-control" value="{{ old('dob') }}"
                            data-parsley-required=""
                            data-parsley-required-message="The date of birth required."
                          />
                      </div>

                      {{-- Button --}}
                      <div class="form-group">
                           <button class="btn btn-primary">Create</button>
                      </div>
                   </form>
               @endslot
           @endcomponent</div>
   </div>
@endsection

@section('scripts')
  <script src="{{  asset('vendor/parsley/parsley.min.js') }}"></script>
@endsection