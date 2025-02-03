<?php

namespace App\Controllers;
use CodeIgniter\HTTP\ResponseInterface;
class FileorImageUploadController extends BaseController
{
    public function index()
    {
        helper(['form', 'url']);
            $file = $this->request->getFile('file');
            if (!$file) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'No file was uploaded.',
                    'new_csrf_token' => csrf_hash(),
                ], ResponseInterface::HTTP_BAD_REQUEST);
            }

            // Validate file type
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
                    'new_csrf_token' => csrf_hash(),
                ], ResponseInterface::HTTP_BAD_REQUEST);
            }

            // Check file extension
            $fileExtension = $file->getClientExtension();
            if (!in_array($fileExtension, $allowedTypes)) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => "Invalid file format. Allowed formats: " . implode(', ', $allowedTypes),
                    'new_csrf_token' => csrf_hash(),
                ], ResponseInterface::HTTP_BAD_REQUEST);
            }

            // Validate file size (5 MB max)
            $maxFileSize = 5 * 1024 * 1024; // 5 MB
            if ($file->getSize() > $maxFileSize) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'File size exceeds the maximum limit of 5 MB.',
                    'new_csrf_token' => csrf_hash(),
                ], ResponseInterface::HTTP_BAD_REQUEST);
            }

            // Process file upload
            if ($file->isValid() && !$file->hasMoved()) {
                $uploadPath = WRITEPATH . 'uploads/' . $fileType;

                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                $newName = $file->getRandomName();
                $file->move($uploadPath, $newName);

                return $this->response->setJSON([
                    'status' => 'success',
                    'filename' => $fileType . '/' . $newName,
                    'message' => 'File uploaded successfully.',
                    'new_csrf_token' => csrf_hash(),
                ]);
            }

            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to upload the file.',
                'new_csrf_token' => csrf_hash(),
            ], ResponseInterface::HTTP_BAD_REQUEST);
       
    }
}
