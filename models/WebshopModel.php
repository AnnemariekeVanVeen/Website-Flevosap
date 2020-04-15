<?php
/***
 * @authors Annemarieke van Veen and Katja Liotto
 * @copyright All rights reserved.
 */

/**
 * Class WebshopModel; connects with DB table products
 */
class WebshopModel extends BaseModel
{
    private $table = 'products';
    private $id;
    private $name, $description, $price, $image, $nutrition_header, $nutrition_body, $category, $quantity;

    public function __construct()
    {
        parent::construct();
    }

    // GET table from DB
    public static function all()
    {
        $self = new self;
        $result = [];

        $sql = "SELECT * from {$self->getTable()}";
        // checks connection with DB and prepares with sql
        if ($stmt = $self->conn->prepare($sql)):
            $stmt->execute();
            // loads data from DB
            $data = $stmt->fetchall();
            foreach ($data as $row):
                $tmp = new self;
                $tmp = $tmp->loadData($tmp, $row);

                array_push($result, $tmp);
            endforeach;
            return $result;
        else:
            return false;
        endif;
    }

    /**
     * @param string $key
     * @param string $data
     * @return bool|array
     */
    // finds data by parsed key and value
    public static function find_by($key, $data)
    {
        $self = new self;
        $result = [];

        $sql = "SELECT * FROM {$self->getTable()} WHERE $key = :value";
        // prepares DB
        if ($stmt = $self->conn->prepare($sql)):
            $stmt->bindValue(':value', $data);
            $stmt->execute();
            // loads data
            $data = $stmt->fetchall();
            foreach ($data as $row):
                $tmp = new self;
                $tmp = $tmp->loadData($tmp, $row);

                array_push($result, $tmp);
            endforeach;
            return $result;
        else:
            return false;
        endif;
    }

    // finds in DB by id
    public static function find($id)
    {
        $self = new self;

        $sql = "SELECT * FROM {$self->getTable()} WHERE id = :id";
        // prepares DB
        if ($stmt = $self->conn->prepare($sql)):
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            // loads data
            $data = $stmt->fetch();
            $self = $self->loadData($self, $data);

            return $self;
        else:
            return false;
        endif;
    }

    // finds data in DB by cart: products
    public static function cart($products)
    {
        $result = [];

        foreach ($products as $id => $q) :
            $tmp = self::find_by('id', $id);

            if ($tmp !== false):
                array_push($result, $tmp[0]);
            endif;
        endforeach;

        return $result;
    }

    // finds price in DB en calculates total
    public static function total($id, $quantity)
    {
        $total = 0.00;
        $tmp = self::find($id);
        $price = $tmp->getProductPrice();
        while ($quantity != 0) {
            $total = $total + $price;
            $quantity--;
        }
        return $total;
    }

    /**
     * @param int $id
     * @return bool
     */
    public static function destroy($id)
    {
        $self = new self;
        $sql = "DELETE FROM {$self->getTable()} WHERE id = :id";

        if ($stmt = $self->conn->prepare($sql)):
            $stmt->bindValue(":id", $id);

            return $stmt->execute();
        endif;
        return false;
    }

    /**
     * @param array $data
     * @return bool|UserModel
     */
    // adds products to DB
    public static function create($data)
    {
        $self = new self;
        $sql = 'INSERT INTO ' . $self->getTable() . '(name, description, image, price, nutrition_header, nutrition_body, quantity, category)' .
            ' VALUES (:name, :description, :image, :price, :nutrition_header, :nutrition_body, :quantity, :category)';

        if ($stmt = $self->conn->prepare($sql)):
            $stmt->bindValue(':name', $data['name']);
            $stmt->bindValue(':description', $data['description']);
            $stmt->bindValue(':image', $data['image']);
            $stmt->bindValue(':price', $data['price']);
            $stmt->bindValue(':nutrition_header', $data['nutrition_header']);
            $stmt->bindValue(':nutrition_body', $data['nutrition_body']);
            $stmt->bindValue(':quantity', $data['quantity']);
            $stmt->bindValue(':category', $data['category']);
            if ($stmt->execute()):
                return true;
            endif;
        endif;
        return false;
    }

    /**
     * @param WebshopModel $self
     * @param array $data
     * @return WebshopModel
     */
    private function loadData($self, $data)
    {
        $self->setId($data['id']);
        $self->setProductName($data['name']);
        $self->setProductDescription($data['description']);
        $self->setProductImage($data['image']);
        $self->setProductPrice($data['price']);
        $self->setNutritionHeader($data['nutrition_header']);
        $self->setNutritionBody($data['nutrition_body']);
        $self->setCategory($data['category']);

        return $self;
    }

    /*----------------------------- Getters and Setters ----------------------------------------*/

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @param integer $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }


    public function setProductName($name): void
    {
        $this->name = $name;
    }

    public function getProductname(): string
    {
        return $this->name;
    }

    public function setProductPrice($price): void
    {
        $this->price = $price;
    }

    public function getProductPrice(): float
    {
        return $this->price;
    }

    public function setProductImage($image): void
    {
        $this->image = $image;
    }

    public function getProductImage(): string
    {
        return $this->image;
    }

    public function setProductDescription($description): void
    {
        $this->description = $description;
    }

    public function getProductDescription(): string
    {
        return $this->description;
    }

    public function setNutritionHeader($nutrition_header): void
    {
        $this->nutrition_header = $nutrition_header;
    }

    public function getNutritionHeader(): string
    {
        return $this->nutrition_header;
    }

    public function setNutritionBody($nutrition_body): void
    {
        $this->nutrition_body = $nutrition_body;
    }

    public function getNutritionBody(): string
    {
        return $this->nutrition_body;
    }

    public function setCategory($category): void
    {
        $this->category = $category;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setQuantity($quantity): void
    {
        $this->category = $quantity;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
