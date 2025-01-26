<?php
namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model {

    protected $table = 'events'; 
    protected $primaryKey = 'id'; 

   
    public function insert_category($categories_string) {
        $categories = explode(',', $categories_string); 
        $category_ids = [];
    
        foreach ($categories as $category_name) {
            $category_name = trim($category_name); 
            $category = $this->db->table('categories')
                ->select('id')
                ->where('name', $category_name)
                ->get()
                ->getRow();
    
            if (!$category) {
                
                $this->db->table('categories')->insert(['name' => $category_name]);
                $category_ids[] = $this->db->insertID();
            } else {
                
                $category_ids[] = $category->id;
            }
        }
    
        return $category_ids;
    }
    

    
    public function insert_event($event_data, $category_ids) {
        $this->db->table('events')->insert($event_data);
        $event_id = $this->db->insertID(); 
    
        
        foreach ($category_ids as $category_id) {
            $this->db->table('event_categories')->insert([
                'event_id' => $event_id,
                'category_id' => $category_id
            ]);
        }
    
        return $event_id;
    }

    
    public function insert_geometry($event_id, $x, $y) {
        $data = [
            'event_id' => $event_id,
            'x' => $x,
            'y' => $y
        ];
        $this->db->table('geometry')->insert($data);
    }
}
