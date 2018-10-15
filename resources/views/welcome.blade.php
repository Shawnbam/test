<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fooseball</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="modal-body">
        <div class="row col-md-offset-0">
            <form method="post" action="{{ route('match.addteam') }}" id="matchform" class="ansform" >
                <div class="col-lg-offset-1 " style="border:1px solid green">
                    <input type="text" name="team1" id="team1" placeholder="Team 1 Name" > &nbsp;
                    <input type="text" name="team2" id="team2" placeholder="Team 2 Name" > &nbsp;
                    <label>
                        Winner
                        <select name="winner" id="winner">
                            <option value="0">Draw</option>
                            <option value="1">Team 1</option>
                            <option value="2">Team 2</option>
                        </select>
                    </label>
                    <input type="number" name="team1g" placeholder="Team 1 Goals" id="goal1" > &nbsp;
                    <input type="number" name="team2g" placeholder="Team 2 Goals" id="goal2" > &nbsp;
                    <input type="submit" name="submit" class="btn btn-success" data-dismiss="modal" value="Lets Play">
                    <input type="text" name="err" id="err"> &nbsp;
                    {{ csrf_field() }}
                </div>

            </form>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
        <tr class="table-danger">
            <th scope="col">#</th>
            <th scope="col">Team Name</th>
            <th scope="col">Games Played</th>
            <th scope="col">Wins</th>
            <th scope="col">Loss</th>
            <th scope="col">Ties</th>
            <th scope="col">Score</th>
            <th scope="col">Goals</th>
        </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $team->teamname }}</td>
                    <td>{{ $team->games }}</td>
                    <td>{{ $team->wins }}</td>
                    <td>{{ $team->loss }}</td>
                    <td>{{ $team->draws }}</td>
                    <td>{{ $team->points }}</td>
                    <td>{{ $team->goals }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <table class="table table-bordered">
        <thead>
        <tr class="table-danger">
            <th scope="col">#</th>
            <th scope="col">Team Name</th>
            <th scope="col">Games Played</th>
            <th scope="col">Wins</th>
            <th scope="col">Loss</th>
            <th scope="col">Ties</th>
            <th scope="col">Score</th>
            <th scope="col">Goals</th>
        </tr>
        </thead>
        <tbody>
            @foreach($matches as $match)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $match->team1 }}</td>
                    <td>{{ $match->team2 }}</td>
                    <td>{{ $match->winner }}</td>
                    <td>{{ $match->team1g }}</td>
                    <td>{{ $match->team2g }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{--<script>--}}
        {{--$('#matchform').on( "submit", function(e) {--}}
            {{--e.preventDefault();--}}
            {{--var w= parseInt($('#winner').val());--}}
            {{--var g1= parseInt($('#goal1').val());--}}
            {{--var g2= parseInt($('#goal2').val());--}}
            {{--var t1= $('#team1').val();--}}
            {{--var t2= $('#team2').val();--}}
            {{--if(t1 == t2){--}}
                {{--$("#err").val("Same Team Names");--}}
                {{--console.log(w+" "+g1+" "+g2);--}}
            {{--}--}}
            {{--else if(w == 0 && g1 != g2){--}}
                {{--$("#err").val("g1 != g2");--}}
                {{--console.log(w+" "+g1+" "+g2);--}}
            {{--}--}}
            {{--else if(w == 1 && g1 <= g2){--}}
                {{--$('#err').val("g1 <= g2");--}}
                {{--console.log(w+" "+g1+" "+g2);--}}
            {{--}--}}
            {{--else if(w == 2 && g1 >= g2){--}}
                {{--$('#err').val("g1 >= g2");--}}
                {{--console.log(w+" "+g1+" "+g2);--}}
            {{--}--}}
            {{--else{--}}
                {{--window.location = "/home/";--}}
            {{--}--}}


        {{--});--}}
    {{--</script>--}}
    </body>

</html>
