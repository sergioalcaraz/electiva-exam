<?php
declare(strict_types=1);

namespace App\Controller;

use PDOException;

/**
 * Doctors Controller
 *
 * @property \App\Model\Table\DoctorsTable $Doctors
 * @method \App\Model\Entity\Doctor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DoctorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $doctors = $this->Doctors->find();

        $this->set(compact('doctors'));
        $this->viewBuilder()->setOption('serialize', ['doctors']);
    }

    /**
     * View method
     *
     * @param string|null $id Doctor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $doctor = $this->Doctors->get($id);

        $this->set(compact('doctor'));
        $this->viewBuilder()->setOption('serialize', ['doctor']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod('post');
        $doctor = $this->Doctors->newEmptyEntity();
        $doctor = $this->Doctors->patchEntity($doctor, $this->request->getData(), [
            'fields' => [
                'dni',
                'name',
                'last_name',
                'birthdate',
                'hospital_id',
            ],
        ]);
        if ($this->Doctors->save($doctor)) {
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
     * @param string|null $dni Doctor dni.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($dni = null)
    {
        $this->request->allowMethod('put');
        $doctor = $this->Doctors->get($dni);
        $doctor = $this->Doctors->patchEntity($doctor, $this->request->getData(), [
            'fields' => [
                'name',
                'last_name',
                'birthdate',
                'hospital_id',
            ],
        ]);
        if ($this->Doctors->save($doctor)) {
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
     * @param string|null $dni Doctor dni.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($dni = null)
    {
        $this->request->allowMethod(['delete']);
        $doctor = $this->Doctors->get($dni);
        try {
            if ($this->Doctors->delete($doctor)) {
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
