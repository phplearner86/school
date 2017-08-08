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
                    <h2><i class="fa fa-pencil"></i> New account</h2>
                @endslot

                @slot('body')
                    <p class="required__fields">Fields marked with * are required.</p>

                    @include('accounts.partials._formCreate')

                @endslot
            @endcomponent
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{  asset('vendor/parsley/parsley.min.js') }}"></script>

    <script>
        $('input[type="checkbox"]').on('click', function(){
            if ($('#role_1').is(":checked")) 
            {
                $('#role_2').attr("disabled", true);
            }
            else
            {
                $('#role_2').removeAttr("disabled");
            }

            if ($('#role_2').is(":checked")) 
            {
                $('#role_1').attr("disabled", true);
            }
            else
            {
                $('#role_1').removeAttr("disabled");
            }

            if ($('#role_3').is(":checked")) 
            {
                $('#role_4').attr("disabled", true);
            }
            else
            {
                $('#role_4').removeAttr("disabled");
            }

            if ($('#role_4').is(":checked")) 
            {
                $('#role_3').attr("disabled", true);
            }
            else
            {
                $('#role_3').removeAttr("disabled");
            }
        })
    </script>
@endsection