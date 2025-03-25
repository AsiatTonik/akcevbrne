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

    
    public function insert_category($categoryName)
    {
        if (empty($categoryName)) {
            return null;
        }

        
        $category = $this->db->table('categories')
            ->where('name', $categoryName)
            ->get()
            ->getRowArray();

        
        if (!$category) {
            $this->db->table('categories')->insert(['name' => $categoryName]);
            return $this->db->insertID();
        }

        return $category['id'];
    }

    
    public function insert_event($event_data, $category_id)
    {
        
        $this->db->table($this->table)->insert($event_data);
        $event_id = $this->db->insertID();

        
        if ($category_id) {
            $this->db->table('event_categories')->insert([
                'event_id' => $event_id,
                'category_id' => $category_id
            ]);
        }

        return $event_id;
    }

    
    public function insert_geometry($event_id, $latitude, $longitude)
    {
        return $this->db->table('event_locations')->insert([
            'event_id' => $event_id,
            'latitude' => $latitude,
            'longitude' => $longitude
        ]);
    }
}
