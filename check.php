<?php
require 'connection.php';
$data = $_POST;
if (isset($data['post_data'])) {
	$database = new Database();
	$db = $database->getConnection();
	$sql = "SELECT * FROM users WHERE {$data['post_id']} = :post_data";
	$stmt = $db->prepare($sql);
	$stmt->execute(array(
		':post_data' => $data['post_data']
	));
	$rows = $stmt->fetchColumn();

	if (trim($data['post_data']) === '') {
		return;
	} else if ($rows > 0) {
		echo "{$data['post_id']} is reserved";
	} else {
		echo "Valid {$data['post_id']}";
	}
}
