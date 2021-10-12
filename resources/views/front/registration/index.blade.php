@extends('front.layouts.master')

@section('content')

    <div class="row">

    <div class="col-md-12" id="register">

        <div class="card col-md-8">
            <div class="card-body">
                <h2 class="card-title">Sign Up</h2>
                <hr>

                @if ( $errors->any() )

                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif

                <form action="/user/register" method="post" enctype="multipart/form-data">
                <input type="hidden" name="status" id="status" value="Active">

                    @csrf

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" placeholder="Name" id="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" placeholder="Email" id="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" id="password_confirmation" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" placeholder="Address" id="address" class="form-control">
                    </div>

			<div class="form-group">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="form-group">
                <div id="results">Your captured image will appear here...</div>
            </div>

                    <div class="form-group">
                        <button class="btn btn-outline-info col-md-2"> Sign Up</button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</div>

@endsection



@push('script-js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
	<style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>
<script>
console.log('executing js here..')
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>

@endpush