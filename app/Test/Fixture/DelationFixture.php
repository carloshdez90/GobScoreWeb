<?php
/**
 * DelationFixture
 *
 */
class DelationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'dui' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'message' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created_at' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'updated_at' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'opened_at' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'title' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'secret_key' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'phone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'delation_infos_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'delation_infos_delation_institutions_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'delation_infos_id', 'delation_infos_delation_institutions_id'), 'unique' => 1),
			'fk_delations_delation_infos1' => array('column' => array('delation_infos_id', 'delation_infos_delation_institutions_id'), 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'dui' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'message' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created_at' => 1418492082,
			'updated_at' => 1418492082,
			'opened_at' => 1418492082,
			'title' => 'Lorem ipsum dolor sit amet',
			'secret_key' => 'Lorem ipsum dolor sit amet',
			'phone' => 'Lorem ipsum dolor sit amet',
			'delation_infos_id' => 1,
			'delation_infos_delation_institutions_id' => 1
		),
	);

}
