@extends('layouts.admin')

@section('content')
   <div class="row">
       <div class="col-md-8 col-md-offset-2"> @component('partials.admin._panel')
               @slot('heading')
                   <h2><i class="fa fa-pencil"></i> New account</h2>
               @endslot
           
               @slot('body')
                <p class="required__fields">Fields marked with * are required.</p>
                   <form action="{{ route('users.store') }}" method="post">
                       {{ csrf_field() }}
                      <div class="form-group">
                           <label for="first_name">First Name <span class="asterisk">*</span></label>
                          <input type="text" name="first_name" id="first_name" placeholder="Enter first name" class="form-control" value="{{ old('first_name') }}">
                      </div>
                      <div class="form-group">
                           <label for="last_name">Last Name <span class="asterisk">*</span></label>
                          <input type="text" name="last_name" id="last_name" placeholder="Enter last name" class="form-control" value="{{ old('last_name') }}">
                      </div>
                      <div class="form-group">
                           <label for="name">Name</label>
                          <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                      </div>
                      <div class="form-group">
                           <label for="email">Email</label>
                          <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
                      </div>
                      <div class="form-group">
                           <label for="password">Password</label>
                          <input type="text" name="password" id="password" placeholder="password" class="form-control">
                      </div>
           
                      <div class="form-group">
                           <button class="btn btn-primary">Create</button>
                      </div>
                   </form>
               @endslot
           @endcomponent</div>
   </div>
@endsection