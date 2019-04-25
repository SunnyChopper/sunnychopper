<?php

namespace App\Custom;
use App\Planner;

class PlannerHelper {
	
	public static function getCompletedTasks($planner_id) {
		$p = Planner::find($planner_id);

		$num_tasks = 0;
		$completed = 0;

		$block_1_tasks = json_decode($p->block_1_tasks);
		$num_tasks += count($block_1_tasks);
		foreach($block_1_tasks as $task) {
			if($task[1] == 1) {
				$completed += 1;
			}
		}

		$block_2_tasks = json_decode($p->block_2_tasks);
		$num_tasks += count($block_2_tasks);
		foreach($block_2_tasks as $task) {
			if($task[1] == 1) {
				$completed += 1;
			}
		}

		$block_3_tasks = json_decode($p->block_3_tasks);
		$num_tasks += count($block_3_tasks);
		foreach($block_3_tasks as $task) {
			if($task[1] == 1) {
				$completed += 1;
			}
		}

		$block_4_tasks = json_decode($p->block_4_tasks);
		$num_tasks += count($block_4_tasks);
		foreach($block_4_tasks as $task) {
			if($task[1] == 1) {
				$completed += 1;
			}
		}

		$block_5_tasks = json_decode($p->block_5_tasks);
		$num_tasks += count($block_5_tasks);
		foreach($block_5_tasks as $task) {
			if($task[1] == 1) {
				$completed += 1;
			}
		}

		$block_6_tasks = json_decode($p->block_6_tasks);
		$num_tasks += count($block_6_tasks);
		foreach($block_6_tasks as $task) {
			if($task[1] == 1) {
				$completed += 1;
			}
		}

		return $completed . "/" . $num_tasks;
	}

}

?>