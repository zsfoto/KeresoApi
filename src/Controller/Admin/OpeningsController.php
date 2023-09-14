<?php
// Baked at 2023.09.14. 10:35:09
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;

/**
 * Openings Controller
 *
 * @property \App\Model\Table\OpeningsTable $Openings
 * @method \App\Model\Entity\Opening[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OpeningsController extends AppController
{

    /**
     * Initialize controller
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
		$this->set('title', __('Openings'));
		
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
		$openings = null;
		
		$this->set('title', __('Openings'));

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
				//'Openings.name' 		=> 1,
				//'Openings.visible' 		=> 1,
				//'Openings.created >= ' 	=> new \DateTime('-10 days'),
				//'Openings.modified >= '	=> new \DateTime('-10 days'),
			],
			/*
			// Nem tanácsos az order-t itt használni, mert pl az edit után az utolsó  ordert ugyan beálíltja, de
			// kiegészíti ezzel s így az utoljára mentett rekord nem lesz megtalálható az X-edik oldalon, mert az az elsőre kerül.
			// A felhasználó állítson be rendezettséget magának! Kivételes esetek persze lehetnek!
			*/
			'order' => [
				//'Openings.id' 			=> 'desc',
				//'Openings.name' 		=> 'asc',
				//'Openings.visible' 		=> 'desc',
				//'Openings.pos' 			=> 'desc',
				//'Openings.rank' 		=> 'asc',
				//'Openings.created' 		=> 'desc',
				//'Openings.modified' 	=> 'desc',
			],
			'limit' => $this->config['index_number_of_rows'],
			'maxLimit' => $this->config['index_number_of_rows'],
			//'sortableFields' => ['id', 'name', 'created', '...'],
			//'paramType' => 'querystring',
			//'fields' => ['Openings.id', 'Openings.name', ...],
			//'finder' => 'published',
        ];

		//$this->paging = $this->session->read('Layout.' . $this->controller . '.Paging');

		if( $this->paging === null){
			$this->paginate['order'] = [
				//'Openings.id' 			=> 'desc',
				//'Openings.name' 		=> 'asc',
				//'Openings.visible' 		=> 'desc',
				//'Openings.pos' 			=> 'desc',
				//'Openings.rank' 		=> 'asc',
				//'Openings.created' 		=> 'desc',
				//'Openings.modified' 	=> 'desc',
			];
		}else{
			if($this->request->getQuery('sort') === null && $this->request->getQuery('direction') === null){
				$this->paginate['order'] = [
					// If not in URL-ben, then come from sessinon...
					$this->paging['Openings']['sort'] => $this->paging['Openings']['direction']	
				];
			}
		}

		if($this->request->getQuery('page') === null && !isset($this->paging['Openings']['page']) ){
			$this->paginate['page'] = 1;
		}else{
			$this->paginate['page'] = (isset($this->paging['Openings']['page'])) ? $this->paging['Openings']['page'] : 1;
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
						//	'page'		=> $this->paging['Openings']['page'], 	// Vagy 1
						//	'sort'		=> $this->paging['Openings']['sort'], 
						//	'direction'	=> $this->paging['Openings']['direction'],
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
			//$this->paginate['conditions'] = ['Openings.name LIKE' => $q ];
			$this->paginate['conditions'][] = [
				'OR' => [
					['Openings.name LIKE' => $search['s'] ],
					//['Openings.title LIKE' => $search['s'] ], // ... just add more fields
				]
			];
			
		}
		// -- /.Filter --
		
		try {
			$openings = $this->paginate($this->Openings);
		} catch (NotFoundException $e) {
			$paging = $this->request->getAttribute('paging');
			if($paging['Openings']['prevPage'] !== null && $paging['Openings']['prevPage']){
				if($paging['Openings']['page'] !== null && $paging['Openings']['page'] > 0){
					return $this->redirect([
						'controller' => $this->controller, 
						'action' => 'index', 
						'?' => [
							'page'		=> 1,	//$this->paging['Openings']['page'],
							'sort'		=> $this->paging['Openings']['sort'],
							'direction'	=> $this->paging['Openings']['direction'],
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
		$this->set(compact('openings'));
		
	}


    /**
     * View method
     *
     * @param string|null $id Opening id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->set('title', __('Opening'));
		
        $opening = $this->Openings->get($id, [
            'contain' => ['MyUsers', 'Persons'],
        ]);

		$this->session->write('Layout.' . $this->controller . '.LastId', $id);

		$name = $opening->name;

        $this->set(compact('opening', 'id', 'name'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->set('title', __('Opening'));
        $opening = $this->Openings->newEmptyEntity();
        if ($this->request->is('post')) {
            $opening = $this->Openings->patchEntity($opening, $this->request->getData());
            if ($this->Openings->save($opening)) {
                //$this->Flash->success(__('The opening has been saved.'));
                $this->Flash->success(__('Has been saved.'));

				$this->session->write('Layout.' . $this->controller . '.LastId', $opening->id);
	
                //return $this->redirect(['action' => 'index']);
                return $this->redirect([
					'controller' => $this->controller, 
					'action' => 'index', 
					'?' => [
						'page'		=> 1,
						'sort'		=> 'id',
						'direction'	=> 'desc',
					],
					'#' => $opening->id	// Az állandó header miatt takarásban van még. Majd...
				]);

                return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('The opening could not be saved. Please, try again.'));
			$this->Flash->error(__('Could not be saved. Please, try again.'));
        }
        //$myUsers = $this->Openings->MyUsers->find('list', ['limit' => 200]);	// Original
		//$myUsers = $this->Openings->MyUsers->find('list', ['limit' => 200, 'conditions'=>['MyUsers.visible' => 1], 'order'=>['MyUsers.pos' => 'asc', 'MyUsers.name' => 'asc']]);
		$myUsers = $this->Openings->MyUsers->find('list', ['limit' => 200, 'order'=>['MyUsers.pos' => 'asc', 'MyUsers.name' => 'asc']]);
        //$persons = $this->Openings->Persons->find('list', ['limit' => 200]);	// Original
		//$persons = $this->Openings->Persons->find('list', ['limit' => 200, 'conditions'=>['Persons.visible' => 1], 'order'=>['Persons.pos' => 'asc', 'Persons.name' => 'asc']]);
		$persons = $this->Openings->Persons->find('list', ['limit' => 200, 'order'=>['Persons.pos' => 'asc', 'Persons.name' => 'asc']]);
        $this->set(compact('opening', 'myUsers', 'persons'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Opening id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->set('title', __('Opening'));
        $opening = $this->Openings->get($id, [
            'contain' => [],
        ]);

		$this->session->write('Layout.' . $this->controller . '.LastId', $id);

        if ($this->request->is(['patch', 'post', 'put'])) {
			//debug($this->request->getData()); //die();
            $opening = $this->Openings->patchEntity($opening, $this->request->getData());
            //debug($opening); //die();
			if ($this->Openings->save($opening)) {
                //$this->Flash->success(__('The opening has been saved.'));
                $this->Flash->success(__('Has been saved.'));
				
				//return $this->redirect(['action' => 'index']);
                return $this->redirect([
					'controller' => $this->controller, 
					'action' => 'index', 
					'?' => [
						'page'		=> (isset($this->paging['Openings']['page'])) ? $this->paging['Openings']['page'] : 1, 		// or 1
						'sort'		=> (isset($this->paging['Openings']['sort'])) ? $this->paging['Openings']['sort'] : 'created', 
						'direction'	=> (isset($this->paging['Openings']['direction'])) ? $this->paging['Openings']['direction'] : 'desc',
					],
					'#' => $id
				]);
				
            }
            //$this->Flash->error(__('The opening could not be saved. Please, try again.'));
            $this->Flash->error(__('Could not be saved. Please, try again.'));
        }
        //$myUsers = $this->Openings->MyUsers->find('list', ['limit' => 200]);
		//$myUsers = $this->Openings->MyUsers->find('list', ['limit' => 200, 'conditions'=>['MyUsers.visible' => 1], 'order'=>['MyUsers.pos' => 'asc', 'MyUsers.name' => 'asc']]);
		$myUsers = $this->Openings->MyUsers->find('list', ['limit' => 200, 'order'=>['MyUsers.pos' => 'asc', 'MyUsers.name' => 'asc']]);
        //$persons = $this->Openings->Persons->find('list', ['limit' => 200]);
		//$persons = $this->Openings->Persons->find('list', ['limit' => 200, 'conditions'=>['Persons.visible' => 1], 'order'=>['Persons.pos' => 'asc', 'Persons.name' => 'asc']]);
		$persons = $this->Openings->Persons->find('list', ['limit' => 200, 'order'=>['Persons.pos' => 'asc', 'Persons.name' => 'asc']]);

		$name = $opening->name;

        $this->set(compact('opening', 'myUsers', 'persons', 'id', 'name'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Opening id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $opening = $this->Openings->get($id);
        if ($this->Openings->delete($opening)) {
            //$this->Flash->success(__('The opening has been deleted.'));
            $this->Flash->success(__('Has been deleted.'));
        } else {
            //$this->Flash->error(__('The opening could not be deleted. Please, try again.'));
            $this->Flash->error(__('Could not be deleted. Please, try again.'));
        }

        //return $this->redirect(['action' => 'index']);
		return $this->redirect([
			'controller' => $this->controller, 
			'action' => 'index', 
			'?' => [
				'page'		=> $this->paging['Openings']['page'], 
				'sort'		=> $this->paging['Openings']['sort'], 
				'direction'	=> $this->paging['Openings']['direction'],
			]
		]);
		
    }

}

