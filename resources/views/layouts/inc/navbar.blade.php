<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">Crypto Messaging</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav" id="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('encryption-symmetric') }}">Encryption Symmetric <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('encryption-asymmetric-anonymous') }}">Encryption Asymmetric Anonymous</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('encryption-asymmetric-authenticated') }}">Encryption Asymmetric Authenticated</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('authentication-symmetric') }}">Authentication Symmetric</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('authentication-asymmetric') }}">Authentication Asymmetric</a>
            </li>
        </ul>
    </div>
</nav>
