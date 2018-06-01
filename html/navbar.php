<?php 
  $ActiveHome = "";
  $ActiveCall = "";
  $ActiveDate = "";
  $ActiveVisit = "";

  if ($alias == "home") {
    $ActiveHome = "active";
  }else if ($alias == "call") {
    $ActiveCall = "active";
  }else if ($alias == "date") {
    $ActiveDate = "active";
  }else if ($alias == "visit") {
    $ActiveVisit = "active";
  }else{
    $active = "";
  }

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">CAV</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse text-center" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class=<?php echo '"nav-item '.$ActiveHome.'">' ?>
        <a class="nav-link" href="home"><i class="fas fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class=<?php echo '" nav-item '.$ActiveCall.'">' ?>
        <a class="nav-link" href="calls"><i class="fas fa-phone-volume"></i> Llamadas</a>
      </li>
      <li class=<?php echo '" nav-item '.$ActiveDate.'">' ?>
        <a class="nav-link" href="date"><i class="fas fa-address-book"></i> Citas</a>
      </li>
      <li class=<?php echo '" nav-item '.$ActiveVisit.'">' ?>
        <a class="nav-link" href="visit"><i class="fas fa-people-carry"></i> Visitas</a>
      </li>
    </ul>
    <span class="navbar-text">
      <?php
      $datesys = date("d-m-Y"); 
      print '<a href="lib/logout.php"><i class="fas fa-sign-out-alt"></i>Salir</a><p>'.$nombre." ".$apellido.' '.$cargo.' <br><i class="fas fa-calendar-alt"></i> '.$datesys. '</p>'?>
    </span>
  </div>
</nav>