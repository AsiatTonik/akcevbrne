<?php
namespace App\Controllers;

use App\Models\EventModel;
use CodeIgniter\Controller;

class Import_data extends Controller {

    public function __construct() {
        
        $this->eventModel = new EventModel();
    }

    public function index() {
        
        $jsonData = file_get_contents('https://services6.arcgis.com/fUWVlHWZNxUvTUh8/arcgis/rest/services/Events/FeatureServer/0/query?where=1%3D1&outFields=*&f=json');
        $data = json_decode($jsonData, true);
    
        
        foreach ($data['features'] as $item) {
            $attributes = $item['attributes'];
            $geometry = $item['geometry'];
    
            
            $category_ids = $this->eventModel->insert_category($attributes['categories']);
    
           
            $event_data = [
                'global_id' => $attributes['GlobalID'],
                'object_id' => $attributes['ObjectId'],
                'name' => $attributes['name'],
                'text' => $attributes['text'],
                'tickets_info' => $attributes['tickets_info'],
                'image_url' => $attributes['images'],
                'first_image' => $attributes['first_image'],
                'event_url' => $attributes['url'],
                'organizer_email' => $attributes['organizer_email'],
                'tickets_url' => $attributes['tickets_url'],
                'name_en' => $attributes['name_en'],
                'text_en' => $attributes['text_en'],
                'event_url_en' => $attributes['url_en'],
                'tickets_url_en' => $attributes['tickets_url_en'],
                'latitude' => $attributes['latitude'],
                'longitude' => $attributes['longitude'],
                'date_from' => date('Y-m-d H:i:s', $attributes['date_from'] / 1000),
                'date_to' => date('Y-m-d H:i:s', $attributes['date_to'] / 1000),
                
                
            ];
    
            
            $event_id = $this->eventModel->insert_event($event_data, $category_ids);
    
            
            $this->eventModel->insert_geometry($event_id, $geometry['x'], $geometry['y']);
        }
    
        echo "Data importována do databáze.";
    }
    
}
