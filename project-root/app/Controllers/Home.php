<?php
namespace App\Controllers;

use App\Models\EventModel;

class Home extends BaseController
{

public function hlavni(): string
{
    $eventModel = new EventModel();
    $db = \Config\Database::connect();

    
    $categories = $eventModel->getCategories();

    
    $selectedCategory = $this->request->getVar('category');
    $fromDate = $this->request->getVar('from');

    
    $sql = "SELECT e.* FROM events e";
    $params = [];

    if ($selectedCategory) {
        $sql .= " JOIN event_categories ec ON e.id = ec.event_id
                  JOIN categories c ON ec.category_id = c.id
                  WHERE c.name = ?";
        $params[] = $selectedCategory;
    }

    if ($fromDate) {
        $sql .= ($selectedCategory ? " AND" : " WHERE") . " DATE(e.date_from) = ?";
        $params[] = $fromDate;
    }

    $query = $db->query($sql, $params);
    $events = $query->getResultArray();

    
    $eventsPerPage = 9;
    $currentPage = $this->request->getVar('page') ?? 1;
    $offset = ($currentPage - 1) * $eventsPerPage;
    $eventsPage = array_slice($events, $offset, $eventsPerPage);
    $totalPages = ceil(count($events) / $eventsPerPage);

    
    $data = [
        'categories' => $categories,
        'selectedCategory' => $selectedCategory,
        'events_page' => $eventsPage,
        'total_pages' => $totalPages,
        'current_page' => $currentPage,
        'from' => $fromDate
    ];

    return view('hlavni', $data);
}


    
private function getCategories($eventModel)
{
    $db = \Config\Database::connect();
    
    $query = $db->query("
        SELECT DISTINCT c.name 
        FROM categories c
        JOIN event_categories ec ON c.id = ec.category_id
    ");

    $categories = array_column($query->getResultArray(), 'name');

    return $categories;
}

   
public function udalost($id): string
{
    $eventModel = new EventModel();
    $event = $eventModel->find($id);

    if (!$event) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Akce nebyla nalezena");
    }

    
    $event['tickets_info'] = $event['tickets_info'] ?? 'Zdarma';

    
    $latitude = isset($event['latitude']) ? $event['latitude'] : 49.1951;
    $longitude = isset($event['longitude']) ? $event['longitude'] : 16.6068;

    $data = [
        'event' => $event,
        'latitude' => $latitude,
        'longitude' => $longitude,
    ];

    return view('udalost', $data);
}



public function login()
    {
        
        
        return view('login');
    }


}
