<?php

namespace App\Controllers;
use CodeIgniter\HTTP\ResponseInterface;
class FileorImageUploadController extends BaseController
{
    public function singleuploader()
    {
        helper(['form', 'url']);
        $file = $this->request->getFile('file');
        if (!$file) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No file was uploaded.',
            ], ResponseInterface::HTTP_BAD_REQUEST);
        }
        $fileType = $this->request->getPost('filetype');
        $allowedTypes = [];
        if ($fileType === 'image') {
            $allowedTypes = ['jpg', 'jpeg', 'png', 'webp'];
        } elseif ($fileType === 'document') {
            $allowedTypes = ['pdf', 'xls', 'xlsx'];
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid file type provided.',
            ], ResponseInterface::HTTP_BAD_REQUEST);
        }
        $fileExtension = $file->getClientExtension();
        if (!in_array($fileExtension, $allowedTypes)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => "Invalid file format. Allowed formats: " . implode(', ', $allowedTypes),
            ], ResponseInterface::HTTP_BAD_REQUEST);
        }
        $maxFileSize = 5 * 1024 * 1024; // 5 MB
        if ($file->getSize() > $maxFileSize) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'File size exceeds the maximum limit of 5 MB.',
            ], ResponseInterface::HTTP_BAD_REQUEST);
        }
        if ($file->isValid() && !$file->hasMoved()) {
            $uploadPath = WRITEPATH . 'uploads/' . $fileType;
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            $newName = $file->getRandomName();
            $file->move($uploadPath, $newName);
            return $this->response->setJSON([
                'status' => 'success',
                'filename' => 'uploads/' . $fileType . '/' . $newName,
                'message' => 'File uploaded successfully.',
            ]);
        }
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Failed to upload the file.',
        ], ResponseInterface::HTTP_BAD_REQUEST);
    }

    public function multiuploader()
    {
        helper(['form', 'url']);
        $files = $this->request->getFiles();
        $fileType = $this->request->getPost('filetype');
        $allowedTypes = [];

        if ($fileType === 'image') {
            $allowedTypes = ['jpg', 'jpeg', 'png', 'webp'];
        } elseif ($fileType === 'document') {
            $allowedTypes = ['pdf', 'xls', 'xlsx'];
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid file type provided.',
            ]);
        }

        $uploadedFiles = $files['files'];
        $uploadedPaths = [];
        foreach ($uploadedFiles as $key => $file) {
            $uploadedPaths['id'] = $key;
            if ($file->isValid() && !$file->hasMoved()) {
                $ext = $file->getClientExtension();
                if (!in_array($ext, $allowedTypes)) {
                    continue; 
                }

                if ($file->getSize() > 5 * 1024 * 1024) {
                    continue; 
                }

                $uploadPath = WRITEPATH . 'uploads/' . $fileType;
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                $newName = $file->getRandomName();
                $file->move($uploadPath, $newName);
                $uploadedPaths['file'] = 'uploads/' . $fileType . '/' . $newName;
            }
        }

        if (empty($uploadedPaths)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No valid files were uploaded.',
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Files uploaded successfully.',
            'files' => $uploadedPaths,
        ]);
    }

}
