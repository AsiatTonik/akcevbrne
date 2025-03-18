<?php

namespace App\Commands;

use App\Models\EventModel;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class ImportData extends BaseCommand
{
    protected $group       = 'custom';
    protected $name        = 'import:data';
    protected $description = 'Stáhne data z API a uloží je do databáze.';

    public function run(array $params)
    {
        $eventModel = new EventModel();

        
        $contextOptions = [
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
            ],
        ];

        
        $jsonData = file_get_contents(
            'https://services6.arcgis.com/fUWVlHWZNxUvTUh8/arcgis/rest/services/Events/FeatureServer/0/query?where=1%3D1&outFields=*&f=json',
            false,
            stream_context_create($contextOptions)
        );

        
        

        
        $data = json_decode($jsonData, true);



      
        foreach ($data['features'] as $item) {
            $attributes = $item['attributes'];
            $geometry = $item['geometry'];

           
            $category_ids = $eventModel->insert_category($attributes['categories'] ?? '');

           
            $event_data = [
                'object_id' => $attributes['ObjectId'] ?? null,
                'name' => $attributes['name'] ?? '',
                'text' => $attributes['text'] ?? '',
                'tickets_info' => $attributes['tickets_info'] ?? '',
                'image_url' => $attributes['images'] ?? '',
                'first_image' => $attributes['first_image'] ?? '',
                'event_url' => $attributes['url'] ?? '',
                'organizer_email' => $attributes['organizer_email'] ?? '',
                'tickets_url' => $attributes['tickets_url'] ?? '',
                'name_en' => $attributes['name_en'] ?? '',
                'text_en' => $attributes['text_en'] ?? '',
                'event_url_en' => $attributes['url_en'] ?? '',
                'tickets_url_en' => $attributes['tickets_url_en'] ?? '',
                'latitude' => $attributes['latitude'] ?? null,
                'longitude' => $attributes['longitude'] ?? null,
                'date_from' => isset($attributes['date_from']) ? date('Y-m-d H:i:s', $attributes['date_from'] / 1000) : null,
                'date_to' => isset($attributes['date_to']) ? date('Y-m-d H:i:s', $attributes['date_to'] / 1000) : null,
            ];

            
            $event_id = $eventModel->insert_event($event_data, $category_ids);


            if (isset($geometry['x'], $geometry['y'])) {
                $eventModel->insert_geometry($event_id, $geometry['x'], $geometry['y']);
            }
        }

        CLI::write("data importována");
    }
}
