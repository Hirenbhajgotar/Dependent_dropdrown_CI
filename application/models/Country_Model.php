<?php 
class Country_Model extends CI_Model
{
    public function get_countries()
    {
        $query = $this->db->order_by('country_name', 'country')
                        ->get('country');
        return $query->result();
    }

    public function get_state($id = '')
    {
        return $id;
    }
}

?>