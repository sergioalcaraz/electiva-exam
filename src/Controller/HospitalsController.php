<?php
declare(strict_types=1);

namespace App\Controller;

use PDOException;

/**
 * Hospitals Controller
 *
 * @property \App\Model\Table\HospitalsTable $Hospitals
 * @method \App\Model\Entity\Hospital[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HospitalsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $hospitals = $this->Hospitals->find();

        $this->set(compact('hospitals'));
        $this->viewBuilder()->setOption('serialize', ['hospitals']);
    }

    /**
     * View method
     *
     * @param string|null $id Hospital id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hospital = $this->Hospitals->get($id);

        $this->set(compact('hospital'));
        $this->viewBuilder()->setOption('serialize', ['hospital']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod('post');
        $hospital = $this->Hospitals->newEmptyEntity();
        $hospital = $this->Hospitals->patchEntity($hospital, $this->request->getData(), [
            'fields' => [
                'name',
                'location_id',
                'phone',
            ],
        ]);
        if ($this->Hospitals->save($hospital)) {
            $responseData['message'] = 'Se ha guardado.';
        } else {
            $this->setResponse($this->response->withStatus(400));
            $responseData['message'] = 'No se ha guardado.';
        }

        $this->set($responseData);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hospital id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->request->allowMethod('put');
        $hospital = $this->Hospitals->get($id);
        $hospital = $this->Hospitals->patchEntity($hospital, $this->request->getData(), [
            'fields' => [
                'name',
                'location_id',
                'phone',
            ],
        ]);
        if ($this->Hospitals->save($hospital)) {
            $responseData['message'] = 'Se ha guardado.';
        } else {
            $this->setResponse($this->response->withStatus(400));
            $responseData['message'] = 'No se ha guardado.';
        }

        $this->set($responseData);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hospital id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $hospital = $this->Hospitals->get($id);
        try {
            if ($this->Hospitals->delete($hospital)) {
                $responseData['message'] = 'Se ha eliminado.';
            } else {
                $responseData['message'] = 'No se ha eliminado.';
            }
        } catch (PDOException $th) {
            $responseData['message'] = 'No se puede eliminar existen registros dependientes.';
        }

        $this->set($responseData);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

    public function addServices($id = null)
    {
        $this->request->allowMethod('post');
        $hospital = $this->Hospitals->get($id);
        $requestData = $this->request->getData();
        $data = [];
        foreach ($requestData['services'] as $service) {
            $data[] = [
                'id' => $service['id'],
                '_joinData' => [
                    'beds_total' => $service['beds_total']
                ],
            ];
        }
        $hospital = $this->Hospitals->patchEntity($hospital, ['services' => $data]);
        if ($this->Hospitals->save($hospital)) {
            $responseData['message'] = 'Se ha guardado.';
        } else {
            $this->setResponse($this->response->withStatus(400));
            $responseData['message'] = 'No se ha guardado.';
        }

        $this->set($responseData);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }
}
