@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 id="timeline">Encription Asymmetric Anonymous</h1>
        </div>
        <ul class="timeline">
            <li class="timeline-inverted">
                <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Message</h4>
{{--                                                <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>--}}
                    </div>
                    <div class="timeline-body">
                        <p><?= $message ?></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Public Key</h4>
                    </div>
                    <div class="timeline-body">
                        <p><?= $sealPublic ?></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Secret Key</h4>
                    </div>
                    <div class="timeline-body">
                        <p><?= $sealSecret ?></p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-badge info"><i class="glyphicon glyphicon-floppy-disk"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Sealed</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Message + Public Key</small></p>
                    </div>
                    <div class="timeline-body">
                        <p><?= $sealed ?></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge success"><i class="glyphicon glyphicon-thumbs-up"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Opened</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Sealed + Secret Key</small></p>
                    </div>
                    <div class="timeline-body">
                        <p><?= $opened ?></p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
@endsection
