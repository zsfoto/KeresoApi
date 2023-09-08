<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Openings Controller
 *
 * @property \App\Model\Table\OpeningsTable $Openings
 * @method \App\Model\Entity\Opening[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OpeningsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $openings = $this->paginate($this->Openings);

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
        $opening = $this->Openings->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('opening'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $opening = $this->Openings->newEmptyEntity();
        if ($this->request->is('post')) {
            $opening = $this->Openings->patchEntity($opening, $this->request->getData());
            if ($this->Openings->save($opening)) {
                $this->Flash->success(__('The opening has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The opening could not be saved. Please, try again.'));
        }
        $this->set(compact('opening'));
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
        $opening = $this->Openings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $opening = $this->Openings->patchEntity($opening, $this->request->getData());
            if ($this->Openings->save($opening)) {
                $this->Flash->success(__('The opening has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The opening could not be saved. Please, try again.'));
        }
        $this->set(compact('opening'));
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
            $this->Flash->success(__('The opening has been deleted.'));
        } else {
            $this->Flash->error(__('The opening could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
