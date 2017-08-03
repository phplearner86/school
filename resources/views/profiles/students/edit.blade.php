@extends('layouts.admin')

@section('links')
    <link rel="stylesheet" href="{{ asset('vendor/parsley/parsley.css') }}">
@endsection

@section('content')
    <div class="row">

        @include('errors._list')

        <div class="col-md-8 col-md-offset-2"> 
            @component('partials.admin._panel')
                @slot('heading')
                    <h2><i class="fa fa-pencil"></i> Edit account</h2>
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
                            <p>
                            @foreach ($roles as $role)
                                <input type="checkbox" name="role_id[]" id="{{ $role->name }}" value="{{ $role->id }}" disabled="" 
                                @foreach ($user->roles->pluck('id') as $id)
                                    {{checked($role->id, $id)}}
                                @endforeach
                                />{{ ucfirst($role->name) }}
                            @endforeach
                            </p>
                        </div>

                        {{-- First name --}}
                        <div class="form-group">
                            <label for="first_name">First Name <span class="asterisk">*</span></label>
                            <input type="text" name="first_name" id="first_name" placeholder="Enter first name" class="form-control" value="{{ $user->student->first_name }}" disabled=""/>
                        </div>

                        {{-- Last name --}}
                        <div class="form-group">
                            <label for="last_name">Last Name <span class="asterisk">*</span></label>
                            <input type="text" name="last_name" id="last_name" placeholder="Enter last name" class="form-control" value="{{ $user->student->last_name }}"
                            disabled="" />
                        </div>

                        {{-- Date of birth --}}
                        <div class="form-group">
                            <label for="dob">Date of birth<span class="asterisk">*</span></label>
                            <input type="text" name="dob" id="dob" class="form-control" value="{{ $user->student->dob }}"
                            disabled=""/>
                        </div>

                        <div class="form-group">
                            <label for="cwid">CWID<span class="asterisk">*</span></label>
                            <input type="text" name="cwid" id="cwid" class="form-control" value="{{ $user->student->cwid }}"
                            disabled=""/>
                        </div>

                        {{-- Button --}}
                        <div class="form-group">
                            <button class="btn btn-primary">Create</button>
                        </div>
                    </form>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{  asset('vendor/parsley/parsley.min.js') }}"></script>
@endsection