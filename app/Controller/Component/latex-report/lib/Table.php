<?php

class Table {
	public function __construct() {
		$this->setBody();
		$this->setRow();
		$this->setConfigCols();
	}

	/**
	 * 
	 */
	protected $body;

	/**
	 *
	 */
	public function setBody($text = '') {
		$this->body = $text;
	}

	/**
	 *
	 */
	public function getBody() {
		return $this->body;
	}

	/**
	 *
	 */
	protected $row;

	/**
	 *
	 */
	public function setRow($text = '') {
		$this->row = $text;
	}

	/**
	 *
	 */
	public function getRow() {
		return $this->row;
	}

	/**
	 *
	 */
	public function newRow() {
		$this->setRow();
	}

	/**
	 *
	 */
	public function addCol($text = '') {
		if ('' != $this->getRow()) {
			$this->row .= ' & '.$text;
		} else {
			$this->row .= $text;
		}
	}
	
	/**
	 *
	 */
	public function addRow() {
		$this->body .= $this->getRow().'  \tabularnewline \hline ';
		$this->setRow();
	}

	/**
	 *
	 */
	protected $configCols;

	/**
	 *
	 */
	public function setConfigCols($text = '') {
		$this->configCols = $text;
	}

	/**
	 *
	 */
	public function getConfigCols() {
		return $this->configCols;
	}

	/**
	 *
	 */
	public function setColumn($config = 'l') {
		if ('l' == $config) {
			$this->configCols .= 'l | ';
		} else {
			$this->configCols .= $config.' | ';
		}
	}

	/**
	 *
	 */
	public function getTable() {
		$cadena  = '';
		$cadena .= '\tablefirsthead{ \hline '.$this->getTitles().' \\\ \hline } ';
		$cadena .= '\tablehead{ \hline '.$this->getTitles().' \\\  } ';
		$cadena .= '\tabletail{\hline}';
		$cadena .= '\tablelasttail{}';
		$cadena .= '\begin{center}\begin{supertabular}';
		$cadena .= '{ | '.$this->getConfigCols().'} \hline ';
		$cadena .= $this->getBody();
		$cadena .= '\end{supertabular}\end{center} \\\\ ~ \\\\ ';
		return $cadena;
	}

	/**
	 *
	 */
	protected $titles;

	/**
	 *
	 */
	public function setTitles($text = '') {
		$this->titles = $text;
	}
	
	/**
	 *
	 */
	public function getTitles() {
		return $this->titles;
	}

	/**
	 *
	 */
	public function addTitle($text = '') {
		if ('' != $this->getTitles()) {
			$this->titles .= ' & \textbf{'.$text.'}';
		} else {
			$this->titles .= '\textbf{'.$text.'}';
		}
	}
}



