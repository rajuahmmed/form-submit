<?php
class Form extends Controller {
	protected $title = 'Add New Entry';
	protected $model_class = 'Entry';
	protected $view = 'form';
	protected $errors = [
		'status' => false,
		'messages' => [],
	];
	protected $cookie_name = 'test_buyer';
	protected $submitted = false;

	public function __construct() {
		parent::__construct();
		$this->add_new();
		$this->set_items();
	}

	public function set_items() {
		$this->set( [
			'items' => Items::get(),
		] );
	}

	public function add_new() {
		$buyer_name = ! empty( $_POST['name'] ) ? trim($_POST['name']) : '';
		$buyer_email = ! empty( $_POST['email'] ) ? trim($_POST['email']) : '';
		$amount = ! empty( $_POST['amount'] ) ? intval( $_POST['amount'] ) : '';
		$receipt_id = ! empty( $_POST['receipt_id'] ) ? trim($_POST['receipt_id']) : '';
		$items = ! empty( $_POST['items'] ) ? trim($_POST['items']) : '';
		$city = ! empty( $_POST['city'] ) ? trim($_POST['city']) : '';
		$phone = ! empty( $_POST['phone'] ) ? trim($_POST['phone']) : '';
		$entry_by = ! empty( $_POST['entry_by'] ) ? intval($_POST['entry_by']) : '';
		$note = ! empty( $_POST['note'] ) ? trim($_POST['note']) : '';

		if ( empty( $buyer_name ) && empty( $buyer_email ) && empty( $amount ) && empty( $receipt_id ) && empty( $items ) && empty( $city ) && empty( $phone ) && empty( $entry_by ) && empty( $note ) ) {
			return;
		}

		$is_ajax = ! empty( $_POST['ajax'] ) ? intval( $_POST['ajax'] ) : 0;

		$this->errors = [
			'status' => false,
			'messages' => [],
		];

		if( isset( $_COOKIE[ $this->cookie_name ] ) && intval( $_COOKIE[ $this->cookie_name ] ) ) {
			$this->add_error( true, 'You have already submitted. Please come back after 24 hours.' );

			if ( $is_ajax ) {
				$this->send_json( [
					'success' => false,
					'messages' => $this->errors['messages'],
				] );
			}
			return;
		}

		$this->add_error( empty( $buyer_name ), 'Full name is required.' );
		$this->add_error( (strlen( $buyer_name ) > 20 && strlen( $buyer_name ) !== 0 ), 'Full name should be under 20 characters.' );
		$this->add_error( ! preg_match( '/^[a-zA-Z0-9\s]+$/', $buyer_name ), 'Full name should be letters, numbers and spaces only.' );

		$this->add_error( empty( $buyer_email ), 'Email is required.' );
		$this->add_error( ! preg_match( '/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/', $buyer_email ), 'Email format is not correct.' );

		$this->add_error( empty( $amount ), 'Amount is required and only number.' );

		$this->add_error( empty( $receipt_id ), 'Receipt ID is required.' );
		$this->add_error( ! preg_match( '/^[a-zA-Z]+$/', $receipt_id ), 'Receipt ID only accept letters.' );

		$this->add_error( empty( $items ), 'Items is required.' );

		$this->add_error( empty( $city ), 'City is required.' );
		$this->add_error( ! preg_match( '/^[a-zA-Z\s]+$/', $city ), 'City should contain only letters and spaces.' );

		$this->add_error( empty( $phone ), 'Phone is required.' );
		$this->add_error( ! preg_match( '/^[0-9]+$/', $phone ), 'Phone number should contain only number.' );

		$this->add_error( empty( $entry_by ), 'Entry by is required.' );

		$this->add_error( count( explode( ' ', $note ) ) > 30, 'Note should be under 30 words.' );

		if ( $is_ajax && $this->errors['status'] ) {
			$this->send_json( [
				'success' => false,
				'messages' => $this->errors['messages'],
			] );
		}

		if ( $this->errors['status'] ) {
			return;
		}

		$buyer_ip = ! empty( $_SERVER['REMOTE_ADDR'] ) ? $_SERVER['REMOTE_ADDR'] : '';

		$salt = $this->get_salt();

		

		$hash_key = $salt . '/' . hash ( 'sha512', $salt . $receipt_id );
		$entry_at = date( 'Y-m-d' );

		$result = $this->model->add( [
			'amount'      => $amount,
			'buyer'       => $buyer_name,
			'receipt_id'  => $receipt_id,
			'items'       => $items,
			'buyer_email' => $buyer_email,
			'buyer_ip'    => $buyer_ip,
			'note'        => $note,
			'city'        => $city,
			'phone'       => $phone,
			'hash_key'    => $hash_key,
			'entry_at'    => $entry_at,
			'entry_by'    => $entry_by,
		] );

		if ( $result ) {
			setcookie( $this->cookie_name, '1', time()+( 60 * 60 * 24 ) );
			$this->submitted = true;

			if ( $is_ajax ) {
				$this->send_json( [
					'success' => true,
					'messages' => [ 'Congratulation! Your entry has been added.' ],
				] );
			}
		}
	}

	public function get_salt() {
		$bytes = random_bytes(20);

		return bin2hex( $bytes );
	}

	public function is_submitted() {
		return $this->submitted;
	}

	public function send_json( $data ) {
		$json_string = json_encode( $data );
		header('Content-type: application/json; charset=UTF-8');
		echo $json_string;
		die();
	}

	public function add_error( $check, $message ) {
		if ( $check ) {
			$this->errors['status'] = true;
			$this->errors['messages'] = array_merge( $this->errors['messages'], [ $message ] );
		}
	}
}