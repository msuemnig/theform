<?php

namespace App\Livewire;

use Livewire\Component;

class TheForm extends Component
{
    //page 1
    public $firstName;
    public $lastName;
    public $address;
    public $city;
    public $country;
    public int $yearOfBirth;
    public int $monthOfBirth;
    public int $dayOfBirth;
    
    //page 2
    public $married;
    public int $yearOfMarriage;
    public int $monthOfMarriage;
    public int $dayOfMarriage;
    public $countryOfMarriage;
    public $widowed;
    public $marriedInPast;

    //lookups
    public $countries;
    public $years;
    public $months;
    public $days;

    //state
    public $formStep = 1;

    public function mount() {
        $this->getCountries();
        $this->getYears();
        $this->getMonths();
    }
    //get list of countries
    public function getCountries() {
        $this->countries = [
            "United States",
            "Canada",
            "Mexico",
        ];
    }
    public function getYears() {
        $this->years = range(1900, date('Y'));
    }
    public function getMonths() {
        $this->months = range(1, 12);
    }
    public function updatedYearOfBirth() {
        $this->monthOfBirth = 1;
        $this->getDaysInCurrentMonthBirth();
    }
    public function updatedMonthOfBirth() {
        $this->dayOfBirth = 1;
        $this->getDaysInCurrentMonthBirth();
    }
    
    public function updatedYearOfMarraige() {
        $this->monthOfMarriage = 1;
        $this->getDaysInCurrentMonthMarriage();
    }
    public function updatedMonthOfMarriage() {
        $this->dayOfMarriage = 1;
        $this->getDaysInCurrentMonthMarriage();
    }
    public function getDaysInCurrentMonthBirth() {
        //thanks copilot
        $this->days = range(1,cal_days_in_month(CAL_GREGORIAN, $this->monthOfBirth, $this->yearOfBirth));
    }
    public function getDaysInCurrentMonthMarriage() {
        $this->days = range(1,cal_days_in_month(CAL_GREGORIAN, $this->monthOfMarriage, $this->yearOfMarriage));
    }

    public function showPage1() {
        $this->formStep = 1;
    }
    public function showPage2() {
        $this->formStep = 2;
    }
    public function showPageConfirm() {
        $this->formStep = 3;
    }
    public function render()
    {
        return view('livewire.the-form');
    }
}
