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
            <input type="checkbox" name="role_id[]" id="role_{{ $role->id }}" value="{{ $role->id }}"
             data-parsley-required=""
             data-parsley-mincheck="1"
             data-parsley-required-message="The role is required."
            @if (is_array($ids = old('role_id')))
                 @foreach ($ids as $role_id)
                     {{ checked($role->id, $role_id) }}
                 @endforeach
            @endif
            />{{ ucfirst($role->name) }}
          @endforeach</p>
      
    </div>

    {{-- First name --}}
   <div class="form-group">
        <label for="first_name">First Name <span class="asterisk">*</span></label>
       <input type="text" name="first_name" id="first_name" placeholder="Enter first name" class="form-control" value="{{ old('first_name') }}" autofocus
         data-parsley-required=""
         data-parsley-pattern="/^[a-zA-Z ]*$/"
         data-parsley-maxlength="50"
         data-parsley-maxlength-message="The first name must be less than 50 characters long."
         data-parsley-pattern-message="The value is invalid. Only letters and spaces are allowed."
         data-parsley-required-message="The first name is required."
       />
   </div>

   {{-- Last name --}}
   <div class="form-group">
        <label for="last_name">Last Name <span class="asterisk">*</span></label>
       <input type="text" name="last_name" id="last_name" placeholder="Enter last name" class="form-control" value="{{ old('last_name') }}"
         data-parsley-required=""
         data-parsley-pattern="/^[a-zA-Z1-9 ]*$/"
         data-parsley-maxlength="50"
         data-parsley-maxlength-message="The last name must be less than 50 characters long."
         data-parsley-pattern-message="The value is invalid. Only letters, numbers and spaces are allowed."
         data-parsley-required-message="The last name is required."
       />
   </div>

   {{-- Gender --}}
   <div class="form-group">
       <label>Gender</label>
       <p>
            @foreach (Gender::all()  as $gender => $name)
                <input type="radio" name="gender" id="{{ $name }}" value="{{ $gender }}" 
                    {{ checked($gender, old('gender')) }}
                    data-parsley-required=""
                    data-parsley-required-message="The gender filed is required."
                /> {{ $name }}
            @endforeach
        </p>
   </div>

   {{-- Dato of birth --}}
   <div class="form-group">
        <label for="dob">Date of birth<span class="asterisk">*</span></label>
       <input type="text" name="dob" id="dob" placeholder="yyyy-mm-dd" class="form-control" value="{{ old('dob') }}"
         data-parsley-required=""
         data-parsley-pattern="/^\d{4}([.-])\d{2}\1\d{2}$/"
         data-parsley-required-message="The date of birth required."
         data-parsley-pattern-message="The correct date of birth format is yyyy-mm-dd."
       />
   </div>

   {{-- Button --}}
   <div class="form-group">
        <button class="btn btn-primary">Create</button>
   </div>
</form>