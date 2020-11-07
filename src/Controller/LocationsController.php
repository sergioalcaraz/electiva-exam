<?php
declare(strict_types=1);

namespace App\Controller;

use PDOException;

/**
 * Locations Controller
 *
 * @property \App\Model\Table\LocationsTable $Locations
 * @method \App\Model\Entity\Location[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LocationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $locations = $this->Locations->find();

        $this->set(compact('locations'));
        $this->viewBuilder()->setOption('serialize', ['locations']);

    }

    /**
     * View method
     *
     * @param string|null $id Location id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $location = $this->Locations->get($id);

        $this->set(compact('location'));
        $this->viewBuilder()->setOption('serialize', ['location']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod('post');
        $location = $this->Locations->newEmptyEntity();
        $location = $this->Locations->patchEntity($location, $this->request->getData());
        if ($this->Locations->save($location)) {
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
     * @param string|null $id Location id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->request->allowMethod('put');
        $location = $this->Locations->get($id);
        $location = $this->Locations->patchEntity($location, $this->request->getData());
        if ($this->Locations->save($location)) {
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
     * @param string|null $id Location id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $location = $this->Locations->get($id);
        try {
            if ($this->Locations->delete($location)) {
                $responseData['message'] = 'Se ha eliminado.';
            } else {
                $responseData['message'] = 'No se ha eliminado.';
            }
        } catch (PDOException $e) {
            $responseData['message'] = 'No se puede eliminar existen registros dependientes.';
        }

        $this->set($responseData);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }
}
