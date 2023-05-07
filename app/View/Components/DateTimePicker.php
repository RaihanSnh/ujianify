<?php

declare(strict_types=1);

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use function view;

class DateTimePicker extends Component
{
	public string $id;
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string $name,
		?string $id = null,
	)
	{
		if($id === null) {
			$this->id = 'date_time_picker_' . $name;
		}else{
			$this->id = $id;
		}
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render() : View|Closure|string
	{
		return view('components.date-time-picker');
	}
}
