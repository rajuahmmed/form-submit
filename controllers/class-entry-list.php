<?php
class Entry_List extends Controller {
	protected $title = 'All Entries';
	protected $model_class = 'Entry';
	protected $view = 'list';

	public function __construct() {
		parent::__construct();

		$this->all_entries();
	}
	
	public function all_entries() {
		$this->set( [
			'entries' => $this->model->get(),
			'items' => Items::get(),
		] );
	}
}
