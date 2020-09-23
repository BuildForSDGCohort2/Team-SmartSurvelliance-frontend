<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
	
	<style type="text/css">
.hover{background-color: #cc0000}
#container{ margin:0px auto; width: 800px}
.button {
font-weight: bold;
padding: 7px 9px;
background-color: #5fcf80;
color: #fff !important;
font-size: 12px;
font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
cursor: pointer;
text-decoration: none;
text-shadow: 0 1px 0px rgba(0,0,0,0.15);
border-width: 1px 1px 3px !important;
border-style: solid;
border-color: #3ac162;
white-space: nowrap;
overflow: hidden;
text-overflow: ellipsis;
display: -moz-inline-stack;
display: inline-block;
vertical-align: middle;
zoom: 1;
border-radius: 3px;
box-sizing: border-box;
box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
}
.authorBlock{border-top:1px solid #cc0000;}
</style>
</head>
<body>

	<div id="container">
                <h1>Space-O Browser notification demo</h1>

                <h4>Generate Notification with tap on Notification</h4>
                <a href="#" id="notificationlabel" class="button">Notification</a>
            </div>

            <script>
                $(document).ready(function() {
                    $('#notificationlabel').click('on', function(e) {
                        e.preventDefault();
                        // alert('Hey');
                        showNotification();
                        // setInterval(function(){ showNotification(); }, 10000);
                    })
                    
                });
            </script>a

</body>
</html>