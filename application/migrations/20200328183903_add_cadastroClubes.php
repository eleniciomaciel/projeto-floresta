<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_cadastroClubes extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_fl' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'nome_clube' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'regiao_clube_fl' => array(
                'type' => 'INT',
                'constraint' => 5,
                'null' => TRUE
            ),
            'estado_clube_fl' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'cidade_clube' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'date_created' => array(
                'type' => 'DATETIME'
            )
        ));
        $this->dbforge->add_key('id_fl', TRUE);
        $this->dbforge->create_table('cadastro_my_clubes');
    }

    public function down()
    {
        $this->dbforge->drop_table('cadastro_my_clubes');
    }

}

/* End of file add_sessions.php */
