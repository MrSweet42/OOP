<?php

// базовый класс
class Man{
    protected $age;
    protected $name;

    function __construct() {
        // print "FOR ME: class Man initialized \n";
        $this->age = 0;
        $this->name = "None";
    }

    function input_man(){
        echo "Age: ";
        $this->age = readline();
        echo "Name: ";
        $this->name = readline();
    }
    function print_man($person1){
        echo "Age: " . $person1->age . "\n";
        echo "Name: " . $person1->name . "\n";
    }

}

// класс Patient (наследуется от Man)
class Patient extends Man
{
    public $illness;

    function __construct()
    {
        parent::__construct();
        // print "FOR ME: class Patient initialized \n";
        $this->illness = "None";
    }

    function input_pat()
    {
        echo "Input patient № \n";
        parent::input_man();
        echo "Illness: ";
        $this->illness = readline();
    }

    function print_pat($person2)
    {
        echo "Patient № \n";
        parent::print_man($person2);
        echo "Illness: " . $person2->illness . "\n";
    }
}

// класс Doctor (наследуется от Man)
class Doctor extends Man
{
    private $speciality;

    function __construct()
    {
        parent::__construct();
        // print "FOR ME: class Doctor initialized \n";
        $this->speciality = "None";

    }

    function input_doc()
    {
        echo "Input doctor № \n";
        parent::input_man();
        echo "Speciality: ";
        $this->speciality = readline();
    }

    function print_doc()
    {
        echo "Doctor № \n";
        parent::print_man();
        echo "Speciality: " . $this->speciality . "\n";
    }
}

// класс базы данных
class Polyclinic
{
    /**
     * @var Patient[]
     */
    private array $list_patients = [];
    private $list_doctors = array();

    public function __construct(Patient $new_patient, Doctor $new_doctor)
    {
        $this->list_patients[] = $new_patient;
        $this->list_doctors = $new_doctor;
    }

    function input_hos_pat() {
        //echo "Count of patients: ";
        for ($i = 0; $i < 3; $i++) {
            //$patient = new Patient();
            $this->list_patients[$i]->input_pat();
            //$patient -> input_pat();
            //$this -> list_patients[$i] = $patient;
        }
    }

    function input_hos_doc() {
        //echo "Count of doctors: ";
        for ($i = 0; $i < 2; $i++) {
            //$patient = new Patient();
            $this->list_doctors[$i]->input_doc();
            //$patient -> input_pat();
            //$this -> list_patients[$i] = $patient;
        }
    }

    function print_hos_pat() {
        for ($i = 0; $i < 2; $i++) {
            //$newPatient = $this -> list_patients[$i];
            //$this->print_pat($newPatient);
            $this->list_patients[$i]->print_pat();
        }
    }

    function print_hos_doc() {
        for ($i = 0; $i < 2; $i++) {
            //$newPatient = $this -> list_patients[$i];
            //$this->print_pat($newPatient);
            $this->list_doctors[$i]->print_doc();
        }
    }
}

$doctor = new Doctor();
$patient = new Patient();
$hos = new Polyclinic($patient, $doctor);
$hos -> input_hos_pat();
$hos -> input_hos_doc();
$hos -> print_hos_pat();
$hos -> print_hos_doc();




