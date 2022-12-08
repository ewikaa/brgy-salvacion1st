<?php

	date_default_timezone_set('Asia/Manila');
	Class Model {
		private $server = "localhost";
		private $username = "root";
		private $password = "";
		private $dbname = "brgy_salvacion";
		private $conn;

		public function __construct() {
			try {
				$this->conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);	
			} catch (Exception $e) {
				echo "Connection failed" . $e->getMessage();
			}
		}

		//chat

		public function sendMessage($to_id, $from_id, $user_type, $message) {
			$query = "INSERT INTO messages (to_id, from_id, user_type, message, timestamp, status) VALUES (?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$status = 1;
				$date = date("Y-m-d H:i:s");

				$stmt->bind_param("iisssi", $to_id, $from_id, $user_type, $message, $date, $status);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function getGender($stud_id) {
			$query = "SELECT gender FROM residents WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("i", $stud_id);
				$stmt->execute();
				$stmt->bind_result($gender);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						return $gender;
					}
				}
				$stmt->close();
			}
		}

		public function fetchFirstStudent() {
			$data = null;

			$query = "SELECT a.*, b.timestamp FROM residents AS a INNER JOIN messages AS b ON a.id = b.from_id OR b.to_id WHERE (from_id = a.id AND to_id = ?) OR (from_id = ? AND to_id = a.id) AND a.status = 1 ORDER BY b.timestamp DESC LIMIT 1";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $_SESSION['sess'], $_SESSION['sess']);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchFirstStudentReload($id) {
			$data = null;

			$query = "SELECT a.* FROM residents AS a WHERE a.id = ? AND a.status = 1 LIMIT 1";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchStudentsList($id) {
			$data = null;

			$query = "SELECT DISTINCT a.*, b.timestamp FROM residents a INNER JOIN messages b ON a.id = b.from_id OR a.id = b.to_id WHERE ((from_id = a.id AND to_id = ?) OR (from_id = ? AND to_id = a.id)) AND a.status = 1 AND NOT a.id = ? GROUP BY a.id_number ORDER BY b.timestamp DESC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('iii', $_SESSION['sess'], $_SESSION['sess'], $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function updateReadStatus($from_id, $to_id, $user_type) {
			$query = "UPDATE messages SET status = ? WHERE from_id = ? AND to_id = ? AND status = ? AND user_type = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$status = 0;
				$unread_status = 1;
				
				$stmt->bind_param('iiiis', $status, $from_id, $to_id, $unread_status, $user_type);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function fetchMostRecent($stud_id) {
			$data = null;

			$query = "SELECT * FROM messages WHERE (from_id = ? AND to_id = ?) OR (from_id = ? AND to_id = ?) ORDER BY timestamp DESC LIMIT 1";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("iiii", $_SESSION['sess'], $stud_id, $stud_id, $_SESSION['sess']);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}

			return $data;
		}

		public function unreadMessages($stud_id) {
			$query = "SELECT COUNT(*) FROM messages WHERE from_id = ? AND to_id = ? AND status = ? AND user_type = ?";

			if($stmt = $this->conn->prepare($query)) {
				$unread_status = 1;
				$user_type = 'student';

				$stmt->bind_param("iiis", $stud_id, $_SESSION['sess'], $unread_status, $user_type);
				$stmt->execute();
				$stmt->bind_result($count);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						return $count;
					}
				}
			}
		}


		public function fetchMessages($to_id, $from_id) {
			$data = null;

			$query = "SELECT * FROM messages WHERE (from_id = ? AND to_id = ?) OR (from_id = ? AND to_id = ?) ORDER BY timestamp";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("iiii", $from_id, $to_id, $to_id, $from_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchAdmin($admin_id) {
			$data = null;

			$query = "SELECT a.*, b.timestamp FROM admin AS a INNER JOIN messages AS b ON a.id = b.from_id OR b.to_id WHERE a.id = ? OR (from_id = a.id AND to_id = ?) OR (from_id = ? AND to_id = a.id) ORDER BY b.timestamp DESC LIMIT 1";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('iii', $admin_id, $_SESSION['sess2'], $_SESSION['sess2']);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function emptyMessage($admin_id) {
			$data = null;

			$query = "SELECT a.* FROM admin AS a WHERE a.id = ? LIMIT 1";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $admin_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		//end

		public function signIn($uname, $pword) {
			$query = "SELECT id, pword FROM admin WHERE uname = ? LIMIT 1";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $uname);
				$stmt->execute();
				$stmt->bind_result($id, $hashed_pass);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						if (password_verify($pword, $hashed_pass)) {
							$_SESSION['sess'] = $id;
							echo "<script>window.open('admin/index','_self');</script>";
							exit();
						}

						else {
							echo "<script>alert('Wrong Password!');</script>";
							if (empty($_SESSION['lattempt'])) {
								$_SESSION['lattempt'] = 1;
							}
							
							else {
								switch ($_SESSION['lattempt']) {
									case 1:
										$_SESSION['lattempt']++;
										break;
									case 2:
										$_SESSION['lattempt']++;
										break;
									case 3:
										$_SESSION['lattempt']++;
										break;
									default:
										unset($_SESSION['lattempt']);
										setcookie('rlimited', '5', time() + (60), "/");
										setcookie('expiration_date_admin', time() + (60), time() + (60), "/");
										echo "<script>alert('reached limit!')</script>";
								}
							}
						}
					}
				}
				else {
					echo "<script>alert('Email not found in database!');</script>";
				}
				$stmt->close();
			}
			$this->conn->close();
		}

			public function residentSignIn($sid, $sid1, $pw) {
			$query = "SELECT id, password, status, verified FROM residents WHERE email = ? OR contact_number = ?";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("ss", $sid, $sid1);
				$stmt->execute();
				$stmt->bind_result($id, $hashed_pass, $fetched_status, $verified);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						if (password_verify($pw, $hashed_pass)) {
							if ($fetched_status == 1) {
								if ($verified == 1) {
									$_SESSION['sess2'] = $id;
									echo "<script>window.open('residents/homepage', '_self');</script>";
									exit();
								}

								else {
									$_SESSION['sess2'] = $id;
									echo "<script>window.open('residents/homepage', '_self');</script>";
									exit();
								}
							}
							else {
								echo "<script>alert('Account not activated. Please contact Administrator!')</script>";
							}
						}

						else {
							echo "<script>alert('Wrong Password!');</script>";
							if (empty($_SESSION['slattempt'])) {
								$_SESSION['slattempt'] = 1;
							}
							
							else {
								switch ($_SESSION['slattempt']) {
									case 1:
										$_SESSION['slattempt']++;
										break;
									case 2:
										$_SESSION['slattempt']++;
										break;
									case 3:
										$_SESSION['slattempt']++;
										break;
									default:
										unset($_SESSION['slattempt']);
										setcookie('srlimited', '5', time() + (60), "/");
										setcookie('expiration_date', time() + (60), time() + (60), "/");
										echo "<script>alert('Reached limit!');window.open('index.php', '_self')</script>";
								}
							}
						}
					}
				}
				else {
					echo "<script>alert('Email not found in database!');</script>";
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		public function addResident($r_id, $ext, $address3, $bplace, $occupation, $fname, $mname, $lname, $bdate, $gender, $civil_status, $address1, $address2, $res_since, $date, $resident_status, $contact) {
			$sql = "SELECT id FROM residents WHERE id_number = ?";

			if($statement = $this->conn->prepare($sql)) {
				$statement->bind_param("s", $r_id);
				$statement->execute();
				$statement->bind_result($id);
				$statement->store_result();
				if($statement->num_rows > 0) {
					echo "<script>alert('Resident ID already in use!');</script>";

					return false;
				}

				else {
					$query = "INSERT INTO residents (id_number, ext, address3, birth_place, occupation, fname, mname, lname, birth_date, gender, civil_status, address, address2, resident_since, date_registered, email, password, contact_number, status, verified, resident_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, 'N/A', 'N/A', ?, 1, 0, ?)";
			
					if($stmt = $this->conn->prepare($query)) {
						$date = date("Y-m-d H:i:s");
						$status = 2;
						$stmt->bind_param('sssssssssssssssss', $r_id, $ext, $address3, $bplace, $occupation, $fname, $mname, $lname, $bdate, $gender, $civil_status, $address1, $address2, $res_since, $date, $contact, $resident_status);
						$stmt->execute();
						$stmt->close();
						//echo "<script>window.open('success', '_self');</script>";
					}

					return true;
				}
			}
		}

		public function addResident2($r_id, $ext, $address3, $bplace, $occupation, $fname, $mname, $lname, $bdate, $gender, $civil_status, $address1, $address2, $res_since, $date, $resident_status, $contact, $email, $digits) {
			
			$query = "INSERT INTO residents (id_number, ext, address3, birth_place, occupation, fname, mname, lname, birth_date, gender, civil_status, address, address2, resident_since, date_registered, email, password, contact_number, status, verified, resident_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 0, ?)";
			
			if($stmt = $this->conn->prepare($query)) {
				$date = date("Y-m-d H:i:s");
				$status = 2;
				$stmt->bind_param('sssssssssssssssssss', $r_id, $ext, $address3, $bplace, $occupation, $fname, $mname, $lname, $bdate, $gender, $civil_status, $address1, $address2, $res_since, $date, $email, $digits, $contact, $resident_status);
				$stmt->execute();
				$stmt->close();
			}

			return true;
		}

		public function addBlotters($resident_id, $brgy_case, $complaint_name, $age, $gender, $address, $contact, $time, $date, $happened, $accussation, $date_filed) {
			$query = "INSERT INTO blotters (resident_id, brgy_case, complaint_name, age, gender, address, contact, time, date, happened, accussation, date_filed, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if($stmt = $this->conn->prepare($query)) {
				$status = 1;
				$stmt->bind_param('isssssssssssi', $resident_id, $brgy_case, $complaint_name, $age, $gender, $address, $contact, $time, $date, $happened, $accussation, $date_filed, $status);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function importResident($id_number, $fname, $mname, $lname, $gender, $civil_status, $address, $address2, $email, $password, $contact, $birth_date,    $resident_since, $ext, $address3, $birth_place, $occupation, $verified) {
			// $query = "INSERT INTO residents (id_number, fname, mname, lname, gender, civil_status, address, address2, email, password, contact_number, birth_date, status, date_registered) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$query = "INSERT INTO residents (id_number, fname, mname, lname, gender, civil_status, address, address2, email, password, contact_number, birth_date, status, date_registered, resident_since, ext, address3, birth_place, occupation, verified) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if($stmt = $this->conn->prepare($query)) {
				$date = date("Y-m-d H:i:s");
				$status = 1;
				$stmt->bind_param('ssssssssssssissssssi', $id_number, $fname, $mname, $lname, $gender, $civil_status, $address, $address2, $email, $password, $contact, $birth_date, $status, $date, $resident_since, $ext, $address3, $birth_place, $occupation, $verified);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function searchResident($id_number, $last_name) {
			$query = "SELECT id, verified FROM residents WHERE id_number = ? AND lname = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ss', $id_number, $last_name);
				$stmt->execute();
				$stmt->bind_result($id, $verified);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						if ($verified == 0) {
							return $id;
						}

						else {
							return 'verified';
						}
					}
				}

				else {
					return false;
				}
				$stmt->close();
			}
			$this->conn->close();
		}
		
		public function verifiedRegistration($id_number, $address3, $birth_place, $occupation, $address2, $fname, $mname, $lname, $gender, $civil_status, $address, $email, $password, $contact, $birth_date, $id) {
			$query = "UPDATE residents SET id_number = ?, address3 = ?, birth_place = ?, occupation = ?, address2 = ?, fname = ?, mname = ?, lname = ?, gender = ?, civil_status = ?, email = ?, password = ?, contact_number = ?, address = ?, birth_date = ?, verified = ? WHERE id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$verify = 1;

				$stmt->bind_param('sssssssssssssssii', $id_number, $address3, $birth_place, $occupation, $address2, $fname, $mname, $lname, $gender, $civil_status, $email, $password, $contact, $address, $birth_date, $verify, $id);
				$stmt->execute();
				if($stmt->errno == 1062) {
					echo "<script>alert('Email is already registered!');window.open('verify-registration', '_self')</script>";
				} 

				else {
				
				}
				$stmt->close();
			}
		}

		public function verifyResident($id_number, $ext, $address3, $birth_place, $occupation, $address2, $fname, $mname, $lname, $gender, $civil_status, $address, $email, $password, $contact, $birth_date, $id, $resident_since) {
			$query = "UPDATE residents SET id_number = ?, ext = ?, address3 = ?, birth_place = ?, occupation = ?, address2 = ?, fname = ?, mname = ?, lname = ?, gender = ?, civil_status = ?, email = ?, password = ?, contact_number = ?, address = ?, birth_date = ?, verified = ?, resident_since = ? WHERE id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$verify = 1;

				$stmt->bind_param('ssssssssssssssssisi', $id_number, $ext, $address3, $birth_place, $occupation, $address2, $fname, $mname, $lname, $gender, $civil_status, $email, $password, $contact, $address, $birth_date, $verify, $resident_since, $id);
				$stmt->execute();
				if($stmt->errno == 1062) {
					//echo "<script>alert('Email is already registered!');window.open('verify-registration', '_self')</script>";
				} 

				else {
				
				}
				$stmt->close();
			}
		}

		public function updateResident($id_number, $ext, $address3, $birth_place, $occupation, $address2, $fname, $mname, $lname, $gender, $civil_status, $address, $email, $password, $contact, $birth_date, $id) {
			$query = "UPDATE residents SET id_number = ?, ext = ?, address3 = ?, birth_place = ?, occupation = ?, address2 = ?, fname = ?, mname = ?, lname = ?, gender = ?, civil_status = ?, email = ?, password = ?, contact_number = ?, address = ?, birth_date = ?, verified = ? WHERE id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$verify = 1;

				$stmt->bind_param('ssssssssssssssssii', $id_number, $ext, $address3, $birth_place, $occupation, $address2, $fname, $mname, $lname, $gender, $civil_status, $email, $password, $contact, $address, $birth_date, $verify, $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function website_details(){
			$data = null;
			$query = "SELECT * FROM web_details ORDER BY web_id DESC LIMIT 1";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function content_management(){
			$data = null;
			$query = "SELECT * FROM content_management WHERE id = 1";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function editContent($column, $content) {
			$query = "UPDATE content_management SET ".$column." = ? WHERE id = 1";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('s', $content);
				$stmt->execute();
				$stmt->close();
				
			}
		}
		
		public function visits(){
			$data = null;
			$query = "SELECT COUNT(*) as total FROM visit";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function add_visit($date) {
			$query = "INSERT INTO visit (visit_date) VALUES (?)";
			if ($stmt = $this->conn->prepare($query)) {
			    $stmt->bind_param('s', $date);
			    $stmt->execute();
			    $stmt->close();
				return true;
			}
			else {
				return false;
			}
		}

		public function post_message($name, $email, $subject, $message, $date) {
			$query = "INSERT INTO inquiries (name, email, subject, message, date_sent) VALUES (?, ?, ?, ?, ?)";
			if ($stmt = $this->conn->prepare($query)) {
			    $stmt->bind_param('sssss', $name, $email, $subject, $message, $date);
			    $stmt->execute();
			    $stmt->close();
				return true;
			}
			else {
				return false;
			}
		}

		public function displayDepartment() {
			$data = null;

			$query = "SELECT * FROM admin WHERE id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("i", $_SESSION['sess']);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayDepartment2($id) {
			$data = null;
			$query = "SELECT * FROM residents WHERE id = ?";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayResidents($status) {
			$data = null;
			$query = "SELECT * FROM residents WHERE status = ? ORDER BY lname ASC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayResidentsProfile($id) {
			$data = null;
			$query = "SELECT * FROM residents WHERE id = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayResidentsProfileBlotter($id, $blot_status) {
			$data = null;
			$query = "SELECT * FROM blotters WHERE resident_id = ? AND status = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $id, $blot_status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayBlotters($blot_status) {
			$data = null;
			$query = "SELECT a.*, b.*, b.id as blotter_id, a.id as resident_id FROM residents AS a INNER JOIN blotters AS b ON a.id = b.resident_id WHERE b.status = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $blot_status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function changeBlotterStatus($status, $blot_id) {
			$query = "UPDATE blotters SET status = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $status, $blot_id);
				$stmt->execute();
				$stmt->close();
			}
		}
		
		public function changeBlotterStatus2($status, $blot_id) {
			$query = "UPDATE blotters SET blotter_status = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('si', $status, $blot_id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function fetchInquiries(){
			$data = null;
			$query = "SELECT * FROM inquiries ORDER BY id DESC";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function changeResidentStatus($id, $status) {
			$query = "UPDATE residents SET status = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $status, $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function readInquiries() {
			$query = "UPDATE inquiries SET read_unread = 1 WHERE read_unread = 0";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$stmt->close();
			}
		}

		public function deleteInquiry($id) {
			$query = "DELETE FROM inquiries WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$stmt->close();

				echo "<script>window.open('inquiries', '_self');</script>";
			}
		}

		public function count_Inquries(){
			$data = null;
			$query = "SELECT SUM(IF(read_unread = '0',1,0)) as unread, SUM(IF(read_unread = '1',1,0)) as read_already FROM inquiries";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function count_Blotters(){
			$data = null;
			$query = "SELECT SUM(IF(status = '1',1,0)) as tot_blot FROM blotters";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function count_Residents(){
			$data = null;
			$query = "SELECT SUM(IF(verified = '1',1,0)) as verified, SUM(IF(verified = '0',1,0)) as n_verified, SUM(IF(status = '1',1,0)) as not_verified, SUM(IF(status = '2',1,0)) as pending, SUM(IF(gender = 'Male',1,0)) as male, SUM(IF(gender = 'Female',1,0)) as female, SUM(IF(civil_status = 'Single',1,0)) as single, SUM(IF(civil_status = 'Married',1,0)) as married, SUM(IF(civil_status = 'Divorced',1,0)) as divorced, SUM(IF(civil_status = 'Separated',1,0)) as separated, SUM(IF(civil_status = 'Widowed',1,0)) as widowed, SUM(IF(resident_status = 'PWD',1,0)) as pwd, SUM(IF(resident_status = 'Senior Citizen',1,0)) as sc, SUM(IF(resident_status = 'working',1,0)) as working, SUM(IF(resident_status = 'Single Parent',1,0)) as sp FROM residents WHERE status = 1";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}
		
		public function count_Residents2(){
			$data = null;
			$query = "SELECT count(*) as ns FROM residents WHERE resident_status IS NULL";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function count_requests(){
			$data = null;
			$query = "SELECT SUM(IF(status = '1',1,0)) as capproved, SUM(IF(status = '3',1,0)) as cdeclined, SUM(IF(status = '2',1,0)) as cpending FROM request";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function deleteOrgStructure($id) {
			$query = "DELETE FROM org_structure WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function deleteAnnouncement($id) {
			$query = "DELETE FROM announcements WHERE id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function archiveOrgStructure($status, $id) {
			$query = "UPDATE org_structure SET status = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $status, $id);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function editAnnouncement($title, $details, $date, $id) {
			$query = "UPDATE announcements SET title = ?, details = ?, date = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('sssi', $title, $details, $date, $id);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function editImageAnnouncement($image, $image_unique, $id) {
			$query = "UPDATE announcements SET image = ?, image_unique = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssi', $image, $image_unique, $id);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function archiveAnnouncement($status, $id) {
			$query = "UPDATE announcements SET status = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $status, $id);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function addAnnouncement($title, $details, $base, $unique, $date, $category) {
			$query = "INSERT INTO announcements (title, details, image, image_unique, date, status, category) VALUES (?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$status = 1;

				$stmt->bind_param('sssssii', $title, $details, $base, $unique, $date, $status, $category);
				$stmt->execute();
				$stmt->close();

			}
		}
		
		public function addAnnouncement2($title, $details, $base, $unique, $date, $expiration_date, $category) {
			$query = "INSERT INTO announcements (title, details, image, image_unique, date, expiration_date, status, category) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$status = 1;

				$stmt->bind_param('ssssssii', $title, $details, $base, $unique, $date, $expiration_date, $status, $category);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function addStructure($name, $position, $base, $unique, $rendered_service, $status) {
			$query = "INSERT INTO org_structure (name, position, image, image_unique, rendered_service, status) VALUES (?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('sssssi', $name, $position, $base, $unique, $rendered_service, $status);
				$stmt->execute();
				$stmt->close();

				echo "<script>window.open('officials', '_self');</script>";
			}
		}

		public function editStructure($name, $position, $rendered_service, $id) {
			$query = "UPDATE org_structure SET name = ?, position = ?, rendered_service = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('sssi', $name, $position, $rendered_service, $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function editStructureImage($image, $unique, $id) {
			$query = "UPDATE org_structure SET image = ?, image_unique = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssi', $image, $unique, $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function displayAllAnnouncements($status) {
			$data = null;
			$query = "SELECT * FROM announcements WHERE status = ? AND category = '0' ORDER BY date DESC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayAnnouncements($category, $status) {
			$data = null;
			$query = "SELECT * FROM announcements WHERE category = ? AND status = ? ORDER BY id DESC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $category, $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayRecentAnnouncements($category, $status) {
			$data = null;
			$query = "SELECT * FROM announcements WHERE category = ? AND status = ? ORDER BY date DESC LIMIT 5";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $category, $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function displayAnnouncementDetails($category, $status, $id) {
			$data = null;
			$query = "SELECT * FROM announcements WHERE category = ? AND status = ? AND id = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('iii', $category, $status, $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchOrgStructure($status) {
			$data = null;
			$query = "SELECT * FROM org_structure WHERE status = ? ORDER BY position ASC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function editHead($name, $id) {
			$query = "UPDATE content_management SET brgy_head = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('si', $name, $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function editHeadImage($name, $id) {
			$query = "UPDATE content_management SET brgy_head_pic = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('si', $name, $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function editLogo($name, $prev) {
			$query = "UPDATE web_details SET web_icon = ? WHERE web_icon = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ss', $name, $prev);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function addRequest($resident_id, $request_type, $purpose) {
			$query = "INSERT INTO request (resident_id, request_type, purpose, date_issued, status) VALUES (?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$date = date("Y-m-d H:i:s");
				$status = 2;

				$stmt->bind_param('iissi', $resident_id, $request_type, $purpose, $date, $status);
				$stmt->execute();
				$stmt->close();
			}
		}
		
		public function addWalkInRequest($resident_id, $request_type, $purpose) {
		    $query = "INSERT INTO request (resident_id, request_type, purpose, date_issued, date_pickup, status, status2) VALUES (?, ?, ?, ?, ?, ?, ?)";
		    
		    if ($stmt = $this->conn->prepare($query)) {
				$date = date("Y-m-d H:i:s");
				$date_pickup = date("Y-m-d");
				$status = 10;
				$status2 = 'Processing';

				$stmt->bind_param('iisssis', $resident_id, $request_type, $purpose, $date, $date_pickup, $status, $status2);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function fetchRequests() {
			$data = null;

			$query = "SELECT a.*, b.fname, b.mname, b.lname, b.address, b.address2, b.resident_since, b.civil_status, b.id AS resident_id FROM request AS a INNER JOIN residents AS b ON a.resident_id = b.id WHERE a.status = 2 ORDER BY a.id DESC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchRequestsHistory($status) {
			$data = null;

			$query = "SELECT a.*, b.fname, b.mname, b.lname, b.birth_date, b.address, b.address2, b.address3, b.resident_since, b.civil_status, b.id AS resident_id, a.id AS request_id FROM request AS a INNER JOIN residents AS b ON a.resident_id = b.id WHERE a.status = '$status' ORDER BY a.id DESC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchRequestsHistory2($id, $request_type) {
			$data = null;

			$query = "SELECT a.*, b.fname, b.mname, b.lname, b.address, b.address2, b.resident_since, b.civil_status, b.id AS resident_id FROM request AS a INNER JOIN residents AS b ON a.resident_id = b.id WHERE a.resident_id = ? AND a.request_type = ? ORDER BY a.id DESC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $id, $request_type);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function pendingRequestChecker($id, $request_type) {
			$data = null;

			$query = "SELECT * FROM request WHERE resident_id = ? AND request_type = ? AND status = 2 LIMIT 1";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $id, $request_type);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function updateRequestStatus($status, $id) {
			$query = "UPDATE request SET status = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $status, $id);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function approveRequest($date_pickup, $status, $id) {
			$query = "UPDATE request SET date_pickup = ?, status = ?, status2 = 'Processing' WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('sii', $date_pickup, $status, $id);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function changeRequestStatus($status, $id) {
			$query = "UPDATE request SET status2 = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('si', $status, $id);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function updateAdminProfile($name, $contact, $id) {
			$query = "UPDATE admin SET name = ?, contact = ? WHERE id = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssi', $name, $contact, $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function changePassword($id, $pword, $newpword) {
			$query = "SELECT id, pword FROM admin WHERE id = ? LIMIT 1";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $id);
				$stmt->execute();
				$stmt->bind_result($id, $hashed_pass);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						if (password_verify($pword, $hashed_pass)) {
							$sql = "UPDATE admin SET pword = ? WHERE id = ?";
							if ($ya = $this->conn->prepare($sql)) {
								$ya->bind_param("si", $newpword, $id);
								$ya->execute();
								$ya->close();
								echo "<script>alert('Password has been changed!');window.open('settings','_self');</script>";
								exit();
							}
						}
						else {
							echo "<script>alert('Incorrect Current Password');</script>";
							// if (empty($_SESSION['rlattempt'])) {
							// 	$_SESSION['rlattempt'] = 1;
							// }
							
							// else {
							// 	switch ($_SESSION['rlattempt']) {
							// 		case 1:
							// 			$_SESSION['rlattempt']++;
							// 			break;
							// 		case 2:
							// 			$_SESSION['rlattempt']++;
							// 			break;
							// 		case 3:
							// 			$_SESSION['rlattempt']++;
							// 			break;
							// 		case 4:
							// 			$_SESSION['rlattempt']++;
							// 			break;
							// 		default:
							// 			unset($_SESSION['rlattempt']);
							// 			setcookie('rrlimited', '5', time() + (30), "/");
							// 			echo "<script>alert('Reached limit!')</script>";
							// 	}
							// }
						}
					}
				}

				else {
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		public function changeResidentPassword($id, $pword, $newpword) {
			$query = "SELECT id, password FROM residents WHERE id = ? LIMIT 1";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $id);
				$stmt->execute();
				$stmt->bind_result($id, $hashed_pass);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						if (password_verify($pword, $hashed_pass)) {
							$sql = "UPDATE residents SET password = ? WHERE id = ?";
							if ($ya = $this->conn->prepare($sql)) {
								$ya->bind_param("si", $newpword, $id);
								$ya->execute();
								$ya->close();
								echo "<script>alert('Password has been changed!');window.open('homepage','_self');</script>";
								exit();
							}
						}
						else {
							echo "<script>alert('Incorrect Current Password');</script>";
							// if (empty($_SESSION['rlattempt'])) {
							// 	$_SESSION['rlattempt'] = 1;
							// }
							
							// else {
							// 	switch ($_SESSION['rlattempt']) {
							// 		case 1:
							// 			$_SESSION['rlattempt']++;
							// 			break;
							// 		case 2:
							// 			$_SESSION['rlattempt']++;
							// 			break;
							// 		case 3:
							// 			$_SESSION['rlattempt']++;
							// 			break;
							// 		case 4:
							// 			$_SESSION['rlattempt']++;
							// 			break;
							// 		default:
							// 			unset($_SESSION['rlattempt']);
							// 			setcookie('rrlimited', '5', time() + (30), "/");
							// 			echo "<script>alert('Reached limit!')</script>";
							// 	}
							// }
						}
					}
				}

				else {
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		public function fetchIdCounter() {
			$query = "SELECT id FROM id_counter ORDER BY id DESC";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$stmt->bind_result($id_counter);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						return $id_counter;
					}
				}
				else {
					return false;
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		public function updateIdCounter() {
			$query = "INSERT INTO id_counter (id) VALUES (NULL)";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$stmt->close();
			}
		}

		public function deleteAnnouncements($status, $category) {
			$query = "DELETE FROM announcements WHERE status = ? AND category = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("ii", $status, $category);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function deleteAllOrgStructure($status) {
			$query = "DELETE FROM org_structure WHERE status = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("i", $status);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function insertContactNumber($contact) {
			$query = "INSERT INTO contact (contact_num) VALUES (?)";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $contact);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function fetchContactNumbers() {
			$data = null;
			$query = "SELECT * FROM contact";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function deleteContactNumber($id) {
			$query = "DELETE FROM contact WHERE id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$stmt->close();
			}
		}
		
		public function verifyResidentAccount($id) {
			$query = "UPDATE residents SET email_verif = 1, verified = 1 WHERE id = ?";
			
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$stmt->close();
			}
		}
		
		public function insertReply($id, $reply) {
		    $query = "INSERT INTO reply (inquiry_id, reply, date_sent) VALUES (?, ?, ?)";
		    
		    if($stmt = $this->conn->prepare($query)) {
		        $date = date("Y-m-d H:i:s");
		        
				$stmt->bind_param('iss', $id, $reply, $date);
				$stmt->execute();
				$stmt->close();
			}
		}
		
		public function updateRepliedStatus($id) {
		    $query = "UPDATE inquiries SET replied = 1 WHERE id = ?";
		    
		    if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$stmt->close();
			}
		}
		
		public function fetchReplyDetails($id) {
		    $data = null;
		    
		    $query = "SELECT * FROM reply WHERE inquiry_id = ?";
		    
		    if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}
		
		public function verifiedChangePassword($id, $password) {
			$query = "UPDATE residents SET password = ? WHERE id = ?";
			
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('si', $password, $id);
				$stmt->execute();
				$stmt->close();
			}
		}
		
		public function updateResidentStatus($status, $id) {
		    $query = "UPDATE residents SET resident_status = ? WHERE id = ?";
		    
		    if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('si', $status, $id);
				$stmt->execute();
				$stmt->close();
			}
		}
		
		public function fetchResidentDetails($id_number) {
		    $data = null;
		    
		    $query = "SELECT * FROM residents WHERE id_number = ?";
		    
		    if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('s', $id_number);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}
		
		public function insertCensus($room_number, $house_number, $block_number, $lot_number, $street, $subdivision, $monthly_income, $salary, $business, $remittance, $others, $head_fname, $head_mname, $head_lname, $head_sname, $head_gender, $head_civil_status, $head_birthday, $head_email, $head_contact, $head_employed, $head_self_employed, $head_informal, $head_solo_parent, $head_pwd, $resident_id) {
			$query = "INSERT INTO census (room_number, house_number, block_number, lot_number, street, subdivision, monthly_income, salary, business, remittance, others, head_fname, head_mname, head_lname, head_sname, head_gender, head_civil_status, head_birthday, head_email, head_contact, head_employed, head_self_employed, head_informal, head_solo_parent, head_pwd, resident_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('sssssssiiissssssssssiiiiii', $room_number, $house_number, $block_number, $lot_number, $street, $subdivision, $monthly_income, $salary, $business, $remittance, $others, $head_fname, $head_mname, $head_lname, $head_sname, $head_gender, $head_civil_status, $head_birthday, $head_email, $head_contact, $head_employed, $head_self_employed, $head_informal, $head_solo_parent, $head_pwd, $resident_id);
				$stmt->execute();
				$last_id = $this->conn->insert_id;
				$stmt->close();
			}

			return $last_id;
		}

		public function insertHouseholdMember($fname, $mname, $lname, $sname, $gender, $civil_status, $birthday, $email, $contact, $head_relation, $employed, $self_employed, $informal, $solo_parent, $pwd, $census_id, $resident_id) {
			$query = "INSERT INTO census_household (fname, mname, lname, sname, gender, civil_status, birthday, email, contact, head_relation, employed, self_employed, informal, solo_parent, pwd, census_id, resident_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssssssssssiiiiiii', $fname, $mname, $lname, $sname, $gender, $civil_status, $birthday, $email, $contact, $head_relation, $employed, $self_employed, $informal, $solo_parent, $pwd, $census_id, $resident_id);
				$stmt->execute();
				$stmt->close();
			}
		}
		
		public function displayCensus() {
			$data = null;
			$query = "SELECT * FROM census";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}
		
		public function displayCensusProfile($id) {
			$data = null;
			$query = "SELECT * FROM census WHERE resident_id = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}
		
		public function displayCensusHousehold($id) {
			$data = null;
			$query = "SELECT * FROM census_household WHERE resident_id = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}
		
		public function deleteCensus($id) {
			$query = "DELETE FROM census WHERE census_id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$stmt->close();

			}
		}

		public function blotterChart(){
			$data = null;
			$query = "SELECT 
			SUM(IF(accussation = 'Arrest report',1,0)) as one, 
			SUM(IF(accussation = 'Incident report',1,0)) as two, 
			SUM(IF(accussation = 'Crime report',1,0)) as three, 
			SUM(IF(accussation = 'Accident report',1,0)) as four, 
			SUM(IF(accussation = 'Others',1,0)) as five FROM blotters WHERE status = 1";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function updateResidentPhoto($unique) {
			$query = "UPDATE residents SET photo = ? WHERE id = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('si', $unique, $_SESSION['sess2']);
				$stmt->execute();
				$stmt->close();
			}
		}

	}
?>