<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\Api\AppController;

use Cake\View\JsonView;

class FindersController extends AppController
{
  public function viewClasses(): array
  {
      return [JsonView::class];
  }


  public function autoComplete($param=null, $query = null)
  {
    // $queryParams = $this->request->getQueryParams();
    // debug($queryParams);
    // $this->request->getQuery("query")

    $result = [];
    $results = [];

    // -------------------- Categories --------------------
    if($param == 'categories'){
      $parameters = [
        'order' => ['name' => 'asc'],
        'fields' => ['id', 'name'],
        'limit' => 10,
      ];
      $q = $this->request->getQuery("q");
      if (strlen($q) > 0){
        $parameters['conditions'] = ['name LIKE' => $q . '%'];
      }
      $this->loadModel('Categories');
      $categories = $this->Categories->find('all', $parameters);
      foreach($categories as $category){
        $results[] = ['id' => $category->id, 'text' => $category->name];
      }
    }    

    // -------------------- Cities -----------------------
    if($param == 'cities'){
      $parameters = [
        'order' => ['name' => 'asc', 'zip' => 'asc'],
        'fields' => ['id', 'name', 'zip'],
        'limit' => 10,
      ];
      $q = $this->request->getQuery("q");
      if (strlen($q) > 0){
        $parameters['conditions'] = ['OR' => ['zip LIKE' => $q . '%', 'name LIKE' => $q . '%']];
      }
      $this->loadModel('Cities');
      $cities = $this->Cities->find('all', $parameters);
      foreach($cities as $city){
        $results[] = ['id' => $city->id, 'text' => $city->zip . ' ' . $city->name];
      }
    }    
  
    // -------------------- City -------------------------
    if($param == 'city'){      
      //$id = $this->request->getData("id");  // Ha POST, akkor kell a CSRF token is
      //debug($id); die();

      $id = $this->request->getQuery("id");

      $parameters = [
        'conditions' => ['id' => $id],
        'fields' => ['longitude', 'latitude'],
      ];
      $this->loadModel('Cities');
      $cities = $this->Cities->find('all', $parameters);
      foreach($cities as $city){
        $results = ['longitude' => $city->longitude, 'latitude' => $city->latitude];
      }
      //echo json_encode($result); die();
    }    

    $this->set('results', $results);  // Set the view vars that have to be serialized.
    $this->viewBuilder()->setOption('serialize', ['results']);  // Specify which view vars JsonView should serialize.

    // https://nominatim.openstreetmap.org/search?q=7700+Moh%C3%A1cs,+Orthovet&format=json
    // Később talán lehetne használni

  }



  // http://kereso.loc/api/finders/sync/2023-08-01.json
  public function sync($param = null)
  {

    $data = [];
    $this->loadModel('Categories');
    $this->loadModel('Persons');
    $this->loadModel('Phones');
    $this->loadModel('Openings');

    $conditions = ['modified >=' => $param ];
    $order 		= ['pos' => 'asc', 'name' => 'asc'];

    $categories = $this->Categories->find('all', ['conditions' => $conditions, 'order' => $order]);
    $persons = $this->Persons->find('all', ['conditions' => $conditions, 'order' => $order]);
    $phones = $this->Phones->find('all', ['conditions' => $conditions, 'order' => $order]);
    $openings = $this->Openings->find('all', ['conditions' => $conditions, 'order' => $order]);

    $datas = [
      'categories' => $categories->toArray(),
      'persons' => $persons->toArray(),
      'phones' => $phones->toArray(),
      'openings' => $openings->toArray(),
    ];

    // Set the view vars that have to be serialized.
    $this->set('datas', $datas);
    // Specify which view vars JsonView should serialize.
    $this->viewBuilder()->setOption('serialize', ['datas']);

  }
    
  
}
