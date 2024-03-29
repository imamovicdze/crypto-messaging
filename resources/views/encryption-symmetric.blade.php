@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 id="timeline">Encription Symmetric</h1>
        </div>
        <ul class="timeline">
            <li>
                <div class="timeline-badge"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Message</h4>
                    </div>
                    <div class="timeline-body">
                        <p><?= $message ?></p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="glyphicon glyphicon-check"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Encriptyion Key</h4>
                        {{--                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>--}}
                    </div>
                    <div class="timeline-body">
                        <p><?= $encryptionKey ?></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge danger"><i class="glyphicon glyphicon-credit-card"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Ciper text</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Encriptyion Key + Message</small></p>
                    </div>
                    <div class="timeline-body">
                        <p><?= $ciphertext ?></p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-badge info"><i class="glyphicon glyphicon-floppy-disk"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Decripted Text</h4>
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>Encriptyion Key + Ciper text</small></p>
                    </div>
                    <div class="timeline-body">
                        <p><?= $decrypted ?></p>
                    </div>
                </div>
            </li>
{{--            <li>--}}
{{--                <div class="timeline-badge info"><i class="glyphicon glyphicon-floppy-disk"></i></div>--}}
{{--                <div class="timeline-panel">--}}
{{--                    <div class="timeline-heading">--}}
{{--                        <h4 class="timeline-title">Mussum ipsum cacilds</h4>--}}
{{--                    </div>--}}
{{--                    <div class="timeline-body">--}}
{{--                        <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>--}}
{{--                        <hr>--}}
{{--                        <div class="btn-group">--}}
{{--                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">--}}
{{--                                <i class="glyphicon glyphicon-cog"></i> <span class="caret"></span>--}}
{{--                            </button>--}}
{{--                            <ul class="dropdown-menu" role="menu">--}}
{{--                                <li><a href="#">Action</a></li>--}}
{{--                                <li><a href="#">Another action</a></li>--}}
{{--                                <li><a href="#">Something else here</a></li>--}}
{{--                                <li class="divider"></li>--}}
{{--                                <li><a href="#">Separated link</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <div class="timeline-panel">--}}
{{--                    <div class="timeline-heading">--}}
{{--                        <h4 class="timeline-title">Mussum ipsum cacilds</h4>--}}
{{--                    </div>--}}
{{--                    <div class="timeline-body">--}}
{{--                        <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="timeline-inverted">--}}
{{--                <div class="timeline-badge success"><i class="glyphicon glyphicon-thumbs-up"></i></div>--}}
{{--                <div class="timeline-panel">--}}
{{--                    <div class="timeline-heading">--}}
{{--                        <h4 class="timeline-title">Mussum ipsum cacilds</h4>--}}
{{--                    </div>--}}
{{--                    <div class="timeline-body">--}}
{{--                        <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
        </ul>
    </div>
@endsection
