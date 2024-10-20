@extends('user/template/user-template')

@section('title', 'Bagan Baronas SD | Evolution 2023')

@section('style')
    <link rel="stylesheet" href="/assets/css/bracket.css" type="text/css">
@endsection

@section('container')
    <div class="tournament-container">
        <div class="tournament-title" style="background: #fdfdfd;">
            <h6 class="heading mb-4" style="text-align: center; display:block; padding: 20px; font-size: larger;">Bagan
                Baronas SD</h6>
        </div>
        <div class="tournament-headers">
            <h3>Round of 16</h3>
            <h3>Quarter-Finals</h3>
            <h3>Semi-Finals</h3>
            <h3>Final</h3>
            <h3>Winner</h3>
        </div>

        <div class="tournament-brackets">
            <ul class="bracket bracket-1">
                <li class="team-item">A2 <time>vs</time> C2</li>
                <li class="team-item">D1 <time>vs</time> 3BEF</li>
                <li class="team-item">B1 <time>vs</time> 3ACD</li>
                <li class="team-item">F1 <time>vs</time> E2</li>
                <li class="team-item">C1 <time>vs</time> 3ABF</li>
                <li class="team-item">E1 <time>vs</time> D2</li>
                <li class="team-item">A1 <time>vs</time> 3CDE</li>
                <li class="team-item">B2 <time>vs</time> F2</li>
            </ul>
            <ul class="bracket bracket-2">
                <li class="team-item">QF1 <time>vs</time> QF2</li>
                <li class="team-item">QF3 <time>vs</time> QF4</li>
                <li class="team-item">QF5 <time>vs</time> QF6</li>
                <li class="team-item">QF7 <time>vs</time> QF8</li>
            </ul>
            <ul class="bracket bracket-3">
                <li class="team-item">SF1 <time>vs</time> SF2</li>
                <li class="team-item">SF3 <time>vs</time> SF4</li>
            </ul>
            <ul class="bracket bracket-4">
                <li class="team-item">F1 <time>vs</time> F2</li>
            </ul>

            <ul class="bracket bracket-5">
                <li class="team-item">Champions of Baronas</li>
            </ul>
        </div>
    </div>

@endsection
