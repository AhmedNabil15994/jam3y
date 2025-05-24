<?php

namespace App\Modules\Subscription\Traits;

trait SubscriptionDatesTrait
{

		public function datesOfPackage($package)
		{
				$dates = [];

				$dates['start_at'] = date('Y-m-d');

				if ($package->fixed_date == true) {
						$dates['end_at']	= $package->course_end_at;
				}else{
					$dates['end_at']	= date('Y-m-d', strtotime('+'.$package->days.' days'));

				}

				return $dates;
		}
}
