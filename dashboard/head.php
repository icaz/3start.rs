<!DOCTYPE html>

<html lang="sr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Kontrolna tabla</title>
    <link rel="icon" href="img/favicon.png">

    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="admin/plugins/ekko-lightbox/ekko-lightbox.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Page specific style -->

    <!-- DataTables -->
    <link rel="stylesheet" href="admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        @keyframes pulseAlert {
            0% {
                color: red;
            }

            50% {
                color: white;
            }

            100% {
                color: red;
            }
        }

        .pulseAlert-css {
            animation: pulseAlert 2s ease-out;
            animation-iteration-count: infinite;
            color: white;
            /* you need this to specify a color to pulse to */
        }

        #cats:hover {
            border: 1px solid whitesmoke;
            background-color: #333;
            color: whitesmoke;
        }
    </style>
</head>