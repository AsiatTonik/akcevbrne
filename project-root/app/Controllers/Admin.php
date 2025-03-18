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
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        return view('dashboard'); 
    }

    public function editEvent($id)
{
    if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
        return redirect()->to('/login');
    }

    $data['event'] = $this->eventModel->find($id);
    if (!$data['event']) {
        return redirect()->to('/admin/events');
    }

    return view('admin/edit_event', $data);
}

public function updateEvent($id)
{
    if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
        return redirect()->to('/login');
    }

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