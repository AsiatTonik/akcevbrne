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

    // Lepší způsob získání kategorií pomocí Query Builderu
    public function getCategories()
    {
        return $this->db->table('categories')
            ->select('name')
            ->distinct()
            ->join('event_categories', 'categories.id = event_categories.category_id')
            ->get()
            ->getResultArray();
    }

    // Lepší způsob filtrování událostí podle kategorie
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
}
