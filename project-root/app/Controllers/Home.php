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

        
        $categories = $this->eventModel->getCategories();

        
        $query = $this->eventModel->select('*');

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
}
