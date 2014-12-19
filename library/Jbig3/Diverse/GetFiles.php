<?php

class Jbig3_Diverse_GetFiles {
    
    /**
     *
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;
    
    protected $folderfordb = array();

    public function storeFoldersInDB(){
        
        
        foreach ($folders as $file) {
            
            if($file->isFile()) {
                
                $filesdb = new Jbig3\Entity\FilesEntity();
                $filesdb->name = $file;
//                 $this->em->persist($filesdb);
//                 $this->em->flush();

//                 (printf('%s %s is a %s <br />', str_repeat('&nbsp;', $folders->getDepth()), $file, 
//                         $file->getType()));
            
            }
        }
        

    }

    public function scanSystem($root){
        
        $dirItr = new RecursiveDirectoryIterator($root);
        $filterItr = new Jbig3_Diverse_FilterFiles($dirItr);
        $itr = new RecursiveIteratorIterator($filterItr, RecursiveIteratorIterator::SELF_FIRST);
        
        return $itr;
    }
}