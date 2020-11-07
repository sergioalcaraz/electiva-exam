<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Services Controller
 *
 * @property \App\Model\Table\ServicesTable $Services
 * @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServicesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $services = $this->Services->find();

        $this->set(compact('services'));
        $this->viewBuilder()->setOption('serialize', ['services']);
    }

    /**
     * View method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $service = $this->Services->get($id);

        $this->set(compact('service'));
        $this->viewBuilder()->setOption('serialize', ['service']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod('post');
        $service = $this->Services->newEmptyEntity();
        $service = $this->Services->patchEntity($service, $this->request->getData(), [
            'fields' => [
                'id',
                'name',
                'comentary',
            ]
        ]);
        if ($this->Services->save($service)) {
            $responseData['message'] = 'Se ha guardado.';
        } else {
            $this->setResponse($this->response->withStatus(400));
            $responseData['message'] = 'No se ha guardado.';
            $responseData['errors'] = $service->getErrors();
        }

        $this->set($responseData);
        $this->viewBuilder()->setOption('serialize', ['message', 'errors']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->request->allowMethod('put');
        $service = $this->Services->get($id);
        $service = $this->Services->patchEntity($service, $this->request->getData(), [
            'fields' => [
                'name',
                'comentary',
            ]
        ]);
        if ($this->Services->save($service)) {
            $responseData['message'] = 'Se ha guardado.';
        } else {
            $this->setResponse($this->response->withStatus(400));
            $responseData['message'] = 'No se ha guardado.';
            $responseData['errors'] = $service->getErrors();
        }

        $this->set($responseData);
        $this->viewBuilder()->setOption('serialize', ['message', 'errors']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $service = $this->Services->get($id);
        try {
            if ($this->Services->delete($service)) {
                $responseData['message'] = 'Se ha eliminado.';
            } else {
                $this->setResponse($this->response->withStatus(400));
                $responseData['message'] = 'No se ha eliminado.';
            }
        } catch (\Throwable $th) {
            $this->setResponse($this->response->withStatus(400));
            $responseData['message'] = 'No se puede eliminar existen registros dependientes.';
        }

        $this->set($responseData);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }
}
