<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Super Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f6fa;
        }

        .navbar{
            background:#0055A4;
        }

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,.1);
        }

        .menu{
            text-decoration:none;
            color:black;
        }

        .menu:hover{
            color:#0055A4;
        }
    </style>

</head>
<body>

<nav class="navbar navbar-dark">

<div class="container">

<span class="navbar-brand">

Super Admin E-Magang KAI

</span>

<a href="{{ route('logout') }}" class="btn btn-danger">

Logout

</a>

</div>

</nav>

<div class="container mt-4">

<div class="row">

<div class="col-md-4">

<div class="card p-4">

<h3>Total Mahasiswa</h3>

<h1>0</h1>

</div>

</div>

<div class="col-md-4">

<div class="card p-4">

<h3>Total SDM</h3>

<h1>1</h1>

</div>

</div>

<div class="col-md-4">

<div class="card p-4">

<h3>Total Unit</h3>

<h1>1</h1>

</div>

</div>

</div>

<div class="card mt-4">

<div class="card-header bg-primary text-white">

Menu

</div>

<div class="card-body">

<div class="list-group">

<a href="{{ route('mahasiswa.dashboard') }}" class="list-group-item list-group-item-action">

Dashboard Mahasiswa

</a>

<a href="{{ route('sdm.dashboard') }}" class="list-group-item list-group-item-action">

Dashboard SDM

</a>

<a href="{{ route('unit.dashboard') }}" class="list-group-item list-group-item-action">

Dashboard Unit

</a>

</div>

</div>

</div>

</div>

</body>
</html>