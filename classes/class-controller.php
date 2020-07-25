<?php

abstract class Controller {
	protected $title = '';
	protected $vars = [];
	protected $view = '';
	protected $model_class = '';
	protected $model = '';

	public function __construct() {
		$this->model_init();
	}

	public function set( $vars ) {
		$this->vars = array_merge( $this->vars, $vars );
	}

	public function render() {
		if ( empty( $this->view ) ) {
			return;
		}
		extract( $this->vars );
		include ROOT_DIR . '/views/' . $this->view . '.php';
	}

	protected function model_init() {
		if ( empty( $this->model_class ) ) {
			return;
		}
		require_once ROOT_DIR . '/models/class-' . str_replace( '/_/g', '-', strtolower( $this->model_class ) ) . '.php';

		$this->model = new $this->model_class;
	}

	public function get_title() {
		return $this->title;
	}
}

