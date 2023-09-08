<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;


class FindersController extends AppController
{
  
    public function index($param = null)
    {
      $categories = ['name' => 'Alma'];

      debug($categories);
      die();

      if($param == 'categoies'){
        $categories = $this->fetchTable('Categories')->find('all', [
            'limit' => 5,
            'order' => 'Categories.modified DESC'
        ])
        ->all()
        ->toArray();

        debug($categories);
        die();
      }

      echo json_encode($categories);
      die();

    }

    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => ['Persons'],
        ]);

        $this->set(compact('category'));
    }
    
}
