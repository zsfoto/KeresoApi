<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\View\JsonView;

/**
 * Persons Controller
 *
 * @property \App\Model\Table\PersonsTable $Persons
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonsController extends AppController
{
    public function viewClasses(): array
    {
        return [JsonView::class];
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // $_SESSION['Auth']->id
        $this->paginate = [
            'contain' => ['Categories', 'Cities'],
            // 'Persons.action !=' => 'del',
            'conditions' => ['Persons.user_id' => $this->request->getSession()->read('Auth.id')],
            'order' => ['Persons.modified' => 'desc']
        ];
        $persons = $this->paginate($this->Persons);

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
        $person = $this->Persons->get($id, [
            'contain' => ['Categories', 'Cities', 'Openings', 'Phones'],
        ]);

        $this->set(compact('person'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $person = $this->Persons->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $this->loadModel('Categories');
            $category = $this->Categories->find('all')->where(['id' => $data['category_id']])->first();
            $data['slug'] = $this->_slug($data['name'] . ' ' . $data['description'] . ' ' . $data['keywords']);
            $data['user_id'] = $this->request->getAttribute('identity')->id;
            $data['action'] = 'new';
            //if ($data['iconType'] == ''){ 	$data['iconType'] = 'Ionicons'; }
			//if ($data['icon'] == ''){ 		$data['icon'] = 'person-outline'; }
            //if (isset($data['iconType']) && $data['iconType'] == ''){ 	$data['iconType'] = 'Ionicons'; }
			//if (isset($data['icon']) && $data['icon'] == ''){ 		$data['icon'] = 'person-outline'; }
            $data['iconType'] = 'Ionicons';
            $data['icon'] = 'person-outline';

			for($i = 0; $i <= 99; $i++){
				if($data['phone_name' . $i] != '' || $data['phone_phone' . $i] != '' || $data['phone_email' . $i] != ''){
					$data['phones'][] = [
						'id' 			=> $data['phone_id' . $i],
						'user_id'		=> $this->request->getAttribute('identity')->id,
						'person_id'		=> $id, // Person id
						'name' 			=> $data['phone_name' . $i],
						'description' 	=> $data['phone_description' . $i],
						'phone' 		=> $data['phone_phone' . $i],
						'ext' 			=> $data['phone_ext' . $i],
						'email' 		=> $data['phone_email' . $i],
						'slug' 			=> $this->_slug($data['phone_name' . $i] . ' ' .$data['phone_description' . $i]),
						'action' 		=> 'upd',
					];
				}else{
					unset($data['phone_id' . $i]);
					unset($data['phone_name' . $i]);
					unset($data['phone_description' . $i]);
					unset($data['phone_phone' . $i]);
					unset($data['phone_ext' . $i]);
					unset($data['phone_email' . $i]);
					unset($data['phone_slug' . $i]);
				}
            }

			for($i = 0; $i <= 6; $i++){
				if($data['open_name' . $i] != '' || $data['open_from' . $i] != '' || $data['open_to' . $i] != ''){
                    $data['open_from' . $i] = $data['open_from' . $i];
					$data['openings'][] = [
						'id' 			=> $data['open_id' . $i],
						'user_id'		=> $this->request->getAttribute('identity')->id,
						'person_id'		=> $id, // Person id
						'name' 			=> $data['open_name' . $i],
						'hour_from' 	=> $data['open_from' . $i],
						'hour_to' 		=> $data['open_to' . $i],
						'comment' 		=> $data['open_comment' . $i],
						'action' 		=> 'upd',
					];
				}else{
					unset($data['open_id' . $i]);
					unset($data['open_name' . $i]);
					unset($data['open_from' . $i]);
					unset($data['open_to' . $i]);
					unset($data['open_comment' . $i]);
				}
            }

            //debug($data); die();

            $person = $this->Persons->patchEntity($person, $data);
            if ($this->Persons->save($person)) {
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
        $categories = $this->Persons->Categories->find('list', ['limit' => 0])->all();
        $cities = $this->Persons->Cities->find('list', ['limit' => 0])->all();
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
        $person = $this->Persons->get($id, [
            'contain' => ['Phones', 'Openings'],
        ]);

        if($person->user_id != $this->request->getAttribute('identity')->id){
            $this->loadModel('MyUsers');
            $user = $this->MyUsers->get($this->request->getAttribute('identity')->id);
            //debug($user); die();
            $user_data['id'] = $user->id;
            $user_data['warning'] = $user->warning + 1;

            if ($user->warning > 3){
                $user_data['active'] = 0;
            }

            $user_data['warning_comment'] = $user->warning_comment . "\n" . date('Y.m.d H:i:s') . " : Megpróbált más tulajdonában lévő persons rekordot elérni! Figyelmeztetve!";
            $user = $this->MyUsers->patchEntity($user, $user_data);
            $this->MyUsers->save($user);

            if ($user->warning > 3){
                // Ön már háromszor volt figyelmeztetve így a rendszerünk automatikusan kizárta egy időre ameddig az adminisztrátorok nem engedéylezik ismét a belépését.
                // Ha szeretné mielőbb használni az oldalt, akkor kérem vegye fel a kapcsolatot a következő email címen az adminisztrátorokkal: info@a-kereso.hu

                //You have already been warned three times, so our system automatically excluded you for a while until the administrators allow you to enter again.
                //If you would like to use the site as soon as possible, please contact the administrators at the following email address: info@a-kereso.hu
                $this->Flash->error(__('You have already been warned three times, so our system automatically excluded you for a while until the administrators allow you to enter again.'));
                $this->Flash->error(__('If you would like to use the site as soon as possible, please contact the administrators at the following email address: info@a-kereso.hu'));

                // Emailt-t küldeni neki, hogy ráérjen olvasgatni.

                return $this->redirect('/logout');
            }

            // Megpróbált hozzáférni valaki más tulajdonában lévő adatokhoz. Ez az első figyelmeztetésed. A 3. figyelmeztetés korlátozást von maga után.
            $this->Flash->error(__('You tried to access data owned by someone else. This is your first warning. Warning 3 entails a limitation.'));
            return $this->redirect(['action' => 'index']);
        }


        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $this->loadModel('Categories');
            $category = $this->Categories->find('all')->where(['id' => $data['category_id']])->first();            
            $data['slug'] = $this->_slug($data['name'] . ' ' . $data['description'] . ' ' . $data['keywords']);
            $data['action'] = 'upd';
            //if ($data['iconType'] == ''){ 	$data['iconType'] = 'Ionicons'; }
			//if ($data['icon'] == ''){ 		$data['icon'] = 'person-outline'; }
            //if (isset($data['iconType']) && $data['iconType'] == ''){ 	$data['iconType'] = 'Ionicons'; }
			//if (isset($data['icon']) && $data['icon'] == ''){ 		$data['icon'] = 'person-outline'; }
            $data['iconType'] = 'Ionicons';
            $data['icon'] = 'person-outline';

			for($i = 0; $i <= 99; $i++){
				if($data['phone_name' . $i] != '' || $data['phone_phone' . $i] != '' || $data['phone_email' . $i] != ''){
					$data['phones'][] = [
						'id' 			=> $data['phone_id' . $i],
						'user_id'		=> $this->request->getAttribute('identity')->id,
						'person_id'		=> $id, // Person id
						'name' 			=> $data['phone_name' . $i],
						'description' 	=> $data['phone_description' . $i],
						'phone' 		=> $data['phone_phone' . $i],
						'ext' 			=> $data['phone_ext' . $i],
						'email' 		=> $data['phone_email' . $i],
						'slug' 			=> $this->_slug($data['phone_name' . $i] . ' ' .$data['phone_description' . $i]),
						'action' 		=> 'upd',
					];
				}else{
					unset($data['phone_id' . $i]);
					unset($data['phone_name' . $i]);
					unset($data['phone_description' . $i]);
					unset($data['phone_phone' . $i]);
					unset($data['phone_ext' . $i]);
					unset($data['phone_email' . $i]);
					unset($data['phone_slug' . $i]);
				}
            }

			for($i = 0; $i <= 6; $i++){
				if($data['open_name' . $i] != '' || $data['open_from' . $i] != '' || $data['open_to' . $i] != ''){
                    $data['open_from' . $i] = $data['open_from' . $i];
					$data['openings'][] = [
						'id' 			=> $data['open_id' . $i],
						'user_id'		=> $this->request->getAttribute('identity')->id,
						'person_id'		=> $id, // Person id
						'name' 			=> $data['open_name' . $i],
						'hour_from' 	=> $data['open_from' . $i],
						'hour_to' 		=> $data['open_to' . $i],
						'comment' 		=> $data['open_comment' . $i],
						'action' 		=> 'upd',
					];
				}else{
					unset($data['open_id' . $i]);
					unset($data['open_name' . $i]);
					unset($data['open_from' . $i]);
					unset($data['open_to' . $i]);
					unset($data['open_comment' . $i]);
				}
            }

            //debug($data); die();

            $person = $this->Persons->patchEntity($person, $data);
            if ($this->Persons->save($person)) {
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
        $categories = $this->Persons->Categories->find('list', ['limit' => 1])->where(['id' => $person->category_id])->all();
        $cities = $this->Persons->Cities->find('list', ['limit' => 1])->where(['id' => $person->city_id])->all();

        //debug($person->toArray());
        //debug($categories->toArray());
        //debug($cities->toArray()); die();

        $this->set(compact('person', 'categories', 'cities'));
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
        $data = ['id' => $id, 'action' => 'del'];
        $person = $this->Persons->patchEntity($person, $data);
        if ($this->Persons->save($person)) {
            $this->Flash->success(__('The person/company has been deleted.'));
            $this->loadModel('Phones');
            $this->Phones->updateAll(['action' => 'del'], ['person_id' => $id]);
            $this->loadModel('Openings');
            $this->Openings->updateAll(['action' => 'del'], ['person_id' => $id]);
        }else{
            $this->Flash->error(__('The person/company could not be deleted. Please, try again.'));
        }

        /*
        if ($this->Persons->delete($person)) {
            $this->Flash->success(__('The person has been deleted.'));
        } else {
            $this->Flash->error(__('The person could not be deleted. Please, try again.'));
        }
        */

        return $this->redirect(['action' => 'index']);
    }















    /**
     * Edit method
     *
     * @param string|null $id Person id.
     * @param string|null $category_id Category id.
     */
    public function ajaxSaveCategory($id = null)
    {
        $response = [
            'success' => false,
            'message' => 'The category could not be saved. Please, try again.',
        ];

        if ($this->request->is(['patch', 'post', 'put', 'ajax'])) {
            $id = $this->request->getData('id');
            $category_id = $this->request->getData('category_id');
    
            $person = $this->Persons->get($id);
            $data = [
                'id' => $id,
                'category_id' => $category_id,
            ];
            
            //$data = $this->request->getData();

            $person = $this->Persons->patchEntity($person, $data);
            if ($this->Persons->save($person)) {
                $response = [
                    'success' => true,
                    'message' => __('The category has been saved.'),
                ];
            }
        }        

        $content = json_encode($response);
        $length = strlen($content);
        header('Content-Length: '.$length);
        header('Content-Type: application/json');
        echo $content;
        die();

        //$this->set('response', $response);
        //$this->viewBuilder()->setOption('serialize', ['response']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Person id.
     * @param string|null $category_id Category id.
     */
    public function ajaxSaveCity($id = null)
    {
        $response = [
            'success' => false,
            'message' => 'The city could not be saved. Please, try again.',
        ];

        if ($this->request->is(['patch', 'post', 'put', 'ajax'])) {
            $id = $this->request->getData('id');
            $city_id = $this->request->getData('city_id');
    
            $person = $this->Persons->get($id);
            $data = [
                'id' => $id,
                'city_id' => $city_id,
            ];
            
            //$data = $this->request->getData();

            $person = $this->Persons->patchEntity($person, $data);
            if ($this->Persons->save($person)) {
                $response = [
                    'success' => true,
                    'message' => __('The city has been saved.'),
                ];
            }
        }        

        $content = json_encode($response);
        $length = strlen($content);
        header('Content-Length: '.$length);
        header('Content-Type: application/json');
        echo $content;
        die();

        //$this->set('response', $response);
        //$this->viewBuilder()->setOption('serialize', ['response']);
    }

    private function _slug($text = null){
        if($text == null){
            return '';
        }

        $char = '';
        $chars = [
            'á' => 'a', 'Á' => 'A', 'í' => 'i', 'Í' => 'I', 'é' => 'e', 'É' => 'E', 'ő' => 'o', 'Ő' => 'O', 'ú' => 'u', 'Ú' => 'U',
            'ö' => 'o', 'Ö' => 'O', 'ü' => 'u', 'Ü' => 'U', 'ó' => 'o', 'Ó' => 'O', 'ä' => 'a', 'Ä' => 'A',
            ',' => '',  '.' => '',  '-' => '',  ';' => '',  '?' => '',  ':' => '', '<' => '',  '>' => '', 
        ];
        $slug = strtolower($text);

        foreach($chars as $key => $char){
            $slug = str_replace($key, $char, $slug);
        }

        return $slug;
    }


}
