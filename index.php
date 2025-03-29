<?php
//FICHIER D'EXECUTION
include "./utils/utils.php";
include "./interface/interfaceModel.php";
include "./abstract/abstractController.php";
include "./model/playerModel.php";
include "./controller/playerController.php";
include "./view/header.php";
include "./view/footer.php";
include "./view/viewPlayer.php";

$controller = new PlayerController();

$controller->render();
