<?php
/**
 * InstitutionAnswerFixture
 *
 */
class InstitutionAnswerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'title' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'message' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created_at' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'updated_at' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'delations_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'delations_delation_infos_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'delations_delation_infos_delation_institutions_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'delations_id', 'delations_delation_infos_id', 'delations_delation_infos_delation_institutions_id'), 'unique' => 1),
			'fk_institution_answers_delations1' => array('column' => array('delations_id', 'delations_delation_infos_id', 'delations_delation_infos_delation_institutions_id'), 'unique' => 0)
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
			'title' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'message' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created_at' => 1418492104,
			'updated_at' => 1418492104,
			'delations_id' => 1,
			'delations_delation_infos_id' => 1,
			'delations_delation_infos_delation_institutions_id' => 1
		),
	);

}
