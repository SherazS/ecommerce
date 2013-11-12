class Application_Model_Products
{
    protected $_name;
    protected $_id;
    protected $_category;
    protected $_description;
    protected $_cost;
 
    public function __set($name, $value);
    public function __get($name);

    public function setId($id);
    public function getId(); 

    public function setCategory($category);
    public function getCategory();
 
    public function setDescription($description);
    public function getDescription();
 
    public function setCost($cost);
    public function getCost();

}
 
class Application_Model_ProductsMapper
{
    public function save(Application_Model_Products $products);
    public function find($id);
    public function fetchAll();
}