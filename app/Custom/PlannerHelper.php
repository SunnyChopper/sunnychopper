<?php

namespace App\Custom;
use App\Planner;

class PlannerHelper {
	
	public static function getCompletedTasks($planner_id) {
		$results = PlannerHelper::getNumberOfCompletedTasks($planner_id);
		return $results[0] . "/" . $results[1];
	}

	public static function getWorstDay($user_id) {
		$planners = Planner::where('user_id', $user_id)->where('is_active', 1)->get();
		$worst = 1.00;
		$worst_date = "";
		foreach($planners as $p) {
			$results = $this->getNumberOfCompletedTasks($p->id);
			if (((float)$results[0] / (float)$results[1]) < $worst) {
				$worst = $results[0] / $results[1];
				$worst_date = $p->created_at->format('M jS, Y');
			}
		}

		return array($worst, $worst_date);
	}

	public static function getBestDay($user_id) {
		$planners = Planner::where('user_id', $user_id)->where('is_active', 1)->get();
		$best = 0.00;
		$best_date = "";
		foreach($planners as $p) {
			$results = $this->getNumberOfCompletedTasks($p->id);
			if (((float)$results[0] / (float)$results[1]) > $best) {
				$best = $results[0] / $results[1];
				$best_date = $p->created_at->format('M jS, Y');
			}
		}

		return array($best, $best_date);
	}

	public static function getAverage($user_id) {
		$planners = Planner::where('user_id', $user_id)->where('is_active', 1)->get();
		$total_completed = 0;
		$total_tasks = 0;

		foreach($planners as $p) {
			$results = $this->getNumberOfCompletedTasks($p->id);
			$total_completed += $results[0];
			$total_tasks += $results[1];
		}

		$percentage = ((float)$total_completed / (float)$total_tasks) * 100;

		return $percentage;
 	}

 	public static function getDayAverages($user_id) {
 		$planners = Planner::where('user_id', $user_id)->where('is_active', 1)->get();
 		$day_averages = array();

 		foreach($planners as $p) {
 			$results = $this->getNumberOfCompletedTasks($p->id);
 			$day = $p->created_at->dayOfWeek;

 			if (array_key_exists($day, $day_averages)) {
 				$ratio = (float)$results[0] / (float)$results[1];
 				$existing_average = $day_averages[$day];
 				$total = $existing_average + $ratio;
 				$new_average = (float)$total / 2.00;
 				$day_averages[$day] = $new_average;
 			} else {
 				$ratio = (float)$results[0] / (float)$results[1];
 				$day_averages[$day] = $ratio;
 			}
 		}

 		return $day_averages;
 	}

 	public static function getBlockAverages($user_id) {
 		$planners = Planner::where('user_id', $user_id)->where('is_active', 1)->get();
 		$block_totals = array(0.0, 0.0, 0.0, 0.0, 0.0, 0.0);

 		foreach($planners as $p) {
 			$results = $this->getBlockCompletion($p->id);
 			for ($i = 0; $i < count($results); $i++) {
 				if ($block_totals[$i] == 0.0) {
 					$block_totals[$i] = $results[$i];
 				} else {
 					$old_average = $block_totals[$i];
 					$new_total = $old_average + $results[$i];
 					$new_average = (float)$new_total / 2.00;
 					$block_totals[$i] = $new_average;
 				}
 			}
 		}

 		return $block_totals;
 	}

 	public static function getBestBlock($user_id) {
 		$planners = Planner::where('user_id', $user_id)->where('is_active', 1)->get();
 		$block_totals = array(0.0, 0.0, 0.0, 0.0, 0.0, 0.0);

 		foreach($planners as $p) {
 			$results = $this->getBlockCompletion($p->id);
 			for ($i = 0; $i < count($results); $i++) {
 				if ($block_totals[$i] == 0.0) {
 					$block_totals[$i] = $results[$i];
 				} else {
 					$old_average = $block_totals[$i];
 					$new_total = $old_average + $results[$i];
 					$new_average = (float)$new_total / 2.00;
 					$block_totals[$i] = $new_average;
 				}
 			}
 		}

 		$best_block = 0;
 		for($j = 0; $j < count($block_totals); $j++) {
 			if ($block_totals[$j] > $best_block) {
 				$best_block = $j + 1;
 			}
 		}

 		return $best_block;
 	}

 	public static function getTasksCompletedForDate($user_id, $date) {
 		$p = Planner::where('user_id', $user_id)->whereDate('planner_date', $date)->where('is_active', 1)->first();

 		if (count($p) == 1) {
 			$results = $this->getNumberOfCompletedTasks($p->id);
 			return $results[0];
 		} else {
 			return 0;
 		}
 	}

 	public static function getCompletionForDate($user_id, $date) {
		$p = Planner::where('user_id', $user_id)->whereDate('planner_date', $date)->where('is_active', 1)->first();

 		if (count($p) == 1) {
 			$results = $this->getNumberOfCompletedTasks($p->id);
 			return (float)$results[0] / (float)$results[1];
 		} else {
 			return 0;
 		}
 	}

 	private function getBlockCompletion($planner_id) {
 		$p = Planner::find($planner_id);

		$block_1_completed = 0;
		$block_2_completed = 0;
		$block_3_completed = 0;
		$block_4_completed = 0;
		$block_5_completed = 0;
		$block_6_completed = 0;

		$block_1_tasks = json_decode($p->block_1_tasks);
		$num_tasks += count($block_1_tasks);
		foreach($block_1_tasks as $task) {
			if($task[1] == 1) {
				$block_1_completed += 1;
			}
		}

		$block_2_tasks = json_decode($p->block_2_tasks);
		$num_tasks += count($block_2_tasks);
		foreach($block_2_tasks as $task) {
			if($task[1] == 1) {
				$block_2_completed += 1;
			}
		}

		$block_3_tasks = json_decode($p->block_3_tasks);
		$num_tasks += count($block_3_tasks);
		foreach($block_3_tasks as $task) {
			if($task[1] == 1) {
				$block_3_completed += 1;
			}
		}

		$block_4_tasks = json_decode($p->block_4_tasks);
		$num_tasks += count($block_4_tasks);
		foreach($block_4_tasks as $task) {
			if($task[1] == 1) {
				$block_4_completed += 1;
			}
		}

		$block_5_tasks = json_decode($p->block_5_tasks);
		$num_tasks += count($block_5_tasks);
		foreach($block_5_tasks as $task) {
			if($task[1] == 1) {
				$block_5_completed += 1;
			}
		}

		$block_6_tasks = json_decode($p->block_6_tasks);
		$num_tasks += count($block_6_tasks);
		foreach($block_6_tasks as $task) {
			if($task[1] == 1) {
				$block_6_completed += 1;
			}
		}

		return array($block_1_completed, $block_2_completed, $block_3_completed, $block_4_completed, $block_5_completed, $block_6_completed);
 	}

	private function getNumberOfCompletedTasks($planner_id) {
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

		return array($completed, $num_tasks);
	}

}

?>