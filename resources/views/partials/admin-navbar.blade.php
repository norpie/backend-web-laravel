<div>
    <style>
        .navbar-nav {
            display: flex;
            list-style: none;
            justify-content: space-between;
            background-color: #e3f2fd;
            margin: 0;
            padding: 10px;
        }

        .nav-item {
            padding: 10px;
        }

        .nav-link {
            text-decoration: none;
            color: #000;
        }
    </style>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.shownews') }}">News</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.showadmins') }}">Promote</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.showcontacts') }}">Contacts</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.showfaqs') }}">Faq</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.showfaqcats') }}">Faq Categories</a>
        </li>
    </ul>
</div>
