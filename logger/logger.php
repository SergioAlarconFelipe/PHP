<?php
class logger {
	private $output;
	private $methodOutput;
	
	private $format;
        private $patternsFormat;
        private $dataFormat;
	
	private $pathOutputFile;
	private $nameOutputFile;
	private $extensionOutputFile;
        private $pathCompleteOutFile;
	
	
	public function __construct() {
		define( 'LOG_OUTPUT_STANDAR', 0 );
		define( 'LOG_OUTPUT_STRING', 1 );
                
		$this->methodOutput = LOG_OUTPUT_STANDAR;
                
                $this->inizializate();
		
	}
        public function inizializate() {
            // Format
            $this->patternsFormat = array(
                'line' => '/\bln\b/',           // line
                'function' => '/\bfn\b/',           // function
                'class' => '/\bcl\b/',           // class
                'file' => '/\bfl\b/',           // file
                'menssage' => '/\bmsg\b/',          // menssage
                
                //Day
                'd' => '/\bd\b/',
                'D' => '/\bD\b/',
                'j' => '/\bj\b/',
                'l' => '/\bl\b/',
                'N' => '/\bN\b/',
                'S' => '/\bS\b/',
                'w' => '/\bw\b/',
                'z' => '/\bz\b/'
            );
            $this->format = 'msg';
            
            // Path
            $this->pathOutputFile = getcwd() . '\\';
            $this->nameOutputFile = 'log';
            $this->extensionOutputFile = 'txt';
            $this->pathCompleteOutFile = $this->pathOutputFile . $this->nameOutputFile . '.' . $this->extensionOutputFile;
            
            // Output
            $this->output = '';
        }
        private function updateDataFormat() {
            $this->dataFormat = array(
                'line' => '',
                'function'  => '',
                'class'  => '',
                'file'  => '',
                'menssage' => '',
                
                //Day
                'd' => date('d'),
                'D' => date('D'),
                'j' => date('j'),
                'l' => date('l'),
                'N' => date('N'),
                'S' => date('S'),
                'w' => date('w'),
                'z' => date('z')
            );
        }
	
	public function get() {
	
	}
	public function get_pathCompleteOutFile() {
            return $this->pathCompleteOutFile;
	}
	public function set() {
	
	}
	
	public function getLineCalled() {
	
	}
	public function getFileCalled() {
	
	}
	public function getFuncitonCalled() {
	
	}
	public function getClassCalled() {
	
	}
	
	public function setFormar( $str ) {
            if( $str != '' ) {
                $this->format = $str;
            } else {
                $this->format = 'msg';
            }
	}
	
        //TODO
	public function writeLog( $str ) {
            
            $this->updateDataFormat();
            $info = end( debug_backtrace() );
            $this->dataFormat['line'] = isset( $info['line'] ) ? $info['line'] : '';
            $this->dataFormat['function'] = isset( $info['function'] ) ? $info['function'] : '';
            $this->dataFormat['class'] = isset( $info['class'] ) ? $info['class'] : '';
            $this->dataFormat['file'] = isset( $info['file'] ) ? $info['file'] : '';
            $this->dataFormat['menssage'] = $str;
            /*
            echo $this->format . '<br/>';
            
            ini_set( 'pcre.recursion_limit', 1 );
            $strOutput = preg_replace( $this->patternsFormat, $this->dataFormat, $this->format );
            
            $file = fopen( $this->pathCompleteOutFile, 'a' );
            
            //vamos añadiendo el contenido
            fwrite( $file, $strOutput . PHP_EOL );
            
            fclose( $file );
            */
            
            var_dump( $this->format );
            
            preg_match_all( '/\$|&|\+|,|:|;|=|\?|@|\#|\'|<|>|\.|\^|\*|\(|\)|%|!|-|\[|\]|\w*/', $this->format, $salida );
            $salida = array_shift( $salida );
            
            var_dump( $salida );
            
            $salida = array_filter( $salida );
            foreach( $salida as $key => $s ) {
                echo preg_replace( $this->patternsFormat, $this->dataFormat, $s );
            }
            
            var_dump( $salida );
            
	}
	
	public function delLog() {
            if( !$this->existsLog() ) {
                return false;
            }
            
            return unlink( $this->pathCompleteOutFile );
	}
	
	public function existsLog() {
            if( file_exists( $this->pathCompleteOutFile ) ) {
                return true;
            } else {
                return false;
            }
	}
}
