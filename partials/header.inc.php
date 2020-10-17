<?php session_start();
    require_once 'functions.inc.php';
    require './vendor/autoload.php';

    if (!isset($_SESSION['user_email'])) {
        header("Location: https://kingso101-smart-home-demo.auth.us-east-1.amazoncognito.com/login?client_id=73nkbeiki4s2q5c2v9v8ek4aue&response_type=token&scope=aws.cognito.signin.user.admin+email+openid+phone+profile&redirect_uri=https://smart-surveillance-web-app.herokuapp.com/process.php");
    }else{
        $user_email = $_SESSION['user_email'];
        $user = $_SESSION['user'];
        $user_phone_number = $_SESSION['user_phone_number'];
        $access_token = $_SESSION['access_token'];
 
        // echo $user; 

    }
                 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- <base href="https://myhomeulom/"> -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
        <title>Dashboard | myHome Connectivity</title>
        <meta name="description" content="Holy blaze entertainment is a music record label signing on with young artist with talents accross the world.">
        <link rel="icon" type="image/png" href="../../img/logo.jpg" sizes="32x32">

        <meta name="author" content="HBE Records">
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no"/>
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        <link href="https:////cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        
        <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <link rel="stylesheet" href="assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="assets/plugins/waves/waves.min.css" rel="stylesheet">
        <link href="assets/plugins/nvd3/nv.d3.min.css" rel="stylesheet">
        <link href="assets/plugins/toastr/toastr.min.css" rel="stylesheet"> 
        <!-- Theme style -->  
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">

        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet">
        <!-- <link rel="stylesheet" href="assets/dist/css/adminlte.min.css"> -->
        <link href="assets/css/custom.css" rel="stylesheet">
        <script type="text/javascript" src="assets/js/custom.js"></script>
        <!-- jQuery library -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <!-- video html5 player -->
        <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />
        <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js"></script>

        <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#available-libraries -->
        <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-analytics.js"></script>
        <link rel="manifest" href="manifest.json">

        <script>
        $(document).ready(function() {
            // Your web app's Firebase configuration
            // For Firebase JS SDK v7.20.0 and later, measurementId is optional
            var firebaseConfig = {
                apiKey: "AIzaSyB3YnQ2WaEQWGspxexCKSBc-1dF4kX7lQE",
                authDomain: "smart-surveillance-1eaf6.firebaseapp.com",
                databaseURL: "https://smart-surveillance-1eaf6.firebaseio.com",
                projectId: "smart-surveillance-1eaf6",
                storageBucket: "smart-surveillance-1eaf6.appspot.com",
                messagingSenderId: "301561777685",
                appId: "1:301561777685:web:ea02d8076f1a6a5de7081c",
                measurementId: "G-47LRFVSMHN"
            };
            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);
            firebase.analytics();

            $("#permission").change(function(e) {
                e.preventDefault();
                if(this.checked) {
                    alert('Hey');
                }
                
                // const messaging = firebase.messaging();
                // messaging.requestPermission()
                //     .then(function () {
                //         alert("Notification permission granted.");
                //         console.log("Notification permission granted.");
                //         getRegToken();
                //     })
                //     .catch(function (err) {
                //         alert(err);
                //         console.log("Unable to get permission to notify.", err);
                //     });

                // function getRegToken(argument) {
                //     messaging.getToken()
                //       .then(function(currentToken) {
                //         if (currentToken) {
                //           saveToken(currentToken);
                //           console.log(currentToken);
                //           setTokenSentToServer(true);
                //         } else {
                //           console.log('No Instance ID token available. Request permission to generate one.');
                //           setTokenSentToServer(false);
                //         }
                //       })
                //       .catch(function(err) {
                //         console.log('An error occurred while retrieving token. ', err);
                //         setTokenSentToServer(false);
                //       });
                // }

                // function setTokenSentToServer(sent) {
                //     window.localStorage.setItem('sentToServer', sent ? 1 : 0);
                // }

                // function isTokenSentToServer() {
                //     return window.localStorage.getItem('sentToServer') == 1;
                // }

                // function saveToken(currentToken) {
                //     // $.ajax({
                //     //     url: 'action.php',
                //     //     method: 'post',
                //     //     data: 'token=' + currentToken
                //     // }).done(function(result){
                //     //     console.log(result);
                //     // })
                //     console.log("Token saved to database.");
                // }

                // messaging.onMessage(function(payload) {
                //     console.log("Message received. ", payload);
                //     notificationTitle = payload.data.title;
                //     notificationOptions = {
                //     body: payload.data.body,
                //     icon: payload.data.icon,
                //     image:  payload.data.image
                //   };
                //   var notification = new Notification(notificationTitle,notificationOptions);
                // });
            })
        });
        </script>
    </head>
    <body>
        <div class="loader">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="alpha-app">
            <div class="page-header">
                <nav class="navbar navbar-expand primary">
                    <section class="material-design-hamburger navigation-toggle">
                        <a href="javascript:void(0)" data-activates="slide-out" class="button-collapse material-design-hamburger__icon">
                            <span class="material-design-hamburger__layer"></span>
                        </a>
                    </section>
                    <a class="navbar-brand" href="#">Alpha</a> <br> <a class="navbar-brand" href="#">Welcome <?= $user; ?></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <form class="form-inline my-2 my-lg-0 search">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <label for="search" class="active"><i class="material-icons search-icon">search</i></label>
                            <a href="#" id="close-search-input"><i class="material-icons">close</i></a>
                        </form>
                        <ul class="navbar-nav ml-auto">
                            <li class="d-md-block d-lg-none nav-item">
                                <a class="nav-link search-link" href="#"><i class="material-icons">search</i></a>
                            </li>
                            <li class="nav-item dropdown d-none d-lg-block">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">notifications_none</i>
                                    <span class="badge">1</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right dd-notifications" aria-labelledby="navbarDropdown">
                                    <li class="notification-drop-title">Today</li>
                                    <li>
                                        <a href="#!">
                                        <div class="notification">
                                            <div class="notification-icon circle cyan"><i class="material-icons">done</i></div>
                                            <div class="notification-text"><p><b>Alan Grey</b> uploaded new theme</p><span>7 min ago</span></div>
                                        </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!">
                                        <div class="notification">
                                            <div class="notification-icon circle deep-purple"><i class="material-icons">cached</i></div>
                                            <div class="notification-text"><p><b>Tom</b> updated status</p><span>14 min ago</span></div>
                                        </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!">
                                        <div class="notification">
                                            <div class="notification-icon circle red"><i class="material-icons">delete</i></div>
                                            <div class="notification-text"><p><b>Amily Lee</b> deleted account</p><span>28 min ago</span></div>
                                        </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!">
                                        <div class="notification">
                                            <div class="notification-icon circle cyan"><i class="material-icons">person_add</i></div>
                                            <div class="notification-text"><p><b>Tom Simpson</b> registered</p><span>2 hrs ago</span></div>
                                        </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!">
                                        <div class="notification">
                                            <div class="notification-icon circle green"><i class="material-icons">file_upload</i></div>
                                            <div class="notification-text"><p>Finished uploading files</p><span>4 hrs ago</span></div>
                                        </div>
                                        </a>
                                    </li>
                                    <li class="notification-drop-title">Yestarday</li>
                                    <li>
                                        <a href="#!">
                                        <div class="notification">
                                            <div class="notification-icon circle green"><i class="material-icons">security</i></div>
                                            <div class="notification-text"><p>Security issues fixed</p><span>16 hrs ago</span></div>
                                        </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!">
                                        <div class="notification">
                                            <div class="notification-icon circle indigo"><i class="material-icons">file_download</i></div>
                                            <div class="notification-text"><p>Finished downloading files</p><span>22 hrs ago</span></div>
                                        </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!">
                                        <div class="notification">
                                            <div class="notification-icon circle cyan"><i class="material-icons">code</i></div>
                                            <div class="notification-text"><p>Code changes were saved</p><span>1 day ago</span></div>
                                        </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link right-sidebar-link" href="#"><i class="material-icons">more_vert</i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div><!-- Page Header -->