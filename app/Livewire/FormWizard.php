<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Foundation\Application;
use Illuminate\View\{Factory, View};
use Livewire\Component;

class FormWizard extends Component
{
    public string $current_step = 'step_1', $previous_step = 'step_1';
    public string $first_name, $last_name, $address, $city, $country, $dob_day, $dob_month, $dob_year, $parsed_dob; // page one vars

    public string $marriage_status, $marriage_country, $adult_status, $adult_error, $marriage_day, $marriage_month, $marriage_year, $parsed_marriage_date, $widow_status, $past_marriage_status; // page two vars

    public array $steps_validation_rules = [
        'step_1' => [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'dob_day' => 'required|string',
            'dob_month' => 'required|string',
            'dob_year' => 'required|digits:4|integer|min:1900|max:2024',
        ],
        'step_2' => [
            'marriage_status' => 'required|string',
            'marriage_country' => 'required_if:marriage_status,yes',
            'marriage_day' => 'required_if:marriage_status,yes',
            'marriage_month' => 'required_if:marriage_status,yes',
            'marriage_year' => 'required_if:marriage_status,yes|max:2024',
        ]
    ];

    public function render(): View|Application|Factory
    {
        return view('livewire.form-wizard');
    }

    public function updated($property): void
    {
        if ($property == 'dob_year') {
            $this->parsed_dob = Carbon::parse($this->dob_day . "-" . $this->dob_month . "-" . $this->dob_year);
        }
        if ($property == 'marriage_year') {
            $this->parsed_marriage_date = Carbon::parse($this->marriage_day . "-" . $this->marriage_month . "-" . $this->marriage_year);
            if (!(Carbon::parse($this->parsed_marriage_date)->diffInYears($this->parsed_dob) >= 18)) {
                $this->adult_error = "You are not eligible to apply because your marriage occurred before your 18th birthday.";
            } else {
                $this->adult_error = '';
            }
        }
    }

    public function nextStep($step, $previous = false): void
    {
        if (isset($this->parsed_marriage_date)) {
            if (!(Carbon::parse($this->parsed_marriage_date)->diffInYears($this->parsed_dob) >= 18)) {
                $this->adult_error = "You are not eligible to apply because your marriage occurred before your 18th birthday.";
                return;
            } else {

            }
        }
        if (!$previous)
            $this->validate($this->steps_validation_rules[$this->current_step]);
        $this->previous_step = $this->current_step;
        $this->current_step = $step;
    }
}
