<?php
declare(strict_types=1);

namespace App\Controller;

use PDOException;

/**
 * MedicalRecords Controller
 *
 * @property \App\Model\Table\MedicalRecordsTable $MedicalRecords
 * @method \App\Model\Entity\MedicalRecord[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MedicalRecordsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $medicalRecords = $this->MedicalRecords->find();

        $this->set(compact('medicalRecords'));
        $this->viewBuilder()->setOption('serialize', ['medicalRecords']);
    }

    /**
     * View method
     *
     * @param string|null $id Medical Record id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $medicalRecord = $this->MedicalRecords->get($id);

        $this->set(compact('medicalRecord'));
        $this->viewBuilder()->setOption('serialize', ['medicalRecord']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod('post');
        $medicalRecord = $this->MedicalRecords->newEmptyEntity();
        $medicalRecord = $this->MedicalRecords->patchEntity($medicalRecord, $this->request->getData(), [
            'fields' => [
                'dni',
                'name',
                'last_name',
                'birthdate',
                'phone',
                'email',
                'location_id',
                'address',
            ]
        ]);
        if ($this->MedicalRecords->save($medicalRecord)) {
            $responseData['message'] = 'Se ha guardado.';
        } else {
            $this->setResponse($this->response->withStatus(400));
            $responseData['message'] = 'No se ha guardado.';
            $responseData['errors'] = $medicalRecord->getErrors();
        }

        $this->set($responseData);
        $this->viewBuilder()->setOption('serialize', ['message', 'errors']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Medical Record id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->request->allowMethod('put');
        $medicalRecord = $this->MedicalRecords->get($id);
        $medicalRecord = $this->MedicalRecords->patchEntity($medicalRecord, $this->request->getData(), [
            'fields' => [
                'dni',
                'name',
                'last_name',
                'birthdate',
                'phone',
                'email',
                'location_id',
                'address',
            ]
        ]);
        if ($this->MedicalRecords->save($medicalRecord)) {
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
     * @param string|null $id Medical Record id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $medicalRecord = $this->MedicalRecords->get($id);
        try {
            if ($this->MedicalRecords->delete($medicalRecord)) {
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
