<?php

namespace App\Controllers;

use App\Models\EventModel;

class Home extends BaseController
{
    protected $eventModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
    }

    public function hlavni(): string
{
    $selectedCategory = $this->request->getVar('category');
    $fromDate = $this->request->getVar('from');
    $currentPage = $this->request->getVar('page') ?? 1;
    $eventsPerPage = 9;
    $currentDate = date('Y-m-d H:i:s'); 

    $categories = $this->eventModel->getCategories();

    
    $query = $this->eventModel->select('events.*, events.name AS event_name')
                              ->where('date_to >=', $currentDate);

    if ($selectedCategory) {
        $query->join('event_categories ec', 'events.id = ec.event_id')
              ->join('categories c', 'ec.category_id = c.id')
              ->where('c.name', $selectedCategory);
    }

    if ($fromDate) {
        $query->where('DATE(events.date_from)', $fromDate);
    }

    $events = $query->paginate($eventsPerPage, 'default', $currentPage);
    $totalPages = $query->pager->getPageCount();

    $data = [
        'categories' => $categories,
        'selectedCategory' => $selectedCategory,
        'events_page' => $events,
        'total_pages' => $totalPages,
        'current_page' => $currentPage,
        'from' => $fromDate
    ];

    return view('hlavni', $data);
}



    public function udalost($id): string
    {
        $event = $this->eventModel->find($id);
        $eventModel = new EventModel();
        
        

        $data = [
            'event' => $event,
            'latitude' => $event['latitude'] ?? 49.1951,
            'longitude' => $event['longitude'] ?? 16.6068,
        ];

        return view('udalost', $data);
    }

    public function login()
    {
        return view('login');
    }

    public function probehle(): string
{
    $currentDate = date('Y-m-d H:i:s'); 

    $currentPage = $this->request->getVar('page') ?? 1;
    $eventsPerPage = 9;

    
    $query = $this->eventModel->where('date_to <', $currentDate);
    
    
    $events = $query->paginate($eventsPerPage, 'default', $currentPage);
    $totalPages = $query->pager->getPageCount();

    $data = [
        'events_page' => $events,
        'total_pages' => $totalPages,
        'current_page' => $currentPage
    ];

    return view('probehle', $data);
}

}
