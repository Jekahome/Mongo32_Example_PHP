<?php



function autoload($className)
{
    $res=explode('\\',$className);
     $className=$res[count($res)-1];
/*
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
*/

    $className=$className.'.php';
    //echo $className;exit;
    $retfileName='';
    scandirs('D:\OpenServer\domains\mongo32\mongo-php-library-master',$className,$path,$retfileName);


if($retfileName)
    require $retfileName;
    else throw new Exception('not');
}
spl_autoload_register('autoload');

/*   $scanned_directory = array_diff(scandir($glob[$i]), array('..', '.'));
                                            foreach($scanned_directory as  $v ){
                                                //print_r([1, $v,$local_patch.DIRECTORY_SEPARATOR.$v,$file_remove]);
                                                if(is_file($local_patch.DIRECTORY_SEPARATOR.$v) && array_search($v,$file_remove)!==false) {
                                                    @unlink($local_patch.DIRECTORY_SEPARATOR.$v);
                                                }
                                            }
    */
function scandirs($start,$search,&$path,&$fileName){

    $handle = opendir($start);
    if(is_resource($handle)) {
        while (false !== ($file = readdir($handle))) {
            if ($file != '.' && $file != '..') {
                if (is_dir($start.'/'.$file)) {
                        $path[]=$start.'/'.$file;
                        scandirs($start.'/'.$file,$search,$path,$fileName);
                }
                else {

                    if($file==$search){
                        $path[]=DIRECTORY_SEPARATOR.$file ;
                        $fileName=$path[count($path)-2].DIRECTORY_SEPARATOR.$file ;
                    }

                }
            }
        }
    }

    closedir($handle);
    return $path;
}

