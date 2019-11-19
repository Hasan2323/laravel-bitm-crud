<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<head>

    <style>

        .container{
            position: absolute;
            left: 50px;
            top: 80px;
        }

    </style>

</head>

<div class="container">

    <div class="navbar">
        <a href="../../home"><button type="button" class="btn btn-primary btn-lg">Home</button></a>
    </div>

    <form method="post" action="../search-result">

        {!! csrf_field() !!}

        <b>Blood Group:</b> <input type="text" size="30" placeholder="Example: B+" name="keyword" required>
        <input type="submit" value="Search">

    </form>

    @if($searchData->total())

        Total: {!! $searchData->total() !!} Donor(s) <br>

        Showing: {{ $searchData->count() }} Donor(s) <br>

        {{ $searchData->links() }}


        <table class="table table-bordered table table-striped" >

            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Blood Group</th>
                <th>Location</th>
                <th>Gender</th>
                <th>Last Donate</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            <?
            if(isset($_REQUEST['page'])) $page = $_REQUEST['page'];
            else   $page = 1;

            $serial = (($page - 1) * 2) + 1;
            ?>

            @foreach($searchData as $donor)

                <tr>
                    <td> {{ $serial++ }} </td>
                    <td> {{ $donor['name'] }} </td> {{--there are two different way. This is Number one--}}
                    <td> {{ $donor->mobile }} </td>   {{--This is Number two.--}}
                    <td> {{ $donor->bloodGroup }} </td>
                    <td> {{ $donor->location }} </td>
                    <td> {{ $donor->gender }} </td>
                    <td> {{ $donor->lastDonationDate }} </td>
                    <td>
                    <?
                        $today = date('Y-m-d');
                        $timeGap = round(abs(strtotime($today)-strtotime($donor->lastDonationDate))/86400);
                        echo ($timeGap < 91) ? "<b>Not Available</b>" : "<b>Available</b>";

                    ?>
                    </td>
                    <td>
                        <a href="../delete/{{ $donor->id }}" class="btn btn-danger" onclick="return confirm_delete()">Delete</a>
                        <a href="../edit/{{ $donor->id }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>

            @endforeach
        </table>

        {{ $searchData->links() }}

    @else {{ 'No Record Found!' }}

    @endif


</div>

<script>

    function confirm_delete(){
        return confirm("Are you sure you want to permanently delete this data?");
    }

</script>
