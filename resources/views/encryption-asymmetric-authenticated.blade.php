@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 id="timeline">Encription Asymmetric Authenticated</h1>
        </div>
        <ul class="timeline">
            <li>
                <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Alice Message</h4>
                        {{--                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>--}}
                    </div>
                    <div class="timeline-body">
                        <p><?= $aliceMessage ?></p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-badge danger"><i class="glyphicon glyphicon-check"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Bob Message</h4>
                        {{--                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>--}}
                    </div>
                    <div class="timeline-body">
                        <p><?= $bobMessage ?></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Alice Secret Key</h4>
                    </div>
                    <div class="timeline-body">
                        <p><?= $aliceSecret ?></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Alice Public Key</h4>
                    </div>
                    <div class="timeline-body">
                        <p><?= $alicePublic ?></p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-badge info"><i class="glyphicon glyphicon-floppy-disk"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Bob Secret Key</h4>
                    </div>
                    <div class="timeline-body">
                        <p><?= $bobSecret ?></p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Bob Public Key</h4>
                    </div>
                    <div class="timeline-body">
                        <p><?= $bobPublic ?></p>
                    </div>
                </div>
            </li>
{{--            <li>--}}
{{--                <div class="timeline-badge success"><i class="glyphicon glyphicon-floppy-disk"></i></div>--}}
{{--                <div class="timeline-panel">--}}
{{--                    <div class="timeline-heading">--}}
{{--                        <h4 class="timeline-title">Alice send Bob (Alice Public Key)</h4>--}}
{{--                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Convert binary data into hexadecimal representation</small></p>--}}
{{--                    </div>--}}
{{--                    <div class="timeline-body">--}}
{{--                        <p><?= $aPublicKeySendToBob ?></p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="timeline-inverted">--}}
{{--                <div class="timeline-badge"><i class="glyphicon glyphicon-floppy-disk"></i></div>--}}
{{--                <div class="timeline-panel">--}}
{{--                    <div class="timeline-heading">--}}
{{--                        <h4 class="timeline-title">Bob send Alice (Bob Public Key)</h4>--}}
{{--                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Convert binary data into hexadecimal representation</small></p>--}}
{{--                    </div>--}}
{{--                    <div class="timeline-body">--}}
{{--                        <p><?= $bPublicKeySendToAlice  ?></p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
            <li>
                <div class="timeline-badge danger"><i class="glyphicon glyphicon-floppy-disk"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Alice Ciper Message</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Alice Message + Bob Public Key</small></p>
                    </div>
                    <div class="timeline-body">
                        <p><?= $cipherMessageSendToBob  ?></p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-floppy-disk"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Bob Ciper Message</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Bob Message + Alice Public Key</small></p>
                    </div>
                    <div class="timeline-body">
                        <p><?= $cipherMessageSendToAlice  ?></p>
                    </div>
                </div>
            </li>

            <li>
                <div class="timeline-badge info"><i class="glyphicon glyphicon-floppy-disk"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Alice decript message</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Bob Ciper Message + Alice Secret Key + Bob Public Key</small></p>
                    </div>
                    <div class="timeline-body">
                        <p><?= $alice_decrypted_message  ?></p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-badge success"><i class="glyphicon glyphicon-floppy-disk"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Bob decript message</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Alice Ciper Message + Bob Secret Key + Alice Public Key</small></p>
                    </div>
                    <div class="timeline-body">
                        <p><?= $bob_decrypted_message  ?></p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
@endsection
