@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 id="timeline">Authentication Symmetric</h1>
        </div>
        <ul class="timeline">
            <li>
                <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Message</h4>
                        {{--                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>--}}
                    </div>
                    <div class="timeline-body">
                        <p><?= $message ?></p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Authentication Key</h4>
                    </div>
                    <div class="timeline-body">
                        <p><?= $authKey ?></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge danger"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">MAC</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Message + Authentication Key</small></p>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>MAC stands for Message Authentication Code</small></p>
                    </div>
                    <div class="timeline-body">
                        <p><?= $mac ?></p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-badge info"><i class="glyphicon glyphicon-floppy-disk"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Valid</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Message + Authentication Key + MAC</small></p>
                    </div>
                    <div class="timeline-body">
                        <p><?= ($valid) ? 'Valid Mac' : 'Invalid Mac' ?></p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
@endsection
