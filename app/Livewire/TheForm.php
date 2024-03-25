<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;

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
        $this->days = [];
        $this->dayOfBirth = 1;
        $this->dayOfMarriage = 1;
        $this->errors = [];
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

    public function validateMarriageDate() {
        $date = Carbon::createFromDate($this->yearOfBirth+18, $this->monthOfBirth, $this->dayOfBirth);
        $marriageDate = Carbon::createFromDate($this->yearOfMarriage, $this->monthOfMarriage, $this->dayOfMarriage);

        if($marriageDate->lessThan($date)) {
            //dump('You are not eligible to apply because your marriage occurred before your 18th birthday.');
            $this->addError('alabamaRule', 'You are not eligible to apply because your marriage occurred before your 18th birthday.');
            return false;
        } else {
           return true;
        }
    }

    public function showPage1() {
        $this->formStep = 1;
    }
    public function showPage2() {
        //validate page 1 variables are set that are required
        $validated = $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'yearOfBirth' => 'required',
            'monthOfBirth' => 'required',
            'dayOfBirth' => 'required',
        ]);
        $this->formStep = 2;
    }
    public function showPageConfirm() {
        
        //if married is yes, check those vars
        if($this->married == 'Yes') {
            $validated = $this->validate([
                'married' => 'required',
                'yearOfMarriage' => 'required',
                'monthOfMarriage' => 'required',
                'dayOfMarriage' => 'required',
                'countryOfMarriage' => 'required',
            ]);
        } else {
            //marriage is no, check those
            $validated = $this->validate([
                'married' => 'required',
                'widowed' => 'required',
                'marriedInPast' => 'required',
            ]);
        }
        
        //alabamaRule
        if($this->validateMarriageDate()) {
            $this->formStep = 3;
            //probably want to
                //create a form request
                //save to model
        }else {
            //do nothing
        }
        
    }
    public function render()
    {
        return view('livewire.the-form');
    }
}
