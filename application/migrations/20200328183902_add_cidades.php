<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_cidades extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'nome' => array(
                'type' => 'VARCHAR',
                'constraint' => '120',
                'null' => TRUE,
            ),
            'estado' => array(
                'type' => 'INT',
                'constraint' => 5,
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('cidade');
    }

    public function down()
    {
        $this->dbforge->drop_table('cidade');
    }

}

/* End of file add_sessions.php */
