<?php
class EventModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Funkce pro získání událostí z externího JSON souboru
    public function get_events($from_date = null, $to_date = null, $category = null) {
        $json_url = 'https://services6.arcgis.com/fUWVlHWZNxUvTUh8/arcgis/rest/services/Events/FeatureServer/0/query?f=pjson&where=1%3D1'; // Tvoje URL pro JSON data
        $json_data = file_get_contents($json_url);
        $events = json_decode($json_data, true);

        // Pokud nejsou žádná data, vrátíme prázdné pole
        if (!$events || !isset($events['features'])) {
            return [];
        }

        $filtered_events = $events['features'];

        // Filtrování podle data
        if ($from_date) {
            $filtered_events = array_filter($filtered_events, function($event) use ($from_date) {
                return $event['attributes']['date'] >= $from_date;
            });
        }
        if ($to_date) {
            $filtered_events = array_filter($filtered_events, function($event) use ($to_date) {
                return $event['attributes']['date'] <= $to_date;
            });
        }

        // Filtrování podle kategorie
        if ($category) {
            $filtered_events = array_filter($filtered_events, function($event) use ($category) {
                return strtolower($event['attributes']['category']) == strtolower($category);
            });
        }

        return $filtered_events;
    }
}
