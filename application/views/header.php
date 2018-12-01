<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $title?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ng-table/1.0.0/ng-table.css'/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css');?>">
  </head>
  <body ng-app='myApp' ng-controller="myCtrl">
    <div class="container-fluid">
      <div class="row headsection">
        <div class='col-md-2'></div>
        <div class="col-md-8 text-center">
          <h1><?php echo $heading?></h1>
        </div>  
        <div class='col-md-2'>
          <a name="" id="" class="btn btn-lg btn-light" href="#!tabulation" role="button">See Tabulation</a>
        </div>
      </div>