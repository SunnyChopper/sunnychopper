<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom\PlannerHelper;
use Carbon\Carbon;
use App\Planner;
use Auth;

class PlannerController extends Controller
{

    protected function getClientIp(): string
    {
        $ip = request()->ip();
        return $ip == '127.0.0.1' ? '66.102.0.0' : $ip;
    }

    public function index() {
    	if ($this->authCheck() == false) {
    		return redirect(url('/login'));
    	}

        // fetch it from FreeGeoIp
        $ip = $this->getClientIp();
        if ($ip == "::1") {
            $ip = "68.180.94.108";
        }

        try {
            $timezone = file_get_contents('https://ipapi.co/'.$ip.'/timezone/');
        } catch (\Exception $e) {
            return $e;
        }

    	$page_title = "10X Planner Tool";
    	$page_header = $page_title;

        if (isset($timezone)) {
            $planner = Planner::where('user_id', Auth::id())->whereDate('planner_date', Carbon::today($timezone))->first();
        } else {
            $planner = Planner::where('user_id', Auth::id())->whereDate('planner_date', Carbon::today())->first();
        }
    	
        $prev_planners = Planner::where('user_id', Auth::id())->get();

    	return view('members.planner.index')->with('page_title', $page_title)->with('page_header', $page_header)->with('planner', $planner)->with('prev_planners', $prev_planners);
    }

