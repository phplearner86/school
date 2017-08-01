@extends('layouts.admin')

@section('content')
   <div class="row">
   
   @include('errors._list')

       <div class="col-md-8 col-md-offset-2"> @component('partials.admin._panel')
               @slot('heading')
                   <h2><i class="fa fa-pencil"></i> New account</h2>
               @endslot
           
               @slot('body')
                <p class="required__fields">Fields marked with * are required.</p>
                   <form action="{{ route('users.store') }}" method="post">
                       {{ csrf_field() }}

                       {{-- Role --}}
                       <div class="form-group">
                         <label >Role</label>
                           <p>@foreach ($roles as $role)
                               <input type="checkbox" name="role_id[]" id="{{ $role->name }}" value="{{ $role->id }}">{{ ucfirst($role->name) }}
                             @endforeach</p>
                         
                       </div>

                       {{-- First name --}}
                      <div class="form-group">
                           <label for="first_name">First Name <span class="asterisk">*</span></label>
                          <input type="text" name="first_name" id="first_name" placeholder="Enter first name" class="form-control" value="{{ old('first_name') }}">
                      </div>

                      {{-- Last name --}}
                      <div class="form-group">
                           <label for="last_name">Last Name <span class="asterisk">*</span></label>
                          <input type="text" name="last_name" id="last_name" placeholder="Enter last name" class="form-control" value="{{ old('last_name') }}">
                      </div>

                      {{-- Dato of birth --}}
                      <div class="form-group">
                           <label for="dob">Date of birth<span class="asterisk">*</span></label>
                          <input type="text" name="dob" id="dob" placeholder="yyyy-mm-dd" class="form-control" value="{{ old('dob') }}">
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