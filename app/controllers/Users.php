<?php

class Users extends Controller
{
    //properties
    private $userModel;

    // Dit is de constructor van de controller
    public function __construct() 
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $records = $this->userModel->getNames();
        //var_dump($records);

        $rows = '';

        foreach ($records as $items)
        {
            $rows .= "<tr>
                        <td>$items->Id</td>
                        <td>$items->firstname</td>
                        <td>$items->lastname</td>
                        <td>$items->phonenumber</td>
                      </tr>";
        }

        $data = [
            'title' => "Namen tabel",
            'rows' => $rows,
            'description' => "Hier kan je een overzicht van Namen",
            'privacy' => "Vanwege privacy regels kunnen wij niet iedereens naam delen"
        ];
        $this->view('users/index', $data);
    }
}