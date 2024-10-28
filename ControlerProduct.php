<?php
class ProductController {
    //  Membuat product baru
    public function createProduct($id, $name, $price, $stock) {
        $product = new Product($id, $name, $price, $stock);
        $product->createProduct();
    }

    // Read detail Product
    public function readProduct($id) {
        $product = new Product(null, null, null, null); readProduct method // Temp object untuk memanggil readproduct method
        return $product->readProduct($id);
    }

    // Update product yang ada
    public function updateProduct($id, $name, $price, $stock) {
        $product = new Product($id, $name, $price, $stock);
        $product->setName($name);
        $product->setPrice($price);
        $product->setStock($stock);
        $product->updateProduct($id);
    }

   // Menghapus product
    public function deleteProduct($id) {
       $product = new Product(null, null, null, null); // Temp object untuk memanggil deleteProduct method 
        $product->deleteProduct($id);
    }
}


<?php
require_once 'Product.php';

class ProductController {
    // Create product
    public function create($id, $name, $price, $stock) {
        $product = new Product($id, $name, $price, $stock);
        $product->createProduct();
        echo "Produk berhasil dibuat!";
    }
    // Read product by ID
    public function read($id) {
        $product = new Product(null, null, null, null);
        $result = $product->readProduct($id);
        if ($result) {
            echo "ID: " . $result->getId() . "<br>";
            echo "Name: " . $result->getName() . "<br>";
            echo "Price: " . $result->getPrice() . "<br>";
            echo "Stock: " . $result->getStock() . "<br>";
        } else {
            echo "Produk tidak ditemukan!";
        }
    }

    // Update product
    public function update($id, $name, $price, $stock) {
        $product = new Product($id, $name, $price, $stock);
        $product->setName($name);
        $product->setPrice($price);
        $product->setStock($stock);
        $product->updateProduct($id);
        echo "Produk berhasil diperbarui!";
    }

    // Delete product
    public function delete($id) {
        $product = new Product(null, null, null, null);
        $product->deleteProduct($id);
        echo "Produk berhasil dihapus!";
    }
}

// Routing sederhana untuk mengarahkan permintaan ke metode yang tepat
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new ProductController();
    $action = $_POST['action']; // Nama aksi dari form atau endpoint
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'] ?? null;
    $price = $_POST['price'] ?? null;
    $stock = $_POST['stock'] ?? null;

    // Menjalankan metode yang sesuai berdasarkan action
    switch ($action) {
        case 'create':
            $controller->create($id, $name, $price, $stock);
            break;
        case 'read':
            $controller->read($id);
            break;
        case 'update':
            $controller->update($id, $name, $price, $stock);
            break;
        case 'delete':
            $controller->delete($id);
            break;
        default:
            echo "Aksi tidak dikenali.";
    }
}
?>
