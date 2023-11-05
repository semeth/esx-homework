<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">ESX Project</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('account/index'); ?>">Account</a>
                </li>
                <?php if(isLogged()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('account/logout'); ?>">Logout</a>
                </li>
                <?php endif; ?>
                <?php if(!isLogged()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('account/logout'); ?>">Login/Register</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>