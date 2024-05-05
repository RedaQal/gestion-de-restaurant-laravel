<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/agentDashboard.css') }}">
    <title>Agent</title>
</head>

<body>
    <nav class="menu" tabindex="0">
        <div class="smartphone-menu-trigger"></div>
        <header class="avatar">
            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" />
            <h2>{{ Str::ucfirst(Auth::user()->name) }}</h2>
        </header>
        <ul>
            <li tabindex="0" class="icon-dashboard"><span>Dashboard</span></li>
            <li tabindex="0" class="icon-customers"><span>Customers</span></li>
            <li tabindex="0" class="icon-users"><span>Users</span></li>
            <li tabindex="0" class="icon-settings"><span>Settings</span></li>
        </ul>
    </nav>

    <main>
        <div class="helper">
            RESIZE THE WINDOW
            <span>Breakpoints on 900px and 400px</span>
        </div>
    </main>
</body>

</html>
