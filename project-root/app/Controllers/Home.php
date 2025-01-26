<?php
namespace App\Controllers;

use App\Models\EventModel;

class Home extends BaseController
{
    public function hlavni(): string
    {
        
        $eventModel = new EventModel();

        
        $categories = $this->getCategories($eventModel);

        
        $events = $eventModel->findAll();  

        
        $fromDate = $this->request->getVar('from');
        if ($fromDate) {
            $fromDate = date('Y-m-d', strtotime($fromDate));
            $events = array_filter($events, function($event) use ($fromDate) {
                $eventDateFrom = date('Y-m-d', $event['date_from'] / 1000);
                $eventDateTo = date('Y-m-d', $event['date_to'] / 1000);
                return ($eventDateFrom == $fromDate && $eventDateTo == $fromDate);
            });
        }

        
        $eventsPerPage = 9;
        $currentPage = $this->request->getVar('page') ?? 1;
        $offset = ($currentPage - 1) * $eventsPerPage;
        $data['events_page'] = array_slice($events, $offset, $eventsPerPage);
        $totalPages = ceil(count($events) / $eventsPerPage);
        $data['total_pages'] = $totalPages;
        $data['current_page'] = $currentPage;

        
        $data['categories'] = $categories;
        $data['selectedCategory'] = $this->request->getVar('category');
        $data['from'] = $fromDate;

        
        return view('hlavni', $data);
    }

    
    private function getCategories($eventModel)
    {
        $categories = [];
        $events = $eventModel->findAll();
        foreach ($events as $event) {
            $categoriesString = $event['categories'] ?? '';
            $eventCategories = explode(',', $categoriesString);
            $categories = array_merge($categories, $eventCategories);
        }
        $categories = array_map('trim', $categories);
        return array_unique($categories);
    }

    
    public function udalost($id): string
    {
        
        $eventModel = new EventModel();

        
        $event = $eventModel->find($id);

        if (!$event) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Akce nebyla nalezena");
        }

        
        $data['event'] = $event;
        return view('udalost', $data);
    }
}
