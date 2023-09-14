<?php
// Baked at 2023.09.14. 10:34:49
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;

/**
 * Phones Controller
 *
 * @property \App\Model\Table\PhonesTable $Phones
 * @method \App\Model\Entity\Phone[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhonesController extends AppController
{

    /**
     * Initialize controller
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
		$this->set('title', __('Phones'));
		
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
		$phones = null;
		
		$this->set('title', __('Phones'));

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
            'contain' => ['MyUsers', 'Persons'],
			'conditions' => [
				//'Phones.name' 		=> 1,
				//'Phones.visible' 		=> 1,
				//'Phones.created >= ' 	=> new \DateTime('-10 days'),
				//'Phones.modified >= '	=> new \DateTime('-10 days'),
			],
			/*
			// Nem tanácsos az order-t itt használni, mert pl az edit után az utolsó  ordert ugyan beálíltja, de
			// kiegészíti ezzel s így az utoljára mentett rekord nem lesz megtalálható az X-edik oldalon, mert az az elsőre kerül.
			// A felhasználó állítson be rendezettséget magának! Kivételes esetek persze lehetnek!
			*/
			'order' => [
				//'Phones.id' 			=> 'desc',
				//'Phones.name' 		=> 'asc',
				//'Phones.visible' 		=> 'desc',
				//'Phones.pos' 			=> 'desc',
				//'Phones.rank' 		=> 'asc',
				//'Phones.created' 		=> 'desc',
				//'Phones.modified' 	=> 'desc',
			],
			'limit' => $this->config['index_number_of_rows'],
			'maxLimit' => $this->config['index_number_of_rows'],
			//'sortableFields' => ['id', 'name', 'created', '...'],
			//'paramType' => 'querystring',
			//'fields' => ['Phones.id', 'Phones.name', ...],
			//'finder' => 'published',
        ];

		//$this->paging = $this->session->read('Layout.' . $this->controller . '.Paging');

		if( $this->paging === null){
			$this->paginate['order'] = [
				//'Phones.id' 			=> 'desc',
				//'Phones.name' 		=> 'asc',
				//'Phones.visible' 		=> 'desc',
				//'Phones.pos' 			=> 'desc',
				//'Phones.rank' 		=> 'asc',
				//'Phones.created' 		=> 'desc',
				//'Phones.modified' 	=> 'desc',
			];
		}else{
			if($this->request->getQuery('sort') === null && $this->request->getQuery('direction') === null){
				$this->paginate['order'] = [
					// If not in URL-ben, then come from sessinon...
					$this->paging['Phones']['sort'] => $this->paging['Phones']['direction']	
				];
			}
		}

		if($this->request->getQuery('page') === null && !isset($this->paging['Phones']['page']) ){
			$this->paginate['page'] = 1;
		}else{
			$this->paginate['page'] = (isset($this->paging['Phones']['page'])) ? $this->paging['Phones']['page'] : 1;
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
						//	'page'		=> $this->paging['Phones']['page'], 	// Vagy 1
						//	'sort'		=> $this->paging['Phones']['sort'], 
						//	'direction'	=> $this->paging['Phones']['direction'],
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
			//$this->paginate['conditions'] = ['Phones.name LIKE' => $q ];
			$this->paginate['conditions'][] = [
				'OR' => [
					['Phones.name LIKE' => $search['s'] ],
					//['Phones.title LIKE' => $search['s'] ], // ... just add more fields
				]
			];
			
		}
		// -- /.Filter --
		
		try {
			$phones = $this->paginate($this->Phones);
		} catch (NotFoundException $e) {
			$paging = $this->request->getAttribute('paging');
			if($paging['Phones']['prevPage'] !== null && $paging['Phones']['prevPage']){
				if($paging['Phones']['page'] !== null && $paging['Phones']['page'] > 0){
					return $this->redirect([
						'controller' => $this->controller, 
						'action' => 'index', 
						'?' => [
							'page'		=> 1,	//$this->paging['Phones']['page'],
							'sort'		=> $this->paging['Phones']['sort'],
							'direction'	=> $this->paging['Phones']['direction'],
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
		$this->set(compact('phones'));
		
	}


    /**
     * View method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->set('title', __('Phone'));
		
        $phone = $this->Phones->get($id, [
            'contain' => ['MyUsers', 'Persons'],
        ]);

		$this->session->write('Layout.' . $this->controller . '.LastId', $id);

		$name = $phone->name;

        $this->set(compact('phone', 'id', 'name'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->set('title', __('Phone'));
        $phone = $this->Phones->newEmptyEntity();
        if ($this->request->is('post')) {
            $phone = $this->Phones->patchEntity($phone, $this->request->getData());
            if ($this->Phones->save($phone)) {
                //$this->Flash->success(__('The phone has been saved.'));
                $this->Flash->success(__('Has been saved.'));

				$this->session->write('Layout.' . $this->controller . '.LastId', $phone->id);
	
                //return $this->redirect(['action' => 'index']);
                return $this->redirect([
					'controller' => $this->controller, 
					'action' => 'index', 
					'?' => [
						'page'		=> 1,
						'sort'		=> 'id',
						'direction'	=> 'desc',
					],
					'#' => $phone->id	// Az állandó header miatt takarásban van még. Majd...
				]);

                return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('The phone could not be saved. Please, try again.'));
			$this->Flash->error(__('Could not be saved. Please, try again.'));
        }
        //$myUsers = $this->Phones->MyUsers->find('list', ['limit' => 200]);	// Original
		//$myUsers = $this->Phones->MyUsers->find('list', ['limit' => 200, 'conditions'=>['MyUsers.visible' => 1], 'order'=>['MyUsers.pos' => 'asc', 'MyUsers.name' => 'asc']]);
		$myUsers = $this->Phones->MyUsers->find('list', ['limit' => 200, 'order'=>['MyUsers.pos' => 'asc', 'MyUsers.name' => 'asc']]);
        //$persons = $this->Phones->Persons->find('list', ['limit' => 200]);	// Original
		//$persons = $this->Phones->Persons->find('list', ['limit' => 200, 'conditions'=>['Persons.visible' => 1], 'order'=>['Persons.pos' => 'asc', 'Persons.name' => 'asc']]);
		$persons = $this->Phones->Persons->find('list', ['limit' => 200, 'order'=>['Persons.pos' => 'asc', 'Persons.name' => 'asc']]);
        $this->set(compact('phone', 'myUsers', 'persons'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->set('title', __('Phone'));
        $phone = $this->Phones->get($id, [
            'contain' => [],
        ]);

		$this->session->write('Layout.' . $this->controller . '.LastId', $id);

        if ($this->request->is(['patch', 'post', 'put'])) {
			//debug($this->request->getData()); //die();
            $phone = $this->Phones->patchEntity($phone, $this->request->getData());
            //debug($phone); //die();
			if ($this->Phones->save($phone)) {
                //$this->Flash->success(__('The phone has been saved.'));
                $this->Flash->success(__('Has been saved.'));
				
				//return $this->redirect(['action' => 'index']);
                return $this->redirect([
					'controller' => $this->controller, 
					'action' => 'index', 
					'?' => [
						'page'		=> (isset($this->paging['Phones']['page'])) ? $this->paging['Phones']['page'] : 1, 		// or 1
						'sort'		=> (isset($this->paging['Phones']['sort'])) ? $this->paging['Phones']['sort'] : 'created', 
						'direction'	=> (isset($this->paging['Phones']['direction'])) ? $this->paging['Phones']['direction'] : 'desc',
					],
					'#' => $id
				]);
				
            }
            //$this->Flash->error(__('The phone could not be saved. Please, try again.'));
            $this->Flash->error(__('Could not be saved. Please, try again.'));
        }
        //$myUsers = $this->Phones->MyUsers->find('list', ['limit' => 200]);
		//$myUsers = $this->Phones->MyUsers->find('list', ['limit' => 200, 'conditions'=>['MyUsers.visible' => 1], 'order'=>['MyUsers.pos' => 'asc', 'MyUsers.name' => 'asc']]);
		$myUsers = $this->Phones->MyUsers->find('list', ['limit' => 200, 'order'=>['MyUsers.pos' => 'asc', 'MyUsers.name' => 'asc']]);
        //$persons = $this->Phones->Persons->find('list', ['limit' => 200]);
		//$persons = $this->Phones->Persons->find('list', ['limit' => 200, 'conditions'=>['Persons.visible' => 1], 'order'=>['Persons.pos' => 'asc', 'Persons.name' => 'asc']]);
		$persons = $this->Phones->Persons->find('list', ['limit' => 200, 'order'=>['Persons.pos' => 'asc', 'Persons.name' => 'asc']]);

		$name = $phone->name;

        $this->set(compact('phone', 'myUsers', 'persons', 'id', 'name'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $phone = $this->Phones->get($id);
        if ($this->Phones->delete($phone)) {
            //$this->Flash->success(__('The phone has been deleted.'));
            $this->Flash->success(__('Has been deleted.'));
        } else {
            //$this->Flash->error(__('The phone could not be deleted. Please, try again.'));
            $this->Flash->error(__('Could not be deleted. Please, try again.'));
        }

        //return $this->redirect(['action' => 'index']);
		return $this->redirect([
			'controller' => $this->controller, 
			'action' => 'index', 
			'?' => [
				'page'		=> $this->paging['Phones']['page'], 
				'sort'		=> $this->paging['Phones']['sort'], 
				'direction'	=> $this->paging['Phones']['direction'],
			]
		]);
		
    }

}

