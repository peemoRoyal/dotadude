<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GoldXp Controller
 *
 * @property \App\Model\Table\GoldXpTable $GoldXp
 */
class GoldXpController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($matchId = '')
    {
        //Davor python ausführen und nur redirecten wenn success
        $goldXp = $this->paginate($this->GoldXp);
        // IN MODEL
        $allHeroes = $this->GoldXp->findAllByMatchId($matchId)->toArray();

        $this->FrontendBridge->setJson(
              'allHeroes',
              $allHeroes
        );
    }

    /**
     * View method
     *
     * @param string|null $id Gold Xp id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $goldXp = $this->GoldXp->get($id, [
            'contain' => []
        ]);
        $this->FrontendBridge->set('penis', 2);

        $this->set('goldXp', $goldXp);
        $this->set('_serialize', ['goldXp']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $goldXp = $this->GoldXp->newEntity();
        if ($this->request->is('post')) {
            $goldXp = $this->GoldXp->patchEntity($goldXp, $this->request->data);
            if ($this->GoldXp->save($goldXp)) {
                $this->Flash->success(__('The gold xp has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The gold xp could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('goldXp'));
        $this->set('_serialize', ['goldXp']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gold Xp id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $goldXp = $this->GoldXp->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $goldXp = $this->GoldXp->patchEntity($goldXp, $this->request->data);
            if ($this->GoldXp->save($goldXp)) {
                $this->Flash->success(__('The gold xp has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The gold xp could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('goldXp'));
        $this->set('_serialize', ['goldXp']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gold Xp id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $goldXp = $this->GoldXp->get($id);
        if ($this->GoldXp->delete($goldXp)) {
            $this->Flash->success(__('The gold xp has been deleted.'));
        } else {
            $this->Flash->error(__('The gold xp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
