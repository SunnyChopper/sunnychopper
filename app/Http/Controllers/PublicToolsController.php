<?php

namespace App\Http\Controllers;

use App\Custom\PublicToolHelper;

use Illuminate\Http\Request;

class PublicToolsController extends Controller
{
    public function create(Request $data) {
    	// Create data array for helper
    	$tool_data = array(
    		"title" => $data->title,
    		"description" => $data->description,
    		"image_url" => $data->image_url,
    		"link_url" => $data->link_url,
    		"category" => $data->category
    	);

    	// Create helper and create
    	$tool_helper = new PublicToolHelper();
    	$tool_helper->create($tool_data);

    	// Redirect
    	return redirect(url('/admin/tools/view'));
    }

    public function update(Request $data) {
    	// Create data array for helper
    	$tool_data = array(
    		"tool_id" => $data->tool_id,
    		"title" => $data->title,
    		"description" => $data->description,
    		"image_url" => $data->image_url,
    		"link_url" => $data->link_url,
    		"category" => $data->category
    	);

    	// Create helper and update
    	$tool_helper = new PublicToolHelper();
    	$tool_helper->update($tool_data);

    	// Redirect
    	return redirect(url('/admin/tools/view'));
    }

    public function delete(Request $data) {
    	$tool_helper = new PublicToolHelper($data->tool_id);
    	$tool_helper->delete();
    	return redirect(url('/admin/tools/view'));
    }
}
