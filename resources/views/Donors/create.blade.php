
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
    <a href="../home" class="btn btn-success">Home</a>
    <h1> Create New Donor</h1>

    <form action="store" method="post" class="was-validated">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>


        <div class="form-group">
            <label for="mobile">Mobile:</label>
            <input type="text" name="mobile" class="form-control" minlength="11" placeholder="Enter your number" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>

        <div class="form-group">
            <label for="bloodGroup">Blood Group:</label>
            <select name="bloodGroup" class="form-control" id="" required>

                <option value="" disabled selected>Select your blood group</option>
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
            <label for="gender">Gender:</label>
            <input type="radio" name="gender"  value="Male" required>Male
            <input type="radio" name="gender"  value="Female">Female
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <select name="location" class="form-control" id="" required>

                <option value="" disabled selected>Select your city..</option>
                <option name="cityName" value="Halishahar">Halishahar</option>
                <option name="cityName" value="Agrabad">Agrabad</option>
                <option name="cityName" value="Chawkbazar">Chawkbazar</option>
                <option name="cityName" value="GEC">GEC</option>
                <option name="cityName" value="Boddarhat">Boddarhat</option>

            </select>
        </div>

        <div class="form-group">
            <label for="lastDonationDate">Last Donation Date:</label>
            <input type="date" name="lastDonationDate" class="form-control">
        </div>

        <div class="form-group">

            <label for="member">Organization:</label><br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="member[]"  value="Red Crescent"> Red Crescent<br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="member[]"  value="Sondani"> Sondani<br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="member[]"  value="Shardul"> Shardul<br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="member[]"  value="None"> None<br/>

        </div>

        <div class="form-group">
            <label for="summary">Summary:</label>
            <textarea class="form-control" name="summary" placeholder="Say something about yourself.." required></textarea>
        </div>

        <input type="submit" class="btn btn-primary" value="Register">

    </form>

</div>

