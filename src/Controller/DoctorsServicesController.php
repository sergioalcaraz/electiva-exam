<?php
declare(strict_types=1);

namespace App\Controller;

use PDOException;

/**
 * DoctorsServices Controller
 *
 * @property \App\Model\Table\MedicalRecordsTable $DoctorsServices
 * @method \App\Model\Entity\MedicalRecord[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DoctorsServicesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $doctorsServices = $this->DoctorsServices->find();

        $this->set(compact('doctorsServices'));
        $this->viewBuilder()->setOption('serialize', ['doctorsServices']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod('post');
        $doctorsService = $this->DoctorsServices->newEmptyEntity();
        $doctorsService = $this->DoctorsServices->patchEntity($doctorsService, $this->request->getData());
        if ($this->DoctorsServices->save($doctorsService)) {
            $responseData['message'] = 'Se ha guardado.';
        } else {
            $this->setResponse($this->response->withStatus(400));
            $responseData['message'] = 'No se ha guardado.';
            $responseData['errors'] = $doctorsService->getErrors();
        }

        $this->set($responseData);
        $this->viewBuilder()->setOption('serialize', ['message', 'errors']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Medical Record id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $doctorsService = $this->DoctorsServices->get($id);
        try {
            if ($this->DoctorsServices->delete($doctorsService)) {
                $responseData['message'] = 'Se ha eliminado.';
            } else {
                $this->setResponse($this->response->withStatus(400));
                $responseData['message'] = 'No se ha eliminado.';
            }
        } catch (PDOException $e) {
            $this->setResponse($this->response->withStatus(400));
            $responseData['message'] = 'No se puede eliminar existen registros dependientes.';
        }

        $this->set($responseData);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }
}
