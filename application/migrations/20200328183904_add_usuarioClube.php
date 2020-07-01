<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_usuarioClube extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_us' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'user_usuario' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'user_email' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => TRUE
            ),
            'user_cargo' => array(
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ),
            'user_estado' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'user_cidade' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'user_regiao' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'user_clube' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ),
            'status_user' => array(
                'type' => 'INT',
                'default' => '0',
                'null' => TRUE,
            ),
            'visibilidade_user' => array(
                'type' => 'INT',
                'default' => '0',
                'null' => TRUE,
            ),
            'user_login' => array(
                'type' => 'VARCHAR',
                'constraint' => 60,
                'null' => TRUE
            ),
            'user_senha' => array(
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => TRUE
            ),
            'user_date_created' => array(
                'type' => 'DATETIME'
            )
        ));
        $this->dbforge->add_key('id_us', TRUE);
        $this->dbforge->create_table('usuarios_clubes');
    }

    public function down()
    {
        $this->dbforge->drop_table('usuarios_clubes');
    }

}

/* End of file add_sessions.php */
