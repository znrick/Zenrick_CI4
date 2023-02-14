<?php

namespace App\Controllers;

class Image extends BaseController
{
    public function index()
    {
        helper(['form', 'image']);
        $data = [];
        

      
        if($this-> request-> getMethod()=='post'){
            $rules =[
            //     'email'=> [
            //     'rules'=> 'required|valid_email',
            //     'label' => 'Email address',
            //     'errors'=>[
            //         'required'=> 'This is a Requied Field.',
            //         'valid_email'=>' Please add Valid Email.'
            //     ]

            // ],

            //     'password'=> 'required|min_length[8]',
            //     'category'=> 'in_list[Student, Teacher]',
            //     'date' => [
            //         'rules' =>'required|check_date',
            //         'label' => 'Date',
            //         'errors'=>[
            //             'check_date' => 'your can not add the date before today'
            //         ],
            // ],
            'theFile'=> [
                'rules'=> 'uploaded[theFile.0]|is_image[theFile]',
                'label'=> 'the File'
            ]
            ];
    
            if($this->validate($rules)){
            //insert database

                // $file =$this->request->getFile('theFile');
                // if($file->isValid()&& ! $file->hasMoved()){
                //   $file->move('./uploads/images',  $file->getRandomName());  
                // }
                $path ='./uploads/images/manipulated/';
                $files= $this->request->getFiles();
                // $imageService = \Config\Services::image('imagick');
                $imageService = service('image');

                foreach($files['theFile']as $file){
                 if($file->isValid()&& ! $file->hasMoved()){
                  
                    $file->move($path);  
                    $fileName = $file->getName();
                    $data['image']=$fileName;
                   $this-> imagemanipulation ($path, 'thumbs', $fileName, $imageService);
                   $data['folders'][]= 'thumbs';
                   $this-> imagemanipulation ($path, 'flip', $fileName, $imageService);
                   $data['folders'][]= 'flip';
                    $this-> imagemanipulation ($path, 'rotate', $fileName, $imageService);
                   $data['folders'][]= 'rotate';
                    
                    

                    
                }

                }
              



            }else{
                $data ['validation'] = $this-> validator;
            }
            

        }
        return view('image', $data);
    }

    private function imageManipulation ($path, $folder, $fileName, $imageService){
        $savePath= $path. '/' .$folder;
        if(! file_exists($savePath))
            mkdir($savePath, 755 );

        $imageService->withFile(src($fileName));

        switch($folder){
        case 'thumbs':
            $imageService->fit(150,150);
            break;
            case 'flip':
                $imageService->flip('horizontal');
                $imageService->fit(160,90, 'top-right');
            break;
            case 'rotate':
                $imageService->rotate(180);
              
            break;
        }
        return $imageService->save($savePath.'/'. $fileName);
    }
}
