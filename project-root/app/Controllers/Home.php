<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
{
    $url = 'https://services6.arcgis.com/fUWVlHWZNxUvTUh8/arcgis/rest/services/Events/FeatureServer/0/query?where=1%3D1&outFields=*&f=json';

    
    $json_data = file_get_contents($url);
    $data['events'] = json_decode($json_data, true)['features'];

    
    $categories = [];

    
    foreach ($data['events'] as $event) {
        $categoriesString = $event['attributes']['categories'] ?? '';
        $eventCategories = explode(',', $categoriesString);
        $categories = array_merge($categories, $eventCategories);
    }

    
    $categories = array_map('trim', $categories);
    $categories = array_unique($categories);

    
    $fromDate = $this->request->getVar('from');
    $fromDate = $fromDate ? date('Y-m-d', strtotime($fromDate)) : null;

    
    if ($fromDate) {
        $data['events'] = array_filter($data['events'], function($event) use ($fromDate) {
            
            $eventDateFrom = isset($event['attributes']['date_from']) ? date('Y-m-d', $event['attributes']['date_from'] / 1000) : null;
            $eventDateTo = isset($event['attributes']['date_to']) ? date('Y-m-d', $event['attributes']['date_to'] / 1000) : null;

            
            if (!$eventDateFrom || !$eventDateTo) {
                return false;
            }

            
            return ($eventDateFrom == $fromDate && $eventDateTo == $fromDate);
        });
    }

    
    $eventsPerPage = 9;
    $currentPage = $this->request->getVar('page') ?? 1;
    $offset = ($currentPage - 1) * $eventsPerPage;
    $data['events_page'] = array_slice($data['events'], $offset, $eventsPerPage);
    $totalPages = ceil(count($data['events']) / $eventsPerPage);
    $data['total_pages'] = $totalPages;
    $data['current_page'] = $currentPage;



    $data['categories'] = $categories;
    $data['selectedCategory'] = $this->request->getVar('category');
    $data['from'] = $fromDate; 

    return view('index', $data);
}






    public function udalost($id): string
    {
        $url = 'https://services6.arcgis.com/fUWVlHWZNxUvTUh8/arcgis/rest/services/Events/FeatureServer/0/query?where=ID=' . $id . '&outFields=*&f=json';

        
        $json_data = file_get_contents($url);
        $event = json_decode($json_data, true)['features'][0] ?? null;
        
        
        if (!$event) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Akce nebyla nalezena");
        }
        
        $data['event'] = $event['attributes'];
            
        return view('udalost', $data);
    }

        
        
        
        
        
        
        public function login(): string
        {
        return view('login');
    }
}


