<?php

namespace App\Custom;

use App\PublicTool;

class PublicToolHelper {
	/* Global variables */
	private $id;

	/* Public functions */
	public function __construct($id = 0) {
		$this->id = $id;
	}

	public function create($data) {
		// Create tool
		$tool = new PublicTool;
		$tool->title = $data["title"];
		$tool->description = $data["description"];
		$tool->image_url = $data["image_url"];
		$tool->link_url = $data["link_url"];
		$tool->category = $data["category"];
		$tool->save();

		return $tool->id;
	}

	public function read($id = 0) {
		if ($id == 0) {
			$id = $this->id;
		}

		return PublicTool::find($id);
	}

	public function update($data) {
		// Get post and update
		$tool = PublicTool::find($data["tool_id"]);
		$tool->title = $data["title"];
		$tool->description = $data["description"];
		$tool->image_url = $data["image_url"];
		$tool->link_url = $data["link_url"];
		$tool->category = $data["category"];
		$tool->save();
	}

	public function delete($id = 0) {
		if ($id == 0) {
			$id = $this->id;
		}

		// Get post and delete
		$tool = PublicTool::where('id', $id)->first();
		$tool->is_active = 0;
		$tool->save();
	}

	public function get_all() {
		return PublicTool::where('is_active', 1)->orderBy('created_at', 'DESC')->get();
	}

	public function get_all_with_pagination($paginate) {
		return PublicTool::where('is_active', 1)->orderBy('created_at', 'DESC')->paginate($paginate);
	}

	public function get_deleted_tools() {
		return PublicTool::where('is_active', 0)->orderBy('created_at', 'DESC')->get();
	}
}

?>