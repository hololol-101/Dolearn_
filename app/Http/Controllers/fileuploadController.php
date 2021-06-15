<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class fileuploadController extends Controller
{

    var $upload_tmpFileName = null;
    var $upload_fileName = null;
    var $upload_fileSize = null;
    var $upload_fileType = null;
    var $upload_fileWidth = null;
    var $upload_fileHeight = null;
    var $upload_fileExt = null;
    var $upload_fileImageType = null;
    var $upload_count = 0;
    var $upload_directory = null;
    var $upload_subdirectory = null;
    var $denied_ext = array
        (
            "php"    => ".phps",
            "phtml"    => ".phps",
            "html"    => ".txt",
            "htm"    => ".txt",
            "inc"    => ".txt",
            "sql"    => ".txt",
            "cgi"    => ".txt",
            "pl"    => ".txt",
            "jsp"    => ".txt",
            "asp"    => ".txt",
            "phtm"    => ".txt",
            "exe"    => ".txt",
            "conf"    => ".txt",
            "inc"    => ".txt"
        );

    public function __construct($upload_dir)
    {
        $this->upload_directory = $upload_dir;
        //$this->upload_subdirectory = time();
    }

    public function define_($files)
    {
 //       print_r($files);


  
 //       $files->validate([
//          'iFile' => 'required',
//          'iFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,xlx,xls,pdf|max:2048'
//        ]);
        
       // if($files->hasfile('iFile')) {
            if(is_array($files)) {
                foreach($files as $file)
                {
                    $name = $file->getClientOriginalName();
                    $name = $this->_isFilsName($this->_emptyToUnderline($this->_checkFileName($name)));
                    //$size = $file->getClientSize();
                    $file->move($this->upload_directory, $name);  
                    $filename[] = $name;
                    //$filesize[] = $size;
                }     
            } else {
                $filename = array();
            }
            
            
        return $filename;
       // }
    }
    
    public function _isThisImageFile($type)
    {
        if(preg_match("/image/i", $type) == false && preg_match("/flash/", $type) == false)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function _checkFileName($fileName)
    {
        $fileName = strtolower($fileName);
        $temp_file = strstr($fileName,".");

        foreach($this->denied_ext as $key => $value)
        {
               if ( preg_match('/'.trim($key).'/i', $temp_file ) ) {
                    echo "<script type='text/javascript'>\n";
                    echo "<!--\n";
                    echo "alert('첨부 허용된 파일 형태가 아닙니다.');\n";
                    echo "history.back();\n";
                    echo "//-->\n";
                    echo "</script>";
                    exit;
            }
        }
        return $fileName;
    }

    /**
     * 파일명의 빈 부분을 "_" 로 변경
     */
    public function _emptyToUnderline($fileName)
    {
        $fileName = str_replace("(", "", $fileName);
        $fileName = str_replace(")", "", $fileName);
        return preg_replace("/\ /i", "_", $fileName);
    }

    /**
     * 중복 파일명 변경
     */
    public function _isFilsName($fileName)
    {
    $dtime = date('mdHis');
        if ( is_file($this->upload_directory . "/" . $fileName) ) {
            $fileName = $dtime."_".$fileName;
        }
        return $fileName;
    }

    /**
     * 한글 파일명 변경
     */ 
     
    public function _isHangulName($fileName)
    {
        
            $han = 0;
          $dtime = date(mdHis);
            $fileName_Type = $this->_getExtension($fileName);
            $fileName_Name = str_replace(".".$fileName_Type,"",$fileName);
            $fileName_len = strlen($fileName_Name) - 1;
                $rnd = rand(100, 1000);            
                for($i = 0; $i < strlen($fileName_Name); $i++) {
                   if(ord($fileName_Name[$i]) >= 0x80) {
                        $han = 1;
                        //break;
                   }
                }
                
            if ( $han == 1 ) {
                $fileName = $rnd."".ord($fileName_Name[$fileName_len])."".$dtime.".".$fileName_Type;
            } else $fileName = $fileName_Name."".$rnd.".".$fileName_Type;
                return $fileName;
    }

}
