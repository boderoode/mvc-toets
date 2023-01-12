<?php

class Autos extends Controller
{
    private $autoModel;

    public function __construct()
    {
        // We maken een object van de model class en stoppen dit in $lesModel
        $this->autoModel = $this->model('Auto');
    }

    public function index()
    {
        $result = $this->autoModel->getAutos();

           
        $rows = "";

        foreach($result as $autoinfo){
            $dateTimeObj = new DateTimeImmutable($autoinfo->DatumTijd, 
                                                new DateTimeZone('Europe/Amsterdam'));
            $rows .=  "  <tr>
                            <td>{$dateTimeObj->format('d-m-y')}</td>
                            <td>{$dateTimeObj->format('h:i')}</td>
                            <td> $autoinfo->LENA</td>
                            <td>        </td>
                            <td> <a href='" . URLROOT . "/autos/topicautos/{$autoinfo->LEID}'>
                                    <img src ='" . URLROOT . "/img/b_sbrowse.png' alt='table picture'></td>
                                </a>
                            </tr>
                       ";
        }


     $data = [
            'title' => 'Overzicht Autos',
            'rows' => $rows,
            'instructorName' => $result[0]->INNA
        ];
        $this->view('autos/index', $data);
    }

    public function topicAutos($id = NULL)
    {

            $result = $this->autoModel->getTopics($id);

            var_dump($result);

            if ($result){
            
            $dt  = new DateTimeImmutable($result[0]->DatumTijd, new DateTimeZone('Europe/Amsterdam'));
            
            $date = $dt->format('d-m-Y');
            
            $time = $dt->format('H:i');

            } else {
                $date = "";
                $time = "";
                  
            }



            

            $rows = "";

            foreach($result as $topic)
            {
                $rows .= "<tr>
                        
                        <td>{$topic->Onderwerp}</td>

                          </tr>";
            }


        $data = [
            'title' => 'Onderwerpen Les',
            'rows' => $rows,
            'date' => $date,
            'time' => $time,
            'lessonId' => $id
            
        ];
        $this->view('autos/topicautos', $data);
    }

    public function addTopic($id = NULL)
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

              $result = $this->autoModel->addTopic($_POST);

              if($result){
                echo "<h3>de data is opgeslagen</h3>";
                header('Refresh:3; url=' . URLROOT . '/lessen/index');
              }


        } else {
            $data = [
               'title' => 'Onderwerp toevoegen',
               'id' => $id
            ];

            $this->view('lessen/addTopic', $data);
        }
            
    }
}
