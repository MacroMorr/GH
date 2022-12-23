<?php
include 'db.php';

$getId = intval($_GET['id']);

//$valveWatering = intval($_POST['valve_watering']);
//$volume = floatval($_POST['volume']);
//$ec = floatval($_POST['EC']);
//$pH = floatval($_POST['pH']);
//$name = $_POST['type'];
//$department = floatval($_POST['department']);

$valveWatering = $_POST['valve_watering'];
$volume = $_POST['volume'];
$ec = $_POST['EC'];
$pH = $_POST['pH'];
$name = $_POST['type'];
$department = $_POST['department'];
$error = "Проверьте достоверность данных";

//preg_match("/^[0-9]$/", $valveWatering) &&
//preg_match("/^[-+]?[0-9]*[.,]?[0-9]+(?:[eE][-+]?[0-9]+)?$/", $volume) &&
//preg_match("/^[-+]?[0-9]*[.,]?[0-9]+(?:[eE][-+]?[0-9]+)?$/", $ec) &&
//preg_match("/^[-+]?[0-9]*[.,]?[0-9]+(?:[eE][-+]?[0-9]+)?$/", $pH)

// insert
if (isset($_POST['add'])) {
    if (
        preg_match("/^[0-9]$/", $valveWatering) &&
        preg_match("/^[-+]?[0-9]*[.,]?[0-9]+(?:[eE][-+]?[0-9]+)?$/", $volume) &&
        preg_match("/^[-+]?[0-9]*[.,]?[0-9]+(?:[eE][-+]?[0-9]+)?$/", $ec) &&
        preg_match("/^[-+]?[0-9]*[.,]?[0-9]+(?:[eE][-+]?[0-9]+)?$/", $pH)
    ) {
        $sql = "INSERT INTO sample (name, department, valve_watering, volume, EC, pH) VALUES (?,?,?,?,?,?)";
        $query = $pdo->prepare($sql);

        $insN = $name;
        $insD = $department;
        $query->execute([$name, $department, $valveWatering, $volume, $ec, $pH]);

        if ($query) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    } else {
        echo $error;
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
    if (
        preg_match("/^[0-9]$/", $valveWatering) &&
        preg_match("/^[-+]?[0-9]*[.,]?[0-9]+(?:[eE][-+]?[0-9]+)?$/", $volume) &&
        preg_match("/^[-+]?[0-9]*[.,]?[0-9]+(?:[eE][-+]?[0-9]+)?$/", $ec) &&
        preg_match("/^[-+]?[0-9]*[.,]?[0-9]+(?:[eE][-+]?[0-9]+)?$/", $pH)
    ) {
        $updateDepartment = floatval($_POST['department']);
        $sql = "UPDATE sample SET name = ?, department = ?, valve_watering = ?, volume = ?, EC = ?, pH = ? WHERE id = ?";
        $query = $pdo->prepare($sql);

        $query->execute([$name, $updateDepartment, $valveWatering, $volume, $ec, $pH, $getId]);
        $a = 0;
        if ($query) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    } else {
        echo $error;
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

