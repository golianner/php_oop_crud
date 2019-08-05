<?php

/**
 * 
 */
class DbOperation
{

	private $con;
	
	function __construct()
	{
		session_start();
		require_once "DbConnect.php";

		$db = new DbConnect();

		$this->con = $db->connect();
		// Add another $con if you have 2 database or more
	}

	function base_url(){
		return "http://localhost/crud_mhs/";
	}

	// Query
	function get_mahasiswa(){
		try {
			$stmt = $this->con->prepare("SELECT * FROM kmps_mahasiswa");
			$stmt->execute();
			return $stmt;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

	function login($username, $password){
		try {
			$stmt = $this->con->prepare("SELECT id FROM kmps_admin WHERE username = ? AND password = ?");
			$stmt->bind_param('ss', $username, $password);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows();
		} catch (Exception $e) {
			return $e->getMessage();	
		}
	}

	// Tambah Data Mahasiswa
	function insert_mahasiswa($nama, $email, $tgl_lahir, $kelas){
		try {
			$stmt = $this->con->prepare("INSERT INTO kmps_mahasiswa(nama, email, tgl_lahir, kelas) VALUES (?, ?, ?, ?)");
			$stmt->bind_param('ssss', $nama, $email, $tgl_lahir, $kelas);
			$stmt->execute();
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	// Get Mahasiswa by ID
	function get_mhs_by_id($id){
		try {
			$stmt = $this->con->prepare("SELECT * FROM kmps_mahasiswa WHERE id = ?");
			$stmt->bind_param('s',$id);
			$stmt->execute();
			return $stmt;
		} catch (Exception $e) {
			return $e->getMessage();
		}	
	}

	// Update Mahasiswa
	function update_mahasiswa($nama, $email, $tgl_lahir, $kelas, $id){
		try {
			$stmt = $this->con->prepare("UPDATE kmps_mahasiswa SET nama = ?, email = ?, tgl_lahir = ?, kelas = ? WHERE id = ?");
			$stmt->bind_param('sssss', $nama, $email, $tgl_lahir, $kelas, $id);
			$stmt->execute();
			return true;
		} catch (Exception $e) {
			return false;
		}
	}	

	function delete_mahasiswa($id){
		try {
			$stmt = $this->con->prepare("DELETE FROM kmps_mahasiswa WHERE id = ?");
			$stmt->bind_param('s', $id);
			$stmt->execute();
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	function cek_login(){
		if (isset($_SESSION['akun_login'])) {
			return true;
		} else {
			return false;
		}
	}

}