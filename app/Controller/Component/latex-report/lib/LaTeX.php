<?php

class LaTeX {
	/**
	 * \documentclass
	 */
	protected $documentclass;

	/**
	 * Set \documentclass
	 */
	public function setDocumentclass($options = 'letterpaper') {
		$this->documentclass = '\documentclass['.$options.']{report}';
	}

	/**
	 * Get \documentclass
	 */
	public function getDocumentclass() {
		return $this->documentclass;
	}

	/**
	 *
	 */
	protected $usepackages;
	
	/**
	 * Set $usepackages
	 */
	public function setUsepackages($option = '') {
		$this->usepackages = $option;
	}

	/**
	 * Get $usepackages
	 */
	public function getUsepackages() {
		return $this->usepackages;
	}

	/**
	 *
	 */
	public function usepackage($options = '', $package = '') {
		if ('' == $options) {
			$this->usepackages .= '\usepackage{'.$package.'}';
		} else {
			$this->usepackages .= '\usepackage['.$options.']{'.$package.'}';
		}
	}

	/**
	 * configurations
	 */
	protected $configurations;

	/**
	 * Set $configurations
	 */
	public function setConfigurations($options = '') {
		$this->configurations = $options;
	}

	/**
	 * Get $configurations
	 */
	public function getConfigurations() {
		return $this->configurations;
	}

	/**
	 * Add $configurations
	 */
	public function addConfigurations($options = '') {
		$this->configurations .= $options;
	}

	/**
	 * Head
	 */
	public function head($align = 'C', $text = '') {
		$this->configurations .= '\fancyhead['.$align.']{'.$text.'}';
	}

	/**
	 * Head
	 */
	public function foot($align = 'C', $text = '') {
		$this->configurations .= '\fancyfoot['.$align.']{'.$text.'}';
	}
	
	/**
	 * document
	 */
	protected $document;

	/**
	 * Set $document
	 */
	public function setDocument($text = '') {
		$this->document = $text;
	}

	/**
	 * Get document
	 */
	public function getDocument() {
		return '\begin{document}'.$this->document.'\end{document}';
	}
	
	/**
	 * 
	 */
	public function write($text = '') {
		$this->document .= $text.' \newline ';
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->setDocumentclass('letterpaper');
		$this->setUsepackages();
		$this->setDocument();
		$this->setConfigurations('\parindent 0cm');
		$this->addConfigurations('\pagestyle{fancy}');
		$this->addConfigurations('\setlength{\headheight}{60pt}');
		$this->addConfigurations('\footskip = 60pt');
		$this->addConfigurations('\renewcommand{\headrulewidth}{0pt}');
	}

	/**
	 *
	 */
	public function getLaTeX($dir, $name) {
		$document  = $this->getDocumentclass();
		$document .= $this->getUsepackages();
		$document .= $this->getConfigurations();
		$document .= $this->getDocument();

		$file =  fopen($dir.'/app/Controller/Component/latex-report/tex/'.$name.'.tex', 'w');
		fputs($file, $document);
		fclose($file);

		shell_exec('pdflatex -output-directory '.$dir.'/app/Controller/Component/latex-report/tex --interaction batchmode '.$name.'.tex');
		shell_exec('mv '.$dir.'/app/Controller/Component/latex-report/tex/'.$name.'.pdf '.$dir.'/app/pdfs/'.$name.'.pdf');
		return $document;
	}

	/**
	 * Table of contents
	 */
	public function tableOfContents() {
		$this->write('\tableofcontents \newpage');
	}

	/**
	 * Table of contents
	 */
	public function section($text = null) {
		if (null != $text) {
			$this->write('\section{'.$text.'}');
		}
	}

	/**
	 * Table of contents
	 */
	public function subsection($text = null) {
		if (null != $text) {
			$this->write('\subsection{'.$text.'}');
		}
	}
		/**
	 * Table of contents
	 */
	public function chapter($text = null) {
		if (null != $text) {
			$this->write('\chapter{'.$text.'}');
		}
	}
}

