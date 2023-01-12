<?php

class Wagenpark extends Controller
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
                     <td><a href='" . URLROOT . "/wagenpark/addKmStand{$auto->Id}'>Toevoegen</a></td>
                     </tr>";
        }
        $data = [ 
            'title' => "Overzicht Wagenpark",
            'rows' => $rows
        ];
        $this->view('wagenpark/index', $data);
    }

    public function addKmStand($Id = null)
    {
        $data = [
           'title' => 'Invoeren Kilometerstand',
           'Id' => $Id,
        ];
        
       $this->view('wagenpark/AddKmStand', $data);
    }
}