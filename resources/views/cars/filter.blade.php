@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
<h2>Filter</h2>

<div>
    <select id="country">
        @foreach ($cars as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
        @endforeach
    </select>
    <select id="state">
    
    </select>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#country').on('change', function () {
            var countryId = this.value;
            $('#state').html('');
            $.ajax({
                url: '{{ route('getStates') }}?country_id='+countryId,
                type: 'get',
                success: function (res) {
                    $('#state').html('<option value="">Select State</option>');
                    $.each(res, function (key, value) {
                        $('#state').append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#city').html('<option value="">Select City</option>');
                }
            });
        });
       
          
       
    });
</script>
@endsection
