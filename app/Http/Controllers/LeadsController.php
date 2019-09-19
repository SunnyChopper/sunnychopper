<?php

namespace App\Http\Controllers;

use App\Lead;

use Illuminate\Http\Request;

class LeadsController extends Controller
{

	/* ---------------------- *\
		Helper Functions
	\* ---------------------- */

	public function email_check() {
		if (Lead::where('email', strtolower($_GET['email']))->where('lp_name', $_GET['lp_name'])->where('is_active', 1)->count() > 0) {
			return response()->json(false, 200);
		} else {
			return response()->json(true, 200);
		}
	}
    
	/* ---------------------- *\
		CRUD Functions
	\* ---------------------- */

	public function create(Request $data) {
		if (Lead::where('email', strtolower($data->email))->where('lp_name', $data->lp_name)->where('is_active', 1)->count() > 0) {
			return response()->json(2, 200);
		} else {
			$lead = new Lead;
			$lead->email = strtolower($data->email);
			$lead->lp_name = $data->lp_name;
			$lead->save();

			return response()->json(1, 200);
		}
	}

	public function read() {
		return repsonse()->json(Lead::find($_GET['lead_id'])->toArray(), 200);
	}

	public function delete(Request $data) {
		$lead = Lead::find($data->lead_id);
		$lead->is_active = 0;
		$lead->save();

		return response()->json(true, 200); 
	}

}
