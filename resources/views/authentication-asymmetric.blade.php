@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 id="timeline">Authentication Asymmetric</h1>
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
                        <h4 class="timeline-title">Signature Public Key</h4>
                    </div>
                    <div class="timeline-body">
                        <p><?= $publicSign ?></p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Signature Secret Key</h4>
                    </div>
                    <div class="timeline-body">
                        <p><?= $secretSign ?></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge info"><i class="glyphicon glyphicon-floppy-disk"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Signature</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Message + Signature Secret Key</small></p>
                    </div>
                    <div class="timeline-body">
                        <p><?= $signature ?></p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-badge success"><i class="glyphicon glyphicon-floppy-disk"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Valid</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Message + Signature Public Key + Signature</small></p>
                    </div>
                    <div class="timeline-body">
                        <p><?= ($valid) ? 'Valid Signature' : 'Invalid Signature' ?></p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
@endsection
