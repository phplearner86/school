<ul class="nav nav-sidebar">
    <li>
        <a href="{{ route('pages.dashboard') }}">
            Dashboard
        </a>
    </li>
    <li>
        <a data-toggle="collapse" href="#accounts" aria-expanded="false" aria-controls="accounts">
        Accounts
        </a>
    </li>
    <div class="collapse" id="accounts">
        <div class="well">
            <a href="#">All accounts</a>
        </div>
        <div class="well">
            <a href="{{ route('users.create') }}">New account</a>
        </div>
    </div>
</ul>
