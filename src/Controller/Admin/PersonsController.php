<?php
// Baked at 2023.09.14. 10:34:29
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;

/**
 * Persons Controller
 *
 * @property \App\Model\Table\PersonsTable $Persons
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonsController extends AppController
{

    /**
     * Initialize controller
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
		$this->set('title', __('Persons'));
		
	}
	
    /**
     * Index method
     *
	 * @param string|null $param: if($param !== null && $param == 'clear-filter')...
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($param = null)
    {
		$search = null;
		$persons = null;
		
		$this->set('title', __('Persons'));

		//$this->config['index_number_of_rows'] = 10;
		if($this->config['index_number_of_rows'] === null){
			$this->config['index_number_of_rows'] = 20;
		}
		
		// Clear filter from session
		if($param !== null && $param == 'clear-filter'){
			$this->session->delete('Layout.' . $this->controller . '.Search');
			$this->redirect( $this->request->referer() );
		}		
		
        $this->paginate = [
            'contain' => ['MyUsers', 'Categories', 'Cities'],
			'conditions' => [
				//'Persons.name' 		=> 1,
				//'Persons.visible' 		=> 1,
				//'Persons.created >= ' 	=> new \DateTime('-10 days'),
				//'Persons.modified >= '	=> new \DateTime('-10 days'),
			],
			/*
			// Nem tanácsos az order-t itt használni, mert pl az edit után az utolsó  ordert ugyan beálíltja, de
			// kiegészíti ezzel s így az utoljára mentett rekord nem lesz megtalálható az X-edik oldalon, mert az az elsőre kerül.
			// A felhasználó állítson be rendezettséget magának! Kivételes esetek persze lehetnek!
			*/
			'order' => [
				//'Persons.id' 			=> 'desc',
				//'Persons.name' 		=> 'asc',
				//'Persons.visible' 		=> 'desc',
				//'Persons.pos' 			=> 'desc',
				//'Persons.rank' 		=> 'asc',
				//'Persons.created' 		=> 'desc',
				//'Persons.modified' 	=> 'desc',
			],
			'limit' => $this->config['index_number_of_rows'],
			'maxLimit' => $this->config['index_number_of_rows'],
			//'sortableFields' => ['id', 'name', 'created', '...'],
			//'paramType' => 'querystring',
			//'fields' => ['Persons.id', 'Persons.name', ...],
			//'finder' => 'published',
        ];

		//$this->paging = $this->session->read('Layout.' . $this->controller . '.Paging');

		if( $this->paging === null){
			$this->paginate['order'] = [
				//'Persons.id' 			=> 'desc',
				//'Persons.name' 		=> 'asc',
				//'Persons.visible' 		=> 'desc',
				//'Persons.pos' 			=> 'desc',
				//'Persons.rank' 		=> 'asc',
				//'Persons.created' 		=> 'desc',
				//'Persons.modified' 	=> 'desc',
			];
		}else{
			if($this->request->getQuery('sort') === null && $this->request->getQuery('direction') === null){
				$this->paginate['order'] = [
					// If not in URL-ben, then come from sessinon...
					$this->paging['Persons']['sort'] => $this->paging['Persons']['direction']	
				];
			}
		}

		if($this->request->getQuery('page') === null && !isset($this->paging['Persons']['page']) ){
			$this->paginate['page'] = 1;
		}else{
			$this->paginate['page'] = (isset($this->paging['Persons']['page'])) ? $this->paging['Persons']['page'] : 1;
		}
		
		// -- Filter --
		if ($this->request->is('post') || $this->session->read('Layout.' . $this->controller . '.Search') !== null && $this->session->read('Layout.' . $this->controller . '.Search') !== []) {
				
			if( $this->request->is('post') ){
				$search = $this->request->getData();
				$this->session->write('Layout.' . $this->controller . '.Search', $search);
				if($search !== null && $search['s'] !== null && $search['s'] == ''){
					$this->session->delete('Layout.' . $this->controller . '.Search');
					return $this->redirect([
						'controller' => $this->controller, 
						'action' => 'index', 
						//'?' => [			// Not tested!!!
						//	'page'		=> $this->paging['Persons']['page'], 	// Vagy 1
						//	'sort'		=> $this->paging['Persons']['sort'], 
						//	'direction'	=> $this->paging['Persons']['direction'],
						//]
					]);
				}
			}else{
				if($this->session->check('Layout.' . $this->controller . '.Search')){
					$search = $this->session->read('Layout.' . $this->controller . '.Search');
				}
			}

			$this->set('search', $search['s']);
			
			$search['s'] = '%'.str_replace(' ', '%', $search['s']).'%';
			//$this->paginate['conditions'] = ['Persons.name LIKE' => $q ];
			$this->paginate['conditions'][] = [
				'OR' => [
					['Persons.name LIKE' => $search['s'] ],
					//['Persons.title LIKE' => $search['s'] ], // ... just add more fields
				]
			];
			
		}
		// -- /.Filter --
		
		try {
			$persons = $this->paginate($this->Persons);
		} catch (NotFoundException $e) {
			$paging = $this->request->getAttribute('paging');
			if($paging['Persons']['prevPage'] !== null && $paging['Persons']['prevPage']){
				if($paging['Persons']['page'] !== null && $paging['Persons']['page'] > 0){
					return $this->redirect([
						'controller' => $this->controller, 
						'action' => 'index', 
						'?' => [
							'page'		=> 1,	//$this->paging['Persons']['page'],
							'sort'		=> $this->paging['Persons']['sort'],
							'direction'	=> $this->paging['Persons']['direction'],
						],
					]);			
				}
			}
			
		}

		$paging = $this->request->getAttribute('paging');

		if($this->paging !== $paging){
			$this->paging = $paging;
			$this->session->write('Layout.' . $this->controller . '.Paging', $paging);
		}

		$this->set('paging', $this->paging);
		$this->set('layout' . $this->controller . 'LastId', $this->session->read('Layout.' . $this->controller . '.LastId'));
		$this->set(compact('persons'));
		
	}


    /**
     * View method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->set('title', __('Person'));
		
        $person = $this->Persons->get($id, [
            'contain' => ['MyUsers', 'Categories', 'Cities', 'Openings', 'Phones'],
        ]);

		$this->session->write('Layout.' . $this->controller . '.LastId', $id);

		$name = $person->name;

        $this->set(compact('person', 'id', 'name'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->set('title', __('Person'));
        $person = $this->Persons->newEmptyEntity();
        if ($this->request->is('post')) {
            $person = $this->Persons->patchEntity($person, $this->request->getData());
            if ($this->Persons->save($person)) {
                //$this->Flash->success(__('The person has been saved.'));
                $this->Flash->success(__('Has been saved.'));

				$this->session->write('Layout.' . $this->controller . '.LastId', $person->id);
	
                //return $this->redirect(['action' => 'index']);
                return $this->redirect([
					'controller' => $this->controller, 
					'action' => 'index', 
					'?' => [
						'page'		=> 1,
						'sort'		=> 'id',
						'direction'	=> 'desc',
					],
					'#' => $person->id	// Az állandó header miatt takarásban van még. Majd...
				]);

                return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('The person could not be saved. Please, try again.'));
			$this->Flash->error(__('Could not be saved. Please, try again.'));
        }
        //$myUsers = $this->Persons->MyUsers->find('list', ['limit' => 200]);	// Original
		//$myUsers = $this->Persons->MyUsers->find('list', ['limit' => 200, 'conditions'=>['MyUsers.visible' => 1], 'order'=>['MyUsers.pos' => 'asc', 'MyUsers.name' => 'asc']]);
		//$myUsers = $this->Persons->MyUsers->find('list', ['limit' => 200, 'order'=>['MyUsers.pos' => 'asc', 'MyUsers.name' => 'asc']]);
        //$categories = $this->Persons->Categories->find('list', ['limit' => 200]);	// Original
		//$categories = $this->Persons->Categories->find('list', ['limit' => 200, 'conditions'=>['Categories.visible' => 1], 'order'=>['Categories.pos' => 'asc', 'Categories.name' => 'asc']]);
		$categories = $this->Persons->Categories->find('list', ['limit' => 200, 'order'=>['Categories.pos' => 'asc', 'Categories.name' => 'asc']]);
        //$cities = $this->Persons->Cities->find('list', ['limit' => 200]);	// Original
		//$cities = $this->Persons->Cities->find('list', ['limit' => 200, 'conditions'=>['Cities.visible' => 1], 'order'=>['Cities.pos' => 'asc', 'Cities.name' => 'asc']]);
		$cities = $this->Persons->Cities->find('list', ['limit' => 20000, 'order'=>['Cities.name' => 'asc']]);
        $this->set(compact('person', 'categories', 'cities'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->set('title', __('Person'));
        $person = $this->Persons->get($id, [
            'contain' => [],
        ]);

		$this->session->write('Layout.' . $this->controller . '.LastId', $id);

        if ($this->request->is(['patch', 'post', 'put'])) {
			//debug($this->request->getData()); //die();
            $person = $this->Persons->patchEntity($person, $this->request->getData());
            //debug($person); //die();
			if ($this->Persons->save($person)) {
                //$this->Flash->success(__('The person has been saved.'));
                $this->Flash->success(__('Has been saved.'));
				
				//return $this->redirect(['action' => 'index']);
                return $this->redirect([
					'controller' => $this->controller, 
					'action' => 'index', 
					'?' => [
						'page'		=> (isset($this->paging['Persons']['page'])) ? $this->paging['Persons']['page'] : 1, 		// or 1
						'sort'		=> (isset($this->paging['Persons']['sort'])) ? $this->paging['Persons']['sort'] : 'created', 
						'direction'	=> (isset($this->paging['Persons']['direction'])) ? $this->paging['Persons']['direction'] : 'desc',
					],
					'#' => $id
				]);
				
            }
            //$this->Flash->error(__('The person could not be saved. Please, try again.'));
            $this->Flash->error(__('Could not be saved. Please, try again.'));
        }
        //$myUsers = $this->Persons->MyUsers->find('list', ['limit' => 200]);
		//$myUsers = $this->Persons->MyUsers->find('list', ['limit' => 200, 'conditions'=>['MyUsers.visible' => 1], 'order'=>['MyUsers.pos' => 'asc', 'MyUsers.name' => 'asc']]);
		//$myUsers = $this->Persons->MyUsers->find('list', ['limit' => 200, 'order'=>['MyUsers.pos' => 'asc', 'MyUsers.name' => 'asc']]);
        //$categories = $this->Persons->Categories->find('list', ['limit' => 200]);
		//$categories = $this->Persons->Categories->find('list', ['limit' => 200, 'conditions'=>['Categories.visible' => 1], 'order'=>['Categories.pos' => 'asc', 'Categories.name' => 'asc']]);
		$categories = $this->Persons->Categories->find('list', ['limit' => 200, 'order'=>['Categories.pos' => 'asc', 'Categories.name' => 'asc']]);
        //$cities = $this->Persons->Cities->find('list', ['limit' => 200]);
		//$cities = $this->Persons->Cities->find('list', ['limit' => 200, 'conditions'=>['Cities.visible' => 1], 'order'=>['Cities.pos' => 'asc', 'Cities.name' => 'asc']]);
		$cities = $this->Persons->Cities->find('list', ['limit' => 20000, 'order'=>['Cities.name' => 'asc']]);

		$name = $person->name;

        $this->set(compact('person', 'categories', 'cities', 'id', 'name'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $person = $this->Persons->get($id);
        if ($this->Persons->delete($person)) {
            //$this->Flash->success(__('The person has been deleted.'));
            $this->Flash->success(__('Has been deleted.'));
        } else {
            //$this->Flash->error(__('The person could not be deleted. Please, try again.'));
            $this->Flash->error(__('Could not be deleted. Please, try again.'));
        }

        //return $this->redirect(['action' => 'index']);
		return $this->redirect([
			'controller' => $this->controller, 
			'action' => 'index', 
			'?' => [
				'page'		=> $this->paging['Persons']['page'], 
				'sort'		=> $this->paging['Persons']['sort'], 
				'direction'	=> $this->paging['Persons']['direction'],
			]
		]);
		
    }

}

