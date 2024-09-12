<?php

namespace App\Controllers;

use \App\Models\AdminModel;

class Home extends BaseController
{
    public function index()
    {
        $data = [];
        helper('form');

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'email' => 'required|min_length[8]|max_length[50]|valid_email|is_unique[admin.email]',
                'password' => 'required|min_length[8]|max_length[255]',
            ];

            $errors = [
                'password' => 'Email or Password do not match'
            ];


            if ($this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new AdminModel();
                $admin = $model->where('email', $this->request->getVar('email'))->first();

                if ($this->verifyMyPassword($this->request->getVar('password'), $admin['password'])) {
                    $this->setUserSession($admin);
                    return redirect()->to('/dashboard');
                } else {
                    $data['flash_message'] = TRUE;
                }
            }
        }
        return view('login');
    }

    public function signup()
    {
        $data = [];
        helper('form');

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name' => 'required|min_length[2]|max_length[20]',
                'lname' => 'required|min_length[2]|max_length[20]',
                'email' => 'required|min_length[8]|max_length[50]|valid_email|is_unique[admin.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'confirm-pwd' => 'required|matches[password]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new AdminModel();
                $newDataArray = [
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];


                if ($model->save($newDataArray)) {
                    $data['flash_message'] = TRUE;
                    // Using flash data for success message
                    // session()->setFlashdata('success', 'Registration successful!');
                    // return redirect()->to('/login');
                }
            }
        }

        return view('signup', $data);
    }

    public function dashboard()
    {
        $model = new AdminModel();
        $data['usersdata'] = $model->findAll();
        return view('dashboard', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to("/");
    }

    public function editUser($id)
    {
        $model = new AdminModel();
        if ($this->request->getMethod() === 'post') {
            $newData = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
            ];

            if ($model->update($id, $newData)) {
                return redirect()->to("/dashboard");
            }
        }
        $data['userdata'] = $model->where('id', $id)->first();
        return view('editUser', $data);
    }
    public function deleteUser($id)
    {
        $model = new AdminModel();
        if ($model->where('id', $id)->delete()) {
            return redirect()->to("/dashboard");
        }
    }

    public function upload($id)
    {
        $model = new AdminModel();
        $data = [];  // Initialize data array
        helper('form');

        // Check if the request method is POST
        if ($this->request->getMethod() === 'post') {
            // Define validation rules
            $validationRule = [
                'userfile' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[userfile]|is_image[userfile]|mime_in[userfile,image/jpg,image/jpeg,image/png]|max_size[userfile,2048]',
                ],
            ];

            // Validate the file input
            if (!$this->validate($validationRule)) {
                // If validation fails, add errors to the data array
                $data['validation'] = $this->validator->getErrors();  // Collect validation errors
            } else {
                // If validation passes, handle the file upload
                $file = $this->request->getFile('userfile');

                // Check if the file is valid and has been uploaded without errors
                if ($file->isValid() && !$file->hasMoved()) {
                    try {
                        // Move the file to a desired location, e.g., 'uploads' directory
                        $fileName = $file->getRandomName();  // Generate a random name to avoid conflicts
                        $file->move(WRITEPATH . 'uploads', $fileName);

                        // Optionally, save the file path or other info to the database using the model
                        // Example: $model->save(['id' => $id, 'file_path' => $fileName]);

                        // Add success message to the data array
                        $data['success'] = 'File uploaded successfully!';
                    } catch (\Exception $e) {
                        // Handle any exceptions that occur during the file move
                        $data['error'] = 'Failed to upload the file: ' . $e->getMessage();
                    }
                } else {
                    // Handle errors if the file is invalid or has moved already
                    $data['error'] = 'Failed to upload the file.';
                }
            }
        }

        // Load the upload form view with any data, such as validation errors or success messages
        return view('upload_form', $data);
    }



    private function verifyMyPassword($enteredPassword, $databasedPassword)
    {
        return password_verify($enteredPassword, $databasedPassword);
    }
    private function setUserSession($admin)
    {

        $data = [
            'id' => $admin['id'],
            'name' => $admin['name'],
            'email' => $admin['email'],
            'isLoggedIn' => true
        ];

        session()->set($data);
        return true;
    }
}
