<?php

include("conf.php");
include("DB.php");
include("Task.php");
include("Template.php");

// Membuat objek dari kelas task
$otask = new Task($db_host, $db_user, $db_password, $db_name);
$otask->open();

// Memanggil method getTask di kelas Task
$otask->getTask();

// checking if form has been submitted
if (isset($_POST['add'])) {
	// insert all value from form to each variable
	$taskName = $_POST['tname'];
	$taskDetails = $_POST['tdetails'];
	$taskSubject = $_POST['tsubject'];
	$taskPriority = $_POST['tpriority'];
	$taskDeadline = $_POST['tdeadline'];

	// then insert all value as a parameter for addTask function
	$otask->addTask($taskName, $taskDetails, $taskSubject, $taskPriority, $taskDeadline);
	header("location:index.php");
}

// checking if Hapus button has been clicked
if (isset($_GET['id_hapus'])){
	// insert id_hapus value to a variable
	$id = $_GET['id_hapus'];

	// execute the deleteTask function
	$otask->deleteTask($id);
	header("location:index.php");
}

// checking if Selesai button has been clicked
if (isset($_GET['id_status'])){
	// insert id_status value to a variable
	$id = $_GET['id_status'];

	// execute the changeTaskStatus function
	$otask->changeTaskStatus($id);
	header("location:index.php");
}

// checking if sorting button has been clicked
if (isset($_GET['sortingTask'])) {
	// execute the sorting function
	$category = $_GET['sortingTask'];
	if ($category == "reset") {
		$otask->getTask();
	}else if ($category == "priority_td") {
		$otask->sortingTask(0, $category);
	}else {
		$otask->sortingTask(1, $category);
	}
	// header("location:index.php");
}

// Proses mengisi tabel dengan data
$data = null;
$no = 1;

while (list($id, $tname, $tdetails, $tsubject, $tpriority, $tdeadline, $tstatus) = $otask->getResult()) {
	// Tampilan jika status task nya sudah dikerjakan
	if($tstatus == "Sudah"){
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $tname . "</td>
		<td>" . $tdetails . "</td>
		<td>" . $tsubject . "</td>
		<td>" . $tpriority . "</td>
		<td>" . $tdeadline . "</td>
		<td>" . $tstatus . "</td>
		<td>
		<button class='btn btn-danger'><a href='index.php?id_hapus=" . $id . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		</td>
		</tr>";
		$no++;
	}

	// Tampilan jika status task nya belum dikerjakan
	else{
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $tname . "</td>
		<td>" . $tdetails . "</td>
		<td>" . $tsubject . "</td>
		<td>" . $tpriority . "</td>
		<td>" . $tdeadline . "</td>
		<td>" . $tstatus . "</td>
		<td>
		<button class='btn btn-danger'><a href='index.php?id_hapus=" . $id . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		<button class='btn btn-success' ><a href='index.php?id_status=" . $id .  "' style='color: white; font-weight: bold;'>Selesai</a></button>
		</td>
		</tr>";
		$no++;
	}
}

// Menutup koneksi database
$otask->close();

// Membaca template skin.html
$tpl = new Template("templates/skin.html");

// Mengganti kode Data_Tabel dengan data yang sudah diproses
$tpl->replace("DATA_TABEL", $data);

// Menampilkan ke layar
$tpl->write();