<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="mb-auto">
        <div>
            <h3 class="float-md-start mb-0">Sheepfish</h3><br>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link fw-bold py-1 px-0 active " aria-current="page" href="/companies">Компанії</a>
                <a class="nav-link fw-bold py-1 px-0 mr-2" href="/employees">Працівники</a>

            </nav>
        </div>
    </header>
@yield('content')
</body>
</html>
