<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * HospitalsServices Controller
 *
 * @property \App\Model\Table\HospitalsServicesTable $HospitalsServices
 * @method \App\Model\Entity\HospitalsService[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HospitalsServicesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Hospitals', 'Services'],
        ];
        $hospitalsServices = $this->paginate($this->HospitalsServices);

        $this->set(compact('hospitalsServices'));
    }

    /**
     * View method
     *
     * @param string|null $id Hospitals Service id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hospitalsService = $this->HospitalsServices->get($id, [
            'contain' => ['Hospitals', 'Services'],
        ]);

        $this->set(compact('hospitalsService'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hospitalsService = $this->HospitalsServices->newEmptyEntity();
        if ($this->request->is('post')) {
            $hospitalsService = $this->HospitalsServices->patchEntity($hospitalsService, $this->request->getData());
            if ($this->HospitalsServices->save($hospitalsService)) {
                $this->Flash->success(__('The hospitals service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hospitals service could not be saved. Please, try again.'));
        }
        $hospitals = $this->HospitalsServices->Hospitals->find('list', ['limit' => 200]);
        $services = $this->HospitalsServices->Services->find('list', ['limit' => 200]);
        $this->set(compact('hospitalsService', 'hospitals', 'services'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hospitals Service id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hospitalsService = $this->HospitalsServices->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hospitalsService = $this->HospitalsServices->patchEntity($hospitalsService, $this->request->getData());
            if ($this->HospitalsServices->save($hospitalsService)) {
                $this->Flash->success(__('The hospitals service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hospitals service could not be saved. Please, try again.'));
        }
        $hospitals = $this->HospitalsServices->Hospitals->find('list', ['limit' => 200]);
        $services = $this->HospitalsServices->Services->find('list', ['limit' => 200]);
        $this->set(compact('hospitalsService', 'hospitals', 'services'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hospitals Service id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hospitalsService = $this->HospitalsServices->get($id);
        if ($this->HospitalsServices->delete($hospitalsService)) {
            $this->Flash->success(__('The hospitals service has been deleted.'));
        } else {
            $this->Flash->error(__('The hospitals service could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
