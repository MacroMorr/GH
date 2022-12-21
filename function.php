<?php
include 'db.php';

$getId = intval($_GET['id']);

$valveWatering = intval($_POST['valve_watering']);
$volume = floatval($_POST['volume']);
$ec = floatval($_POST['EC']);
$pH = floatval($_POST['pH']);
$name = $_POST['type'];
$department = floatval($_POST['department']);

// insert
if (isset($_POST['add'])) {
    $sql = "INSERT INTO sample (name, department, valve_watering, volume, EC, pH) VALUES (?,?,?,?,?,?)";
    $query = $pdo->prepare($sql);

    $insN = $name;
    $insD = $department;
    $query->execute([$name, $department, $valveWatering, $volume, $ec, $pH]);

    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

// read
$sqlNameDepartment = $pdo->prepare("SELECT name FROM `type`");
$sqlNameDepartment->execute();
$typeName = $sqlNameDepartment->fetchAll(PDO::FETCH_OBJ);

$sqlSample = $pdo->prepare("SELECT name FROM department");
$sqlSample->execute();
$department = $sqlSample->fetchAll(PDO::FETCH_OBJ);

$sqlSample = $pdo->prepare("SELECT * FROM sample");
$sqlSample->execute();
$sampleAll = $sqlSample->fetchAll(PDO::FETCH_OBJ);

// update
if (isset($_POST['edit'])) {
    $updateDepartment = floatval($_POST['department']);
    $sql = "UPDATE sample SET name = ?, department = ?, valve_watering = ?, volume = ?, EC = ?, pH = ? WHERE id = ?";
    $query = $pdo->prepare($sql);

    $bName = $name;
    $bDepartment = $updateDepartment;
    $bValverWatering = $valveWatering;
    $bVolume = $volume;
    $bEC = $ec;
    $bPH = $pH;
    $bGET_ID = $getId;

    $query->execute([$name, $updateDepartment, $valveWatering, $volume, $ec, $pH, $getId]);
    $a = 0;
    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

// delete
if (isset($_POST['delete'])) {
    $sql = "DELETE FROM sample where id = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$getId]);
    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
