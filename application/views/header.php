<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $title?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/tooth.png');?>"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <link rel='stylesheet' href='<?php echo base_url('assets/css/ng-table.css');?>'/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome.css');?>">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css');?>">
  </head>
  <body ng-app='myApp'>
    <div class="container-fluid">
      <div class="row headsection">
        <div class="col-md-4 text-center">
          <h2><?php echo $heading?></h2>
        </div>  
        <div class='offset-md-4 col-md-4'>
          <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a name="" id="" class="btn-light nav-link" href="#!" role="button">Home</a>
                </li>
                <li class="nav-item">
                  <a name="" id="" class="btn-light nav-link" href="#!complaints" role="button">Complaints</a>
                </li>
                <li class="nav-item">
                  <a name="" id="" class="btn-light nav-link" href="#!findings" role="button">Findings</a>
                </li>
                <li class="nav-item dropdown">
                  <a name="" id="navbarDropdownMenuLink" class="btn-light nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Masters</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#!ageranges">Age Ranges Data</a>
                    <a class="dropdown-item" href="#!genders">Genders Data</a>
                    <a class="dropdown-item" href="#!matches">Matches Data</a>
                    <a class="dropdown-item" href="#!entries">Entries Data</a>
                    <a class="dropdown-item" href="#!complaintsmaster">Complaints List</a>
                    <a class="dropdown-item" href="#!findingsmaster">Findings List</a>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>