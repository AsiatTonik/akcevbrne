<?php

namespace App\Controllers;

use App\Models\EventModel;
use CodeIgniter\Controller;

class Admin extends Controller
{
    protected $eventModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
    }

    public function index()
    {
        return redirect()->to('/');
    }
    

    public function editEvent($id)
    {
        $data['event'] = $this->eventModel->find($id);
        if (!$data['event']) {
            return redirect()->to('/admin/events');
        }

        return view('admin/edit_event', $data);
    }

    public function updateEvent($id)
    {
        $this->eventModel->update($id, [
            'name' => $this->request->getPost('name'),
            'text' => $this->request->getPost('text'),
            'tickets_info' => $this->request->getPost('tickets_info'),
            'organizer_email' => $this->request->getPost('organizer_email'),
            'date_from' => $this->request->getPost('date_from'),
            'date_to' => $this->request->getPost('date_to')
        ]);

        return redirect()->to('/udalost/' . $id);
    }
}
