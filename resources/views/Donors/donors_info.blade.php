<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<head>

    <style>

        /*td{*/
            /*width: 100px;*/
            /*height: 50px;*/

        /*}*/

        .container{
            position: absolute;
            left: 50px;
            top: 100px;

        }


    </style>

</head>

<div class="container">

    <div class="navbar">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="../home"><button type="button" class="btn btn-success btn-lg">Home</button></a>
        <a href="create"><button type="button" class="btn btn-primary btn-lg">Add new donor</button></a>
    </div>

    Total: {!! $allDonors->total() !!} Donor(s) <br>

    Showing: {{ $allDonors->count() }} Donor(s) <br>

    {{ $allDonors->links() }} <br>


    <table class="table table-bordered table table-striped" >

        <tr>
            <th>Serial</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Blood Group</th>
            <th>Location</th>
            <th>Gender</th>
            <th>Last Donate (Y-M-D)</th>
            <th>Organisation</th>
            <th>Summary</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        <?
            if(isset($_REQUEST['page'])) $page = $_REQUEST['page'];
            else $page = 1;

            $serial = (($page - 1) * 4) + 1;
        ?>

        @foreach($allDonors as $donor)

            <tr>
                <td> {{ $serial++ }} </td>
                <td> {{ $donor['name'] }} </td> {{--there are two different way. This is Number one--}}
                <td> {{ $donor->mobile }} </td>   {{--This is Number two.--}}
                <td> {{ $donor->bloodGroup }} </td>
                <td> {{ $donor->location }} </td>
                <td> {{ $donor->gender }} </td>
                <td> {{ $donor->lastDonationDate }} </td>
                <td> {{ $donor->member }} </td>
                <td> {{ $donor->summary }} </td>
                <td>
                    <?
                        $today = date('Y-m-d');
                        $timeGap = round(abs(strtotime($today)-strtotime($donor->lastDonationDate))/86400);
                        echo ($timeGap < 91) ? "<b>Not Available</b>" : "<b>Available</b>";

                    ?>
                </td>
                <td>
                    <a href="edit/{{ $donor->id }}" class="btn btn-primary">Edit</a>
                    <a href="delete/{{ $donor->id }}" class="btn btn-danger" onclick="return confirm_delete()">Delete</a>
                </td>
            </tr>

        @endforeach
    </table>

    {{ $allDonors->links() }}
</div>

<script>

    function confirm_delete(){
        return confirm("Are you sure you want to permanently delete this data?");
    }

</script>
