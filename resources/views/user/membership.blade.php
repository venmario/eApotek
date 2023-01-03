@extends('layout.sbadmin')
@section('content')
<div class="container-fluid mt-4">
    <h1 class="text-center">Membership Page</h1>
    <p>Membership Level : {{ $user->membership->nama }}</p>
    <p>Total Poin : {{ $user->poin }}</p>

    @if ($user->memberships_id == 1)
    <div class="row">
        <label class="col-sm-2">Poin Silver</label>
        <div class="col-sm-10">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ $user->poin }}%;"
                    aria-valuenow="{{ $user->poin }}" aria-valuemin="0" aria-valuemax="100">{{ $user->poin }}%</div>
            </div>
        </div>
        <label class="col-sm-2">Poin Gold</label>
        <div class="col-sm-10">
            <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 0%;" aria-valuenow="0"
                    aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>
        </div>
        <label class="col-sm-2">Poin Platinum</label>
        <div class="col-sm-10">
            <div class="progress">
                <div class="progress-bar bg-light text-dark" role="progressbar" style="width: 0%;" aria-valuenow="0"
                    aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>
        </div>
    </div>
    @elseif ($user->memberships_id == 2)
    <div class="row">
        <label class="col-sm-2">Poin Silver</label>
        <div class="col-sm-10">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                    aria-valuemax="100">100%</div>
            </div>
        </div>
        <label class="col-sm-2">Poin Gold</label>
        <div class="col-sm-10">
            <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $user->poin }}%;"
                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">{{ $user->poin }}%</div>
            </div>
        </div>
        <label class="col-sm-2">Poin Platinum</label>
        <div class="col-sm-10">
            <div class="progress">
                <div class="progress-bar bg-light text-dark" role="progressbar" style="width: 0%;" aria-valuenow="0"
                    aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <label class="col-sm-2">Poin Silver</label>
        <div class="col-sm-10">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                    aria-valuemax="100">100%</div>
            </div>
        </div>
        <label class="col-sm-2">Poin Gold</label>
        <div class="col-sm-10">
            <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="100"
                    aria-valuemin="0" aria-valuemax="100">100%</div>
            </div>
        </div>
        <label class="col-sm-2">Poin Platinum</label>
        <div class="col-sm-10">
            <div class="progress">
                <div class="progress-bar bg-light text-dark" role="progressbar" style="width: {{ $user->poin }}%;"
                    aria-valuenow="0" aria-valuemin="{{ $user->poin }}" aria-valuemax="100">{{ $user->poin }}%</div>
            </div>
        </div>
    </div>
    @endif

</div>
@endsection
