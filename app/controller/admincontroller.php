<?php

require __DIR__ . '/../service/adminservice.php';

class AdminController
{

    private $adminService;

    function __construct()
    {
        $this->adminService = new AdminService();
    }
    public function index()
    {
        $model = $this->adminService->getAll();
        require __DIR__ . '/../view/admin/index.php';
    }

    public function insert()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postData = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $productName = $postData['inputName'] ?? null;
            $productDescription = $postData['inputDescription'] ?? null;
            $productPrice = isset($postData['inputPrice']) && is_numeric($postData['inputPrice']) ? $postData['inputPrice'] : null;
            $productType = $postData['inputType-Add'] ?? null;

            if ($productName && $productDescription && $productPrice && $productType) {
                $this->adminService->insert($productName, $productDescription, $productPrice, $productType);
                header('Location: /product');
            } else {
                header('Location: /admin?error=insertfailed');
            }
        }
    }
    public function update()
    {
        // Check if form submission contains a product name
        if (!empty($_POST['inputName'])) {
            // Sanitize all POST input data
            $cleanInput = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Extract and validate required fields
            $productId = $cleanInput['id'] ?? null;
            $productName = $cleanInput['inputName'] ?? null;
            $productDescription = $cleanInput['inputDescription'] ?? null;
            $productPrice = isset($cleanInput['inputPrice']) && is_numeric($cleanInput['inputPrice'])
                ? $cleanInput['inputPrice']
                : null;
            $productType = $cleanInput['inputType-edit'] ?? null;

            // Proceed only if all necessary fields are present and valid
            if ($productId && $productName && $productDescription && $productPrice && $productType) {
                $this->adminService->update($productId, $productName, $productDescription, $productPrice, $productType);
                header('Location: /product'); // Redirect after successful update
            } else {
                // Redirect with error if any required input is missing or invalid
                header('Location: /admin?error=updatefailed');
            }
        }
    }


    public function delete()
    {
        $productId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    
        if ($productId && is_numeric($productId)) {
            $this->adminService->delete($productId);
            header('Location: /admin');
            exit;
        } else {
            header('Location: /admin?error=invalid_id');
            exit;
        }
    }
}
