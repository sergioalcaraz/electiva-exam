<?php
declare(strict_types=1);

namespace App\Controller;

use PDOException;

/**
 * Consultations Controller
 *
 * @property \App\Model\Table\ConsultationsTable $Consultations
 * @method \App\Model\Entity\Consultation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConsultationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $consultations = $this->Consultations->find();

        $this->set(compact('consultations'));
        $this->viewBuilder()->setOption('serialize', ['consultations']);
    }

    /**
     * View method
     *
     * @param string|null $id Consultation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $consultation = $this->Consultations->get($id);

        $this->set(compact('consultation'));
        $this->viewBuilder()->setOption('serialize', ['consultation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod('post');
        $consultation = $this->Consultations->newEmptyEntity();
        $consultation = $this->Consultations->patchEntity($consultation, $this->request->getData());
        if ($this->Consultations->save($consultation)) {
            $responseData['message'] = 'Se ha guardado.';
        } else {
            $this->setResponse($this->response->withStatus(400));
            $responseData['message'] = 'No se ha guardado.';
            $responseData['errors'] = $consultation->getErrors();
        }

        $this->set($responseData);
        $this->viewBuilder()->setOption('serialize', ['message', 'errors']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Consultation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->request->allowMethod('put');
        $consultation = $this->Consultations->get($id);
        $consultation = $this->Consultations->patchEntity($consultation, $this->request->getData());
        if ($this->Consultations->save($consultation)) {
            $responseData['message'] = 'Se ha guardado.';
        } else {
            $this->setResponse($this->response->withStatus(400));
            $responseData['message'] = 'No se ha guardado.';
            $responseData['errors'] = $consultation->getErrors();
        }

        $this->set($responseData);
        $this->viewBuilder()->setOption('serialize', ['message', 'errors']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Consultation id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $consultation = $this->Consultations->get($id);
        try {
            if ($this->Consultations->delete($consultation)) {
                $responseData['message'] = 'Se ha eliminado.';
            } else {
                $this->setResponse($this->response->withStatus(400));
                $responseData['message'] = 'No se ha eliminado.';
            }
        } catch (PDOException $th) {
            $this->setResponse($this->response->withStatus(400));
            $responseData['message'] = 'No se puede eliminar existen registros dependientes.';
        }

        $this->set($responseData);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }
}
