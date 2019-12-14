<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="css/style.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/fa-fonts.css">

</head>
<body>
    



<div class="splash">



<!-- TOP NAV BAR START -->

<nav class="navbar navbar-icon-top navbar-expand-lg">
            <a class="navbar-brand" href="main.php"
                style="font-family: Caviar Dreams; font-size: 33px; margin-top: 30px; color: rgb(231, 69, 69)">DiagnoX.ai</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul style="list-style-type: none;" style="list-style-type: none;" class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a style="
                text-decoration: none;" class="nav-link" href="main.php">
                            <i class="fa fa-home"></i>
                            Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a style="
                text-decoration: none;" class="nav-link" href="diagnose.php">
                            <i class="fa fa-plus-square">
                                <!-- <span class="badge badge-danger">11</span> -->
                            </i>
                            Try Demo
                        </a>
                    </li>

                    <li class="nav-item">
                        <a style="
                text-decoration: none;" class="nav-link" href="pricing.php">
                            <i class="fa fa-usd">
                                <!-- <span class="badge badge-danger">11</span> -->
                            </i>
                            Pricing
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a style="
              text-decoration: none;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-building">
                                <!-- <span class="badge badge-primary">11</span> -->
                            </i>
                            Company
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a style="
                text-decoration: none; margin-bottom: 15px" class="dropdown-item" href="#">About US</a>
                            <div class="dropdown-divider"></div>
                            <a style="
                text-decoration: none;" class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a style="
              text-decoration: none;" class="nav-link" href="contact-form.php">
                            <i class="fa fa-envelope">
                                <span class="badge badge-danger">11</span>
                            </i>
                            Contact
                        </a>
                    </li>
                    <!-- <li class="nav-item">
              <a style="
              text-decoration: none;" class="nav-link disabled" href="#">
                <i class="fa fa-envelope-o">
                  <span class="badge badge-warning">11</span>
                </i>
                Disabled
              </a>
            </li> -->
                    <!-- <li class="nav-item dropdown">
              <a style="
              text-decoration: none;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-envelope-o">
                  <span class="badge badge-primary">11</span>
                </i>
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a style="
                text-decoration: none;" class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li> -->
                </ul>
                <div class="header-right">
                <ul style="list-style-type: none;" class="navbar-nav">
                                <li class="nav-item">
                                   

                                <?php if(isset($_SESSION['email'])==null)
                                        {
                                            echo '<a style="
                                            text-decoration: none;" class="nav-link" href="login.php">
                                                              <i class="fa fa-sign-in">
                              
                                                              </i>';
                                            echo "Login";
                                        }
                                        else {
                                            echo '<a style="
                                            text-decoration: none; color:orange;" class="nav-link" href="logout.php">
                                                              <i class="fa fa-sign-out">
                              
                                                              </i>';

                                            echo 'Logout';
                                            echo "<br>";
                                            if(isset($_SESSION['email'])) echo $_SESSION['email'];

                                        }
                                        ?>
                            </a>
                        </li>

                        <li class="nav-item">
                                <?php if(isset($_SESSION['email'])==null)
                                        {
                                           echo' <a style="
                      text-decoration: none;" class="nav-link" href="register.php">
                                        <i class="fa fa-user-plus">
                                        </i>
                                        Register
                                    </a>';
                                        }
                                        ?>
                                    
                                </li>


                    </ul>


                </div>
                <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form> -->
            </div>
        </nav>

<!-- TOP NAVBAR END -->
<div class="row">

<div class="col-md-12 col-sm-6 col-xs-12">
<div id="map" ></div>
</div>


</div>


<?php include_once('footer.html') ?>

        </div>

          


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAvtt-qJvzDJB9kUWOtRFTQ2AKFuvvYH8&libraries=places&callback=initMap" async defer></script>

</body>
</html>



<style>


/* html,
body {
  margin: 0;
  padding: 0;
} */

#map {
  height: 500px;
  /* margin: 10px auto; */
 /* / width: 800px; */
}
</style>




<script>

var map;

function initMap() {
  if (navigator.geolocation) {
    try {
      navigator.geolocation.getCurrentPosition(function(position) {
        var myLocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        setPos(myLocation);
      });
    } catch (err) {
      var myLocation = {
        lat: 23.8701334,
        lng: 90.2713944
      };
      setPos(myLocation);
    }
  } else {
    var myLocation = {
      lat: 23.8701334,
      lng: 90.2713944
    };
    setPos(myLocation);
  }
}

function setPos(myLocation) {
  map = new google.maps.Map(document.getElementById('map'), {
    center: myLocation,
    zoom: 10
  });

  var service = new google.maps.places.PlacesService(map);
  service.nearbySearch({
    location: myLocation,
    radius: 1000000,
    types: ['hospital']
  }, processResults);

}

function processResults(results, status, pagination) {
  if (status !== google.maps.places.PlacesServiceStatus.OK) {
    return;
  } else {
    createMarkers(results);

  }
}

function createMarkers(places) {
  var bounds = new google.maps.LatLngBounds();
  var placesList = document.getElementById('places');

  for (var i = 0, place; place = places[i]; i++) {
    var image = {
      url: place.icon,
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(25, 25)
    };

    var marker = new google.maps.Marker({
      map: map,
      icon: image,
      title: place.name,
      animation: google.maps.Animation.DROP,
      position: place.geometry.location
    });

    bounds.extend(place.geometry.location);
  }
  map.fitBounds(bounds);
}
</script>