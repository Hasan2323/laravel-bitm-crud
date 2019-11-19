
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>


        .container{
            position: absolute;
            left: 50px;
            top: 150px;

        }


    </style>

</head>


<div class="container">
    <a href="../../home" class="btn btn-success">Home</a>
    <h1> Edit Student Info</h1>

    <form action="update" method="post" class="was-validated">
        {!! csrf_field() !!}

        <input type="hidden" name="id" value="{{ $donor->id }}">

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $donor['name'] }}" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>


        <div class="form-group">
            <label for="mobile">Mobile:</label>
            <input type="text" name="mobile" class="form-control" minlength="11" value="{{ $donor['mobile'] }}" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>

        <div class="form-group">
            <label for="bloodGroup">Blood Group:</label>
            <select name="bloodGroup" class="form-control" id="" required>

                <option value="{{ $donor->bloodGroup }}">{{ $donor->bloodGroup }}</option>
                <option name="group" value="A+">A+</option>
                <option name="group" value="A-">A-</option>
                <option name="group" value="B+">B+</option>
                <option name="group" value="B-">B-</option>
                <option name="group" value="O+">O+</option>
                <option name="group" value="O-">O-</option>
                <option name="group" value="AB+">AB+</option>
                <option name="group" value="AB-">AB-</option>

            </select>
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <select name="location" class="form-control" id="" required>

                <option value="{{ $donor->location }}">{{ $donor->location }}</option>
                <option name="cityName" value="Halishahar">Halishahar</option>
                <option name="cityName" value="Agrabad">Agrabad</option>
                <option name="cityName" value="Chawkbazar">Chawkbazar</option>
                <option name="cityName" value="GEC">GEC</option>
                <option name="cityName" value="Boddarhat">Boddarhat</option>

            </select>
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <input type="radio" name="gender"  value="Male" {{ $donor->gender == 'Male' ? 'checked' : '' }} required>Male
            <input type="radio" name="gender"  value="Female" {{ $donor->gender == 'Female' ? 'checked' : '' }} >Female
        </div>

        <div class="form-group">
            <label for="lastDonationDate">Last Donation Date:</label>
            <input type="date" name="lastDonationDate" class="form-control" value="{{ $donor['lastDonationDate'] }}">
        </div>

        <div class="form-group">

            <label for="Hobbies">Hobbies:</label><br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="member[]"  value="Red Crescent" @if(in_array('Red Crescent', $organizationArray)) {{ 'checked' }} @endif> Red Crescent<br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="member[]"  value="Sondani" @if(in_array('Sondani', $organizationArray)) {{ 'checked' }} @endif> Sondani<br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="member[]"  value="Shardul" @if(in_array('Shardul', $organizationArray)) {{ 'checked' }} @endif> Shardul<br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="member[]"  value="None" @if(in_array('None', $organizationArray)) {{ 'checked' }} @endif> None<br/>

        </div>

        <div class="form-group">
            <label for="summary">Summary:</label>
            <textarea class="form-control" name="summary" required>{{ $donor->summary }}</textarea>
        </div>

        <input type="submit" class="btn btn-primary" name="Update">

    </form>

</div>

