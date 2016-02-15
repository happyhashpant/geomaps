<!DOCTYPE html>
<html>
<head>
	
    <style type="text/css">
	p{color:white}
	h1#hcuerpo{background-image: url("hbackground.jpg");}
	body#cuerpo{background-image: url("bodybackground.jpg");}
      html, body { height: 100%; margin: 0; padding: 0; }
      #map { height: 100%; }
	  ul.menu {
    		padding: 0;
	}

	ul.menu li {
    		display: inline;
	}

	ul.menu li a {
    		background-color:blue;
    		color: white;
    		padding: 10px 20px;
    		text-decoration: none;
    		border-radius: 4px 4px 0 0;
	}

	ul.menu li a:hover {
    		background-color:green;
	}
    </style>
  </head>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "geomaps";
	$latitud;
	$longitud;
	$email;
	$numeroTelf;
	$horario;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
$sql = "CALL lugar('EPA Heredia')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $latitud= $row["latitud"];
		$longitud= $row["longitud"];
		$email= $row["email"];
		$numeroTelf=$row["numero_telefono"];
		$horario=$row["horario"];
	    }
} else {
    echo "0 results";
}

$conn->close();
	?>
	
<body id="cuerpo">
<h1 id="hcuerpo"style="text-align:center; font-family:courier";>Ferreteria EPA Heredia</h1>
</body>
<body>
<ul class="menu">
<li><a href="ferreterias.html"> Regresar</a></li>
</ul>
</body<
<body>

<img src="logoEpa.jpg" alt="Logo Epa" style="width:60px;height:60px;border:0">
<p>Numero de telefono: <?php echo $numeroTelf ?></p>
<p>Email:<?php echo $email ?></p>
<p>Horario de atencion:<?php echo $horario ?></p>

</body<

<body>


<div id="map"></div>
<script type="text/javascript">


var map;
function initMap() {
var myLatLng = {lat: 10.098676, lng:-84.379585};
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 10.098676, lng:-84.379585},
    zoom: 18
  });
	var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    
  });
}

    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_T3g4EccwDspiqVKV4JUvAbUuxTs1tDc&callback=initMap">

    </script>
  </body>

</html>
