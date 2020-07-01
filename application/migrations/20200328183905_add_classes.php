<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_classes extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_cls' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'nome_classe' => array(
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE,
                'unique'     => TRUE
            ),
            'image_classe' => array(
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => TRUE,
            ),
            'classe_date_created' => array(
                'type' => 'DATETIME'
            )
        ));
        $this->dbforge->add_key('id_cls', TRUE);
        $this->dbforge->create_table('classes');
    }

    public function down()
    {
        $this->dbforge->drop_table('classes');
    }

}

/* End of file add_sessions.php */
