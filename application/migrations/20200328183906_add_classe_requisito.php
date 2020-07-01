<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_classe_requisito extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_cls_req' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'fk_classe' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'titulo_requisito' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'num_requisito' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),,
            'nome_requisito' => array(
                'type'       => 'TEXT',
                'null'       => TRUE,
            ),
            'requisito_date_created' => array(
                'type' => 'DATETIME'
            )
        ));
        $this->dbforge->add_key('id_cls_req', TRUE);
        $this->dbforge->create_table('requisitos_classes');
    }

    public function down()
    {
        $this->dbforge->drop_table('requisitos_classes');
    }

}

/* End of file add_sessions.php */
