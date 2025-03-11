<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'events'; 
    protected $primaryKey = 'id'; 

    protected $allowedFields = [
        'object_id', 'name', 'text', 'tickets_info', 'image_url', 'first_image',
        'event_url', 'organizer_email', 'tickets_url', 'name_en', 'text_en',
        'event_url_en', 'tickets_url_en', 'latitude', 'longitude', 'date_from', 'date_to'
    ];

   
    public function getCategories()
    {
        return $this->db->table('categories')
            ->select('name')
            ->distinct()
            ->join('event_categories', 'categories.id = event_categories.category_id')
            ->get()
            ->getResultArray();
    }

    
    public function getEventsByCategory($category)
    {
        return $this->db->table($this->table)
            ->select('events.*')
            ->join('event_categories', 'events.id = event_categories.event_id')
            ->join('categories', 'event_categories.category_id = categories.id')
            ->where('categories.name', $category)
            ->get()
            ->getResultArray();
    }


    public function getAddressFromCSV($latitude, $longitude) {
        $file = 'public/data/adresy.csv'; 

        if (!file_exists($file)) {
            return "";
        }

        $handle = fopen($file, 'r');

        while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $csvLat = floatval($row[1]);
            $csvLon = floatval($row[2]);

            if (abs($csvLat - $latitude) < 0.00001 && abs($csvLon - $longitude) < 0.00001) {
                fclose($handle);
                return "{$row[3]} {$row[4]}, {$row[5]}";
            }
        }

        fclose($handle);
        return "";
    }
}
