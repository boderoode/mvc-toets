<?php

class Garage extends Controller
{
    private $AutoModel;
    public function __construct()
    {
        $this->AutoModel = $this->model('Auto');
    }

    public function index()
    {
        $result = $this->AutoModel->GetAuto();
        $rows = '';
        foreach($result as $auto)
        {
           $rows .= "<tr> 
                     <td>$auto->Type</td>
                     <td>$auto->Kenteken</td>
                     <td><a href='" . URLROOT . "/garage/addKmStand{$auto->Id}'>Toevoegen</a></td>
                     </tr>";
        }
        $data = [ 
            'title' => "Overzicht Garage",
            'rows' => $rows
        ];
        $this->view('garage/index', $data);
    }

    public function addKmStand($Id = null)
    {
        $data = [
           'title' => 'Invoeren Kilometerstand',
           'Id' => $Id,
        ];
        
       $this->view('garage/AddKmStand', $data);
    }
}