    public function new() {
    	if ($this->authCheck() == false) {
    		return redirect(url('/login'));
    	}

    	$page_title = "Create New 10X Planner";
    	$page_header = $page_title;

    	return view('members.planner.new')->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function create(Request $data) {
        if (Planner::where('user_id', Auth::id())->where('planner_date', $data->planner_date)->count() > 0) {
            return redirect()->back()->with(['error' => 'Planner already exists for this day.']);
        }

        $planner = new Planner;
        $planner->start_time = $data->start_time;
        $planner->planner_date = $data->planner_date;
        $planner->qotd = $data->qotd;
        $planner->user_id = Auth::id();

        // Targets
        $targets = explode("\n", $data->targets);
        $json_targets = json_encode($targets);

        // Block 1
        $block_1_strings = explode("\n", $data->block_1_tasks);
        $block_1_array = array();
        foreach ($block_1_strings as $string) {
            $temp_array = array();
            $temp_array[0] = $string;
            $temp_array[1] = 0;
            array_push($block_1_array, $temp_array);
        }
        $json_block_1 = json_encode($block_1_array);

        // Block 2
        $block_2_strings = explode("\n", $data->block_2_tasks);
        $block_2_array = array();
        foreach ($block_2_strings as $string) {
            $temp_array = array();
            $temp_array[0] = $string;
            $temp_array[1] = 0;
            array_push($block_2_array, $temp_array);
        }
        $json_block_2 = json_encode($block_2_array);

        // Block 3
        $block_3_strings = explode("\n", $data->block_3_tasks);
        $block_3_array = array();
        foreach ($block_3_strings as $string) {
            $temp_array = array();
            $temp_array[0] = $string;
            $temp_array[1] = 0;
            array_push($block_3_array, $temp_array);
        }
        $json_block_3 = json_encode($block_3_array);

        // Block 4
        $block_4_strings = explode("\n", $data->block_4_tasks);
        $block_4_array = array();
        foreach ($block_4_strings as $string) {
            $temp_array = array();
            $temp_array[0] = $string;
            $temp_array[1] = 0;
            array_push($block_4_array, $temp_array);
        }
        $json_block_4 = json_encode($block_4_array);

        // Block 5
        $block_5_strings = explode("\n", $data->block_5_tasks);
        $block_5_array = array();
        foreach ($block_5_strings as $string) {
            $temp_array = array();
            $temp_array[0] = $string;
            $temp_array[1] = 0;
            array_push($block_5_array, $temp_array);
        }
        $json_block_5 = json_encode($block_5_array);

        // Block 6
        $block_6_strings = explode("\n", $data->block_6_tasks);
        $block_6_array = array();
        foreach ($block_6_strings as $string) {
            $temp_array = array();
            $temp_array[0] = $string;
            $temp_array[1] = 0;
            array_push($block_6_array, $temp_array);
        }
        $json_block_6 = json_encode($block_6_array);

        $planner->targets = $json_targets;
        $planner->block_1_tasks = $json_block_1;
        $planner->block_2_tasks = $json_block_2;
        $planner->block_3_tasks = $json_block_3;
        $planner->block_4_tasks = $json_block_4;
        $planner->block_5_tasks = $json_block_5;
        $planner->block_6_tasks = $json_block_6;

        $planner->save();

        return redirect(url('/members/planner'));
    }

    public function update(Request $data) {
        $planner = Planner::find($data->planner_id);

        // Morning goals
        $morning_goals = explode("\n", $data->morning_goals);
        $json_morning_goals = json_encode($morning_goals);
        $planner->morning_goals = $json_morning_goals;

        // Night goals
        $night_goals = explode("\n", $data->night_goals);
        $json_night_goals = json_encode($night_goals);
        $planner->night_goals = $json_night_goals;

        // Targets
        $targets = explode("\n", $data->targets);
        $json_targets = json_encode($targets);
        $planner->targets = $json_targets;

        // Successes
        $successes = explode("\n", $data->successes);
        $json_successes = json_encode($successes);
        $planner->successes = $json_successes;

        // Get block 1 tasks
        if ($data->block_1_complete != NULL) {
            $block_1 = json_decode($planner->block_1_tasks);
            $i = 0;
            $new_block_1 = array();
        
            foreach($block_1 as $task) {
                $temp_array = array();
                $temp_array[0] = $task[0];
                if (in_array((string)$i, $data->block_1_complete)) {
                    $temp_array[1] = 1;
                } else {
                    $temp_array[1] = 0;
                }
                array_push($new_block_1, $temp_array);
                $i += 1;
            }

            $planner->block_1_tasks = json_encode($new_block_1);
        }

        // Get block 2 tasks
        if ($data->block_2_complete != NULL) {
            $block_2 = json_decode($planner->block_2_tasks);
            $i = 0;
            $new_block_2 = array();
        
            foreach($block_2 as $task) {
                $temp_array = array();
                $temp_array[0] = $task[0];
                if (in_array((string)$i, $data->block_2_complete)) {
                    $temp_array[1] = 1;
                } else {
                    $temp_array[1] = 0;
                }
                array_push($new_block_2, $temp_array);
                $i += 1;
            }

            $planner->block_2_tasks = json_encode($new_block_2);
        }
        

        // Get block 3 tasks
        if ($data->block_3_complete != NULL) {
            $block_3 = json_decode($planner->block_3_tasks);
            $i = 0;
            $new_block_3 = array();
        
            foreach($block_3 as $task) {
                $temp_array = array();
                $temp_array[0] = $task[0];
                if (in_array((string)$i, $data->block_3_complete)) {
                    $temp_array[1] = 1;
                } else {
                    $temp_array[1] = 0;
                }
                array_push($new_block_3, $temp_array);
                $i += 1;
            }

            $planner->block_3_tasks = json_encode($new_block_3);
        }

        // Get block 4 tasks
        if ($data->block_4_complete != NULL) {
            $block_4 = json_decode($planner->block_4_tasks);
            $i = 0;
            $new_block_4 = array();
        
            foreach($block_4 as $task) {
                $temp_array = array();
                $temp_array[0] = $task[0];
                if (in_array((string)$i, $data->block_4_complete)) {
                    $temp_array[1] = 1;
                } else {
                    $temp_array[1] = 0;
                }
                array_push($new_block_4, $temp_array);
                $i += 1;
            }

            $planner->block_4_tasks = json_encode($new_block_4);
        }

        // Get block 5 tasks
        if ($data->block_5_complete != NULL) {
            $block_5 = json_decode($planner->block_5_tasks);
            $i = 0;
            $new_block_5 = array();
        
            foreach($block_5 as $task) {
                $temp_array = array();
                $temp_array[0] = $task[0];
                if (in_array((string)$i, $data->block_5_complete)) {
                    $temp_array[1] = 1;
                } else {
                    $temp_array[1] = 0;
                }
                array_push($new_block_5, $temp_array);
                $i += 1;
            }

            $planner->block_5_tasks = json_encode($new_block_5);
        }

        // Get block 6 tasks
        if ($data->block_6_complete != NULL) {
            $block_6 = json_decode($planner->block_6_tasks);
            $i = 0;
            $new_block_6 = array();
        
            foreach($block_6 as $task) {
                $temp_array = array();
                $temp_array[0] = $task[0];
                if (in_array((string)$i, $data->block_6_complete)) {
                    $temp_array[1] = 1;
                } else {
                    $temp_array[1] = 0;
                }
                array_push($new_block_6, $temp_array);
                $i += 1;
            }

            $planner->block_6_tasks = json_encode($new_block_6);
        }

        $planner->save();

        return redirect()->back();
    }

    public function stats() {
    	if ($this->authCheck() == false) {
    		return redirect(url('/login'));
    	}

    	$page_title = "Your 10X Planner Stats";
    	$page_header = $page_title;

    	return view('members.planner.stats')->with('page_title', $page_title)->with('page_header', $page_header);
    }

    private function authCheck() {
    	if (Auth::guest()) {
    		return false;
    	} else {
    		return true;
    	}
    }
}
