<?php
// Load DB
include "ConfigDb.php";

// Load core classes
include "core/Model.php";
include "core/Controller.php";

// Load model classes - they extend Model.php
include "model/AddressesModel.php";
include "model/EmployeesModel.php";

// Load Controller class - it extends Controller.php
include 'controller/FilterInput.php';
include "controller/MainController.php";
include 'controller/EmployeeController.php';
include 'controller/AddressController.php';
include 'controller/RouteController.php';


$route = new RouteController();
$route->route();





