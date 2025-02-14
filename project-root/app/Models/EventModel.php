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
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT DISTINCT c.name 
            FROM categories c
            JOIN event_categories ec ON c.id = ec.category_id
        ");

        return array_column($query->getResultArray(), 'name');
    }

   
    public function getEventsByCategory($category)
    {
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT e.* FROM events e
            JOIN event_categories ec ON e.id = ec.event_id
            JOIN categories c ON ec.category_id = c.id
            WHERE c.name = ?
        ", [$category]);

        return $query->getResultArray();
    }
}
