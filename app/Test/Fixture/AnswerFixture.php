<?php
/**
 * AnswerFixture
 *
 */
class AnswerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'answer' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'question_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated' => array('type' => 'timestamp', 'null' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'answer' => 1,
			'question_id' => 1,
			'created' => '2014-12-11 09:39:29',
			'updated' => 1418312369
		),
	);

}
