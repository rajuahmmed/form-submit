<?php

class Entry extends Model {
	public function get() {
		$db = Database::get_db();
		$result = $db->query("SELECT * FROM submissions");
		$entries = $result->fetch_all( MYSQLI_ASSOC );
		$db->close();

		return $entries;
	}
	public function add( $data ) {
		$db = Database::get_db();
		$stmt = $db->prepare("INSERT INTO `submissions` (`id`, `amount`, `buyer`, `receipt_id`, `items`, `buyer_email`, `buyer_ip`, `note`, `city`, `phone`, `hash_key`, `entry_at`, `entry_by`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");

		$stmt->bind_param('ssssssssssss', $amount, $buyer, $receipt_id, $items, $buyer_email, $buyer_ip, $note, $city, $phone, $hash_key, $entry_at, $entry_by );

		$amount      = $data['amount'];
		$buyer       = $data['buyer'];
		$receipt_id  = $data['receipt_id'];
		$items       = $data['items'];
		$buyer_email = $data['buyer_email'];
		$buyer_ip    = $data['buyer_ip'];
		$note        = $data['note'];
		$city        = $data['city'];
		$phone       = $data['phone'];
		$hash_key    = $data['hash_key'];
		$entry_at    = $data['entry_at'];
		$entry_by    = $data['entry_by'];

		$result = $stmt->execute();
		$stmt->close();

		$db->close();

		return $result;
	}
}
