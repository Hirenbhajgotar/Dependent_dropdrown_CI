<?php 
class Country extends CI_Controller
{
    public function index()
    {
        $this->load->model('Country_Model');
        $data['countries'] = $this->Country_Model->get_countries();
        
        $this->load->view('dropdown', $data);
    }

    public function states()
    {
        header('Access-Control-Allow-Origin: *');
        $country_id = $this->input->post('country_id');
        // $country_id = $_POST;
        $query = $this->db->order_by('state_name', 'state')
                      ->where('country_id', $country_id)
                      ->get('state');
        $states = $query->result();
        echo json_encode($states);
    }

    public function set_CountryState()
    {
        $data = $this->input->post();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;
    }
}

?>